<?php
namespace Conrat\Crkalender\Domain\Repository;
 
 
class EintragRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param string $category
     * @param int $showDats
     * @param int $maxcount
     * @return array
     */
    public function findCategory(string $category, int $showDats, int $maxcount): array
    {
        $ttt = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
        $limits = '';
        if ($maxcount > 0) {
            $limits = ' LIMIT ' . $maxcount;
        }
        if ($showDats == 0) {

            //Abgelaufene nicht anzeigen
            $search = $this->createquery();
            $search->statement(
            '
								SELECT * 
								FROM   tx_crkalender_domain_model_eintrag,  tx_crkalender_eintrag_kategorie_mm
								WHERE 
								  		tx_crkalender_eintrag_kategorie_mm.uid_foreign IN ( ' . $category . ' ) AND
										tx_crkalender_eintrag_kategorie_mm.uid_local = tx_crkalender_domain_model_eintrag.uid AND
								  		tx_crkalender_domain_model_eintrag.hidden = 0 AND 
										tx_crkalender_domain_model_eintrag.deleted = 0 AND 
										tx_crkalender_domain_model_eintrag.datum > ' . $ttt . ' 
										ORDER BY datum ' . $limits
            );
        } elseif ($showDats == 1) {

            //auch Abgelaufene anzeigen
            $search = $this->createquery();
            $search->statement(
            '
					SELECT * 
								FROM   tx_crkalender_domain_model_eintrag,  tx_crkalender_eintrag_kategorie_mm
								WHERE 
								  		tx_crkalender_eintrag_kategorie_mm.uid_foreign IN ( ' . $category . ' ) AND
										tx_crkalender_eintrag_kategorie_mm.uid_local = tx_crkalender_domain_model_eintrag.uid AND
								  		tx_crkalender_domain_model_eintrag.hidden = 0 AND 
										tx_crkalender_domain_model_eintrag.deleted = 0  

										ORDER BY datum
										' . $limits
            );
        } elseif ($showDats == 2) {

            //nur Abgelaufene anzeigen (Archiv)
            $search = $this->createquery();
            $search->statement(
            '
								SELECT * 
								FROM   tx_crkalender_domain_model_eintrag,  tx_crkalender_eintrag_kategorie_mm
								WHERE 
								  		tx_crkalender_eintrag_kategorie_mm.uid_foreign IN ( ' . $category . ' ) AND
										tx_crkalender_eintrag_kategorie_mm.uid_local = tx_crkalender_domain_model_eintrag.uid AND
								  		tx_crkalender_domain_model_eintrag.hidden = 0 AND 
										tx_crkalender_domain_model_eintrag.deleted = 0 AND 
										tx_crkalender_domain_model_eintrag.datum < ' . $ttt . ' 
										ORDER BY datum ' . $limits
            );
        }
        $accessoryw = $search->execute(TRUE);

        // Datensätze
        $daten = [];
        $i = 0;
        foreach ($accessoryw as $key => $value) {
            $daten[$i]['main']['uid'] = $value['uid'];
            $daten[$i]['main']['kurzbeschreibung'] = $value['kurzbeschreibung'];
            $daten[$i]['main']['beschreibung'] = $value['beschreibung'];
            $daten[$i]['main']['titel'] = $value['titel'];
            $daten[$i]['main']['datum'] = $value['datum'] ;
            $daten[$i]['main']['zeit'] = $value['zeit'];
            $daten[$i]['main']['bis'] = $value['bis'];
            $daten[$i]['main']['bzeit'] = $value['bzeit'];
            $kategorieResult = $this->findKategorie($value['uid']);
            $daten[$i]['main']['kategorie'] = !empty($kategorieResult) ? $kategorieResult[0]['kategorie'] : '';
            $daten[$i]['main']['link'] = $value['link'];
            $filter = ""; $xtmp=$this->findFilter($value['uid']);
            foreach($xtmp as $filters){
                $filter .= " mixitup".$filters['uid'];  
            }
            
            
            $daten[$i]['main']['filter'] = $filter;
            $daten[$i]['main']['filterarray'] = $xtmp;
            $daten[$i]['main']['ort'] = $value['ort'];
            $daten[$i]['bild'] = $this->findMediaElement($value['uid'], 'tx_crkalender_domain_model_eintrag', 'bilder');
            $i++;
        }

        //var_dump($daten);
        return $daten;
    }

    /**
     * @param int $uid
     * @return array
     */
    public function getDetail(int $uid): array
    {
        $search = $this->createQuery();
        $search->statement(
        '
		          	SELECT  	*
					FROM		`tx_crkalender_domain_model_eintrag`   
					WHERE    	`deleted` =  0 
					AND			`hidden` =  0 
					AND 		`uid` =  ' . $uid
        );
        $accessoryw = $search->execute(TRUE);
        return $accessoryw[0];
    }

    /**
     * @param int $uid
     * @return array
     */
    public function findKategorie(int $uid): array
    {
        $search = $this->createQuery();
        $search->statement(
        '
		          	SELECT  	`kategorie`
					FROM		 `tx_crkalender_domain_model_kategorie`  AS `kt`

					INNER JOIN    `tx_crkalender_eintrag_kategorie_mm`  AS `mm` 		
					ON 			  `mm`.`uid_local` = ' . $uid . '

					WHERE    	`mm`.`uid_foreign` = `kt`.`uid`'
        );
        $accessoryw = $search->execute(TRUE);
        return $accessoryw;
    }
    /**
     * @param int $uid
     * @return array
     */
    public function findFilter(int $uid): array
    {
        $search = $this->createQuery();
        $search->statement(
        '
		          	SELECT  	 uid, titel 
					FROM		 `tx_crkalender_domain_model_filter`  AS `kt`

					INNER JOIN    `tx_crkalender_eintrag_filter_mm`  AS `mm` 		
					ON 			  `mm`.`uid_local` = ' . $uid . '

					WHERE    	`mm`.`uid_foreign` = `kt`.`uid`'
        );
        $accessoryw = $search->execute(TRUE);
        return $accessoryw;
    }
    /**
     * @param int $uids
     * @param string $table
     * @param string $field
     * @return array
     */
    public function findMediaElement(int $uids, string $table, string $field): array
    {

        // Abfrage nach Anbieter in Kategorien
        $query = $this->createQuery();
        $query->statement(
        '
		SELECT  
			`yy`.`identifier`,
			`zz`.`uid` AS `ref_uid`,
			 `yy`.`identifier_hash`
		FROM 
			`sys_file` AS `yy`,  
			`' . $table . '` AS `kg`

		INNER JOIN 
			`sys_file_reference` AS `zz` 
		ON 
			`zz`.`uid_foreign` = `kg`.`uid` 
		WHERE 
			`kg`.`uid` = ' . $uids . '
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
		'
        );
        $accessoryw = $query->execute(TRUE);
        return $accessoryw;
    }
}
