<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Repository\GroupRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class SupplierAdmin extends AbstractAdmin
{
    protected $formOptions = [
        'validation_groups' => [],
        'cascade_validation' => true,
    ];

    protected function configureFormFields(FormMapper $form)
    {
        $container = $this->getConfigurationPool()->getContainer();
        /** @var GroupRepository $groupRepository */
        $groupRepository = $container->get('app.repository.group');
        $groupsQueryBuilder = $groupRepository->getGroupsQueryBuilder();

        $form
            ->add('name')
            ->add('email', 'email')
            ->add('address')
            ->add('phone', null/*, [], [
                'validate' => [
                    'regex' => [
                        'pattern' => "/^\d{9}$/",
                        'message' => "The value must consist of only 9 digits",
                    ],
                ],
            ]*/)
            ->add('groups', null, [
                'query_builder' => $groupsQueryBuilder,
                'by_reference' => true,
            ])
        ;
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('address')
            ->add('phone', null, [
                'editable' => true,
            ])
            ->add('groups', null, [
                'editable' => true,
            ])
            ->add('_action', 'actions', [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
            ->add('email')
            ->add('address')
            ->add('phone');
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('address')
            ->add('phone');
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('phone')
                ->assertRegex([
                    'pattern' => "/^\d{9}$/",
                    'message' => "The value must consist of only 9 digits"
                ])
            ->end()
            ->with('email')
                ->assertEmail()
            ->end();
    }
}