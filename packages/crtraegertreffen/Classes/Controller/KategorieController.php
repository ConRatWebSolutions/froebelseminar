<?php
declare(strict_types=1);

namespace Conrat\Crtraegertreffen\Controller;

use Conrat\Crtraegertreffen\Domain\Repository\KategorieRepository;
use Psr\Http\Message\ResponseInterface;

class KategorieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected KategorieRepository $kategorieRepository;

    public function __construct(KategorieRepository $kategorieRepository)
    {
        $this->kategorieRepository = $kategorieRepository;
    }

    /**
     * action list
     * 
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $kategories = $this->kategorieRepository->findAll();
        $this->view->assign('kategories', $kategories);
        
        return $this->htmlResponse();
    }
}
