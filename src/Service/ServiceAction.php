<?php

namespace App\Service;

use App\Entity\ServiceAction as ServiceActionDefinition;
use App\Entity\ServiceActionPerformed;
use App\Repository\ServiceActionRepository;
use App\Repository\ServiceActionPerformedRepository;

class ServiceAction
{
    private $serviceActionRepository;
    private $serviceActionPerformedRepository;

    public function __construct(
        ServiceActionRepository $serviceActionRepository,
        ServiceActionPerformedRepository $serviceActionPerformedRepository
    )
    {
        $this->serviceActionRepository = $serviceActionRepository;
        $this->serviceActionPerformedRepository = $serviceActionPerformedRepository;
    }

    public function getNextActionDate(ServiceActionDefinition $serviceAction)
    {
        
    }


}