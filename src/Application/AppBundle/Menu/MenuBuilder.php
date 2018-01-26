<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use AppBundle\Entity\Group;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class MenuBuilder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /** @var FactoryInterface */
    protected $menuBuilderFactory;

    public function __construct(FactoryInterface $factory)
    {
        $this->menuBuilderFactory = $factory;
    }

    public function createMainMenu()
    {
        $menu = $this->menuBuilderFactory->createItem('main');

        $item = $menu->addChild('Home', [
                    'route' => 'homepage',
                ])
            ->setParent(null);
        $menu->addChild('Statement of works', [
                    'route' => 'statement_of_works',
                ])
            ->setParent($item);
        $menu->addChild('Admin panel', [
            'route' => 'sonata_admin_dashboard',
            'linkAttributes' => [
                'target' => '_blank',
            ],
        ]);

        return $menu;
    }

    public function createSidebarGroupsMenu()
    {
        $menu = $this->menuBuilderFactory->createItem('sidebar_groups');

        $groups = $this->container->get('app.repository.group')->findAll();

        $groupsMenuItem = $menu->addChild("all_groups", [
                    "label" => "All groups",
                    "route" => "group_index",
                ])
            ->setParent($this->getHomeMenuItem());

        foreach ($groups as $group) {
            /** @var Group $group */
            $menu->addChild($group->getName(), [
                        'route' => 'group_view',
                        'routeParameters' => [
                            'id' => $group->getId(),
                        ],
                    ])
                ->setParent($groupsMenuItem);
        }

        return $menu;
    }

    public function createSidebarSuppliersMenu()
    {
        $menu = $this->menuBuilderFactory->createItem('sidebar_suppliers');
        // Add the root node to the menu
        $menu->addChild('suppliers', [
                    'route' => 'supplier_index',
                    "label" => "Suppliers",
                ])
            ->setParent($this->getHomeMenuItem());

        return $menu;
    }

    public function createSuppliersBreadcrumbs()
    {
        $menu = $this->menuBuilderFactory->createItem('sidebar_suppliers');
        $suppliersMenuItem = $this->createSidebarSuppliersMenu()
            ->getChild('suppliers');
        // Check if it's a page of some supplier
        $request = $this->container->get('request_stack')->getCurrentRequest();
        if ($id = $request->get('id')) {
            // find the supplier
            $supplier = $this->container->get("app.repository.supplier")
                ->find($id);
            // Add it to the menu
            $menu->addChild($supplier->getName(), [
                        "route" => "supplier_view",
                        'routeParameters' => [
                            'id' => $supplier->getId(),
                        ],
                    ])
                ->setParent($suppliersMenuItem);
        }
        return $menu;
    }

    protected function getHomeMenuItem()
    {
        $menu = $this->createMainMenu();
        return $menu->getChild("Home");
    }
}