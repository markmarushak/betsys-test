<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SupplierController extends Controller
{
    /**
     * @Route(
     *     "/suppliers",
     *     name="supplier_index",
     *
     * )
     */
    public function indexAction()
    {
        $suppliers = $this->container->get("app.repository.supplier")
            ->findAll();
        return $this->render("AppBundle:supplier:index.html.twig", [
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * @Route(
     *     "supplier/{id}",
     *     requirements={"id": "\d+"},
     *     name="supplier_view"
     * )
     */
    public function viewAction($id)
    {
        $supplier = $this->container->get("app.repository.supplier")
            ->find($id);

        return $this->render("AppBundle:supplier:view.html.twig", [
            'supplier' => $supplier,
        ]);
    }
}