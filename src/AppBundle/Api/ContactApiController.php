<?php

namespace AppBundle\Api;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\RehatBundle\Controller\RehatController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/contacts")
 */
class ContactApiController extends RehatController
{
    /**
     * Get contacts create form
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

    /**
     * Create new contact
     *
     * @Route("")
     * @Method({"POST"})
     *
     * @ApiDoc(
     *     section="Master",
     *     resource="Contact",
     *     description="Create new contact",
     *     parameters={
     *          { "name"="contact[group]", "dataType"="integer", "required"=true, "description"="Group id" },
     *          { "name"="contact[full_name]", "dataType"="string", "required"=true, "description"="Contact fullname" },
     *          { "name"="contact[email]", "dataType"="string", "required"=true, "description"="Valid contact email address" },
     *          { "name"="contact[phone_number]", "dataType"="string", "required"=true, "description"="Contact phone number" }
     *     }
     * )
     */
    public function postAction(Request $request)
    {
        return $this->post($request, $this->getForm(ContactType::class), new Contact());
    }
}
