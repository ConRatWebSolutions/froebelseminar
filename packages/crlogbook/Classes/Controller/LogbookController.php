<?php
declare(strict_types=1);

namespace Conrat\Crlogbook\Controller;
session_start();
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Session\UserSessionManager;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Context\Context;
use LMS\Flogin\Manager\SessionManager;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication;
use Conrat\Crlogbook\Domain\Repository\LogbookRepository;

/***
 *
 * This file is part of the "ConRat Logbook" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 
 *
 ***/
/**
 * LogbookController
 */
class LogbookController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
     public $Auth;
     public   $Graph ;
	/**
	 * logbookRepository
	 */
	protected LogbookRepository $logbookRepository;

	/**
	 * @param LogbookRepository $logbookRepository
	 */
	public function injectLogbookRepository(LogbookRepository $logbookRepository): void
	{
		$this->logbookRepository = $logbookRepository;
	}

	protected $entityManager = null;
	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction()
	{  
		 
	 if(empty($_SESSION["ldapgroup"])){
		return $this->redirect('login', null, null, ['msg' => 'Sie sind nicht eingeloggt']);
	 }


	 $this->view->assign('ldapgroup',$_SESSION["ldapgroup"]);
	 if($_SESSION["ldapgroup"] != "schueler" ){	
		 // TYPO3 v13 kompatible Frontend User Abfrage
 
		 $user = $_SESSION["user"];
		 
		 
			if($user['uid'] == ''){

				return $this->redirect('login', null, null, ['msg' => 'Sie sind nicht eingeloggt']);
			}else{
				    $year = date("Y");
				if($this->request->hasArgument('year') != "")
					{
					  $year = $this->request->getArgument('year');
					}
				
					$logbooks = $this->logbookRepository->findAlle($user['uid'], $year );
					$this->view->assign('logbooks', $logbooks);
					$this->view->assign('user', $user);

					$usDaEn = $this->logbookRepository->findUserByYear($user['uid'] );
 					$this->view->assign('years', $usDaEn);
				
					$this->view->assign('datum', date("d.m.Y"));
					if ($this->request->hasArgument('msg')) {
						$this->view->assign('msg', $this->request->getArgument('msg'));
					} 
			}
        }
		return $this->htmlResponse();

	}

    
    
	/**
	 * action newdrive
	 * 
	 * @return void
	 */
	public function newdriveAction()
	{
		if($_SESSION["ldapgroup"] == "schueler"){ echo "kein Zugriff"; die(); }
		
		$dataSubmit = $this->request->getArgument('dataSubmit');
		
		// Duplikat-Prüfung: Prüfe ob bereits ein Eintrag mit denselben Daten existiert
		$connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
		$databaseConnectionForPages = $connectionPool->getConnectionForTable('tx_crlogbook_domain_model_logbook');
		
		$existingEntry = $databaseConnectionForPages->select(
			['uid'],
			'tx_crlogbook_domain_model_logbook',
			[
				'datum' => strtotime($dataSubmit['datum']),
				'start' => $dataSubmit['start'],
				'ende' => $dataSubmit['ende'],
				'user' => $dataSubmit['user']
			]
		)->fetchAssociative();
		
		if ($existingEntry) {
			return $this->redirect('list', null, null, ['msg' => 'Eintrag bereits vorhanden']);
		}
		
		$times = time();
		$databaseConnectionForPages->insert(
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
				'grund' => $dataSubmit['grund'],
				'user' => $dataSubmit['user'],
                'username' => $dataSubmit['username']
			]
		);
		
		return $this->redirect('list', null, null, ['msg' => 'Eintrag erfolgreich angelegt']);

 

		/*		
		$user =    $this->logbookRepository->getUser( $dataSubmit['user'] );
	 	$montag =  date("d.m.Y",$timestamp_montag);
		$sonntag =  date("d.m.Y",$timestamp_sonntag);
		$message = '<h1>Fahrtenbuch</h1>';
		$message .= '
		
		 <table style="width:100%"> 
		
			<thead height="13"  style="background:#d2d2d2;">
				<th scope="col">Datum</th>
				<th scope="col">von -  bis </th>
				 
				<th scope="col">Fahrstrecke</th>
				<th scope="col">Dozent</th>
			 </thead>';
			  
		 
		 		
			  
				$message .= '
					<tr>
						<td>'.$dataSubmit['datum'].'</td>
						<td>'.$dataSubmit['von'].'    ('.$dataSubmit['start'].') -  '.$dataSubmit['bis'].'  ('.$dataSubmit['ende'].')</td>
						 
						<td>'.$dataSubmit['fahrstrecke'].' km</td>
						<td>'. $user['name'].'</td>
					</tr>';
 
		$message .= '</table>
		<br>
		<b>Bemerkung: </b><br>
		'.$dataSubmit['bemerkung'].'
		<br><br>
		<b>Grund der Fahrt:</b> <br>
		'.$dataSubmit['grund'];	
		 
 
 
		 	$mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
			$mail->setSubject('Neue Fahrt');
			$mail->setFrom(array('info@froebelseminar.de' => 'Fröbelseminar'));
			$mail->setBcc(array('mlehmann@conrat.de', 'mlehmann@conrat.de' => 'Lehmann'));
			//$mail->setTo(array('m.gerke@froebelseminar.de', 'm.gerke@froebelseminar.de' => 'gerke'));
			$mail->setBody( $message);
			$mail->addPart($message, 'text/html');
			 
			$mail->send();
	 	
		*/

		return $this->redirect('list', null, null, ['msg' => 'Eintrag erfolgreich angelegt']);
	}

    
 	/**
	 * action edit
	 * 
	 * @return void
	 */
	public function editAction()
	{
		if($_SESSION["ldapgroup"] == "schueler"){ echo "kein Zugriff"; die(); }
 
		$user = $_SESSION["user"];
        if($user['uid'] == ''){
            return $this->redirect('login', null, null, ['msg' => 'Sie sind nicht eingeloggt']);
        }else{
                 


                $this->view->assign('datum', date("d.m.Y"));
                if ($this->request->hasArgument('key')) {
                  
                    $logbooks = $this->logbookRepository->findDetail($this->request->getArgument('key'));
                    $this->view->assign('logbook', $logbooks);
                    
                } 
        }
        return $this->htmlResponse();

	}   
   	/**
	 * action updatedrive
	 * 
	 * @return void
	 */
	public function updatedriveAction()
	{
     $dataSubmit = $this->request->getArgument('dataSubmit');
     if ($dataSubmit['key'] != "") {
        $uid = $dataSubmit['key'];
   
		
		$times = time();
		$connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
		$databaseConnectionForPages = $connectionPool->getConnectionForTable('tx_crlogbook_domain_model_logbook');
		$databaseConnectionForPages->update(
			'tx_crlogbook_domain_model_logbook',
			[
				'tstamp' => $times,
				'datum' => strtotime($dataSubmit['datum']),
				'start' => $dataSubmit['start'],
				'ende' => $dataSubmit['ende'],
				'fahrstrecke' => $dataSubmit['fahrstrecke'],
				'von' => $dataSubmit['von'],
				'bis' => $dataSubmit['bis'],
				'bemerkung' => $dataSubmit['bemerkung'],
				'grund' => $dataSubmit['grund'],
				
                'username' => $dataSubmit['username']
                
                
			],
            ['uid' => $uid] 
		);
         return $this->redirect('list', null, null, ['msg' => 'Eintrag erfolgreich gespeichert']); 
     }
        return $this->redirect('list', null, null, ['msg' => 'Fehler: keine ID']);
    }
    
     
	/**
	 * action belistd
	 * 
	 * @return void
	 */
	public function belistdAction()
	{
		if ($this->request->hasArgument('dataSubmit')) {
			$dataSubmit = $this->request->getArgument('dataSubmit');
			$kalenderwoche = $dataSubmit["week"];
		} else {
			$kalenderwoche = date("W");
		}
		$jahr = $dataSubmit["year"];

		if ($kalenderwoche <= 9) {
			$kalenderwoche = '0' . $kalenderwoche;
		}

		$timestamp_montag = strtotime("{$jahr}-W{$kalenderwoche}");
		$timestamp_sonntag = strtotime("{$jahr}-W{$kalenderwoche}-7");
		$timestamp_freitag = strtotime("{$jahr}-W{$kalenderwoche}-5");


		$this->view->assign('ersterTag',   date("d.m.Y", $timestamp_montag));
		$this->view->assign('letzterTag', date("d.m.Y", $timestamp_sonntag));
		$this->view->assign('week', $kalenderwoche);
		$logbooks = $this->logbookRepository->findAlleByWeek($jahr, $kalenderwoche);
		$this->view->assign('logbooks', $logbooks);$txt="";
		for ($i = 1; $i <= 52; $i++) {
			if ($kalenderwoche == $i) {
				$txt .= '<option value="' . $i . '" selected>' . $i . '</option>';
			} else {
				$txt .= '<option value="' . $i . '">' . $i . '</option>';
			}
		}
		$this->view->assign('options', $txt);
		for ($i = 2019; $i <= date("Y"); $i++) {
			if ($jahr == $i) {
				$jahr .= '<option value="' . $i . '" selected>' . $i . '</option>';
			} else {
				$jahr .= '<option value="' . $i . '">' . $i . '</option>';
			}
		}
		$this->view->assign('jahr', $jahr);
	}
	/**
	 * action beedit
	 * 
	 * @return void
	 */
	public function beeditAction()
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
			$times= time();

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
			$logbooks = $this->logbookRepository->getUser($logbooks['user']);
			$this->view->assign('user', $logbooks);
		}
	}

    
	/**
	 * action login
	 * 
	 * @return void
	 */
	public function loginAction()
	{
        
        if ($this->request->hasArgument('msg')) { $this->view->assign('msg', $this->request->getArgument('msg')); }
         
			if($_SESSION["ldapgroup"] == "schueler"){ echo "kein Zugriff"; die(); }
			$appid = "cec27353-d20b-4138-9405-0a2e02f9c0cb";
			$tennantid = "c4620289-9a57-4218-a9a6-8ddf3e27412b";
			$secret = "";
			$login_url ="https://login.microsoftonline.com/".$tennantid."/oauth2/v2.0/authorize";
        
			 
       		require_once( $_SERVER["DOCUMENT_ROOT"].'/sso/inc/auth.php');
            $Auth = new \modAuth(); 
        
            require_once( $_SERVER["DOCUMENT_ROOT"].'/sso/inc/graph.php');
			$Graph = new \modGraph(); 
         
            $profile = $Graph->getProfile();  
     
		/*
			// Mock-Objekt für Test-Zwecke erstellen
		$profile = new \stdClass();
		$profile->mail = "m.lehmann@ev.froebelseminar.de";
		$profile->userPrincipalName = "m.lehmann@ev.froebelseminar.de";
		$profile->id = "12434567890";
		$profile->displayName = "Schule";
		$profile->givenName = "Schule";
		$profile->surname = "Schule";
	 
		*/

            if($profile->id != ''){
				
			 
				
					if (strpos($profile->mail, 'schule') !== false) {
						$_SESSION["ldapgroup"] = "schueler";
					} else {
						   $_SESSION["ldapgroup"] = "dozent";
							$luser = $this->logbookRepository->getUserByMail($profile->userPrincipalName);
							if($luser['uid'] != '' ) {
								$_SESSION["user"] = $luser; 	 
								

						 
								//echo "<script>setTimeout(function(){ window.location.href = '/dzlogin/fahrtenbuch'; }, 3000);</script>";
 
									// TYPO3 v13 kompatible Weiterleitung
									return $this->redirect('list', null, null, ['msg' => 'Erfolgreich eingeloggt']);
					}	
                }
            }
            if($luser['uid'] == '' ) {
				if($_SESSION["ldapgroup"] == "schueler"){ echo "kein Zugriff"; die(); }
                     // Benutzer in DB eintragen
                     $nname = strtolower($profile->displayName[0] . "." .$profile->surname); 


                        $times = time();
                        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
                        $databaseConnectionForPages = $connectionPool->getConnectionForTable('fe_users');
                        $databaseConnectionForPages->insert(
                            'fe_users',
                            [
                                'pid' => 151,
                                'tstamp' => $times,
                                'crdate' => $times,
                                'deleted' => 0,
                                'disable' => 0,
                                'username' => $nname,
                                'usergroup' => 7,
                                'name' => $profile->displayName,
                                'first_name' => $profile->givenName,
                                'last_name' => $profile->surname,
                                'email' =>  $profile->userPrincipalName 
                            ]
                        ); 

                     $userUid = (int)$databaseConnectionForPages->lastInsertId('fe_users');
           
                     
                
                    $user = BackendUtility::getRecord('fe_users', $userUid);
                   
                    $site = $this->request->getAttribute('site');
                    $siteLanguage = $this->request->getAttribute('language');
                    $pageArgument =GeneralUtility::makeInstance(\TYPO3\CMS\Core\Routing\PageArguments::class,123,"sdf",["sdf"]);
                    $frontendUser = GeneralUtility::makeInstance(\TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication::class);
                                $frontendUser->start($this->request);
                                $session = $frontendUser->createUserSession($user);
                                $frontendUser->storeSessionData();
                                setcookie("fe_typo_user", $session->getIdentifier(), 0, '/');
                
                    header('Location: /dzlogin/fahrtenbuch');
                    exit;
            }
	 
       
       
         
    }

    
    
	/**
	 * action logouts
	 * 
	 * @return void
	 */
	public function logoutsAction()
	{
 
        
		$tennantid = "c4620289-9a57-4218-a9a6-8ddf3e27412b";
		$_SESSION["ldaplogin1"] = "false";
		$_SESSION["ldapgroup"] = "";
		$logout_url = "https://login.microsoftonline.com/$tennantid/oauth2/v2.0/logout";
		 session_destroy(); 
		  header("Location: $logout_url");
		exit;
       
        
    }

	/**
	 * action crons
	 * 
	 * @return void
	 */
	public function cronsAction()
	{

		$kalenderwoche = date("W");
		$jahr = date("Y");
		$timestamp_montag = strtotime("{$jahr}-W{$kalenderwoche}");
		$timestamp_sonntag = strtotime("{$jahr}-W{$kalenderwoche}-7");
		$timestamp_freitag = strtotime("{$jahr}-W{$kalenderwoche}-5");
		$logbooks = $this->logbookRepository->findAlleByWeek($jahr, $kalenderwoche);

		$montag =  date("d.m.Y", $timestamp_montag);
		$sonntag =  date("d.m.Y", $timestamp_sonntag);
		$message = '<h1>Fahrtenbuch KW ' . $kalenderwoche . '  <span style="font-size:19px; font-weight:normal">' . $montag . ' - ' . $sonntag . '</span></h1>';
		$message .= '
		
		 <table style="width:100%"> 
		
			<thead height="13"  style="background:#d2d2d2;">
				<th scope="col">Datum</th>
				<th scope="col">von -  bis </th>
				<th scope="col">Bemerkung / Grund </th>
				<th scope="col">Fahrstrecke</th>
				<th scope="col">Dozent</th>
			 </thead>';

		foreach ($logbooks as $logss) {
			foreach ($logss['data'] as $log) {

				$datum =  date("d.m.Y", $log['datum']);
				$message .= '
					<tr>
						<td>' . $datum . '</td>
						<td>' . $log['von'] . '    (' . $log['start'] . ') -  ' . $log['bis'] . '  (' . $log['ende'] . ')</td>
						<td>' . $log['bemerkung'] . ' ' . $log['grund'] . '</td>
						<td>' . $log['fahrstrecke'] . ' km</td>
						<td>' . $log['user']['name'] . '</td>
					</tr>';
			}

			$message .= '
				 <tr class="heads" height="13"  style="background:#d2d2d2">
					<td> Gesamtkilometer </td>
					<td>  </td>
					<td> </td>
					<td>' . $logss['gesamt'] . ' km</td>
					<td> </td>
				</tr>';
		}


		$message .= '</table>';


		$dateien = '';


        
       
        
        
		if ($dateien == "") {

			$mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Mail\MailMessage::class);
			$mail->setSubject('Auswertung Fahrtenbuch');
			$mail->setFrom(array('info@froebelseminar.de' => 'Fröbelseminar'));
			$mail->setBcc(array('mlehmann@conrat.de', 'mlehmann@conrat.de' => 'A name'));
			$mail->setTo(array('m.gerke@froebelseminar.de', 'm.gerke@froebelseminar.de' => 'gerke'));
            $mail->html($message);
			$mail->send();
		} else {

			//$mail->setSubject($subject)->setFrom([$sender_email => $sender])->setTo([$tomeil, $tomeil => ''])->setBody($message)->addPart($message, 'text/html')->attach(\Swift_Attachment::fromPath($dateien))->send();
            
            echo "Fehler";
		}
	}
}
