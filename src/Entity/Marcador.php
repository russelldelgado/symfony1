<?php

namespace App\Entity;

use App\Validator as AppAssert;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


//orm/haslifeciclecallbacks() --> con esto indicamos que alguna de estas anotaciones tiene que actuar en algun momento suscribiendose a su ciclo de vida
/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass=MarcadorRepository::class)
 */
class Marcador
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Url()
     * @AppAssert\Urlaccesible
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $categoria;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creado;


    //con este campo indicamos que realce esta funcion antes de guardarse , es lo mismo que lo indiquemos en el constructor
    /**
     * @ORM\PrePersist
     */
    public function setValorDefecto(){
        $this->creado = new \DateTime();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
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

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getCreado(): ?\DateTimeInterface
    {
        return $this->creado;
    }

    public function setCreado(\DateTimeInterface $creado): self
    {
        $this->creado = $creado;

        return $this;
    }
}
