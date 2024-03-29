<?php

namespace Cacic\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * LogAcesso
 */
class LogUserLogado
{
    /**
     * @var integer
     */
    private $idLogUserLogado;

    /**
     * @var \DateTime
     */
    private $data;

    /**
     * @var \Cacic\CommonBundle\Entity\Computador
     */
    private $idComputador;

    /**
     * Get idLogUserLogado
     *
     * @return integer
     */
    public function getIdLogUserLogado()
    {
        return $this->idLogUserLogado;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return LogUserLogado
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set idComputador
     *
     * @param \Cacic\CommonBundle\Entity\Computador $idComputador
     * @return LogUserLogado
     */
    public function setIdComputador(\Cacic\CommonBundle\Entity\Computador $idComputador = null)
    {
        $this->idComputador = $idComputador;

        return $this;
    }

    /**
     * Get idComputador
     *
     * @return \Cacic\CommonBundle\Entity\Computador
     */
    public function getIdComputador()
    {
        return $this->idComputador;
    }

    /**
     * @PrePersist
     */
    public function onPrePersistSetRegistrationDate()
    {
        $this->data = new \DateTime();
    }

    /**
     * @var string
     */
    private $usuario;

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return LogUserLogado
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}