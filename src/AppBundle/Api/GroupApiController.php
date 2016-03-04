<?php

namespace AppBundle\Api;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\RehatBundle\Annotation\Crud;
use Symfonian\Indonesia\RehatBundle\Controller\RehatControllerTrait;

/**
 * @Route("/groups")
 * @Crud("AppBundle\Entity\Group", form="AppBundle\Form\GroupType")
 */
class GroupApiController extends FOSRestController
{
    use RehatControllerTrait;

    public function getContainer()
    {
        return $this->container;
    }
}