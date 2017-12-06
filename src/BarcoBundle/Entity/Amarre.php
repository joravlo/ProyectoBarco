<?php

namespace BarcoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amarre
 *
 * @ORM\Table(name="amarre")
 * @ORM\Entity(repositoryClass="BarcoBundle\Repository\AmarreRepository")
 */
class Amarre
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
     * @ORM\Column(name="pais", type="string", length=255)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=255)
     */
    private $accion;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer")
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="dimensiones", type="string", length=255)
     */
    private $dimensiones;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255)
     */
    private $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=255)
     */
    private $provincia;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="amarres")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
   private $usuario;


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
     * Set pais
     *
     * @param string $pais
     *
     * @return Amarre
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Amarre
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set accion
     *
     * @param string $accion
     *
     * @return Amarre
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion
     *
     * @return string
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     *
     * @return Amarre
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return int
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set dimensiones
     *
     * @param string $dimensiones
     *
     * @return Amarre
     */
    public function setDimensiones($dimensiones)
    {
        $this->dimensiones = $dimensiones;

        return $this;
    }

    /**
     * Get dimensiones
     *
     * @return string
     */
    public function getDimensiones()
    {
        return $this->dimensiones;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Amarre
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     *
     * @return Amarre
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set usuario
     *
     * @param \BarcoBundle\Entity\Usuario $usuario
     *
     * @return Amarre
     */
    public function setUsuario(\BarcoBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \BarcoBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
