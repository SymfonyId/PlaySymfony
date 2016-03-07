<?php
namespace AppBundle\Controller;

use Hateoas\Configuration\Route;
use Hateoas\Representation\CollectionRepresentation;
use Hateoas\Representation\Factory\PagerfantaFactory;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class HateOasController extends Controller
{
    /**
     * @Rest\Get(name="groups_list", path="/groups", defaults={"_format" = "json"})
     * @Rest\View()
     */
    public function getGroupsAction(Request $request)
    {
        $limit = $request->query->getInt('limit', 10);
        $page = $request->query->getInt('page', 1);

        $queryBuilder = $this->getDoctrine()->getManager()->createQueryBuilder()
            ->select('g')
            ->from('AppBundle:Group', 'g')
        ;

        $pagerAdapter = new DoctrineORMAdapter($queryBuilder);
        $pager = new Pagerfanta($pagerAdapter);
        $pager->setCurrentPage($page);
        $pager->setMaxPerPage($limit);

        $pagerFactory = new PagerfantaFactory();

        return $pagerFactory->createRepresentation(
            $pager,
            new Route('groups_list', array('limit' => $limit, 'page' => $page)),
            new CollectionRepresentation(
                $pager->getCurrentPageResults(),
                'groups',
                'groups'
            )
        );
    }
}