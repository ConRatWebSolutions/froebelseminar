<?php
declare(strict_types=1);

namespace Conrat\Crlogbook\Domain\Repository;


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
 * The repository for Logbooks
 */
class LogbookRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param $uid
     */
    public function findAlle($uid, $year)
    { 
		$query = $this->createQuery();
		if($year == "all"){
			
			$query->statement(
				'
								 SELECT  *

									 FROM `tx_crlogbook_domain_model_logbook` ac
									 WHERE
											ac.deleted = 0 AND
											ac.hidden = 0  AND
											ac.user = ' . $uid . '
									ORDER BY ac.datum        '
				);
			
			
		 }
		else{
				$query->statement(
				'
								 SELECT  *

									 FROM `tx_crlogbook_domain_model_logbook` ac
									 WHERE
											ac.deleted = 0 AND
											ac.hidden = 0  AND
											ac.user = ' . $uid . '
									 AND 	YEAR(FROM_UNIXTIME(ac.datum)) = ' . $year . '
									ORDER BY ac.datum        '
				);
			
		 }		
        $accessory = $query->execute(TRUE);
        $daten = [];
        $i = 0;
		$gskm = 0;
        foreach ($accessory as $value) {
            if ($datum != date("n", $value['datum'])) {
                $gskm = 0;
            }
            $datum = date("n", $value['datum']);
            $daten[$datum]['data'][$i]['uid'] = $value['uid'];
            $daten[$datum]['data'][$i]['datum'] = $value['datum'];
            $daten[$datum]['data'][$i]['start'] = $value['start'];
            $daten[$datum]['data'][$i]['ende'] = $value['ende'];
            $daten[$datum]['data'][$i]['fahrstrecke'] = $value['fahrstrecke'];
            $daten[$datum]['data'][$i]['von'] = $value['von'];
            $daten[$datum]['data'][$i]['bis'] = $value['bis'];
            $daten[$datum]['data'][$i]['bemerkung'] = $value['bemerkung'];
            $daten[$datum]['data'][$i]['grund'] = $value['grund'];
            $gskm = $gskm + $value['fahrstrecke'];
            $daten[$datum]['gesamt'] = $gskm;
            $daten[$datum]['monat'] = $datum;
            $i++;
        }

       // var_dump($daten);
        return $daten;
    }

    public function	findUserByYear($uid) { 
		
		 
        $query = $this->createQuery();
        $query->statement(
        '
                         SELECT  datum
                             FROM `tx_crlogbook_domain_model_logbook` ac
                             WHERE
                                    ac.deleted = 0 AND
                                    ac.hidden = 0  AND
                                    ac.user = ' . $uid . '			
                            ORDER BY ac.datum        '
        );
        $accessory = $query->execute(TRUE);
	    $daten = [];
			foreach ($accessory as $value) {
				$datum = date("Y", $value['datum']);
				if (!in_array($datum, $daten)) {
					$daten[$i] = $datum;
				}
				$i++;
			}

        //var_dump($daten);
        return $daten;
 }

	
    /**
     * @param $jahr
     * @param $week
     */
    public function findAlleByWeek($jahr, $week)
    {
        $query = $this->createQuery();
        $query->statement(
        '
            SELECT *
			FROM   tx_crlogbook_domain_model_logbook 
			WHERE   DATE_FORMAT(FROM_UNIXTIME(`datum`), "%Y%u") = ' . $jahr . $week . '
  			AND     deleted = 0
            ORDER BY datum        '
        );
        $accessory = $query->execute(TRUE);
        $daten = [];
        $i = 0;$gskm=0;
        foreach ($accessory as $value) {
            if ($datum != date("n", $value['datum'])) {
            }
            $datum = date("n", $value['datum']);
            $daten[$datum]['data'][$i]['uid'] = $value['uid'];
            $daten[$datum]['data'][$i]['datum'] = $value['datum'];
            $daten[$datum]['data'][$i]['start'] = $value['start'];
            $daten[$datum]['data'][$i]['ende'] = $value['ende'];
            $daten[$datum]['data'][$i]['fahrstrecke'] = $value['fahrstrecke'];
            $daten[$datum]['data'][$i]['von'] = $value['von'];
            $daten[$datum]['data'][$i]['bis'] = $value['bis'];
            $daten[$datum]['data'][$i]['bemerkung'] = $value['bemerkung'];
            $daten[$datum]['data'][$i]['grund'] = $value['grund'];
            $daten[$datum]['data'][$i]['username'] = $value['username'];
            $daten[$datum]['data'][$i]['user'] = $this->getUser($value['user']);
            $gskm = $gskm + $value['fahrstrecke'];
            $daten[$datum]['gesamt'] = $gskm;
            $daten[$datum]['monat'] = $datum;
            $i++;
        }

        //var_dump($daten);
        return $daten;
    }

    /**
     * @param $uid
     */
    public function getUser($uid)
    {
        $query = $this->createQuery();
        $query->statement(
        '
            SELECT *
			FROM   fe_users 
			WHERE   uid = ' . $uid
        );
        $accessory = $query->execute(TRUE);
        return $accessory[0];
    }
   
    public function getUserByMail($mail)
    {
        $query = $this->createQuery();
        $query->statement(
        '
            SELECT *
			FROM     fe_users 
			WHERE    email LIKE "' . $mail .'"'
        );
        $accessory = $query->execute(TRUE);
        return $accessory[0];
    }
    public function findDetail($uid)
    {
    	
        $query = $this->createQuery();
        $query->statement(
        '
            SELECT *
			FROM   tx_crlogbook_domain_model_logbook 
			WHERE   uid = ' . $uid
        );
		
        $accessory = $query->execute(TRUE); 
        return $accessory[0];
    }

 
}
