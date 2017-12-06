<?php

namespace BarcoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="BarcoBundle\Repository\UsuarioRepository")
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\OneToMany(targetEntity="Barco", mappedBy="usuario")
     */
    private $barcos;

    /**
     * @ORM\OneToMany(targetEntity="Amarre", mappedBy="usuario")
     */
    private $amarres;

    /**
     * @ORM\OneToMany(targetEntity="Accesorio", mappedBy="usuario")
     */
    private $accesorios;


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
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->barcos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->amarres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->accesorios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add barco
     *
     * @param \BarcoBundle\Entity\Barco $barco
     *
     * @return Usuario
     */
    public function addBarco(\BarcoBundle\Entity\Barco $barco)
    {
        $this->barcos[] = $barco;

        return $this;
    }

    /**
     * Remove barco
     *
     * @param \BarcoBundle\Entity\Barco $barco
     */
    public function removeBarco(\BarcoBundle\Entity\Barco $barco)
    {
        $this->barcos->removeElement($barco);
    }

    /**
     * Get barcos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBarcos()
    {
        return $this->barcos;
    }

    /**
     * Add amarre
     *
     * @param \BarcoBundle\Entity\Amarre $amarre
     *
     * @return Usuario
     */
    public function addAmarre(\BarcoBundle\Entity\Amarre $amarre)
    {
        $this->amarres[] = $amarre;

        return $this;
    }

    /**
     * Remove amarre
     *
     * @param \BarcoBundle\Entity\Amarre $amarre
     */
    public function removeAmarre(\BarcoBundle\Entity\Amarre $amarre)
    {
        $this->amarres->removeElement($amarre);
    }

    /**
     * Get amarres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmarres()
    {
        return $this->amarres;
    }

    /**
     * Add accesorio
     *
     * @param \BarcoBundle\Entity\Accesorio $accesorio
     *
     * @return Usuario
     */
    public function addAccesorio(\BarcoBundle\Entity\Accesorio $accesorio)
    {
        $this->accesorios[] = $accesorio;

        return $this;
    }

    /**
     * Remove accesorio
     *
     * @param \BarcoBundle\Entity\Accesorio $accesorio
     */
    public function removeAccesorio(\BarcoBundle\Entity\Accesorio $accesorio)
    {
        $this->accesorios->removeElement($accesorio);
    }

    /**
     * Get accesorios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAccesorios()
    {
        return $this->accesorios;
    }
}
