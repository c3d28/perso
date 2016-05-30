<?php
namespace Perso\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Perso\SiteBundle\Entity\Site\Post;


class HomeController extends Controller{
	
	public function indexAction(){
		
		$lesCats = $this->getDoctrine()->getRepository('Perso\SiteBundle\Entity\Site\Category')->findAll();
		 if ($lesCats == null) {
		 			$competences = $this->getDoctrine()->getRepository('Perso\SiteBundle\Entity\Site\Skill')->findAll() ;		

			return $this->render('PersoSiteBundle:CV:index.html.twig',array('competences' => $competences ));
		 }
		$arts1 = $lesCats[0]->getPosts();
		if (null === $arts1) {
			return $this->render('PersoSiteBundle:CV:index.html.twig',array("posts"=>$posts,"cats" => $lesCats ,"article1"=>$arts1,"article2"=>$arts2,"article3"=>$arts3));
		}
		

		foreach ($arts1 as $art){
			//print_r($art->getMessage());
		}
		
		
		//On récupére les infos2
		$arts2 = $lesCats[1]->getPosts();
		if (null === $arts2) {
			return $this->render('PersoSiteBundle:CV:index.html.twig',array("posts"=>$posts,"cats" => $lesCats ,"article1"=>$arts1,"article2"=>$arts2,"article3"=>$arts3));
		}
		
		//On récupere les infos3
		$arts3 = $lesCats[2]->getPosts();
		if (null === $arts3) {
			return $this->render('PersoSiteBundle:CV:index.html.twig',array("posts"=>$posts,"cats" => $lesCats ,"article1"=>$arts1,"article2"=>$arts2,"article3"=>$arts3));
		}
		
		//On récupère les derniers articles
		$posts = $this->getDoctrine()->getRepository('Perso\SiteBundle\Entity\Site\Post')->findAll();
		
		
		return $this->render('PersoSiteBundle:Accueil:index.html.twig',array("posts"=>$posts,"cats" => $lesCats ,"article1"=>$arts1,"article2"=>$arts2,"article3"=>$arts3));
	}
	
	public function articleAction(Post $post){
		$em = $this->getDoctrine()->getManager();
		
		//set the 'vue' when somebody reads a post.
		$nb = $post->getVue();
		$post->setVue($nb+1);
		$em->persist($post);
		$em->flush();
		
		// get the related post.
		$lesCats = $post->getCategories();
		// search 3 posts
				
		
		return $this->render('PersoSiteBundle:Blog:article.html.twig',array("post"=>$post));
	}
	
	public function articleNullAction(){
		return $this->render('PersoSiteBundle:Blog:index.html.twig'); 
	}
	

	
}