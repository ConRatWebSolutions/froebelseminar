<?php
namespace Conrat\Crtraegertreffen\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
/***
 *
 * This file is part of the "crtraegertreffen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * PDF
 */
class PDF extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * youtubelink
     * 
     * @var string
     */
    protected $youtubelink = '';

    /**
     * titel
     * 
     * @var string
     */
    protected $titel = '';

    /**
     * pdf
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     */
    protected $pdf = null;

    /**
     * youtube
     * 
     * @var string
     */
    protected $youtube = '';

    /**
     * webseite
     * 
     * @var string
     */
    protected $webseite = '';

    /**
     * facebook
     * 
     * @var string
     */
    protected $facebook = '';

    /**
     * instagram
     * 
     * @var string
     */
    protected $instagram = '';

    /**
     * kategorie
     * 
     * @var \Conrat\Crtraegertreffen\Domain\Model\Kategorie
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
    }

    /**
     * Returns the kategorie
     * 
     * @return \Conrat\Crtraegertreffen\Domain\Model\Kategorie $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     * 
     * @param \Conrat\Crtraegertreffen\Domain\Model\Kategorie $kategorie
     * @return void
     */
    public function setKategorie(\Conrat\Crtraegertreffen\Domain\Model\Kategorie $kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * Returns the youtube
     * 
     * @return string $youtube
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * Sets the youtube
     * 
     * @param string $youtube
     * @return void
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;
    }

    /**
     * Returns the youtubelink
     * 
     * @return string $youtubelink
     */
    public function getYoutubelink()
    {
        return $this->youtubelink;
    }

    /**
     * Sets the youtubelink
     * 
     * @param string $youtubelink
     * @return void
     */
    public function setYoutubelink($youtubelink)
    {
        $this->youtubelink = $youtubelink;
    }

    /**
     * Returns the webseite
     * 
     * @return string $webseite
     */
    public function getWebseite()
    {
        return $this->webseite;
    }

    /**
     * Sets the webseite
     * 
     * @param string $webseite
     * @return void
     */
    public function setWebseite($webseite)
    {
        $this->webseite = $webseite;
    }

    /**
     * Returns the facebook
     * 
     * @return string $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Sets the facebook
     * 
     * @param string $facebook
     * @return void
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Returns the instagram
     * 
     * @return string $instagram
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Sets the instagram
     * 
     * @param string $instagram
     * @return void
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }
}
