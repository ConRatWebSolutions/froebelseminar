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
 * Eintrag
 */
class Eintrag extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * anschrift
     * 
     * @var string
     */
    protected $anschrift = '';

    /**
     * telefon
     * 
     * @var string
     */
    protected $telefon = '';

    /**
     * email
     * 
     * @var string
     */
    protected $email = '';

    /**
     * web
     * 
     * @var string
     */
    protected $web = '';

    /**
     * zielgruppe
     * 
     * @var string
     */
    protected $zielgruppe = '';

    /**
     * angebotsformen
     * 
     * @var string
     */
    protected $angebotsformen = '';

    /**
     * schwerpunkte
     * 
     * @var string
     */
    protected $schwerpunkte = '';

    /**
     * ansprechpartner
     * 
     * @var string
     */
    protected $ansprechpartner = '';

    /**
     * sonstiges
     * 
     * @var string
     */
    protected $sonstiges = '';

    /**
     * aptelefon
     * 
     * @var string
     */
    protected $aptelefon = '';

    /**
     * apemail
     * 
     * @var string
     */
    protected $apemail = '';

    /**
     * apkontankt
     * 
     * @var string
     */
    protected $apkontankt = '';

    /**
     * praktikum
     * 
     * @var string
     */
    protected $praktikum = '';

    /**
     * facebook
     * 
     * @var string
     */
    protected $facebook = '';

    /**
     * logo
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     */
    protected $logo = null;

    /**
     * logourl
     * 
     * @var string
     */
    protected $logourl = '';

    /**
     * instagram
     * 
     * @var string
     */
    protected $instagram = '';

    /**
     * youtube
     * 
     * @var string
     */
    protected $youtube = '';

    /**
     * kategorie
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crtraegertreffen\Domain\Model\Kategorie>
     */
    protected $kategorie = null;

    /**
     * standort
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crtraegertreffen\Domain\Model\Standort>
     */
    protected $standort = null;

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
        $this->standort = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the anschrift
     * 
     * @return string $anschrift
     */
    public function getAnschrift()
    {
        return $this->anschrift;
    }

    /**
     * Sets the anschrift
     * 
     * @param string $anschrift
     * @return void
     */
    public function setAnschrift($anschrift)
    {
        $this->anschrift = $anschrift;
    }

    /**
     * Returns the telefon
     * 
     * @return string $telefon
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Sets the telefon
     * 
     * @param string $telefon
     * @return void
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the web
     * 
     * @return string $web
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Sets the web
     * 
     * @param string $web
     * @return void
     */
    public function setWeb($web)
    {
        $this->web = $web;
    }

    /**
     * Returns the zielgruppe
     * 
     * @return string $zielgruppe
     */
    public function getZielgruppe()
    {
        return $this->zielgruppe;
    }

    /**
     * Sets the zielgruppe
     * 
     * @param string $zielgruppe
     * @return void
     */
    public function setZielgruppe($zielgruppe)
    {
        $this->zielgruppe = $zielgruppe;
    }

    /**
     * Returns the angebotsformen
     * 
     * @return string $angebotsformen
     */
    public function getAngebotsformen()
    {
        return $this->angebotsformen;
    }

    /**
     * Sets the angebotsformen
     * 
     * @param string $angebotsformen
     * @return void
     */
    public function setAngebotsformen($angebotsformen)
    {
        $this->angebotsformen = $angebotsformen;
    }

    /**
     * Returns the schwerpunkte
     * 
     * @return string $schwerpunkte
     */
    public function getSchwerpunkte()
    {
        return $this->schwerpunkte;
    }

    /**
     * Sets the schwerpunkte
     * 
     * @param string $schwerpunkte
     * @return void
     */
    public function setSchwerpunkte($schwerpunkte)
    {
        $this->schwerpunkte = $schwerpunkte;
    }

    /**
     * Returns the ansprechpartner
     * 
     * @return string $ansprechpartner
     */
    public function getAnsprechpartner()
    {
        return $this->ansprechpartner;
    }

    /**
     * Sets the ansprechpartner
     * 
     * @param string $ansprechpartner
     * @return void
     */
    public function setAnsprechpartner($ansprechpartner)
    {
        $this->ansprechpartner = $ansprechpartner;
    }

    /**
     * Returns the sonstiges
     * 
     * @return string $sonstiges
     */
    public function getSonstiges()
    {
        return $this->sonstiges;
    }

    /**
     * Sets the sonstiges
     * 
     * @param string $sonstiges
     * @return void
     */
    public function setSonstiges($sonstiges)
    {
        $this->sonstiges = $sonstiges;
    }

    /**
     * Returns the aptelefon
     * 
     * @return string $aptelefon
     */
    public function getAptelefon()
    {
        return $this->aptelefon;
    }

    /**
     * Sets the aptelefon
     * 
     * @param string $aptelefon
     * @return void
     */
    public function setAptelefon($aptelefon)
    {
        $this->aptelefon = $aptelefon;
    }

    /**
     * Returns the apemail
     * 
     * @return string $apemail
     */
    public function getApemail()
    {
        return $this->apemail;
    }

    /**
     * Sets the apemail
     * 
     * @param string $apemail
     * @return void
     */
    public function setApemail($apemail)
    {
        $this->apemail = $apemail;
    }

    /**
     * Returns the apkontankt
     * 
     * @return string $apkontankt
     */
    public function getApkontankt()
    {
        return $this->apkontankt;
    }

    /**
     * Sets the apkontankt
     * 
     * @param string $apkontankt
     * @return void
     */
    public function setApkontankt($apkontankt)
    {
        $this->apkontankt = $apkontankt;
    }

    /**
     * Returns the praktikum
     * 
     * @return string $praktikum
     */
    public function getPraktikum()
    {
        return $this->praktikum;
    }

    /**
     * Sets the praktikum
     * 
     * @param string $praktikum
     * @return void
     */
    public function setPraktikum($praktikum)
    {
        $this->praktikum = $praktikum;
    }

    /**
     * Adds a Kategorie
     * 
     * @param \Conrat\Crtraegertreffen\Domain\Model\Kategorie $kategorie
     * @return void
     */
    public function addKategorie(\Conrat\Crtraegertreffen\Domain\Model\Kategorie $kategorie)
    {
        $this->kategorie->attach($kategorie);
    }

    /**
     * Removes a Kategorie
     * 
     * @param \Conrat\Crtraegertreffen\Domain\Model\Kategorie $kategorieToRemove The Kategorie to be removed
     * @return void
     */
    public function removeKategorie(\Conrat\Crtraegertreffen\Domain\Model\Kategorie $kategorieToRemove)
    {
        $this->kategorie->detach($kategorieToRemove);
    }

    /**
     * Returns the kategorie
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crtraegertreffen\Domain\Model\Kategorie> $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crtraegertreffen\Domain\Model\Kategorie> $kategorie
     * @return void
     */
    public function setKategorie(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $kategorie)
    {
        $this->kategorie = $kategorie;
    }

    /**
     * Returns the logo
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Sets the logo
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
     * @return void
     */
    public function setLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $logo)
    {
        $this->logo = $logo;
    }

    /**
     * Returns the logourl
     * 
     * @return string $logourl
     */
    public function getLogourl()
    {
        return $this->logourl;
    }

    /**
     * Sets the logourl
     * 
     * @param string $logourl
     * @return void
     */
    public function setLogourl($logourl)
    {
        $this->logourl = $logourl;
    }

    /**
     * Returns the facebook
     * 
     * @return string facebook
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
     * Adds a Standort
     * 
     * @param \Conrat\Crtraegertreffen\Domain\Model\Standort $standort
     * @return void
     */
    public function addStandort(\Conrat\Crtraegertreffen\Domain\Model\Standort $standort)
    {
        $this->standort->attach($standort);
    }

    /**
     * Removes a Standort
     * 
     * @param \Conrat\Crtraegertreffen\Domain\Model\Standort $standortToRemove The Standort to be removed
     * @return void
     */
    public function removeStandort(\Conrat\Crtraegertreffen\Domain\Model\Standort $standortToRemove)
    {
        $this->standort->detach($standortToRemove);
    }

    /**
     * Returns the standort
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crtraegertreffen\Domain\Model\Standort> $standort
     */
    public function getStandort()
    {
        return $this->standort;
    }

    /**
     * Sets the standort
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Conrat\Crtraegertreffen\Domain\Model\Standort> $standort
     * @return void
     */
    public function setStandort(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $standort)
    {
        $this->standort = $standort;
    }
}
