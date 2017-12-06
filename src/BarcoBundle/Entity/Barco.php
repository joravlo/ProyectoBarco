<?php

namespace BarcoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Barco
 *
 * @ORM\Table(name="barco")
 * @ORM\Entity(repositoryClass="BarcoBundle\Repository\BarcoRepository")
 */
class Barco
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
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    private $modelo;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer")
     */
    private $precio;

    /**
     * @var float
     *
     * @ORM\Column(name="eslora", type="float")
     */
    private $eslora;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="year", type="date")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=255)
     */
    private $pais;

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
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="barcos")
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Barco
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
     * Set estado
     *
     * @param string $estado
     *
     * @return Barco
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Barco
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Barco
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     *
     * @return Barco
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
     * Set eslora
     *
     * @param float $eslora
     *
     * @return Barco
     */
    public function setEslora($eslora)
    {
        $this->eslora = $eslora;

        return $this;
    }

    /**
     * Get eslora
     *
     * @return float
     */
    public function getEslora()
    {
        return $this->eslora;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     *
     * @return Barco
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set pais
     *
     * @param string $pais
     *
     * @return Barco
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
     * Set foto
     *
     * @param string $foto
     *
     * @return Barco
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
     * @return Barco
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
     * @return Barco
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
