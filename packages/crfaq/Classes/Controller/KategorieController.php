<?php
declare(strict_types=1);

namespace Conrat\Crfaq\Controller;

use Conrat\Crfaq\Domain\Repository\KategorieRepository;
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
 * KategorieController
 */
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
