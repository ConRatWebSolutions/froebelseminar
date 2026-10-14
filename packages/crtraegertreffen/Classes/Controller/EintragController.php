<?php
declare(strict_types=1);

namespace Conrat\Crtraegertreffen\Controller;

use Conrat\Crtraegertreffen\Domain\Repository\EintragRepository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Psr\Http\Message\ResponseInterface;

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
        //$eintrags = $this->eintragRepository->findAll();
        $this->view->assign('eintrags', $eintrags);
        
        return $this->htmlResponse();
    }
	
    /**
     * action newforms
     * 
     * @return ResponseInterface
     */
    public function newformsAction(): ResponseInterface 
    {
    	if ($this->request->hasArgument('dataSubmit')){
					     $dataSubmit = $this->request->getArgument('dataSubmit');
		
		 
		 
		 foreach ($dataSubmit['praktikum'] as  $value) {
			 $praktikum .= $value.";";
		 }
		 
		 foreach ($dataSubmit['kontaktaufnahme'] as  $value) {
			 $kontaktaufnahme .= $value.";";
		 }		 
		 
         $kontaktaufnahme = substr($kontaktaufnahme, 0, -1);
		 $praktikum = substr($praktikum, 0, -1);
	
	
		 if($dataSubmit['standort'] == 1){ $pid = '168' ;}
		 if($dataSubmit['standort'] == 2){ $pid = '185' ;}
		
		  $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
	      $databaseConnectionForPages = $connectionPool->getConnectionForTable('tx_crtraegertreffen_domain_model_eintrag');
		  
	      $databaseConnectionForPages->insert(
                'tx_crtraegertreffen_domain_model_eintrag', 
                [
 	            		'pid' => $pid,
		 	            'tstamp' => time(),
		 	            'crdate' => time(),
						'cruser_id' => '2',
						'deleted' =>  '0',
						'hidden' => '1',
		 	            'name' => $dataSubmit['name'],
		 	            'anschrift' => $dataSubmit['anschrift'],
		 	            'telefon' => $dataSubmit['telefon'],  
		                'email' => $dataSubmit['email'],
		                'web' => $dataSubmit['web'],
		                'zielgruppe' => $dataSubmit['zielgruppe'],
		                'angebotsformen' => $dataSubmit['angebotsformen'],
		                'schwerpunkte' => $dataSubmit['schwerpunkte'],
		                'ansprechpartner' => $dataSubmit['ansprechpartner'],
		                'sonstiges' => $dataSubmit['sonstiges'],
		                'aptelefon' => $dataSubmit['aptelefon'], 
						'apemail' => $dataSubmit['apemail'],
						'apkontankt' => $kontaktaufnahme,
						'praktikum' => $praktikum,
						'logourl' => $dataSubmit['logourl'],
						'facebook' => $dataSubmit['facebook'],
						'instagram' => $dataSubmit['instagram'],
						'youtube' => $dataSubmit['youtube']
						 
						 
					]
                ); 
		 	  $lastid = (int)$databaseConnectionForPages->lastInsertId('pages');
			  $a = 1;
	 
	          $databaseConnectionForPages = $connectionPool->getConnectionForTable('tx_crtraegertreffen_eintrag_kategorie_mm');			  
			  foreach ($dataSubmit['praxisfeld'] as  $value) {
 
		        $databaseConnectionForPages->insert(
                'tx_crtraegertreffen_eintrag_kategorie_mm', 
                [
 	            		'uid_local' => $lastid,
		 	            'uid_foreign' => $value,
		 	            'sorting' =>$a,
						'sorting_foreign' => '0',	 
					]
                ); 
				$a++;		    
		       }
			
	          $databaseConnectionForPages = $connectionPool->getConnectionForTable('tx_crtraegertreffen_eintrag_standort_mm');			  
			  $a = 1;
			  
 
		        $databaseConnectionForPages->insert(
                'tx_crtraegertreffen_eintrag_standort_mm', 
                [
 	            		'uid_local' => $lastid,
		 	            'uid_foreign' => $dataSubmit['standort'],
		 	            'sorting' =>$a,
						'sorting_foreign' => '0',	 
					]
                ); 
				$a++;		    
	
		 if($dataSubmit['standort'] == 1){ $pid = 'Kassel' ;}
		 if($dataSubmit['standort'] == 2){ $pid = 'Korbach' ;}	
	$txt =  "<p>Ein neuer Eintrag wurde für die Lernorte und Praxisfelder erstellt:  
	<br><br>
Name: 	".$dataSubmit['name']. "
<br>	
Standort:  ".$pid."
	</p>" ;
	
 // Create the message
$mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
 
$mail

   // Defining the "From" email address and name as an object
   // (email clients will display the name)
   ->from(new \Symfony\Component\Mime\Address('info@froebelseminar.de', 'Froebelseminar'))

   // Set the "To" addresses
   ->to(
      new \Symfony\Component\Mime\Address('g.finauer@ev.froebelseminar.de', 'Froebelseminar') 
       
   )

   // Give the message a subject
   ->subject('Neuer Eintrag')

   // Give it the text message
   ->text($txt)

   // And optionally a HTML message
   ->html($txt)

   // Optionally add any attachments
   //  ->attachFromPath('/path/to/my-document.pdf')

   // And finally send it
   ->send();           
            
		       			   
        }
        
        return $this->htmlResponse();
    }	
	
 
    /**
     * action show
     * 
     * @return ResponseInterface
     */
    public function showAction(): ResponseInterface
    {
        $this->view->assign('eintrag', $eintrag);
        
        return $this->htmlResponse();
    }
}
