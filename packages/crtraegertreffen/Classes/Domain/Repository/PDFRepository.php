<?php
namespace Conrat\Crtraegertreffen\Domain\Repository;


/***
 *
 * This file is part of the "crtraegertreffen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * The repository for PDFs
 */
class PDFRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param $username
     */
    public function loginUser($username)
    {
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT 
			`password`
		FROM 
			`fe_users` 
		WHERE 
			`disable` = "0"
		AND
			`deleted` = 0
		AND `username` = "' . $username . '"	

			;'
        );
        $x = $query->execute(TRUE);
        return $x[0]['password'];
    }
    public function findKats( )
    {
    	 
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT 
			*
		FROM 
			`tx_crtraegertreffen_domain_model_kategorie` 
		WHERE 
			`hidden` = "0"
		AND
			`deleted` = 0;'
        );
        return $query->execute(TRUE);
    }
    public function findPdfs($category)
    {
    	if($category == 1){ 
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT 
			*
		FROM 
			`tx_crtraegertreffen_domain_model_pdf` 
		WHERE 
			`hidden` = "0"
		AND
			`deleted` = 0;'
        );
        $accessoryw = $query->execute(TRUE);

        // Datensätze
        $daten = array();
        $i = 0;
        foreach ($accessoryw as $key => $value) {
            $daten[$i]['titel'] = $value['titel'];
            $daten[$i]['kategorie'] = $value['kategorie'];
            $daten[$i]['youtube'] = $value['youtube'];
            $daten[$i]['webseite'] = $value['webseite'];
            $daten[$i]['facebook'] = $value['facebook'];
            $daten[$i]['instagram'] = $value['instagram'];
			$daten[$i]['uid'] = $value['uid'];
 			$daten[$i]['show'] = ''; 
            $daten[$i]['pdf'] = $this->getFiless($value['uid'], 'pdf', 'tx_crtraegertreffen_domain_model_pdf');
            $i++;
        }
		}
        $query = $this->createQuery();
        $query->statement(
        '
	
		SELECT *
		FROM `tx_crtraegertreffen_domain_model_eintrag` AS `cat` 

		INNER JOIN `tx_crtraegertreffen_eintrag_standort_mm` AS `mm` 
		ON 			`mm`.`uid_local` = `cat`.`uid` 	
		WHERE 
			`mm`.`uid_foreign` = '.$category.' 	
	
	 
		AND	 `hidden` = "0"
		AND 	`deleted` = 0;'
        );
        $accessoryw = $query->execute(TRUE);       
        foreach ($accessoryw as $key => $value) {
        	$rr = $this->getItemKategorie1($value['uid']);
			$kats = "";
			foreach ( $rr  as   $value1) {
			  if($value1['uid_foreign' ] != ""){ $kats .= 	" kat_".$value1['uid_foreign' ];}
		     }
			
            $daten[$i]['titel'] = $value['name'];
            $daten[$i]['kategorie'] = $kats;
            $daten[$i]['youtube'] = $value['youtube'];
            $daten[$i]['webseite'] = $value['webseite'];
            $daten[$i]['facebook'] = $value['facebook'];
            $daten[$i]['instagram'] = $value['instagram'];
 
			
			 
			 $daten[$i]['uid'] = $value['uid'];
            $daten[$i]['show'] = $value['uid']; 
			$daten[$i]['pdf'] = ''; 
            $i++;
        }        
		
          
		 $arr2 = $this->array_msort($daten, array('titel'=>SORT_ASC ));
  
 	 
        return $arr2;
    }

function array_msort($array, $cols)
{
    $colarr = array();
    foreach ($cols as $col => $order) {
        $colarr[$col] = array();
        foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
    }
    $eval = 'array_multisort(';
    foreach ($cols as $col => $order) {
        $eval .= '$colarr[\''.$col.'\'],'.$order.',';
    }
    $eval = substr($eval,0,-1).');';
    eval($eval);
    $ret = array();
    foreach ($colarr as $col => $arr) {
        foreach ($arr as $k => $v) {
            $k = substr($k,1);
            if (!isset($ret[$k])) $ret[$k] = $array[$k];
            $ret[$k][$col] = $array[$k][$col];
        }
    }
    return $ret;

}


	public function findDetail($uid){
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT 	*
		FROM `tx_crtraegertreffen_domain_model_eintrag` 
		WHERE `hidden` = "0"	 
		AND	`deleted` = 0 
		AND	`uid` = '.$uid
		 
        );
         $xx = $query->execute(TRUE);
		
 
		foreach ($xx[0] as $key => $value) {
			$daten[$key] =  $value;
		}
		
	    $tmp = explode(";", $xx[0]['praktikum']);
			 $p = 0;
			 foreach ($tmp as $pr) {
			  $daten['praktikumx'][$p] = $pr;
			  $p++;
			 }
			 
	    $tmp = explode(";", $xx[0]['apkontankt']);
			 $p = 0;
			 foreach ($tmp as $pr) {
			  $daten['apkontanktx'][$p] = $pr;
			  $p++;
			 }			 		
		return  $daten; 		
		
	}
 
    public function getItemKategorie($uid)
    {
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT 
			*
		FROM 
			`tx_crtraegertreffen_eintrag_kategorie_mm` 
		WHERE 
			`uid_foreign` = '.$uid
		 
        ); 
		return $query->execute(TRUE);   	
    	
	}
    public function getItemKategorie1($uid)
    {
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT 
			*
		FROM 
			`tx_crtraegertreffen_eintrag_kategorie_mm` 
		WHERE 
			`uid_local` = '.$uid
		 
        ); 
		return $query->execute(TRUE);   	
    	
	}	
    public function getPraxisfelder($uid)
    {
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT 
			*
		FROM 
			`tx_crtraegertreffen_domain_model_kategorie` AS `cat` 
			
			
		INNER JOIN `tx_crtraegertreffen_eintrag_kategorie_mm` AS `mm` 
		ON 			`mm`.`uid_foreign` = `cat`.`uid` 	
		WHERE 
			`mm`.`uid_local` = '.$uid
		 
        ); 
		
		
		
		
		return $query->execute(TRUE);   	
    	
	}	
	
    /**
     * @param $uid
     * @param $fieldname
     * @param $tablename
     */
    public function getFiless($uid, $fieldname, $tablename)
    {
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT  
			`yy`.`identifier`,
			`zz`.`uid` AS `ref_uid`,
            `zz`.`description`
		FROM 
			`sys_file` AS `yy`,  
			`tx_crtraegertreffen_domain_model_pdf` AS `kg`

		INNER JOIN 
			`sys_file_reference` AS `zz` 
		ON 
			`zz`.`uid_foreign` = `kg`.`uid` 
		WHERE 
			`kg`.`uid` = "' . $uid . '"
		AND
			`zz`.`fieldname` = "' . $fieldname . '"
		AND 
			`zz`.`uid_local` = yy.uid 
		AND
			`zz`.`tablenames` = "' . $tablename . '"
		AND 
			`zz`.`hidden` = "0" 
		AND 
			`zz`.`deleted` = "0" 
		'
        );
        $images = $query->execute(TRUE);
        return $images;
    }
}
