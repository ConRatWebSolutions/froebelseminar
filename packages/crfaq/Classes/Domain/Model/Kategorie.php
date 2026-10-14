<?php
declare(strict_types=1);

namespace Conrat\Crfaq\Domain\Model;


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
 * Kategorie
 */
class Kategorie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * titel
     * 
     * @var string
     */
    protected $titel = '';

    /**
     * beschreibung
     * 
     * @var string
     */
    protected $beschreibung = '';

    /**
     * subvon
     * 
     * @var string
     */
    protected $subvon = '';

    /**
     * sortings
     * 
     * @var int
     */
    protected $sortings = 0;

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
     * Returns the subvon
     * 
     * @return string $subvon
     */
    public function getSubvon()
    {
        return $this->subvon;
    }

    /**
     * Sets the subvon
     * 
     * @param string $subvon
     * @return void
     */
    public function setSubvon($subvon)
    {
        $this->subvon = $subvon;
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
