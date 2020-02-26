<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class EquipmentImportCommand extends Command
{
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


        $io->success('Equipment imported!');
    }
}
