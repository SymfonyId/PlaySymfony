<?php

namespace AppBundle\Api;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\RehatBundle\Annotation\Crud;
use Symfonian\Indonesia\RehatBundle\Controller\RehatControllerTrait;

/**
 * @Route("/contacts")
 * @Crud("AppBundle\Entity\Contact", form="AppBundle\Form\ContactType")
 */
class ContactApiController extends FOSRestController
{
    use RehatControllerTrait;
}
