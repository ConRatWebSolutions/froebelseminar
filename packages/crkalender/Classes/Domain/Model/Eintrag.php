<?php
declare(strict_types=1);

namespace Conrat\Crkalender\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
/***
 *
 * This file is part of the "ConRat Kalender" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 
 *
 ***/
/**
 * Eintrag
 */
class Eintrag extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * titel
     * 
     * @var string
     */
    protected $titel = '';

    /**
     * datum
     * 
     * @var \DateTime
     */
    protected $datum = null;

    /**
     * zeit
     * 
     * @var int
     */
    protected $zeit = null;

    /**
     * bis
     * 
     * @var \DateTime
     */
    protected $bis = null;

    /**
     * bzeit
     * 
     * @var int
     */
    protected $bzeit = null;

    /**
     * kurzbeschreibung
     * 
     * @var string
     */
    protected $kurzbeschreibung = '';

    /**
     * beschreibung
     * 
     * @var string
     */
    protected $beschreibung = '';

    /**
     * ort
     * 
     * @var string
     */
    protected $ort = '';

    /**
     * erstellt
     * 
     * @var string
     */
    protected $erstellt = '';

    /**
     * link
     * 
     * @var string
     */
    protected $link = '';

    /**
     * bemerkung
     * 
     * @var string
     */
    protected $bemerkung = '';

    /**
     * bemerkung1
     * 
     * @var string
     */
    protected $bemerkung1 = '';

    /**
     * kosten
     * 
     * @var string
     */
    protected $kosten = '';

    /**
     * anmledung
     * 
     * @var string
     */
    protected $anmledung = '';

    /**
     * referent
     * 
     * @var string
     */
    protected $referent = '';

    /**
     * googleId
     * 
     * @var string
     */
    protected $googleId = '';

    /**
     * bilder
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     */
    protected $bilder = null;

    /**
     * kategorie
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crkalender\Domain\Model\Kategorie>
     * @Cascade("remove")
     * @Lazy
     */
    protected $kategorie = null;

    /**
     * filter
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crkalender\Domain\Model\Filter>
     * @Cascade("remove")
     * @Lazy
     */
    protected $filter = null;

    /**
     * Returns the titel
     * 
     * @return string $titel
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Sets the titel
     * 
     * @param string $titel
     * @return void
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;
    }

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
     * Returns the bis
     * 
     * @return \DateTime $bis
     */
    public function getBis()
    {
        return $this->bis;
    }

    /**
     * Sets the bis
     * 
     * @param \DateTime $bis
     * @return void
     */
    public function setBis(\DateTime $bis)
    {
        $this->bis = $bis;
    }

    /**
     * Returns the kurzbeschreibung
     * 
     * @return string $kurzbeschreibung
     */
    public function getKurzbeschreibung()
    {
        return $this->kurzbeschreibung;
    }

    /**
     * Sets the kurzbeschreibung
     * 
     * @param string $kurzbeschreibung
     * @return void
     */
    public function setKurzbeschreibung($kurzbeschreibung)
    {
        $this->kurzbeschreibung = $kurzbeschreibung;
    }

    /**
     * Returns the beschreibung
     * 
     * @return string $beschreibung
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Sets the beschreibung
     * 
     * @param string $beschreibung
     * @return void
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * Returns the ort
     * 
     * @return string $ort
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Sets the ort
     * 
     * @param string $ort
     * @return void
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    }

    /**
     * Returns the erstellt
     * 
     * @return string $erstellt
     */
    public function getErstellt()
    {
        return $this->erstellt;
    }

    /**
     * Sets the erstellt
     * 
     * @param string $erstellt
     * @return void
     */
    public function setErstellt($erstellt)
    {
        $this->erstellt = $erstellt;
    }

    /**
     * Returns the link
     * 
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     * 
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
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
     * Returns the bemerkung1
     * 
     * @return string $bemerkung1
     */
    public function getBemerkung1()
    {
        return $this->bemerkung1;
    }

    /**
     * Sets the bemerkung1
     * 
     * @param string $bemerkung1
     * @return void
     */
    public function setBemerkung1($bemerkung1)
    {
        $this->bemerkung1 = $bemerkung1;
    }

    /**
     * Returns the kosten
     * 
     * @return string $kosten
     */
    public function getKosten()
    {
        return $this->kosten;
    }

    /**
     * Sets the kosten
     * 
     * @param string $kosten
     * @return void
     */
    public function setKosten($kosten)
    {
        $this->kosten = $kosten;
    }

    /**
     * Returns the anmledung
     * 
     * @return string $anmledung
     */
    public function getAnmledung()
    {
        return $this->anmledung;
    }

    /**
     * Sets the anmledung
     * 
     * @param string $anmledung
     * @return void
     */
    public function setAnmledung($anmledung)
    {
        $this->anmledung = $anmledung;
    }

    /**
     * Returns the referent
     * 
     * @return string $referent
     */
    public function getReferent()
    {
        return $this->referent;
    }

    /**
     * Sets the referent
     * 
     * @param string $referent
     * @return void
     */
    public function setReferent($referent)
    {
        $this->referent = $referent;
    }

    /**
     * Returns the googleId
     * 
     * @return string $googleId
     */
    public function getGoogleId()
    {
        return $this->googleId;
    }

    /**
     * Sets the googleId
     * 
     * @param string $googleId
     * @return void
     */
    public function setGoogleId($googleId)
    {
        $this->googleId = $googleId;
    }

    /**
     * Returns the bilder
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bilder
     */
    public function getBilder()
    {
        return $this->bilder;
    }

    /**
     * Sets the bilder
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bilder
     * @return void
     */
    public function setBilder(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bilder)
    {
        $this->bilder = $bilder;
    }

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->kategorie = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->filter = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Kategorie
     * 
     * @param \Conrat\Crkalender\Domain\Model\Kategorie $kategorie
     * @return void
     */
    public function addKategorie(\Conrat\Crkalender\Domain\Model\Kategorie $kategorie)
    {
        $this->kategorie->attach($kategorie);
    }

    /**
     * Removes a Kategorie
     * 
     * @param \Conrat\Crkalender\Domain\Model\Kategorie $kategorieToRemove The Kategorie to be removed
     * @return void
     */
    public function removeKategorie(\Conrat\Crkalender\Domain\Model\Kategorie $kategorieToRemove)
    {
        $this->kategorie->detach($kategorieToRemove);
    }

    /**
     * Returns the kategorie
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crkalender\Domain\Model\Kategorie> $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crkalender\Domain\Model\Kategorie> $kategorie
     * @return void
     */
    public function setKategorie(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * Returns the zeit
     * 
     * @return int zeit
     */
    public function getZeit()
    {
        return $this->zeit;
    }

    /**
     * Sets the zeit
     * 
     * @param \DateTime $zeit
     * @return void
     */
    public function setZeit(\DateTime $zeit)
    {
        $this->zeit = $zeit;
    }

    /**
     * Returns the bzeit
     * 
     * @return int bzeit
     */
    public function getBzeit()
    {
        return $this->bzeit;
    }

    /**
     * Sets the bzeit
     * 
     * @param \DateTime $bzeit
     * @return void
     */
    public function setBzeit(\DateTime $bzeit)
    {
        $this->bzeit = $bzeit;
    }

    /**
     * Adds a Filter
     * 
     * @param \Conrat\Crkalender\Domain\Model\Filter $filter
     * @return void
     */
    public function addFilter(\Conrat\Crkalender\Domain\Model\Filter $filter)
    {
        $this->filter->attach($filter);
    }

    /**
     * Removes a Filter
     * 
     * @param \Conrat\Crkalender\Domain\Model\Filter $filterToRemove The Filter to be removed
     * @return void
     */
    public function removeFilter(\Conrat\Crkalender\Domain\Model\Filter $filterToRemove)
    {
        $this->filter->detach($filterToRemove);
    }

    /**
     * Returns the filter
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crkalender\Domain\Model\Filter> $filter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Sets the filter
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crkalender\Domain\Model\Filter> $filter
     * @return void
     */
    public function setFilter(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $filter)
    {
        $this->filter = $filter;
    }
}
