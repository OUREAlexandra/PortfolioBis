<?php

namespace App\Entity;

use App\Repository\DesignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DesignRepository::class)
 */
class Design
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlAdobe;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=Project::class, mappedBy="design", cascade={"persist", "remove"})
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity=ImgDesign::class, mappedBy="design", cascade={"persist"})
     */
    private $img;

    /**
     * @ORM\ManyToMany(targetEntity=Techno::class, inversedBy="designs")
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

    public function getUrlAdobe(): ?string
    {
        return $this->urlAdobe;
    }

    public function setUrlAdobe(?string $urlAdobe): self
    {
        $this->urlAdobe = $urlAdobe;

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

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        // unset the owning side of the relation if necessary
        if ($project === null && $this->project !== null) {
            $this->project->setDesign(null);
        }

        // set the owning side of the relation if necessary
        if ($project !== null && $project->getDesign() !== $this) {
            $project->setDesign($this);
        }

        $this->project = $project;

        return $this;
    }

    /**
     * @return Collection|ImgDesign[]
     */
    public function getImg(): Collection
    {
        return $this->img;
    }

    public function addImg(ImgDesign $img): self
    {
        if (!$this->img->contains($img)) {
            $this->img[] = $img;
            $img->setDesign($this);
        }

        return $this;
    }

    public function removeImg(ImgDesign $img): self
    {
        if ($this->img->removeElement($img)) {
            // set the owning side to null (unless already changed)
            if ($img->getDesign() === $this) {
                $img->setDesign(null);
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
}
