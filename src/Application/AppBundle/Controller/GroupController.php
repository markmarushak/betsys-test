<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GroupController extends Controller
{
    /**
     * @Route(
     *     "/groups",
     *     name="group_index"
     * )
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $groups = $this->container->get("app.repository.group")
            ->findAll();
        return $this->render("AppBundle:group:index.html.twig", [
            'groups' => $groups,
        ]);
    }

    /**
     * @Route(
     *     "/group/{id}",
     *     requirements={"id": "\d+"},
     *     name="group_view"
     * )
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        $group = $this->container->get("app.repository.group")
            ->find($id);
        return $this->render("AppBundle:group:view.html.twig", [
            'group' => $group,
        ]);
    }
}