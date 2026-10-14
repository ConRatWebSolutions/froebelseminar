<?php
declare(strict_types=1);

namespace Conrat\Crbuchkatalog\Controller;

use Conrat\Crbuchkatalog\Domain\Repository\EintragRepository;


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
 * EintragController
 */
class EintragController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * eintragRepository
     */
    protected EintragRepository $eintragRepository;

    /**
     * @param EintragRepository $eintragRepository
     */
    public function injectEintragRepository(EintragRepository $eintragRepository): void
    {
        $this->eintragRepository = $eintragRepository;
    }

    /**
     * action list
     *
     *  
     * @return void
     */
    public function listAction()
    {
        if ($this->request->hasArgument('dataSubmit')) {
            $dataSubmit = $this->request->getArgument('dataSubmit');
            if ($dataSubmit['delit'] == 1) {
                $this->redirect('list', NULL, NULL);
            } else {
                $eintrags = $this->eintragRepository->findSuche($dataSubmit['volltext'], $dataSubmit['autor'], $dataSubmit['jahr']);
                $this->view->assign('eintrags', $eintrags);
                $this->view->assign('suche', $dataSubmit);
            }
        } else {
            $eintrags = $this->eintragRepository->findAlle();
            $this->view->assign('eintrags', $eintrags);
        }
        return $this->htmlResponse();		
    }

    /**
     * action show
     *
     *  
     * @return void
     */
    public function showAction()
    {
        $this->view->assign('eintrag', $eintrag);
        return $this->htmlResponse();		
    }
}
