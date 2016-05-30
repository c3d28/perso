<?php

namespace Perso\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Perso\SiteBundle\Entity\Site\Experience;


class ExperienceAdmin extends Admin{
	// Fields to be shown on create/edit forms
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('id', 'integer', array('label' => 'Id'))
		->add('name', 'text', array('label' => 'Date Début'))
		->add('company', 'text', array('label' => 'Entreprise'))
		->add('description', 'text', array('label' => 'Description'))
		->add('dateDebut', 'date', array('label' => 'Date Début'))
		->add('dateFin', 'date', array('label' => 'Date Fin'))
		;
	}
	
	
	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('id')
		->add('name')
		->add('company', null, array('label' => "Entreprises"))
		->add('description', 'integer', array('label' => 'Description'))
		->add('dateDebut', 'date', array('label' => 'DateDebut'))		
		->add('dateFin', 'date', array('label' => 'Date Fin'));
	}
	
	protected function configureShowField(ShowMapper $showMapper)
	{
		$showMapper

		->add('webPath', 'string')

		;
	}
	
	
}