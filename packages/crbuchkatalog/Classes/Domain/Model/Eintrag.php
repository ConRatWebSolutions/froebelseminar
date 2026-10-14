<?php
declare(strict_types=1);

namespace Conrat\Crbuchkatalog\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
/***
 *
 * This file is part of the "ConRatBuchkatalog" Extension for TYPO3 CMS.
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
     * autor
     * 
     * @var string
     */
    protected $autor = '';

    /**
     * veroeffentlichungsjahr
     * 
     * @var string
     */
    protected $veroeffentlichungsjahr = '';

    /**
     * kurzbeschreibung
     * 
     * @var string
     */
    protected $kurzbeschreibung = '';

    /**
     * pdf
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @Cascade("remove")
     */
    protected $pdf = null;

    /**
     * schlagworte
     * 
     * @var string
     */
    protected $schlagworte = '';

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
     * Returns the autor
     * 
     * @return string $autor
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Sets the autor
     * 
     * @param string $autor
     * @return void
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * Returns the veroeffentlichungsjahr
     * 
     * @return string $veroeffentlichungsjahr
     */
    public function getVeroeffentlichungsjahr()
    {
        return $this->veroeffentlichungsjahr;
    }

    /**
     * Sets the veroeffentlichungsjahr
     * 
     * @param string $veroeffentlichungsjahr
     * @return void
     */
    public function setVeroeffentlichungsjahr($veroeffentlichungsjahr)
    {
        $this->veroeffentlichungsjahr = $veroeffentlichungsjahr;
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
     * Returns the schlagworte
     * 
     * @return string $schlagworte
     */
    public function getSchlagworte()
    {
        return $this->schlagworte;
    }

    /**
     * Sets the schlagworte
     * 
     * @param string $schlagworte
     * @return void
     */
    public function setSchlagworte($schlagworte)
    {
        $this->schlagworte = $schlagworte;
    }
}
