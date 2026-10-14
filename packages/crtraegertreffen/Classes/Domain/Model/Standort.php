<?php
namespace Conrat\Crtraegertreffen\Domain\Model;


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
 * Standort
 */
class Standort extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * titel
     * 
     * @var string
     */
    protected $titel = '';

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
}
