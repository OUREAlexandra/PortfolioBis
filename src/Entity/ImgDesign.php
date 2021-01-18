<?php

namespace App\Entity;

use App\Repository\ImgDesignRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImgDesignRepository::class)
 */
class ImgDesign
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
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=Design::class, inversedBy="img")
     */
    private $design;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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
}
