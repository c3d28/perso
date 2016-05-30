<?php

namespace Perso\SiteBundle\Entity\Site;

use Doctrine\ORM\Mapping as ORM;


/**
 * Formation
 * @ORM\Table()
 * @ORM\Entity()
 * @author c3d28
 *
 */

class Formation {
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var array
	 *
	 * @ORM\Column(name="name", type="string")
	 */
	private $name;
	
	/**
	 * @ORM\Column(name="dateDebut",type="date")
	 */
	private $dateDebut;
	
	/**
	 * @ORM\Column(name="dateFin",type="date")
	 */
	private $dateFin;
	
	/**
	 * @ORM\Column(name="study", type="string")
	 * 
	 */
	private $study;
	
	/**
	 * @ORM\Column(name="description",type="string")
	 */
	private $description;
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName(array $name) {
		$this->name = $name;
		return $this;
	}
	public function getDateDebut() {
		return $this->dateDebut;
	}
	public function setDateDebut($dateDebut) {
		$this->dateDebut = $dateDebut;
		return $this;
	}
	public function getDateFin() {
		return $this->dateFin;
	}
	public function setDateFin($dateFin) {
		$this->dateFin = $dateFin;
		return $this;
	}
	public function getStudy() {
		return $this->study;
	}
	public function setStudy($study) {
		$this->study = $study;
		return $this;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}
	
	
	
	
}