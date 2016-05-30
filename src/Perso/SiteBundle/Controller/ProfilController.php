<?php

namespace Perso\SiteBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Perso\SiteBundle\Entity\Skill;
use Perso\SiteBundle\Entity\Experience;
use Perso\SiteBundle\Entity\Site\Formation;

class ProfilController extends Controller{


	public function indexAction(){
		
		$experiences = $this->getDoctrine()->getRepository('Perso\SiteBundle\Entity\Site\Experience')->findAll();
		$formations = $this->getDoctrine()->getRepository('Perso\SiteBundle\Entity\Site\Formation')->findAll();
		
		return $this->render('PersoSiteBundle:Profil:index.html.twig',array('experiences' => $experiences,'formations' => $formations));
	}
	

} 