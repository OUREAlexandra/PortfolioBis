<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $repositoryGit;

    /**
     * @ORM\OneToOne(targetEntity=Design::class, inversedBy="project", cascade={"persist", "remove"})
     */
    private $design;

    /**
     * @ORM\OneToMany(targetEntity=ImgProject::class, mappedBy="project", cascade={"persist"})
     */
    private $img;

    /**
     * @ORM\ManyToMany(targetEntity=Techno::class, inversedBy="projects")
     */
    private $techno;

    public function __construct()
    {
        $this->img = new ArrayCollection();
        $this->techno = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
        return $this->img;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getRepositoryGit(): ?string
    {
        return $this->repositoryGit;
    }

    public function setRepositoryGit(?string $repositoryGit): self
    {
        $this->repositoryGit = $repositoryGit;

        return $this;
    }

    public function getDesign(): ?Design
    {
        return $this->design;
    }

    public function setDesign(?Design $design): self
    {
        $this->design = $design;

        return $this;
    }

    /**
     * @return Collection|ImgProject[]
     */
    public function getImg(): Collection
    {
        return $this->img;
    }

    public function addImg(ImgProject $img): self
    {
        if (!$this->img->contains($img)) {
            $this->img[] = $img;
            $img->setProject($this);
        }

        return $this;
    }

    public function removeImg(ImgProject $img): self
    {
        if ($this->img->removeElement($img)) {
            // set the owning side to null (unless already changed)
            if ($img->getProject() === $this) {
                $img->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Techno[]
     */
    public function getTechno(): Collection
    {
        return $this->techno;
    }

    public function addTechno(Techno $techno): self
    {
        if (!$this->techno->contains($techno)) {
            $this->techno[] = $techno;
        }

        return $this;
    }

    public function removeTechno(Techno $techno): self
    {
        $this->techno->removeElement($techno);

        return $this;
    }

    public function findAllbyDesc()
    {
    }

}
