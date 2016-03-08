<?php

namespace AppBundle\Api;

use AppBundle\Form\ContactType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\RehatBundle\Controller\RehatController;

/**
 * @Route("/contacts")
 */
class ContactApiController extends RehatController
{
    /**
     * Get Contacts Create Form
     *
     * @Route("/new")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Get contact form to use for ajax"
     * )
     */
    public function newAction()
    {
        return $this->create($this->getForm(ContactType::class));
    }
}
