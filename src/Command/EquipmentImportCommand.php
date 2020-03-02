<?php

namespace App\Command;

use App\Entity\Equipment;
use App\Entity\EquipmentProducer;
use App\Entity\EquipmentType;
use App\Entity\PreservativeProduct;
use App\Entity\ServiceAction;
use App\Entity\TimeInterval;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use League\Csv\Statement;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class EquipmentImportCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setName('csv:import:equipment')
            ->setDescription('Imports equipment with producers and types.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Attempting to import equipment...');

        $reader = Reader::createFromPath('%kernel.rootk_dir%/../src/Data/import.csv');
        $reader->setDelimiter(';');
        $reader->setEnclosure('"');
        $reader->setHeaderOffset(0);

        $stmt = (new Statement())->offset(0);

        $results = $stmt->process($reader);
        $io->progressStart($results->count());
        $next = 'type';
        $type = null;

        foreach ($results as $record) {
            switch ($next) {
                case 'equipment':
                    $next = 'service';
                    $number = str_replace('do / bis', 'do', $record['number']);
                    $number = str_replace('bis / do', 'do', $number);
                    $number = str_replace('bis', 'do', $number);
                    $name = explode('/', $record['equipment']);
                    $name = trim($name[0]);
                    $equipment = $this->entityManager->getRepository(Equipment::class)
                        ->findOneBy(['name' => $name]);
                    if (!$equipment) {
                        $comment = explode('/', $record['comment']);
                        $comment = trim($comment[0]);
                        $equipment = (new Equipment())
                            ->setName($name)
                            ->setNumber($number)
                            ->setEquipmentType($type)
                            ->setComment($comment)
                        ;
                        $this->entityManager->persist($equipment);
                        $this->entityManager->flush();
                    }
                    break;

                case 'type':
                    if (strstr($record['equipment'], chr(10))) {
                        $typeAndProducer = explode(chr(10), $record['equipment']);
                        $typeAndProducer[0] = str_replace('/', '', $typeAndProducer[0]);
                    } else {
                        $typeAndProducer = explode('/', $record['equipment']);
                    }

                    $typeAndProducer = explode(',', $typeAndProducer[0]);
                    if (!isset($typeAndProducer[1]) || trim($typeAndProducer[1]) == '') {
                        $producer = null;
                    } else {
                        $producerName = trim(str_replace('Firmy ', '', $typeAndProducer[1]));
                        $producer = $this->entityManager->getRepository(EquipmentProducer::class)
                            ->findOneBy(['name' => $producerName]);
                        if (!$producer) {
                            $producer = (new EquipmentProducer())
                                ->setName($producerName);
                            $this->entityManager->persist($producer);
                            $this->entityManager->flush();
                        }
                    }

                    $typeName = trim($typeAndProducer[0]);
                    $type = $this->entityManager->getRepository(EquipmentType::class)
                        ->findOneBy([
                            'name' => $typeName,
                            'equipmentProducer' => $producer,
                        ]);
                    if (!$type) {
                        $comment = explode('/', $record['comment']);
                        $comment = trim($comment[0]);
                        $type = (new EquipmentType())
                            ->setName($typeName)
                            ->setEquipmentProducer($producer)
                            ->setComment($comment);
                        $this->entityManager->persist($type);
                        $this->entityManager->flush();
                    }

                    $next = 'skip';
                    break;

                case 'skip':
                    $next = 'equipment';
                    break;

                case 'service':
                    if (trim($record['equipment']) == '') {
                        $next = 'type';
                        break;
                    }

                    $name = explode('/', $record['equipment']);
                    $name = trim($name[0]);
                    $performedByProducer = (trim($record['producer'] == '')) ? false : true;
                    // codziennnie domyśnie
                    $timeInterval = $this->entityManager->getRepository(TimeInterval::class)
                        ->find(3);

                    if ((trim($record['Int 2']) == '') && (trim($record['Int 11']) == '')) {
                        $timeIntervalValue = null;
                        for ($i=3; $i<11; $i++) {
                            if (trim($record['Int '.$i]) != '') {
                                /** @var TimeInterval $timeInterval */
                                $timeInterval = $this->entityManager->getRepository(TimeInterval::class)
                                    ->find($i);
                            }
                        }
                    } else {
                        if (trim($record['Int 2']) == '') {
                            $timeIntervalValue = (int) trim($record['Int 11']);
                            /** @var TimeInterval $timeInterval */
                            $timeInterval = $this->entityManager->getRepository(TimeInterval::class)
                                ->find(11);
                        } else {
                            $timeIntervalValue = (int) trim($record['Int 2']);
                            /** @var TimeInterval $timeInterval */
                            $timeInterval = $this->entityManager->getRepository(TimeInterval::class)
                                ->find(2);
                        }
                    }

                    $preservativeProduct = null;
                    $preservativeProductAmount = null;
                    for ($i=1; $i<11; $i++) {
                        if (trim($record['s'.$i]) != '') {
                            $preservativeProductAmount = (float) trim($record['s'.$i]);
                            /** @var  PreservativeProduct $preservativeProduct */
                            $preservativeProduct = $this->entityManager->getRepository(PreservativeProduct::class)
                                ->find($i);
                        }
                    }

                    $comment = explode('/', $record['comment']);
                    $comment = trim($comment[0]);
                    $serviceAction = (new ServiceAction())
                        ->setName($name)
                        ->setPerformedByProducer($performedByProducer)
                        ->setTimeInterval($timeInterval)
                        ->setTimeIntervalValue($timeIntervalValue)
                        ->setPreservativeProduct($preservativeProduct)
                        ->setPreservativeProductAmount($preservativeProductAmount)
                        ->setComment($comment)
                    ;

                    $this->entityManager->persist($serviceAction);
                    break;
            }

            $io->progressAdvance();
        }

        $this->entityManager->flush();

        $io->progressFinish();
        $io->success('Equipment imported!');
    }
}
