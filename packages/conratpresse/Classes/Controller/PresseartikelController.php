<?php
declare(strict_types=1);

namespace Conrat\Conratpresse\Controller;

use Conrat\Conratpresse\Domain\Repository\PresseartikelRepository;


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
 * PresseartikelController
 */
class PresseartikelController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * presseartikelRepository
     */
    protected PresseartikelRepository $presseartikelRepository;

    /**
     * @param PresseartikelRepository $presseartikelRepository
     */
    public function injectPresseartikelRepository(PresseartikelRepository $presseartikelRepository): void
    {
        $this->presseartikelRepository = $presseartikelRepository;
    }
    /**
     * action list
     *
     *  
     * @return void
     */
    public function listAction()
    {
        $ansicht = $this->settings['ansicht'];
        $this->view->assign('ansicht', $ansicht);
        $anzahl = (int)$this->settings['anzahl'];
        $presseartikels = $this->presseartikelRepository->findAlle($anzahl, $this->settings['category']);
        $this->view->assign('presseartikels', $presseartikels);
        $this->view->assign('containers', $this->settings['containers']);
        return $this->htmlResponse();	
    }

    /**
     * action show
     *
     *  
     * @return void
     */
    public function showAction(\Conrat\Conratpresse\Domain\Model\Presseartikel $presseartikel)
    {
        $this->view->assign('presseartikel', $presseartikel);
        return $this->htmlResponse();	
    }
}
