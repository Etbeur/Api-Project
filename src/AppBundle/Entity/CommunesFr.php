<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommunesFr
 *
 * @ORM\Table(name="communes_fr")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommunesFrRepository")
 */
class CommunesFr
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="PostalCode", type="integer")
     */
    private $postalCode;

    /**
     * @var int
     *
     * @ORM\Column(name="InseeNumber", type="integer")
     */
    private $inseeNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="GpsData", type="string", length=255)
     */
    private $gpsData;


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
     * Set name
     *
     * @param string $name
     *
     * @return CommunesFr
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return CommunesFr
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set inseeNumber
     *
     * @param integer $inseeNumber
     *
     * @return CommunesFr
     */
    public function setInseeNumber($inseeNumber)
    {
        $this->inseeNumber = $inseeNumber;

        return $this;
    }

    /**
     * Get inseeNumber
     *
     * @return int
     */
    public function getInseeNumber()
    {
        return $this->inseeNumber;
    }

    /**
     * Set gpsData
     *
     * @param integer $gpsData
     *
     * @return CommunesFr
     */
    public function setGpsData($gpsData)
    {
        $this->gpsData = $gpsData;

        return $this;
    }

    /**
     * Get gpsData
     *
     * @return int
     */
    public function getGpsData()
    {
        return $this->gpsData;
    }
}
