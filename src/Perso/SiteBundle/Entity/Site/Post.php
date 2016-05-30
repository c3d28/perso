<?php

namespace Perso\SiteBundle\Entity\Site;

use Doctrine\ORM\Mapping as ORM;
use Perso\SiteBundle\Entity\Site\Category;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Perso\SiteBundle\Entity\Site\Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="Perso\SiteBundle\Entity\Site\PostRepository")
 * @ORM\HasLifecycleCallbacks
 * 
 */


class Post
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
	 * @ORM\Column(name="title", type="string")
	 */
	private $title;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="message", type="string")
	 */
	private $message;
	
	/**
	 * @var date
	 *
	 * @ORM\Column(name="created", type="date")
	 */
	private $created;
	

	/**
	 * @ORM\ManyToMany(targetEntity="Perso\SiteBundle\Entity\Site\Category", cascade={"persist"})
	 * @ORM\JoinTable(name="post_category",
     *   joinColumns={@ORM\JoinColumn(name="id_post", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="id_cat", referencedColumnName="id")}
     *   )
	 */
	private $categories;
	
	/**
	* @ORM\Column(name="image", type="string")
	* @var string $image
	*/
	private $image;
	
	public $file;
	
	/**
	 * @ORM\Column(name="publication", type="boolean")
	 */
	private $publication;
	
	/**
	 * @ORM\Column(name="vue", type="integer")
	 */
	private $vue;
	
	public function __construct(){
		
		$this->created = new \DateTime();
		$this->categories = new \Doctrine\Common\Collections\ArrayCollection();
		$this->publication = true;
		$this->vue = 0;
	}
	

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	public function getMessage() {
		return $this->message;
	}
	public function setMessage($message) {
		$this->message = $message;
		return $this;
	}
	public function getCreated() {
		return $this->created;
	}
	public function setCreated(date $created) {
		$this->created = $created;
		return $this;
	}
	public function getCategories() {
		return $this->categories;
	}
	public function setCategories(Category $categories) {
		$this->categories[] = $categories;
		return $this;
	}
	public function getPublication() {
		return $this->publication;
	}
	public function setPublication($publication) {
		$this->publication = $publication;
		return $this;
	}
	
	
	public function addCategories(ArrayCollection $categories){
		$this->categories[] = $category;
	}
	
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}
	

	protected function getUploadDir()
	{
		return 'uploads/images';
	}
	
	protected function getUploadRootDir()
	{
		return __DIR__.'/../../../../../web/'.$this->getUploadDir();
	}
	
	public function getWebPath()
	{
		return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
	}
	
	public function getAbsolutePath()
	{
		return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
	}
	
	/**
	 * @ORM\PrePersist
	 */
	public function preUpload()
	{
		if (null !== $this->file)
		{
			// do whatever you want to generate a unique name
			$this->image = uniqid().'.'.$this->file->guessExtension();
		}
	}
	
	/**
	 * @ORM\PostPersist
	 */
	public function upload()
	{
		if (null === $this->file) {
			return;
		}
	
		// if there is an error when moving the file, an exception will
		// be automatically thrown by move(). This will properly prevent
		// the entity from being persisted to the database on error
		$this->file->move($this->getUploadRootDir(), $this->image);
	
		unset($this->file);
	}
	
	/**
	 * @ORM\PostRemove
	 */
	public function removeUpload()
	{
		if ($file = $this->getAbsolutePath()) {
			unlink($file);
		}
	}
	public function getFile() {
		return $this->file;
	}
	public function setFile($file) {
		$this->file = $file;
		return $this;
	}
	public function getVue() {
		return $this->vue;
	}
	public function setVue($vue) {
		$this->vue = $vue;
		return $this;
	}
	
	
}