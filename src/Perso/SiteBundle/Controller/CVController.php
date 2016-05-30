<?php

namespace Perso\SiteBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Perso\SiteBundle\Entity\Site\Skill;

class CVController extends Controller{
	
	
	public function indexAction(){
		
		$competences = $this->getDoctrine()->getRepository('Perso\SiteBundle\Entity\Site\Skill')->findAll() ;		
		return $this->render('PersoSiteBundle:CV:index.html.twig',array('competences' => $competences )

		);
	}
}