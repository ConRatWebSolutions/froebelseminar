<?php
declare(strict_types=1);

namespace Conrat\Crlogbook\Controller\Backend;

use TYPO3\CMS\Backend\Attribute\AsController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

use TYPO3\CMS\Extbase\Http\ForwardResponse;
 

#[AsController]
final class  LogbookBackendController extends ActionController
{
 
    protected ModuleTemplateFactory $moduleTemplateFactory;
    protected ModuleTemplate $moduleTemplate;

  /**
   * logbookRepository
   *
   * @var \Conrat\Crlogbook\Domain\Repository\LogbookRepository
   */
  protected $logbookRepository = null;

  /**
   * @param \Conrat\Crlogbook\Domain\Repository\LogbookRepository $logbookRepository
   */
  public function injectLogbookRepository( \Conrat\Crlogbook\Domain\Repository\LogbookRepository $logbookRepository ) {
    $this->logbookRepository = $logbookRepository;
  }


    public function injectModuleTemplateFactory(ModuleTemplateFactory $moduleTemplateFactory): void
    {
        $this->moduleTemplateFactory = $moduleTemplateFactory;
    }

    protected function initializeAction(): void
    {
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $this->moduleTemplate->setTitle('Logbook Verwaltung');
    }

   
    /**
     * Backend-Liste aller Logbook-Einträge
     */
    public function belistdAction(): ResponseInterface
    {
        if ($this->request->hasArgument('dataSubmit')) {
            $dataSubmit = $this->request->getArgument('dataSubmit');
            $kalenderwoche = $dataSubmit["week"];
        } else {
            $kalenderwoche = date("W");
        }
        
        $jahr = $dataSubmit["year"] ?? date("Y");

        if ($kalenderwoche <= 9) {
            $kalenderwoche = '0' . $kalenderwoche;
        }

        $timestamp_montag = strtotime("{$jahr}-W{$kalenderwoche}");
        $timestamp_sonntag = strtotime("{$jahr}-W{$kalenderwoche}-7");

        $this->view->assign('ersterTag', date("d.m.Y", $timestamp_montag));
        $this->view->assign('letzterTag', date("d.m.Y", $timestamp_sonntag));
        $this->view->assign('week', $kalenderwoche);
        
        $logbooks = $this->logbookRepository->findAlleByWeek($jahr, $kalenderwoche);
        $this->view->assign('logbooks', $logbooks);
        
        $txt = "";
        for ($i = 1; $i <= 52; $i++) {
            if ($kalenderwoche == $i) {
                $txt .= '<option value="' . $i . '" selected>' . $i . '</option>';
            } else {
                $txt .= '<option value="' . $i . '">' . $i . '</option>';
            }
        }
        $this->view->assign('options', $txt);
        
        $jahrOptions = "";
        for ($i = 2019; $i <= date("Y"); $i++) {
            if ($jahr == $i) {
                $jahrOptions .= '<option value="' . $i . '" selected>' . $i . '</option>';
            } else {
                $jahrOptions .= '<option value="' . $i . '">' . $i . '</option>';
            }
        }
        $this->view->assign('jahr', $jahrOptions);
        return $this->htmlResponse();
    }

    /**
     * Backend-Bearbeitung eines Logbook-Eintrags
     */
    public function beeditAction(): void
    {
        if ($this->request->hasArgument('data')) {
            $dataSubmit = $this->request->getArgument('data');
            $uid = $this->request->getArgument('xuid');
            
            if ($dataSubmit == 'delete') {
                $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
                $databaseConnectionForPages = $connectionPool->getConnectionForTable('tx_crlogbook_domain_model_logbook');
                $databaseConnectionForPages->delete(
                    'tx_crlogbook_domain_model_logbook',
                    ['uid' => $uid]
                );

                $this->view->assign('msg', 'Eintrag gelöscht');
                $this->view->assign('hide', 1);
            }
        }

        if ($this->request->hasArgument('dataSubmit')) {
            $dataSubmit = $this->request->getArgument('dataSubmit');
            $times = time();

            if ($dataSubmit['sents'] == 1) {
                $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
                $databaseConnectionForPages = $connectionPool->getConnectionForTable('tx_crlogbook_domain_model_logbook');
                $databaseConnectionForPages->update(
                    'tx_crlogbook_domain_model_logbook',
                    [
                        'pid' => 150,
                        'tstamp' => $times,
                        'crdate' => $times,
                        'datum' => strtotime($dataSubmit['datum']),
                        'start' => $dataSubmit['start'],
                        'ende' => $dataSubmit['ende'],
                        'fahrstrecke' => $dataSubmit['fahrstrecke'],
                        'von' => $dataSubmit['von'],
                        'bis' => $dataSubmit['bis'],
                        'bemerkung' => $dataSubmit['bemerkung'],
                        'grund' => $dataSubmit['grund']
                    ],
                    ['uid' => $dataSubmit['xuid']]
                );

                $this->view->assign('msg', 'gespeichert');
            }
            
            $logbooks = $this->logbookRepository->findDetail($dataSubmit['xuid']);
            $this->view->assign('logbooks', $logbooks);
            $this->view->assign('hide', 0);
            $logbooks = $this->logbookRepository->getUser($dataSubmit['user']);
            $this->view->assign('user', $logbooks);
        }
        
        if ($this->request->hasArgument('uid')) {
            $uid = $this->request->getArgument('uid');

            $logbooks = $this->logbookRepository->findDetail($uid);
            $this->view->assign('logbooks', $logbooks);
            $this->view->assign('hide', 0);
           # $logbooks = $this->logbookRepository->getUser($logbooks['user']);
          #  $this->view->assign('user', $logbooks);
        }
    }
}