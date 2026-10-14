<?php
declare(strict_types=1);

namespace Conrat\Crkalender\Controller;

use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\RepositoryInterface;
use Conrat\Crkalender\Domain\Repository\EintragRepository;
use Conrat\Crkalender\Domain\Repository\KategorieRepository;
use Conrat\Crkalender\Domain\Model\Eintrag;
use Conrat\Crkalender\Domain\Model\Kategorie;

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
 * EintragController
 */
class EintragController extends ActionController
{
    protected EintragRepository $eintragRepository;
    protected KategorieRepository $kategorieRepository;

    public function injectEintragRepository(EintragRepository $eintragRepository): void
    {
        $this->eintragRepository = $eintragRepository;
    }

    public function injectKategorieRepository(KategorieRepository $kategorieRepository): void
    {
        $this->kategorieRepository = $kategorieRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction() 
    {
        $category = $this->settings['category'];
        $showDats = (int)$this->settings['showDats'];
        $maxcount = (int)$this->settings['maxcount'];
        $termins = $this->eintragRepository->findCategory($category, $showDats, $maxcount);
        
        // Uhrzeiten korrigieren - automatische Zeitzonen-Erkennung
        foreach ($termins as &$termin) {
            if (isset($termin['main']['zeit']) && $termin['main']['zeit'] > 0) {
                $termin['main']['zeit'] = gmdate('H:i', $termin['main']['zeit']);
            }
            if (isset($termin['main']['bzeit']) && $termin['main']['bzeit'] > 0) {
                $termin['main']['bzeit'] = gmdate('H:i', $termin['main']['bzeit']);
            }
        }
        unset($termin); // Wichtig: Referenz aufheben, sonst wird das letzte Element in der nächsten foreach überschrieben 
      
        $this->view->assign('termins', $termins);
        $this->view->assign('layout', $this->settings['Layout']);
        $config['iddershowseite'] = $this->settings['idshow'];
        $this->view->assign('config', $config);
        $this->view->assign('containers', $this->settings['containers']);
        $this->view->assign('filters', $this->settings['filters']); 
        $filters = array(); $i =0;$ $tmp=array();
        foreach($termins as $termin){
            foreach($termin["main"]["filterarray"] as $filter){
                if( !in_array( $filter['uid'], $tmp) ){
                 $filters[$i]['uid']   = $filter['uid'];
                 $filters[$i]['titel'] = $filter['titel'];
                 $i++;   $tmp[] = $filter['uid'];
                }
            }
        }
        $this->view->assign('filterarray', $filters);
        
        return $this->htmlResponse();
        
    }

    /**
     * action detail
     *
     * @return void
     */
    public function detailAction() 
    {
        if ($this->request->hasArgument('uid')) {
            $uid = (int)$this->request->getArgument('uid');
            $termin = $this->eintragRepository->getDetail($uid);
            $bilder = $this->eintragRepository->findMediaElement($uid, 'tx_crkalender_domain_model_eintrag', 'bilder');
            $this->view->assign('termin', $termin);
            $this->view->assign('bilder', $bilder);
            $this->view->assign('containers', $this->settings['containers']);
        }
        return $this->htmlResponse();
    }

    /**
     * action show
     */
    public function showAction(Eintrag $eintrag): void
    {
        $this->view->assign('eintrag', $eintrag);
    }

    
}
