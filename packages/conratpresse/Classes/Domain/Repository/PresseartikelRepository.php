<?php
declare(strict_types=1);

namespace Conrat\Conratpresse\Domain\Repository;


/***
 *
 * This file is part of the "ConRat Presse" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 
 *
 ***/
/**
 * The repository for Presseartikels
 */
class PresseartikelRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findAlle(int $anzahl, string $category): array
    {
        if ($anzahl) {
            $limit = 'LIMIT ' . $anzahl;
        }
        $times = time();
        
		
		if($category != ''){
        	$iiQuery = $this->createQuery();
        	$iiQuery->statement('
        	
        		SELECT * 
								FROM   tx_conratpresse_domain_model_presseartikel,  tx_conratpresse_presseartikel_kategorie_mm
								WHERE 
								  		tx_conratpresse_presseartikel_kategorie_mm.uid_foreign IN ( ' . $category . ' ) AND
										tx_conratpresse_presseartikel_kategorie_mm.uid_local = tx_conratpresse_domain_model_presseartikel.uid AND
								  		tx_conratpresse_domain_model_presseartikel.hidden = 0 AND 
										tx_conratpresse_domain_model_presseartikel.deleted = 0  
										ORDER BY datum DESC  ' . $limit        	
        	            );
		}else{
			$iiQuery = $this->createQuery();
        	$iiQuery->statement('SELECT  uid FROM `tx_conratpresse_domain_model_presseartikel` WHERE `hidden` = 0 AND `deleted` = 0 ORDER BY datum DESC  ' . $limit);
			
		}
	   
	   
	   
	    $accessoryw = $iiQuery->execute(TRUE);
        // Datensätze
        $daten = array();
        $i = 0;
        foreach ($accessoryw as $key => $value) {
            $daten[$i]['main'] = $this->getDetail($value['uid']);
            $daten[$i]['bild'] = $this->getFiless($value['uid'], 'bild');
            $daten[$i]['pdf'] = $this->getFiless($value['uid'], 'pdf');
            $i++;
        }
        //var_dump($daten);
        return $daten;
    }
    
    /**
     * @param $uid
     */
    public function getDetail($uid)
    {
        $newsListQuery = $this->createQuery();
        $newsListQuery->statement('
		SELECT 
			*
		FROM 
			`tx_conratpresse_domain_model_presseartikel` AS `news`
		WHERE 
			`news`.`uid` = "' . $uid . '"
		AND
			`news`.`deleted` = 0;');
        $news = $newsListQuery->execute(TRUE);
        return $news[0];
    }
    
    /**
     * @param $uid
     * @param $fieldname
     */
    public function getFiless($uid, $fieldname)
    {
        $query = $this->createQuery();
        $query->statement('
		SELECT  
			`yy`.`identifier`,
			`zz`.`uid` AS `ref_uid`,
            `zz`.`description`
		FROM 
			`sys_file` AS `yy`,  
			`tx_conratpresse_domain_model_presseartikel` AS `kg`
		
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
			`zz`.`tablenames` = "tx_conratpresse_domain_model_presseartikel"
		AND 
			`zz`.`hidden` = "0" 
		AND 
			`zz`.`deleted` = "0" 
		');
        $images = $query->execute(TRUE);
        return $images;
    }
}
