<?php
declare(strict_types=1);

namespace Conrat\Crlogbook\Domain\Model;


/***
 *
 * This file is part of the "ConRat Logbook" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 
 *
 ***/
/**
 * Logbook
 */
class Logbook extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * datum
     * 
     * @var \DateTime
     */
    protected $datum = null;

    /**
     * start
     * 
     * @var string
     */
    protected $start = 0;

    /**
     * ende
     * 
     * @var string
     */
    protected $ende = 0;

    /**
     * fahrstrecke
     * 
     * @var int
     */
    protected $fahrstrecke = 0;

    /**
     * von
     * 
     * @var string
     */
    protected $von = '';

    /**
     * bis
     * 
     * @var string
     */
    protected $bis = '';

    /**
     * bemerkung
     * 
     * @var string
     */
    protected $bemerkung = '';

    /**
     * grund
     * 
     * @var string
     */
    protected $grund = '';

    /**
     * user
     * 
     * @var string
     */
    protected $user = '';

    /**
     * Returns the datum
     * 
     * @return \DateTime $datum
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Sets the datum
     * 
     * @param \DateTime $datum
     * @return void
     */
    public function setDatum(\DateTime $datum)
    {
        $this->datum = $datum;
    }

    /**
     * Returns the fahrstrecke
     * 
     * @return int $fahrstrecke
     */
    public function getFahrstrecke()
    {
        return $this->fahrstrecke;
    }

    /**
     * Sets the fahrstrecke
     * 
     * @param int $fahrstrecke
     * @return void
     */
    public function setFahrstrecke($fahrstrecke)
    {
        $this->fahrstrecke = $fahrstrecke;
    }

    /**
     * Returns the von
     * 
     * @return string $von
     */
    public function getVon()
    {
        return $this->von;
    }

    /**
     * Sets the von
     * 
     * @param string $von
     * @return void
     */
    public function setVon($von)
    {
        $this->von = $von;
    }

    /**
     * Returns the bis
     * 
     * @return string $bis
     */
    public function getBis()
    {
        return $this->bis;
    }

    /**
     * Sets the bis
     * 
     * @param string $bis
     * @return void
     */
    public function setBis($bis)
    {
        $this->bis = $bis;
    }

    /**
     * Returns the bemerkung
     * 
     * @return string $bemerkung
     */
    public function getBemerkung()
    {
        return $this->bemerkung;
    }

    /**
     * Sets the bemerkung
     * 
     * @param string $bemerkung
     * @return void
     */
    public function setBemerkung($bemerkung)
    {
        $this->bemerkung = $bemerkung;
    }

    /**
     * Returns the grund
     * 
     * @return string $grund
     */
    public function getGrund()
    {
        return $this->grund;
    }

    /**
     * Sets the grund
     * 
     * @param string $grund
     * @return void
     */
    public function setGrund($grund)
    {
        $this->grund = $grund;
    }

    /**
     * Returns the user
     * 
     * @return string $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user
     * 
     * @param string $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Returns the start
     * 
     * @return string start
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Sets the start
     * 
     * @param int $start
     * @return void
     */
    public function setStart(int $start)
    {
        $this->start = $start;
    }

    /**
     * Returns the ende
     * 
     * @return string ende
     */
    public function getEnde()
    {
        return $this->ende;
    }

    /**
     * Sets the ende
     * 
     * @param int $ende
     * @return void
     */
    public function setEnde(int $ende)
    {
        $this->ende = $ende;
    }
}
