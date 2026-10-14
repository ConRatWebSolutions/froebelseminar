<?php
declare(strict_types=1);

namespace Conrat\Crbuchkatalog\Domain\Repository;


/***
 *
 * This file is part of the "ConRatBuchkatalog" Extension for TYPO3 CMS.
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
        $query->statement(
        '
         SELECT *
								FROM		`tx_crbuchkatalog_domain_model_eintrag` 
								WHERE		 `deleted` = 0 
								AND 		 `hidden`  = 0
		ORDER BY `veroeffentlichungsjahr`						


         '
        );
        $i = 1;
        $result = $query->execute(TRUE);
        foreach ($result as $value) {
            $data[$i]['uid'] = $value['uid'];
            $data[$i]['titel'] = $value['titel'];
            $data[$i]['autor'] = $value['autor'];
            $data[$i]['veroeffentlichungsjahr'] = $value['veroeffentlichungsjahr'];
            $data[$i]['pdf'] = $this->getMediaElement($value['uid'], 'tx_crbuchkatalog_domain_model_eintrag', 'pdf');
            $i++;
        }
        return $data;
    }

    /**
     * @param string $volltext
     * @param string $autor
     * @param string $jahr
     */
    public function findSuche(string $volltext, string $autor, string $jahr): array
    {
        if ($volltext != "") {
            $svolltext = ' AND (`titel` LIKE "%' . $volltext . '%"  OR  `kurzbeschreibung` LIKE "%' . $volltext . '%"  OR `schlagworte` LIKE "%' . $volltext . '%" )';
        }
        if ($autor != "") {
            $sautor = ' AND `autor` LIKE "%' . $autor . '%"';
        }
        if ($jahr != "") {
            $sjahr = ' AND `veroeffentlichungsjahr` = ' . $jahr . ' ';
        }
        $query = $this->createQuery();
        $query->statement(
        '
		         SELECT *
				 FROM		 `tx_crbuchkatalog_domain_model_eintrag` 
				 WHERE		 `deleted` = 0
				 AND		 `deleted` = 0
				 ' . $svolltext . $sautor . $sjahr . '
				 ORDER BY 	 `veroeffentlichungsjahr`						
	         '
        );
        $i = 1;
        $result = $query->execute(TRUE);
        foreach ($result as $value) {
            $data[$i]['uid'] = $value['uid'];
            $data[$i]['titel'] = $value['titel'];
            $data[$i]['autor'] = $value['autor'];
            $data[$i]['veroeffentlichungsjahr'] = $value['veroeffentlichungsjahr'];
            $data[$i]['pdf'] = $this->getMediaElement($value['uid'], 'tx_crbuchkatalog_domain_model_eintrag', 'pdf');
            $i++;
        }
        return $data;
    }

    /**
     * @param $uid
     * @param $table
     * @param $field
     */
    public function getMediaElement($uid, $table, $field)
    {
        $query = $this->createQuery();
        $query->statement(
        '
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
		'
        );
        return $query->execute(TRUE);
    }
}
