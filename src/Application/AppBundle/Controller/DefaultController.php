<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage", defaults={"label":"Home"})
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:default:index.html.twig');
    }

    /**
     * @Route(
     *     "/statement-of-works",
     *     name="statement_of_works",
     *     defaults={"parent_route":"homepage", "label":"Statement of works"}
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function statementOfWorksAction()
    {
        return $this->render('AppBundle:default:statementOfWorks.html.twig');
    }
}
