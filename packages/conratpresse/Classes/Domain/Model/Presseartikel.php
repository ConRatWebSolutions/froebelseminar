<?php
declare(strict_types=1);

namespace Conrat\Conratpresse\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
/***
 *
 * This file is part of the "ConRat Presse" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 
 *
 ***/
/**
 * Presseartikel
 */
class Presseartikel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * titel
     * 
     * @var string
     */
    protected $titel = '';

    /**
     * uberschrift
     * 
     * @var string
     */
    protected $uberschrift = '';

    /**
     * datum
     * 
     * @var \DateTime
     */
    protected $datum = null;

    /**
     * anleser
     * 
     * @var string
     */
    protected $anleser = '';

    /**
     * pdf
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     */
    protected $pdf = null;

    /**
     * bild
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     */
    protected $bild = null;

    /**
     * externerlink
     * 
     * @var string
     */
    protected $externerlink = '';

    /**
     * kategorie
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Conratpresse\Domain\Model\Kategorie>
     * @Cascade("remove")
     * @Lazy
     */
    protected $kategorie = null;

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
     * Returns the uberschrift
     * 
     * @return string $uberschrift
     */
    public function getUberschrift()
    {
        return $this->uberschrift;
    }

    /**
     * Sets the uberschrift
     * 
     * @param string $uberschrift
     * @return void
     */
    public function setUberschrift($uberschrift)
    {
        $this->uberschrift = $uberschrift;
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
     * Returns the anleser
     * 
     * @return string $anleser
     */
    public function getAnleser()
    {
        return $this->anleser;
    }

    /**
     * Sets the anleser
     * 
     * @param string $anleser
     * @return void
     */
    public function setAnleser($anleser)
    {
        $this->anleser = $anleser;
    }

    /**
     * Returns the pdf
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Sets the pdf
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf
     * @return void
     */
    public function setPdf(\TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * Returns the bild
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
     */
    public function getBild()
    {
        return $this->bild;
    }

    /**
     * Sets the bild
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
     * @return void
     */
    public function setBild(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bild)
    {
        $this->bild = $bild;
    }

    /**
     * Returns the externerlink
     * 
     * @return string $externerlink
     */
    public function getExternerlink()
    {
        return $this->externerlink;
    }

    /**
     * Sets the externerlink
     * 
     * @param string $externerlink
     * @return void
     */
    public function setExternerlink($externerlink)
    {
        $this->externerlink = $externerlink;
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
    }

    /**
     * Adds a Kategorie
     * 
     * @param \Conrat\Conratpresse\Domain\Model\Kategorie $kategorie
     * @return void
     */
    public function addKategorie(\Conrat\Conratpresse\Domain\Model\Kategorie $kategorie)
    {
        $this->kategorie->attach($kategorie);
    }

    /**
     * Removes a Kategorie
     * 
     * @param \Conrat\Conratpresse\Domain\Model\Kategorie $kategorieToRemove The Kategorie to be removed
     * @return void
     */
    public function removeKategorie(\Conrat\Conratpresse\Domain\Model\Kategorie $kategorieToRemove)
    {
        $this->kategorie->detach($kategorieToRemove);
    }

    /**
     * Returns the kategorie
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Conratpresse\Domain\Model\Kategorie> $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Conratpresse\Domain\Model\Kategorie> $kategorie
     * @return void
     */
    public function setKategorie(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $kategorie)
    {
        $this->kategorie = $kategorie;
    }
}
