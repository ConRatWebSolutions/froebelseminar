<?php
declare(strict_types=1);

namespace Conrat\Crkalender\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Conrat\Crkalender\Domain\Repository\KategorieRepository;


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
 * KategorieController
 */
class KategorieController extends ActionController
{
    protected KategorieRepository $kategorieRepository;

    public function injectKategorieRepository(KategorieRepository $kategorieRepository): void
    {
        $this->kategorieRepository = $kategorieRepository;
    }

    /**
     * action list
     */
    public function listAction(): void
    {
        $kategories = $this->kategorieRepository->findAll();
        $this->view->assign('kategories', $kategories);
    }

   
}
