<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "Un titre aussi court?Minimum {{ limit }} caractères requis",
     *      maxMessage = "Un titre de moins de  {{ limit }} caractères est requis",
     *      allowEmptyString = false
     * )
     */
     
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "Minimum  {{ limit }} caractères pour l'intro",
     *      maxMessage = "Plus de  {{ limit }} caractères? Ce n'est plus une intro !",
     *      allowEmptyString = false
     * )
     */
    private $intro;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(  
     *    message = "Ce champs ne doit pas être vide",
     * )
     */
    private $content;



    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url(
     *    message = "Ceci n'est pas une adresse valide",
     * )
     */
    private $Image;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     */
    private $author;

/**
 * Génère un slug automatiquement
 * @ORM\PrePersist
 * 
 * @return void 
 */

    public function initSlug(){
        if(empty($this->slug)){
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->getTitle(). time() . hash("sha1", $this->getIntro()));

        }

    }

/**
 * Génère la date automatiquement
 * 
 * @ORM\PrePersist
 * @ORM\PreUpdate
 * 
 * @return void
 */

    public function updateDate(){
        if(empty($this->createdAt)){
            $this->createdAt = new \DateTime();
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
