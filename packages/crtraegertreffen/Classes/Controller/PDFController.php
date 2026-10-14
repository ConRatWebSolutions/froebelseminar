<?php  
namespace Conrat\Crtraegertreffen\Controller;
session_start();

use Conrat\Crtraegertreffen\Domain\Repository\PDFRepository;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Context\UserAspect;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;

class PDFController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected PDFRepository $pDFRepository;

    public function __construct(PDFRepository $pDFRepository)
    {
        $this->pDFRepository = $pDFRepository;
    }

    /**
     * action list
     * 
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
		 
    
		if ($_SESSION['logout'] != "") {
			echo "logout";
			$tennantid = "c4620289-9a57-4218-a9a6-8ddf3e27412b";
            $_SESSION["ldaplogin1"] = "false";
			$_SESSION["ldapgroup"] = "";
			$logout_url = "https://login.microsoftonline.com/$tennantid/oauth2/v2.0/logout";
			 session_destroy();
			 #header("Location: $logout_url");
		    header('Location: https://www.froebelseminar.de/'); 
			exit();
        }
		  if (empty($_SESSION["ldaplogin1"]) || $_SESSION["ldaplogin1"] === "false") {
			 
			return $this->redirect('login', 'PDF', null, ['msg' => '']);
		  }	 
		
			  
		if($_SERVER["REMOTE_ADDR"]=='172.18.0.6'){ 
			$_SESSION["ldaplogin1"] = "true";
		     //echo $_SESSION["ldaplogin1"];
		     //echo $_SERVER["REMOTE_ADDR"];
	 
		
		}
		
 
		
     
        if ($_SESSION["ldaplogin1"] == "true") {
             $this->view->assign('view', 'list');
             $data['kat'] = $this->pDFRepository->findKats();
             $data['pdfs'] = $this->pDFRepository->findPdfs( $this->settings['category']  );
	 
			 $this->view->assign('category', $this->settings['category']);
			 $this->view->assign('pDFs', $data);
			 $this->view->assign('msg', $data);
			 
        } else {
            
        }
		if($this->settings['ansicht'] == 'form') {
			return $this->redirect('list', 'Eintrag', null, ['msg' => 'Eintrag erfolgreich angelegt']);
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
       if ($this->request->hasArgument('uid')) {
            $uid = $this->request->getArgument('uid');  
		   
		    
	    	$eintrag = $this->pDFRepository->findDetail($uid);
			$praxisfeld = $this->pDFRepository->getPraxisfelder($uid); 
	    	$this->view->assign('eintrag', $eintrag);
			$this->view->assign('praxisfeld', $praxisfeld);
	   }
	   
	   return $this->htmlResponse();
    }

   
	
	 /**
	 * action login
	 * 
	 * @return void
	 */
	public function loginAction(): ResponseInterface
	{
        
			$appid = "cec27353-d20b-4138-9405-0a2e02f9c0cb";
			$tennantid = "c4620289-9a57-4218-a9a6-8ddf3e27412b";
			$secret = "";
			$login_url ="https://login.microsoftonline.com/".$tennantid."/oauth2/v2.0/authorize";
       
       		require_once( $_SERVER["DOCUMENT_ROOT"].'/sso/inc/auth.php');
            $Auth1 = new \modAuth(); 
        
            require_once( $_SERVER["DOCUMENT_ROOT"].'/sso/inc/graph.php');
			$Graph1 = new \modGraph(); 
         
            $profile1 = $Graph1->getProfile();  

 

		
            if($profile1->id != ''){
				echo "profile1 geladen" .$_SESSION["ldapgroup"];
				if($profile1->id == "aaaaa"){
					echo "profile aaa geladen";
					echo 'User: <pre>';
					print_r($profile1);
					echo '</pre>';
					
				 
					$group  = $Graph1->getGrupNameOf("73ffc7ed-55ea-4006-ab96-71a81ebc002d"); 
						echo 'getGrupNameOf<pre>';
						print_r($group);
						echo '</pre>';			
					
					$group  = $Graph1->getGroup($profile1->id); 
						echo 'Gruppe getGroup<pre>';
						print_r($group);
						echo '</pre>';
					
					$groupa  = $Graph1->getmemberOf($profile1->id); 
						echo 'Gruppe1<pre>'; 
						print_r($groupa);
						echo '</pre>';					
					 
				}	
				
                
					if (strpos($profile1->mail, 'schule') !== false) {
						$_SESSION["ldapgroup"] = "schueler";
					} else {
						$_SESSION["ldapgroup"] = "dozent";
					}
				
				     $_SESSION["ldaplogin1"] = "true"; 
 					 return $this->redirect('list', 'PDF', null, ['msg' => 'Sie wurden angemeldet']); 
            }
        
		 
       
         
        return $this->htmlResponse();
    }

	 /**
	 * action logouts
	 * 
	 * @return void
	 */
	public function logoutsAction(): ResponseInterface
	 
	{
		
	 
		
		$tennantid = "c4620289-9a57-4218-a9a6-8ddf3e27412b";
		$_SESSION["ldaplogin1"] = "false";
		$_SESSION["ldapgroup"] = "";
		$logout_url = "https://login.microsoftonline.com/$tennantid/oauth2/v2.0/logout";
		 session_destroy(); 
		  header("Location: $logout_url");
		exit;
	}
	
	
	
}
