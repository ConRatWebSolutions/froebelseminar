<?php
declare(strict_types=1);

namespace Conrat\Crkalender\Domain\Model;


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
 * Kategorie
 */
class Kategorie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * kategorie
     * 
     * @var string
     */
    protected $kategorie = '';

    /**
     * Returns the kategorie
     * 
     * @return string $kategorie
     */
    public function getKategorie()
    {
        return $this->kategorie;
    }

    /**
     * Sets the kategorie
     * 
     * @param string $kategorie
     * @return void
     */
    public function setKategorie($kategorie)
    {
        $this->kategorie = $kategorie;
    }
}
