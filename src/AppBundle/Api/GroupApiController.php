<?php

namespace AppBundle\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\RehatBundle\Controller\RehatController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/groups")
 */
class GroupApiController extends RehatController
{
    /**
     * @Route("/", defaults={"_entity": "AppBundle\Entity\Group"})
     * @Method({"GET"})
     */
    public function listAction(Request $request)
    {
        return parent::listAction($request);
    }

    /**
     * @Route("/new", defaults={"_entity": "AppBundle\Entity\Group", "_form": "AppBundle\Form\GroupType"})
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);
    }

    /**
     * @Route("/{id}", defaults={"_entity": "AppBundle\Entity\Group"})
     * @Method({"GET"})
     */
    public function getAction(Request $request, $id)
    {
        return parent::getAction($request, $id);
    }

    /**
     * @Route("/{id}", defaults={"_entity": "AppBundle\Entity\Group", "_form": "AppBundle\Form\GroupType"})
     * @Method({"PUT"})
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);
    }

    /**
     * @Route("/{id}", defaults={"_entity": "AppBundle\Entity\Group", "_form": "AppBundle\Form\GroupType"})
     * @Method({"DELETE"})
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);
    }
}