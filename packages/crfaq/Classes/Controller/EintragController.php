<?php
declare(strict_types=1);

namespace Conrat\Crfaq\Controller;

use Conrat\Crfaq\Domain\Repository\EintragRepository;
use Psr\Http\Message\ResponseInterface;


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
 * EintragController
 */
class EintragController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected EintragRepository $eintragRepository;

    public function __construct(EintragRepository $eintragRepository)
    {
        $this->eintragRepository = $eintragRepository;
    }


    /**
     * action list
     * 
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $config['layout'] = $this->settings['ansicht'] ?? 'liste';
        $config['kategorieansicht'] = $this->settings['kategorieansicht'] ?? 'no_nav';
        $config['header'] = $this->settings['header'] ?? '';
        $config['firstkat'] = $this->settings['firstkat'] ?? false;
        $config['idshow'] = $this->settings['idshow'] ?? '';
        $config['idlist'] = $this->settings['idlist'] ?? '';
        $config['cuid'] = $GLOBALS['TSFE']->cObj->data['uid'] ?? '99';
        $category = $this->settings['category'] ?? '';
        
        if ($config['kategorieansicht'] == "nav_left" or $config['kategorieansicht'] == "nav_right") {
            if ($this->request->hasArgument('uid')) {
                $eintrags = $this->eintragRepository->findByKategorie($this->request->getArgument('uid'));
                $this->view->assign('eintrags', $eintrags);
                $config['activeurl'] = $this->request->getArgument('uid');
                $activeurl = $this->request->getArgument('uid');
            } else {
                $firstcat = $this->eintragRepository->findFirstKategorie();
                if (!empty($firstcat)) {
                    $eintrags = $this->eintragRepository->findByKategorie($firstcat[0]['uid']);
                    $this->view->assign('eintrags', $eintrags);
                    $config['activeurl'] = $firstcat[0]['uid'];
                    $activeurl = $firstcat[0]['uid'];
                }
            }
            $kats = $this->eintragRepository->findKat($category);
            $this->view->assign('kategorien', $kats);
            if (isset($activeurl)) {
                $config['kategorienbeschreibung'] = $this->eintragRepository->findKattxt($activeurl);
            }
        }
        if ($config['kategorieansicht'] == "nav_left-anker" or $config['kategorieansicht'] == "nav_right-anker") {
            $eintrags = $this->eintragRepository->findALLEKategorienAnker($category);
            $this->view->assign('eintrags', $eintrags);
            $kats = $this->eintragRepository->findKat($category);
            $this->view->assign('kategorien', $kats);
        }
        if ($config['kategorieansicht'] == "no_nav") {
            $eintrags = $this->eintragRepository->findAlle();
            $this->view->assign('eintrags', $eintrags);
        }
        
        $this->view->assign('config', $config);
        
        return $this->htmlResponse();
    }

    /**
     * action show
     * 
     * @return ResponseInterface
     */
    public function showAction(): ResponseInterface
    {
        $config['shsocialmedia'] = $this->settings['shsocialmedia'] ?? false;
        $config['actURL'] = $this->uriBuilder->getRequest()->getRequestUri();
        $config['layout'] = $this->settings['ansicht'] ?? 'liste';
        $config['kategorieansicht'] = $this->settings['kategorieansicht'] ?? 'no_nav';
        $config['header'] = $this->settings['header'] ?? '';
        $config['firstkat'] = $this->settings['firstkat'] ?? false;
        $config['idshow'] = $this->settings['idshow'] ?? '';
        $config['idlist'] = $this->settings['idlist'] ?? '';
        $config['cuid'] = $GLOBALS['TSFE']->cObj->data['uid'] ?? '99';
        $category = $this->settings['category'] ?? '';
        
        if ($this->request->hasArgument('uid')) {
            $uid = $this->request->getArgument('uid');
            $deta = $this->eintragRepository->getDetail($uid);
            $this->view->assign('eintrags', $deta);
            $this->response->addAdditionalHeaderData('<meta property="og:url" content="' . $this->uriBuilder->getRequest()->getRequestUri() . '" />');
            $this->response->addAdditionalHeaderData('<meta property="og:type" content="article" />');
            $this->response->addAdditionalHeaderData('<meta property="og:title" content="FAQ - ' . $deta['frage'] . '" />');
            $this->response->addAdditionalHeaderData('<meta property="og:description" content="ConRat WebSolutions - Wir haben eine Antwort" />');
            $this->response->addAdditionalHeaderData('<meta property="og:image" content="https://www.some-solutions.de/fileadmin/user_upload/WebDaten/fb-conrat-faq.jpg" />');
        }
        $this->view->assign('config', $config);
        $kats = $this->eintragRepository->findKat($category);
        $this->view->assign('kategorien', $kats);
        
        return $this->htmlResponse();
    }
}
