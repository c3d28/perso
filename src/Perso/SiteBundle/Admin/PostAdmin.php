<?php

namespace Perso\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Perso\SiteBundle\Entity\Site\Post;


class PostAdmin extends Admin{
	// Fields to be shown on create/edit forms
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('title', 'text', array('label' => 'Post Title'))
		->add('message', 'text', array('label' => 'message'))
		->add('categories','entity',array('class' => 'Perso\SiteBundle\Entity\Site\Category','property' => 'nom','multiple'  => true))
		->add('file', 'file', array('label' => 'Company logo', 'required' => false))
		;
	}
	
	// Fields to be shown on filter forms
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('title')
		->add('message')
		->add('categories')
		;
	}
	
	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('title')
		->add('message')
		->add('categories', null, array('label' => "Categories", "required" => false, "multiple" => false))
		->add('vue', 'integer', array('label' => 'vue'))
		->add('image','file',array('required'  => false))
		;
	}
	
	protected function configureShowField(ShowMapper $showMapper)
	{
		$showMapper

		->add('webPath', 'string')

		;
	}
	
	
}