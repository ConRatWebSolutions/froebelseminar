<?php
declare(strict_types=1);

namespace Conrat\Crfaq\Domain\Repository;


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
 * The repository for Eintrags
 */
class EintragRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findAlle(): array
    {
        $query = $this->createQuery();
        $query->statement('
         SELECT `uid`, `frage`, `antwort`
								FROM		`tx_crfaq_domain_model_eintrag` 
								WHERE		 `deleted` = 0 
								AND 		 `hidden`  = 0
		ORDER BY `sortings`						


         ');
        return $query->execute(TRUE);
    }
    public function findByKategorie(int $uid): array
    {
        $query = $this->createQuery();
        $query->statement('
         			SELECT      `uid`, `frage`, `antwort`
					FROM		`tx_crfaq_domain_model_eintrag`  AS `me`
								
					INNER JOIN    `tx_crfaq_eintrag_kategorie_mm`  AS `mm` 		
					ON 			  `mm`.`uid_foreign` = ' . $uid . ' 			
								
					WHERE		 `deleted` = 0 
					AND 		 `hidden`  = 0
					AND			  `mm`.`uid_local` = `me`.`uid`
					ORDER BY `sortings`
         ');
        return $query->execute(TRUE);
    }
	
    public function findFirstKategorie(): array
    {
        $query = $this->createQuery();
        $query->statement('
         			SELECT       `uid` 
					FROM		 `tx_crfaq_domain_model_kategorie`  AS `me`			
								
					WHERE		 `deleted` = 0 
					AND 		 `hidden`  = 0
					

         ');
        return $query->execute(TRUE);
    }	
	
	 	
    public function findKat(string $cats): array
    {
    	
		if($cats !=''){
	        $query = $this->createQuery();
	        $query->statement('
	         SELECT `uid`, `titel`, `beschreibung`
									FROM		`tx_crfaq_domain_model_kategorie` 
									WHERE		 `deleted` = 0 
									AND 		 `hidden`  = 0
									AND          `subvon`  = ""
									AND 		`uid` IN ( '.$cats.') 
				ORDER BY FIELD(`uid`, '.$cats.')
	         ');
			 $result = $query->execute(TRUE);				
			 
		}else{
	        $query = $this->createQuery();
	        $query->statement('
	         SELECT `uid`, `titel`, `beschreibung`
									FROM		`tx_crfaq_domain_model_kategorie` 
									WHERE		 `deleted` = 0 
									AND 		 `hidden`  = 0
									AND          `subvon`  = ""
				ORDER BY `sortings`
	         ');
			 $result = $query->execute(TRUE);
		}
		 $i = 1;
		 
		foreach ($result as $value) {
		 	
                 $data[$i][uid]   = $value[uid];
              	 $data[$i][titel] = $value[titel];
				 $data[$i][alias] = $this->urlreplace($value[titel]);
				 $data[$i][beschreibung] = $value[beschreibung];
				 $data[$i][subs]  = $this->getsubCategory($value[uid]); 
				 $i++; 
            }  
		 
		 
		 
        return $data;
    }	
	
    public function getsubCategory(int $uid): array
    {
        $query = $this->createQuery();
        $query->statement('
         SELECT `uid`, `titel`, `beschreibung` 
								FROM		`tx_crfaq_domain_model_kategorie` 
								WHERE		 `deleted` = 0 
								AND 		 `hidden`  = 0
								AND          `subvon`  = '.$uid.'
			ORDER BY `sortings`
         ');
 	 
        return $query->execute(TRUE);;
    }	
    public function findKattxt(int $uid): array
    {
        $query = $this->createQuery();
        $query->statement('
         SELECT  				`titel`, `beschreibung` 
								FROM		`tx_crfaq_domain_model_kategorie` 
								WHERE		 `deleted` = 0 
								AND 		 `hidden`  = 0
								AND          `uid`  = '.$uid.'

         ');
 	 
        return $query->execute(TRUE);;
    }
	
	public function findALLEKategorienAnker(string $cats): array
	{
		if($cats !=''){  
	        $query = $this->createQuery();
	        $query->statement('
	         SELECT `uid`, `titel`, `beschreibung`
									FROM		`tx_crfaq_domain_model_kategorie` 
									WHERE		 `deleted` = 0 
									AND 		 `hidden`  = 0
									AND          `subvon`  = ""
									AND 		`uid` IN ( '.$cats.') 
				ORDER BY FIELD(`uid`, '.$cats.')
	         ');
			 $result = $query->execute(TRUE);				
			 
		}else{	
		
	        $query = $this->createQuery();
	        $query->statement('
	         SELECT `uid`, `titel`, `beschreibung`
									FROM		`tx_crfaq_domain_model_kategorie` 
									WHERE		 `deleted` = 0 
									AND 		 `hidden`  = 0
									AND          `subvon`  = ""
				ORDER BY `sortings`
	         ');
			 $result = $query->execute(TRUE);
		 } 
		 $i = 1;
		 
		foreach ($result as $value) {
		 	
                 $data[$i][uid]   = $value[uid];
              	 $data[$i][titel] = $value[titel];
              	 $data[$i][alias] = $this->urlreplace($value[titel]);			 
				 $data[$i][beschreibung] = $value[beschreibung];
				 $data[$i][subs]  = $this->findByKategorie($value[uid]); 
				 $i++; 
            }  
		 
		 
        return $data;		  
		  
		   		
		
	}
	
			  
    public function getDetail(int $uid): array
    {
        $query = $this->createQuery();
        $query->statement('
         SELECT  				* 
								FROM		`tx_crfaq_domain_model_eintrag` 
								WHERE		 `deleted` = 0 
								AND 		 `hidden`  = 0
								AND          `uid`  = '.$uid.'

         ');
 	 	$result = $query->execute(TRUE);
				$daten[uid]			= $result[0][uid];
				$daten[frage]		= $result[0][frage];
				$daten[antwort]		= $result[0][antwort];
	  			$daten[bilder] 		= $this->getMediaElement($result[0][uid], 'tx_crfaq_domain_model_eintrag', 'bilder');
				$daten[blog1]		= $result[0][blog1];
	  			$daten[blog1bilder] = $this->getMediaElement($result[0][uid], 'tx_crfaq_domain_model_eintrag', 'blog1bilder');	 
				$daten[blog2]		= $result[0][blog2];
	  			$daten[blog2bilder] = $this->getMediaElement($result[0][uid], 'tx_crfaq_domain_model_eintrag', 'blog2bilder');
				$daten[downloads]   = $this->getMediaElement($result[0][uid], 'tx_crfaq_domain_model_eintrag', 'downloads');
        return $daten;
    }	
    public function getMediaElement(int $uid, string $table, string $field): array
    {
        $query = $this->createQuery();
        $query->statement('
		SELECT 
		     `zz`.`title`, 
			`yy`.`identifier`,
			`zz`.`description` AS `ref_des`,
			`zz`.`title` AS `title`,
			`zz`.`alternative` AS `alttxt`,
			`zz`.`uid` AS `ref_uid`,
			`zz`.`sorting_foreign` AS `sorting`
		FROM 
			`sys_file` AS `yy`,  
			`' . $table . '` AS `kg`

		INNER JOIN 
			`sys_file_reference` AS `zz` 
		ON 
			`zz`.`uid_foreign` = `kg`.`uid` 
		WHERE 
			`kg`.`uid` = "' . $uid . '"
		AND
			`zz`.`fieldname` = "' . $field . '"  
		AND 
			`zz`.`uid_local` = yy.uid 
		AND
			`zz`.`tablenames` = "' . $table . '"
		AND 
			`zz`.`hidden` = "0" 
		AND 
			`zz`.`deleted` = "0" 
		ORDER BY `zz`.`sorting_foreign`	
		');
        return $query->execute(TRUE);
    }	
	 
	 
    public function	urlreplace(string $string): string
	{
		 $string = str_replace("ä", "ae", $string);
		 $string = str_replace("ü", "ue", $string);
		 $string = str_replace("ö", "oe", $string);
		 $string = str_replace("Ä", "Ae", $string);
		 $string = str_replace("Ü", "Ue", $string);
		 $string = str_replace("Ö", "Oe", $string);
		 $string = str_replace("ß", "ss", $string);
		 $string = str_replace("´", "", $string);   	
		 $string = str_replace(" ", "-", $string);
		 $string = strtolower($string); 
		 
		    
		return $string;
    } 
}
