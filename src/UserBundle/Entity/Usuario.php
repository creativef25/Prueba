<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Ape_Paterno", type="string", length=255)
     */
    private $apePaterno;

    /**
     * @var string
     *
     * @ORM\Column(name="Ape_Materno", type="string", length=255)
     */
    private $apeMaterno;

    /**
     * @var int
     *
     * @ORM\Column(name="Edad", type="integer")
     */
    private $edad;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apePaterno
     *
     * @param string $apePaterno
     *
     * @return Usuario
     */
    public function setApePaterno($apePaterno)
    {
        $this->apePaterno = $apePaterno;

        return $this;
    }

    /**
     * Get apePaterno
     *
     * @return string
     */
    public function getApePaterno()
    {
        return $this->apePaterno;
    }

    /**
     * Set apeMaterno
     *
     * @param string $apeMaterno
     *
     * @return Usuario
     */
    public function setApeMaterno($apeMaterno)
    {
        $this->apeMaterno = $apeMaterno;

        return $this;
    }

    /**
     * Get apeMaterno
     *
     * @return string
     */
    public function getApeMaterno()
    {
        return $this->apeMaterno;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     *
     * @return Usuario
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get edad
     *
     * @return int
     */
    public function getEdad()
    {
        return $this->edad;
    }
}

