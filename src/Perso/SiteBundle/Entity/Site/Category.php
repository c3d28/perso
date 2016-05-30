<?php

namespace Perso\SiteBundle\Entity\Site;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Translation\Tests\String;

/**
 * Perso\SiteBundle\Entity\Site\Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Perso\SiteBundle\Entity\Site\CategoryRepository")
 * 
 */


class Category
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="nom", type="string")
	 */
	private $nom;
	
	/**
	 * @var Collection de Posts
	 * 	@ORM\ManyToMany(targetEntity="Post", mappedBy="categories")

	 */
	private $posts;
	 
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNom() {
		return $this->nom;
	}
	public function setNom($nom) {
		$this->nom = $nom;
		return $this;
	}
	
	public function getPosts(){
		return $this->posts;
	}

	public function __toString()
	{
		return $this->nom;
	}
	
}