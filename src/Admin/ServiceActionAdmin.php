<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ServiceActionAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('name')
            ->add('equipment')
            ->add('performedByProducer')
            ->add('preservativeProductAmount')
            ->add('comment')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('name', null, ['label' => 'Nazwa'])
            ->add('equipment', null, ['label' => 'Nazwa urządzenia'])
            ->add('performedByProducer', null, ['label' => 'Wykonuje producent'])
            ->add('preservativeProduct', null, ['label' => 'Produkt konserwujący'])
            ->add('preservativeProductAmount', null, ['label' => 'Liczba jednostek produktu konserwującego'])
            ->add('timeInterval', null, ['label' => 'Odstęp czasowy'])
            ->add('timeIntervalValue', null, ['label' => 'Co ile (roboczogodzin lub lat)'])
            ->add('comment', null, ['label' => 'Uwagi'])
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            //->add('id')
            ->add('name')
            ->add('performedByProducer')
            ->add('preservativeProductAmount')
            ->add('preservativeProduct', null, [
                'class' => 'App\Entity\PreservativeProduct',
            ])
            ->add('timeInterval', null, [
                'class' => 'App\Entity\TimeInterval',
            ])
            ->add('timeIntervalValue')
            ->add('comment')
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('performedByProducer')
            ->add('preservativeProductAmount')
            ->add('preservativeProduct')
            ->add('timeInterval')
            ->add('timeIntervalValue')
            ->add('comment')
            ;
    }
}
