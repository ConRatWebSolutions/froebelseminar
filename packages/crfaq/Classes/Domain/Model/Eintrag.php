<?php
declare(strict_types=1);

namespace Conrat\Crfaq\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
/***
 *
 * This file is part of the "ConRat FaQ" Extension for TYPO3 CMS.
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
     * frage
     * 
     * @var string
     */
    protected $frage = '';

    /**
     * antwort
     * 
     * @var string
     */
    protected $antwort = '';

    /**
     * bilder
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     * @Lazy
     */
    protected $bilder = null;

    /**
     * blog1
     * 
     * @var string
     */
    protected $blog1 = '';

    /**
     * blog1bilder
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     * @Lazy
     */
    protected $blog1bilder = null;

    /**
     * blog2
     * 
     * @var string
     */
    protected $blog2 = '';

    /**
     * blog2bilder
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     * @Lazy
     */
    protected $blog2bilder = null;

    /**
     * downloads
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     * @Lazy
     */
    protected $downloads = null;

    /**
     * kategorie
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crfaq\Domain\Model\Kategorie>
     * @Cascade("remove")
     * @Lazy
     */
    protected $kategorie = null;

    /**
     * sortings
     * 
     * @var int
     */
    protected $sortings = 0;

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
     * Returns the frage
     * 
     * @return string $frage
     */
    public function getFrage()
    {
        return $this->frage;
    }

    /**
     * Sets the frage
     * 
     * @param string $frage
     * @return void
     */
    public function setFrage($frage)
    {
        $this->frage = $frage;
    }

    /**
     * Returns the antwort
     * 
     * @return string $antwort
     */
    public function getAntwort()
    {
        return $this->antwort;
    }

    /**
     * Sets the antwort
     * 
     * @param string $antwort
     * @return void
     */
    public function setAntwort($antwort)
    {
        $this->antwort = $antwort;
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
     * Returns the blog1
     * 
     * @return string $blog1
     */
    public function getBlog1()
    {
        return $this->blog1;
    }

    /**
     * Sets the blog1
     * 
     * @param string $blog1
     * @return void
     */
    public function setBlog1($blog1)
    {
        $this->blog1 = $blog1;
    }

    /**
     * Returns the blog1bilder
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $blog1bilder
     */
    public function getBlog1bilder()
    {
        return $this->blog1bilder;
    }

    /**
     * Sets the blog1bilder
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $blog1bilder
     * @return void
     */
    public function setBlog1bilder(\TYPO3\CMS\Extbase\Domain\Model\FileReference $blog1bilder)
    {
        $this->blog1bilder = $blog1bilder;
    }

    /**
     * Returns the blog2
     * 
     * @return string $blog2
     */
    public function getBlog2()
    {
        return $this->blog2;
    }

    /**
     * Sets the blog2
     * 
     * @param string $blog2
     * @return void
     */
    public function setBlog2($blog2)
    {
        $this->blog2 = $blog2;
    }

    /**
     * Returns the blog2bilder
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $blog2bilder
     */
    public function getBlog2bilder()
    {
        return $this->blog2bilder;
    }

    /**
     * Sets the blog2bilder
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $blog2bilder
     * @return void
     */
    public function setBlog2bilder(\TYPO3\CMS\Extbase\Domain\Model\FileReference $blog2bilder)
    {
        $this->blog2bilder = $blog2bilder;
    }

    /**
     * Returns the downloads
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $downloads
     */
    public function getDownloads()
    {
        return $this->downloads;
    }

    /**
     * Sets the downloads
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $downloads
     * @return void
     */
    public function setDownloads(\TYPO3\CMS\Extbase\Domain\Model\FileReference $downloads)
    {
        $this->downloads = $downloads;
    }

    /**
     * Adds a Kategorie
     * 
     * @param \Conrat\Crfaq\Domain\Model\Kategorie $kategorie
     * @return void
     */
    public function addKategorie(\Conrat\Crfaq\Domain\Model\Kategorie $kategorie)
    {
        $this->kategorie->attach($kategorie);
    }

    /**
     * Removes a Kategorie
     * 
     * @param \Conrat\Crfaq\Domain\Model\Kategorie $kategorieToRemove The Kategorie to be removed
     * @return void
     */
    public function removeKategorie(\Conrat\Crfaq\Domain\Model\Kategorie $kategorieToRemove)
    {
        $this->kategorie->detach($kategorieToRemove);
    }

    /**
     * Returns the kategorie
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crfaq\Domain\Model\Kategorie> $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crfaq\Domain\Model\Kategorie> $kategorie
     * @return void
     */
    public function setKategorie(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * Returns the sortings
     * 
     * @return int $sortings
     */
    public function getSortings()
    {
        return $this->sortings;
    }

    /**
     * Sets the sortings
     * 
     * @param int $sortings
     * @return void
     */
    public function setSortings($sortings)
    {
        $this->sortings = $sortings;
    }
}
