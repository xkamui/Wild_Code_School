<?php

	class Saints {

		public function __construct(){
		
			$this->SQLTABLE = new stdClass();
			$this->SQLTABLE->user 	= 'ssa_users';
			$this->SQLTABLE->boxes  = 'ssa_boxes';
			$this->SQLTABLE->stats  = 'ssa_stats';
			$this->SQLTABLE->skins  = 'ssa_skins';
			$this->SQLTABLE->skills = 'ssa_skills';
			$this->SQLTABLE->saints = 'ssa_saints';
			$this->SQLTABLE->points = 'ssa_assault';

			$this->RANKS = array(
				'0' => 'SS',
				'1' => 'EX',
				'2' => 'S',
				'3' => 'A',
				'4' => 'B',
				'5' => 'C',
			);

		}



		public function tempGetStats(){

			$htm = '';
			$saints = $this->getAllSaints();

			foreach ($saints as $saint => $vals) {

				$htm .= '<div class="line">'."\r\n".
						'	<div class="name">' . $vals->fullname . '</div>'."\r\n".
						'	<div class="inpt"><label for="PV_' . $vals->id . '">PV: </label><input type="text" name="PV[' . $vals->id . ']" id="PV_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="ATQ_P_' . $vals->id . '">ATQ_P: </label><input type="text" name="ATQ_P[' . $vals->id . ']" id="ATQ_P_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="ATQ_C_' . $vals->id . '">ATQ_C: </label><input type="text" name="ATQ_C[' . $vals->id . ']" id="ATQ_C_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="DEF_P_' . $vals->id . '">DEF_P: </label><input type="text" name="DEF_P[' . $vals->id . ']" id="DEF_P_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="DEF_C_' . $vals->id . '">DEF_C: </label><input type="text" name="DEF_C[' . $vals->id . ']" id="DEF_C_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="VIT_' . $vals->id . '">VIT: </label><input type="text" name="VIT[' . $vals->id . ']" id="VIT_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="NV_CRIT_' . $vals->id . '">NV_CRIT: </label><input type="text" name="NV_CRIT[' . $vals->id . ']" id="NV_CRIT_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="EF_CRIT_' . $vals->id . '">EF_CRIT: </label><input type="text" name="EF_CRIT[' . $vals->id . ']" id="EF_CRIT_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="STT_HIT_' . $vals->id . '">STT_HIT: </label><input type="text" name="STT_HIT[' . $vals->id . ']" id="STT_HIT_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="STT_RES_' . $vals->id . '">STT_RES: </label><input type="text" name="STT_RES[' . $vals->id . ']" id="STT_RES_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="DEG_C_' . $vals->id . '">DEG_C: </label><input type="text" name="DEG_C[' . $vals->id . ']" id="DEG_C_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="RES_CRIT_P_' . $vals->id . '">RES_CRIT_P: </label><input type="text" name="RES_CRIT_P[' . $vals->id . ']" id="RES_CRIT_P_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="PN_DEF_P_' . $vals->id . '">PN_DEF_P: </label><input type="text" name="PN_DEF_P[' . $vals->id . ']" id="PN_DEF_P_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="PN_DEF_C_' . $vals->id . '">PN_DEF_C: </label><input type="text" name="PN_DEF_C[' . $vals->id . ']" id="PN_DEF_C_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="RES_DEG_C_' . $vals->id . '">RES_DEG_C: </label><input type="text" name="RES_DEG_C[' . $vals->id . ']" id="RES_DEG_C_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="RES_DEG_P_' . $vals->id . '">RES_DEG_P: </label><input type="text" name="RES_DEG_P[' . $vals->id . ']" id="RES_DEG_P_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="VDV_' . $vals->id . '">VDV: </label><input type="text" name="VDV[' . $vals->id . ']" id="VDV_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="RENV_DEG_' . $vals->id . '">RENV_DEG: </label><input type="text" name="RENV_DEG[' . $vals->id . ']" id="RENV_DEG_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="SOIN_' . $vals->id . '">SOIN: </label><input type="text" name="SOIN[' . $vals->id . ']" id="SOIN_' . $vals->id . '"></div>'."\r\n".
						'	<div class="inpt"><label for="CRIT_BASE_' . $vals->id . '">CRIT_BASE: </label><input type="text" name="CRIT_BASE[' . $vals->id . ']" id="CRIT_BASE_' . $vals->id . '"></div>'."\r\n".
						'	<div class="butn"><button type="button" rel="' . $vals->id . '">OK</button></div>'."\r\n".
						'</div>'."\r\n";

			}

			return $htm;

		}



		public function tempSetStats($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;

			$fld = '';
			$val = '';
			
			$fds = array('PV', 'ATQ_P', 'ATQ_C', 'DEF_P', 'DEF_C', 'VIT', 'NV_CRIT', 'EF_CRIT', 'STT_HIT', 'STT_RES', 'DEG_C', 'RES_CRIT_P', 'PN_DEF_P', 'PN_DEF_C', 'RES_DEG_C', 'RES_DEG_P', 'VDV', 'RENV_DEG', 'SOIN', 'CRIT_BASE');

			foreach ($fds as $key) {
				$fld .= ', `' . $key . '`';
				$val .= ', "' . $datas[$key] . '"';
			}

			// Préparation et exécution de la requête
			$req = "INSERT INTO `" . $tab->stats . "` (`id_saint` " . $fld . ") VALUES (" . $datas['uid'] . " " . $val . ");";
			$sql = DB::cnx()->prepare($req);
			$sql->execute();
		    
		}



		public function createSaintCard($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			/*
			$skl = array();
			$fld = array('card' => "assets/img/cards/", 'skill' => "assets/img/skills/");

			$datas['saint'] = json_decode($datas['saint'], true);
			$card = 'card_bg_' . $datas['saint']['stars'] . 'stars';

			// Préparation et exécution de la requête
			$req = "SELECT `" . $card . "` AS card FROM `" . $tab->saints . "` WHERE 1 AND `id` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $datas['saint']['id_saint'], 	PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetch(PDO::FETCH_OBJ);
			$sql->closeCursor();

			$datas['card'] = $nfo->card;

			$skills = $this->getSaintSkills($datas['saint']['id_saint']);
			foreach ($skills as $k => $skill) {
			    if (is_numeric($k)) {
			    	$skl[$skill->position] = $skill;
			    }
			}

			echo '2002<hr><pre>';
			var_dump($datas);
			echo '</pre>';
			*/

		}



		//## [  ]
		public function getAssault($datas){

			$skills = array();
			$points = array();
			$result = array();
			$saints = json_decode($datas['saints']);

			// Récupération et mise en forme des skills
			foreach ($saints as $saint) {
				if ($saint->rank < 3 && $saint->stars == 6 && $saint->level == 80) {
					$skill = array($saint->skill_1, $saint->skill_2, $saint->skill_3, $saint->skill_4);
					sort($skill);
					$skill = implode('', $skill);
					$skills[$saint->saint_id] = array('rank' => $saint->rank, 'stars' => $saint->stars, 'skills' => $skill);
				}
			}
			
			// Mise en place des points pour les chevaliers
			foreach ($skills as $saint => $nfo) {
				
				switch ($nfo['rank']) {
					case '0':
					case '1':
						$points[$saint] = $nfo['skills']{0} + $nfo['skills']{1} + $nfo['skills']{2} + $nfo['skills']{3} + 5;
						break;
					case '2':
						$points[$saint] = $this->getPoints($nfo['skills']);
						break;
				}

			}

			arsort($points);

			// Création d'un objet dans l'ordre
			foreach ($points as $uid => $pts) {
			    array_push($result, array('uid' => $uid, 'pts' => $pts));
			}

			return $result;

		}

		//## [  ]
		public function getAssaultPointBySaint($rank, $skills){

			$points = 0;
			$skl = array($skills{0}, $skills{1}, $skills{2}, $skills{3});
			sort($skl);
			$skill = implode('', $skl);

			switch ($rank) {
				case '0':
				case '1':
					$points = $skills{0} + $skills{1} + $skills{2} + $skills{3} + 5;
					break;
				case '2':
					$points = $this->getPoints($skill);
					break;
			}

			return $points;

		}

		//## [  ]
		public function getPoints($skill){

			// Définition des variables
			$tab = $this->SQLTABLE;

			// Préparation et exécution de la requête
			$req = "SELECT `points` FROM `" . $tab->points . "`WHERE 1 AND `skill` = :skl;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':skl', $skill, 			PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetch(PDO::FETCH_OBJ);

			return $nfo->points;

		}


		public function createSaint($datas, $files){

			// Définition des variables
			$tab = $this->SQLTABLE;

			// Préparation et upload de l'image
			$folder = 'assets/img/saints/';
			$avatar = $files['avatar']['name'];
			$upload = move_uploaded_file($files['avatar']['tmp_name'], $folder . $avatar);

			// Generate saints uniqid
			$uniqid = uniqid();

			// Ajout du tout dans la base de données
			$req = "INSERT INTO `" . $tab->saints . "` (
						   `uniqid`, `on_global`, `icon`, `name`, `particle`, `zodiac`, 
						   `rank`, `section`, `rework_cloth`, `max_skill`, `max_skill_rc`, 
						   `awakenable`, `eighth_ready`
						) VALUES (
							:uid, :glo, :icn, :nam, :prt, :zdc, :rnk, 
							:sct, :rwk, :skl, :skr, :awk, :egt
						);";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $uniqid, 				PDO::PARAM_STR);
			$sql->bindParam(':glo', $datas['on_global'], 	PDO::PARAM_INT);
			$sql->bindParam(':icn', $avatar, 				PDO::PARAM_STR);
			$sql->bindParam(':nam', $datas['name'], 		PDO::PARAM_STR);
			$sql->bindParam(':prt', $datas['particle'], 	PDO::PARAM_STR);
			$sql->bindParam(':zdc', $datas['zodiac'], 		PDO::PARAM_STR);
			$sql->bindParam(':rnk', $datas['rank'], 		PDO::PARAM_STR);
			$sql->bindParam(':sct', $datas['section'], 		PDO::PARAM_STR);
			$sql->bindParam(':rwk', $datas['rework_cloth'], PDO::PARAM_INT);
			$sql->bindParam(':skl', $datas['max_skill'], 	PDO::PARAM_INT);
			$sql->bindParam(':skr', $datas['max_skill_rc'], PDO::PARAM_INT);
			$sql->bindParam(':awk', $datas['awakenable'], 	PDO::PARAM_INT);
			$sql->bindParam(':egt', $datas['eighth_ready'], PDO::PARAM_INT);
			$sql->execute();
			$sql->closeCursor();


			$saint_id = $this->getSaintIdByUniqid($uniqid);

			// Préparation et upload de l'image
			$folder = 'assets/img/skills/';

			for ($i=1; $i < 5; $i++) { 
				if (!empty($datas['skill_' . $i])) {

					// Upload de l'icone
					if (!empty($files['skill_icon_' . $i]['name'])) {
						$icon = $files['skill_icon_' . $i]['name'];
						$upload = move_uploaded_file($files['skill_icon_' . $i]['tmp_name'], $folder . $icon);
					}

					// Gestion du rework et du skill awaken
					$rwk = $awk = 0;
					if ($datas['skill_awaken'] == $i) {
						$awk = 1;
					}

					if ($datas['skill_reworked'] == $i) {
						$rwk = 1;
					}

					// 
					$req = "INSERT INTO `" . $tab->skills . "` (
								   `id_saint`, `position`, `icon`, `name`, 
								   `name_en`, `rework`, `awaken`, `cost`
								) VALUES (
									:uid, :pos, :icn, :nam, :eng, 
									:rwk, :awk, :cst
								);";

					$sql = DB::cnx()->prepare($req);
					$sql->bindParam(':uid', $saint_id->id, 				PDO::PARAM_INT);
					$sql->bindParam(':pos', $i, 						PDO::PARAM_INT);
					$sql->bindParam(':icn', $icon, 						PDO::PARAM_STR);
					$sql->bindParam(':nam', $datas['skill_' . $i], 		PDO::PARAM_STR);
					$sql->bindParam(':eng', $datas['skill_en_' . $i], 	PDO::PARAM_STR);
					$sql->bindParam(':rwk', $rwk, 						PDO::PARAM_INT);
					$sql->bindParam(':awk', $awk, 						PDO::PARAM_INT);
					$sql->bindParam(':cst', $datas['cost_skill_' . $i], PDO::PARAM_INT);
					$sql->execute();
					$sql->closeCursor();

				}
			}

		    return $saint_id;
		}


		public function updateSaint($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$usr = $datas['usernm'];
			$htm = '';
			$skl = array();

			// Mise en place des skills
			for ($i = 0; $i < strlen($datas['max_skill']); $i++) {
				$skl[($i + 1)] = $datas['skill_' . ($i + 1)];
			}

			// Préparation et exécution de la requête
			$req = "UPDATE `" . $tab->boxes . "` 
					SET `level`=:lvl, `stars`=:str, `eighth`=:egh, `starwilled`=:swl, 
						`awaken`=:awk, `reworked`=:rwk, `friendship`=:frd, `id_skin`=:skn, 
						`skill_1`=:sk1, `skill_2`=:sk2, `skill_3`=:sk3, `skill_4`=:sk4
					WHERE 1 AND `user`=:usr AND `id_saint`=:uid";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':lvl', $datas['level'], 		PDO::PARAM_INT);
			$sql->bindParam(':str', $datas['stars'], 		PDO::PARAM_INT);
			$sql->bindParam(':egh', $datas['eighth'], 		PDO::PARAM_STR);
			$sql->bindParam(':awk', $datas['awaken'], 		PDO::PARAM_INT);
			$sql->bindParam(':rwk', $datas['reworked'], 	PDO::PARAM_INT);
			$sql->bindParam(':swl', $datas['starwilled'], 	PDO::PARAM_INT);
			$sql->bindParam(':frd', $datas['friendship'], 	PDO::PARAM_INT);
			$sql->bindParam(':sk1', $skl['1'], 				PDO::PARAM_INT);
			$sql->bindParam(':sk2', $skl['2'], 				PDO::PARAM_INT);
			$sql->bindParam(':sk3', $skl['3'], 				PDO::PARAM_INT);
			$sql->bindParam(':sk4', $skl['4'], 				PDO::PARAM_INT);
			$sql->bindParam(':skn', $datas['id_skin'], 		PDO::PARAM_INT);
			$sql->bindParam(':uid', $datas['saint'], 		PDO::PARAM_STR);
			$sql->bindParam(':usr', $usr, 					PDO::PARAM_STR);
			$sql->execute();
			
			$box = $this->listBoxJSON($usr);

			return $box;

		}


		public function getSaintById($uid){

			// Définition des variables
			$tab = $this->SQLTABLE;

			// Préparation et exécution de la requête
			$req = "SELECT 
					`" . $tab->boxes . "`.`level`, `" . $tab->boxes . "`.`stars`, `" . $tab->boxes . "`.`awaken`, `" . $tab->boxes . "`.`reworked`, `" . $tab->boxes . "`.`friendship`, 
					`" . $tab->boxes . "`.`skill_1`, `" . $tab->boxes . "`.`skill_2`, `" . $tab->boxes . "`.`skill_3`, `" . $tab->boxes . "`.`skill_4`, `" . $tab->boxes . "`.`eighth`, 
					`" . $tab->saints . "`.`id` AS `saint_id`, `" . $tab->saints . "`.`icon`, `" . $tab->saints . "`.`name`, 
					`" . $tab->saints . "`.`card_bg_2stars`, `" . $tab->saints . "`.`card_bg_3stars`, `" . $tab->saints . "`.`card_bg_4stars`, 
					`" . $tab->saints . "`.`card_bg_5stars`, `" . $tab->saints . "`.`card_bg_6stars`, 
					TRIM(CONCAT(`" . $tab->saints . "`.`name`, `" . $tab->saints . "`.`particle`, `" . $tab->saints . "`.`zodiac`)) AS `fullname`, 
					`" . $tab->saints . "`.`rank`, `" . $tab->saints . "`.`rework_cloth`, `" . $tab->saints . "`.`rework_part_name`, `" . $tab->saints . "`.`rework_part_icon`, `" . $tab->saints . "`.`max_skill`, `" . $tab->saints . "`.`max_skill_rc`
					FROM `" . $tab->boxes . "`
					LEFT JOIN `" . $tab->saints . "` ON `" . $tab->saints . "`.`id` = `" . $tab->boxes . "`.`id_saint` 
					WHERE 1 AND `" . $tab->boxes . "`.`user` = :usr AND `" . $tab->boxes . "`.`id_saint` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':usr', $this->USER, 	PDO::PARAM_STR);
			$sql->bindParam(':uid', $uid, 			PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetch(PDO::FETCH_OBJ);

			return $nfo;

		}


		public function getSaintIdByUniqid($uid){

			// Définition des variables
			$tab = $this->SQLTABLE;

			// Préparation et exécution de la requête
			$req = "SELECT `id` FROM `" . $tab->saints . "`WHERE 1 AND `uniqid` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $uid, 			PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetch(PDO::FETCH_OBJ);

			return $nfo;

		}


		public function countSaints($usr){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$num = 0;

			// Préparation et exécution de la requête
			$req = "SELECT `id` FROM `" . $tab->boxes . "`WHERE 1 AND `user` = :usr;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':usr', $usr, 			PDO::PARAM_STR);
			$sql->execute();
			$num = $sql->rowCount();

			return $num;

		}


		public function quickInsert($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$usr = $datas['usernm'];
			$ids = $datas['ids'];
			$uid = explode(',', $ids);
			$box = '';

			foreach ($uid as $key) {

				$req = "INSERT INTO `" . $tab->boxes . "` (`user`, `id_saint`) VALUES (:usr, :uid);";
				$sql = DB::cnx()->prepare($req);
				$sql->bindParam(':usr', $usr, 	PDO::PARAM_STR);
				$sql->bindParam(':uid', $key, PDO::PARAM_INT);
				$sql->execute();
				$sql->closeCursor();

			}

			$box = $this->listBoxJSON($usr);

			return $box;

		}


		public function deleteFromBox($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$usr = $datas['usernm'];
			$uid = $datas['uid'];
			$box = '';

			// Préparation et exécution de la requête
			$req = "DELETE FROM `" . $tab->boxes . "` WHERE 1 AND `id` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $uid, 	PDO::PARAM_INT);
			$sql->execute();
			$sql->closeCursor();

			$box = $this->listBoxJSON($usr);

			return $box;

		}


		public function listNotInBox($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$usr = $datas['usernm'];
			$htm = '';

			// Préparation et exécution de la requête
			$req = "SELECT `" . $tab->saints . "`.`id` AS `saint_id`, `" . $tab->saints . "`.`icon`, `" . $tab->saints . "`.`name`, `" . $tab->saints . "`.`rank`, 
						   TRIM(CONCAT(`" . $tab->saints . "`.`name`, ' ', `" . $tab->saints . "`.`particle`, `" . $tab->saints . "`.`zodiac`)) AS `fullname`
					FROM `" . $tab->saints . "` 

					WHERE NOT EXISTS (SELECT NULL FROM `" . $tab->boxes . "` WHERE 1 AND `" . $tab->boxes . "`.`user` = :usr AND `" . $tab->boxes . "`.`id_saint` = `" . $tab->saints . "`.`id`)
					ORDER BY `" . $tab->saints . "`.`rank` ASC, `" . $tab->saints . "`.`name` ASC;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':usr', $usr, 	PDO::PARAM_STR);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);


			foreach ($nfo as $saint) {

				$htm .= '<div class="quickSaint rank_' . strtolower($this->RANKS[$saint->rank]) . '">'."\r\n".
						'	<div class="wrapper">'."\r\n".
						'		<figure>'."\r\n".
						'			<img src="assets/img/saints/' . $saint->icon . '" id="quick_avatar" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
						'			<img src="assets/img/ranks/bg-rank-' . $saint->rank . '.png" class="bgrank" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
						'			<img src="assets/img/ranks/rank-' . $saint->rank . '.png" class="rank" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
						'		</figure>'."\r\n".
						'	</div>'."\r\n".
						'	<a href="#" class="selectSaint" id="quick_saint_' . $saint->saint_id . '" title="Select Saint"></a>'."\r\n".
						'</div>'."\r\n";

			}

			return $htm;

		}


		public function listQuickInsert($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$usr = $datas['usernm'];
			$htm = '';

			// Préparation et exécution de la requête
			$req = "SELECT `" . $tab->saints . "`.`id` AS `saint_id`, `" . $tab->saints . "`.`icon`, `" . $tab->saints . "`.`name`, `" . $tab->saints . "`.`rank`, 
						   TRIM(CONCAT(`" . $tab->saints . "`.`name`, ' ', `" . $tab->saints . "`.`particle`, `" . $tab->saints . "`.`zodiac`)) AS `fullname`
					FROM `" . $tab->saints . "` 
					WHERE 1 AND `" . $tab->saints . "`.`on_global` = 1
					ORDER BY `" . $tab->saints . "`.`rank` ASC, `" . $tab->saints . "`.`name` ASC;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':usr', $usr, 	PDO::PARAM_STR);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);


			foreach ($nfo as $saint) {

				$htm .= '<div id="quick_card_' . $saint->saint_id . '" rel="main_card_' . $saint->saint_id . '" class="quickSaint rank_' . strtolower($this->RANKS[$saint->rank]) . '">'."\r\n".
						'	<div class="wrapper">'."\r\n".
						'		<figure>'."\r\n".
						'			<img src="assets/img/saints/' . $saint->icon . '" id="quick_avatar" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
						'			<img src="assets/img/ranks/bg-rank-' . $saint->rank . '.png" class="bgrank" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
						'			<img src="assets/img/ranks/rank-' . $saint->rank . '.png" class="rank" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
						'		</figure>'."\r\n".
						'	</div>'."\r\n".
						'	<a href="#" class="selectSaint" id="quick_saint_' . $saint->saint_id . '" title="Select Saint"></a>'."\r\n".
						'</div>'."\r\n";

			}

			return $htm;

		}


		public function listBox($usr){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$htm = '';

			// Préparation et exécution de la requête
			$req = "SELECT `" . $tab->boxes . "`.`level`, `" . $tab->boxes . "`.`stars`, `" . $tab->boxes . "`.`awaken`, `" . $tab->boxes . "`.`reworked`, `" . $tab->boxes . "`.`starwilled`, `" . $tab->boxes . "`.`friendship`, 
						   `" . $tab->boxes . "`.`skill_1`, `" . $tab->boxes . "`.`skill_2`, `" . $tab->boxes . "`.`skill_3`, `" . $tab->boxes . "`.`skill_4`, `" . $tab->boxes . "`.`eighth`, `" . $tab->boxes . "`.`id_skin`, 
						   `" . $tab->saints . "`.`id` AS `saint_id`, `" . $tab->saints . "`.`icon`, `" . $tab->saints . "`.`large_icon`, `" . $tab->saints . "`.`name`, `" . $tab->saints . "`.`awakenable`,  
						   `" . $tab->saints . "`.`eighth_ready`, TRIM(CONCAT(`" . $tab->saints . "`.`name`, ' ', `" . $tab->saints . "`.`particle`, `" . $tab->saints . "`.`zodiac`)) AS `fullname`, 
						   `" . $tab->saints . "`.`in_starwill`, `" . $tab->saints . "`.`starwill`, `" . $tab->saints . "`.`rank`, `" . $tab->saints . "`.`rework_part_name`, `" . $tab->saints . "`.`rework_part_icon`, `" . $tab->saints . "`.`rework_cloth`, `" . $tab->saints . "`.`max_skill`, 
						   `" . $tab->saints . "`.`max_skill_rc`
					FROM `" . $tab->boxes . "`, `" . $tab->saints . "` 
					WHERE 1 AND `" . $tab->boxes . "`.`user` = :usr AND `" . $tab->boxes . "`.`id_saint` = `" . $tab->saints . "`.`id`
					ORDER BY `" . $tab->saints . "`.`box_position` ASC;";
					// ORDER BY `" . $tab->saints . "`.`rank` ASC, `" . $tab->boxes . "`.`level` DESC, `" . $tab->boxes . "`.`reworked` DESC, `" . $tab->saints . "`.`name` ASC;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':usr', $usr, 	PDO::PARAM_STR);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);

			foreach ($nfo as $saint) {

				if (($saint->skill_1 + $saint->skill_2 + $saint->skill_3 + $saint->skill_4) == 0) {
					$skills = 'n/a';
				} else {
					$skills = $saint->skill_1;
					if (isset($saint->max_skill{1})) {
						$skills .= $saint->skill_2;
					}
					if (isset($saint->max_skill{2})) {
						$skills .= $saint->skill_3;
					}
					if (isset($saint->max_skill{3})) {
						$skills .= $saint->skill_4;
					}
				}

				$skn = $this->getSaintSkins($saint->saint_id);
				$saint->skins = $skn;

				if ($saint->id_skin != '0') {
					$icon = $this->getSkin($saint->id_skin);
					$saint->alt_icon = $icon->icon;
					$saint->alt_large_icon = $icon->large_icon;
				}

				$skl = $this->getSaintSkills($saint->saint_id);
				$saint->skills = $skl;

				$saint->skill_awk = $this->getSaintSkillsInfo($saint->saint_id, 'awaken');
				$saint->skill_rwk = $this->getSaintSkillsInfo($saint->saint_id, 'rework');

				if ($saint->rank < 3) {
					$saint->assault = $this->getAssaultPointBySaint($saint->rank, $skills);
					// $saint->assault = $this->getAssault($saint);
				}

				$fully_maxed = $maxed_picto = '';
				if ($saint->eighth == '6666' && $saint->friendship == 10) {
					if ($saint->reworked == 1) {
						if ($saint->max_skill_rc == $skills) {
							$fully_maxed = 'maxedOut';
							$maxed_picto = '<img src="assets/img/icons/maxed.png" class="maxed" alt="Maxed out saint!!" title="Maxed out saint!!">';
						}
					} else {
						if ($saint->max_skill == $skills) {
							$fully_maxed = 'maxedOut';
							$maxed_picto = '<img src="assets/img/icons/maxed.png" class="maxed" alt="Maxed out saint!!" title="Maxed out saint!!">';
						}
					}
				}



				if ($usr == 'xkamui') {
					$htm .= '<div id="main_card_' . $saint->saint_id . '" rel="quick_card_' . $saint->saint_id . '" class="saint main_card large_card rank_' . strtolower($this->RANKS[$saint->rank]) . ' ' . $fully_maxed . ' ' . (!empty($saint->starwill) ? 'starwill_' . $this->slugify($saint->starwill) : '') . ' star_' . $saint->stars . ' friendship_' . $saint->friendship . ' level_' . $saint->level . ' ' . ($saint->eighth == '6666' ? 'eight_maxed' : '') . ' ' . ($saint->awakenable == 1 ? ($saint->awaken == '1' ? 'awakened' : 'not_awakened') : '') . ' ' . ($saint->rework_cloth == 1 ? ($saint->reworked == 1 ? 'reworked' : 'not_reworked') : '') . '">'."\r\n".
							'	<div class="wrapper">'."\r\n".
							'		<figure>'."\r\n".
							'			<img src="assets/img/saints/' . (isset($saint->alt_large_icon) ? $saint->alt_large_icon : $saint->large_icon) . '" id="avatar" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
							'			<figcaption class="rank_' . $saint->rank . '" id="saint_' . $saint->saint_id . '_stars">'."\r\n".
							'				' . str_repeat('<img src="assets/img/icons/star.png" alt="' . $saint->stars . ' stars" title="' . $saint->stars . ' stars">', $saint->stars)."\r\n".
							'			</figcaption>'."\r\n".
							'		</figure>'."\r\n".
							'	</div>'."\r\n".
							'</div>'."\r\n";

				} else {

					$htm .= '<div id="main_card_' . $saint->saint_id . '" rel="quick_card_' . $saint->saint_id . '" class="saint main_card rank_' . strtolower($this->RANKS[$saint->rank]) . ' ' . $fully_maxed . ' ' . (!empty($saint->starwill) ? 'starwill_' . $this->slugify($saint->starwill) : '') . ' star_' . $saint->stars . ' friendship_' . $saint->friendship . ' level_' . $saint->level . ' ' . ($saint->eighth == '6666' ? 'eight_maxed' : '') . ' ' . ($saint->awakenable == 1 ? ($saint->awaken == '1' ? 'awakened' : 'not_awakened') : '') . ' ' . ($saint->rework_cloth == 1 ? ($saint->reworked == 1 ? 'reworked' : 'not_reworked') : '') . '">'."\r\n".
							'	<div class="wrapper">'."\r\n".
							'		<figure>'."\r\n".
							'			<img src="assets/img/saints/' . (isset($saint->alt_icon) ? $saint->alt_icon : $saint->icon) . '" id="avatar" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
							'			<img src="assets/img/ranks/bg-rank-' . $saint->rank . '.png" class="bgrank" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
							'			<img src="assets/img/ranks/rank-' . $saint->rank . '.png" class="rank" alt="' . $saint->fullname . '" title="' . $saint->fullname . '">'."\r\n".
							'			<img src="assets/img/icons/icon-rc.png" class="rc ' . ($saint->reworked == 0 ? 'nope' : '') . '"  id="saint_' . $saint->saint_id . '_rework" alt="Reworked cloth" title="Reworked cloth">'."\r\n".
										(!empty($maxed_picto) ? $maxed_picto."\r\n" : '') . 
							'			<figcaption class="rank_' . $saint->rank . '" id="saint_' . $saint->saint_id . '_stars">'."\r\n".
							'				' . str_repeat('<img src="assets/img/icons/star.png" alt="' . $saint->stars . ' stars" title="' . $saint->stars . ' stars">', $saint->stars)."\r\n".
							'			</figcaption>'."\r\n".
							'			<span class="level" id="saint_' . $saint->saint_id . '_level">' . ($saint->level > 0 ? $saint->level : 'n/a') . '</span>'."\r\n".
							'		</figure>'."\r\n".
							'		<div class="datas">'."\r\n".
							'			<h2 class="rank_' . $saint->rank . '">' . $saint->fullname . '<span class="inline_datas"><span id="saint_' . $saint->saint_id . '_assault" class="assault">' . ($saint->rank < 3 ? '⭐' . $saint->assault . 'pts' : '') . '</span><span id="saint_' . $saint->saint_id . '_friendship" class="friendship ' . ($saint->friendship == 10 ? 'maxedOut' : '') . '">❤' . $saint->friendship . '</span></h2>'."\r\n".
							'			<div class="infos">'."\r\n".
							'				<div class="data awaken ' . ($saint->awaken == 1 ? '' : 'nope') . '" id="saint_' . $saint->saint_id . '_awaken">' ."\r\n".
												($saint->awaken == 1 ? 'Awakened' : ($saint->awakenable == 1 ? 'Not awakened' : '')) ."\r\n".
												(!empty($saint->starwill) ? '<img src="assets/img/icons/starwill-' . $this->slugify($saint->starwill) . '.png" class="starwill ' . ($saint->starwilled == 1 ? 'active' : '') . '" alt="' . $saint->starwill . '" title="' . $saint->starwill . '">' : '') ."\r\n".
							'				</div>' ."\r\n".
							'				<div class="data ' . ($saint->reworked == 1 ? ($saint->max_skill_rc == $skills ? 'maxedOut' : '') : ($saint->max_skill == $skills ? 'maxedOut' : '')) . '">Skill: <span id="saint_' . $saint->saint_id . '_skill">' . $skills . '</span></div>'."\r\n".
							'				<div class="data ' . ($saint->eighth == '6666' ? 'maxedOut' : '') . '">8<sup>th</sup>: <span id="saint_' . $saint->saint_id . '_eighth">' . ($saint->eighth > 0 ? $saint->eighth : ($saint->eighth_ready == 1 ? '0000' : 'n/a')) . '</span></div>'."\r\n".
							'			</div>'."\r\n".
							'		</div>'."\r\n".
							'	</div>'."\r\n".
							'	<div class="skills">'."\r\n";

					for ($s = 0; $s < strlen($saint->max_skill); $s++) {
						$sk = ($s + 1);
						$ssk = 'skill_' . $sk;
						$htm .= '	<div class="skill">'."\r\n".
								'		<figure>'."\r\n".
								'			<img src="assets/img/skills/' . (($saint->reworked == 1 && $saint->skills->$sk->icon_rework != '') ? $saint->skills->$sk->icon_rework : $saint->skills->$sk->icon) . '" alt="' . (($saint->reworked == 1 && $saint->skills->$sk->name_rework != '') ? $saint->skills->$sk->name_rework : $saint->skills->$sk->name) . '" title="' . (($saint->reworked == 1 && $saint->skills->$sk->name_rework != '') ? $saint->skills->$sk->name_rework : $saint->skills->$sk->name) . '">'."\r\n".
								'			<figcaption>'."\r\n".
								'				<span class="cost">' . (($saint->reworked == 1 && $saint->skills->$sk->cost_rework != '') ? ($saint->skills->$sk->cost_rework == 'P' ? '' : $saint->skills->$sk->cost_rework) : ($saint->skills->$sk->cost == 'P' ? '' : $saint->skills->$sk->cost)) . '</span>'."\r\n".
								'				<span class="levl">LVL. ' . $saint->$ssk . '</span>'."\r\n".
								'			</figcaption>'."\r\n".
								'		</figure>'."\r\n".
								'	</div>'."\r\n";
					}


					$htm .= '	</div>'."\r\n".
							'	<a href="#" class="editSaint" id="saint_' . $saint->saint_id . '" title="Edit Saint datas" data-datas=\'' . json_encode($saint) . '\'></a>'."\r\n".
							'</div>'."\r\n";

				}

			}
			
			return $htm;

		}


		public function getUserPrefs($usr){

			// Définition des variables
			$tab = $this->SQLTABLE;

			// Préparation et exécution de la requête
			$req = "SELECT `fav_display`, `fav_order` FROM `" . $tab->user . "` WHERE 1 AND `username` = :usr;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':usr', $usr, 	PDO::PARAM_STR);
			$sql->execute();
			$nfo = $sql->fetch(PDO::FETCH_OBJ);

			return $nfo;

		}



		public function listBoxJSON($usr){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$htm = '';

			$pref = $this->getUserPrefs($usr);

			switch ($pref->fav_order) {
				case 'level':
					$ord = "`" . $tab->saints . "`.`rank` ASC, `" . $tab->boxes . "`.`level` DESC";
					break;

				case 'alpha':
					$ord = "`" . $tab->saints . "`.`rank` ASC, `fullname` ASC";
					break;

				case 'ingame':
				default:
					$ord = "`" . $tab->saints . "`.`box_position` ASC";
					break;
			}

			// Préparation et exécution de la requête
			$req = "SELECT `" . $tab->boxes . "`.`id` AS `uid_saint`, `" . $tab->boxes . "`.`level`, `" . $tab->boxes . "`.`stars`, `" . $tab->boxes . "`.`awaken`, `" . $tab->boxes . "`.`reworked`, `" . $tab->boxes . "`.`starwilled`, 
						   `" . $tab->boxes . "`.`friendship`, `" . $tab->boxes . "`.`skill_1`, `" . $tab->boxes . "`.`skill_2`, `" . $tab->boxes . "`.`skill_3`, `" . $tab->boxes . "`.`skill_4`, `" . $tab->boxes . "`.`eighth`, `" . $tab->boxes . "`.`id_skin`, 
						   `" . $tab->saints . "`.`id` AS `saint_id`, `" . $tab->saints . "`.`icon`, `" . $tab->saints . "`.`large_icon`, `" . $tab->saints . "`.`name`, `" . $tab->saints . "`.`awakenable`,  `" . $tab->saints . "`.`eighth_ready`, 
						   `" . $tab->saints . "`.`card_bg_2stars`, `" . $tab->saints . "`.`card_bg_3stars`, `" . $tab->saints . "`.`card_bg_4stars`, 
						   `" . $tab->saints . "`.`card_bg_5stars`, `" . $tab->saints . "`.`card_bg_6stars`, 
						   TRIM(CONCAT(`" . $tab->saints . "`.`name`, ' ', `" . $tab->saints . "`.`particle`, `" . $tab->saints . "`.`zodiac`)) AS `fullname`, `" . $tab->saints . "`.`in_starwill`, `" . $tab->saints . "`.`starwill`, 
						   `" . $tab->saints . "`.`id`, `" . $tab->saints . "`.`rank`, `" . $tab->saints . "`.`rework_cloth`, `" . $tab->saints . "`.`rework_part_name`, `" . $tab->saints . "`.`rework_part_icon`, `" . $tab->saints . "`.`max_skill`, `" . $tab->saints . "`.`max_skill_rc`, `" . $tab->saints . "`.`box_position`
					FROM `" . $tab->boxes . "`, `" . $tab->saints . "` 
					WHERE 1 AND `" . $tab->boxes . "`.`user` = :usr AND `" . $tab->boxes . "`.`id_saint` = `" . $tab->saints . "`.`id`
					ORDER BY " . $ord . ";";
					// ORDER BY `" . $tab->saints . "`.`box_position` DESC LIMIT 1,6;";
					// ORDER BY `" . $tab->saints . "`.`rank` ASC, `" . $tab->boxes . "`.`level` DESC, `" . $tab->boxes . "`.`reworked` DESC, `" . $tab->saints . "`.`name` ASC;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':usr', $usr, 	PDO::PARAM_STR);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);

			foreach ($nfo as $saint) {

				// Mise en forme des skills pour le personnage en cours
				if (($saint->skill_1 + $saint->skill_2 + $saint->skill_3 + $saint->skill_4) == 0) {
					$skills = 'n/a';
				} else {
					$skills = $saint->skill_1;
					if (isset($saint->max_skill{1})) { $skills .= $saint->skill_2; }
					if (isset($saint->max_skill{2})) { $skills .= $saint->skill_3; }
					if (isset($saint->max_skill{3})) { $skills .= $saint->skill_4; }
				}
				$saint->current_skills = $skills;

				// Vérification si le personnage est maxxé
				$show_maxed_picto = false;
				$fully_maxed = $maxed_picto = '';
				if ($saint->eighth == '6666' && $saint->friendship == 10) {
					if ($saint->reworked == 1) {
						if ($saint->max_skill_rc == $skills) {
							$fully_maxed = 'maxedOut';
							$maxed_picto = '<img src="assets/img/icons/maxed.png" class="maxed" alt="Maxed out saint!!" title="Maxed out saint!!">';
							$show_maxed_picto = true;
						}
					} else {
						if ($saint->max_skill == $skills) {
							$fully_maxed = 'maxedOut';
							$maxed_picto = '<img src="assets/img/icons/maxed.png" class="maxed" alt="Maxed out saint!!" title="Maxed out saint!!">';
							$show_maxed_picto = true;
						}
					}
				}
				$saint->show_maxed_picto = $show_maxed_picto;

				// Mise en place des classes pour le CSS et les tris
				$saint->classes = array();
				array_push($saint->classes, $fully_maxed);
				array_push($saint->classes, 'rank_' . strtolower($this->RANKS[$saint->rank]));
				array_push($saint->classes, 'star_' . $saint->stars);
				array_push($saint->classes, 'friendship_' . $saint->friendship);
				array_push($saint->classes, 'level_' . $saint->level);
				array_push($saint->classes, (!empty($saint->starwill) ? 'starwill_' . $this->slugify($saint->starwill) : ''));
				array_push($saint->classes, ($saint->eighth == '6666' ? 'eight_maxed' : ''));
				array_push($saint->classes, ($saint->awakenable == 1 ? ($saint->awaken == '1' ? 'awakened' : 'not_awakened') : ''));
				array_push($saint->classes, ($saint->rework_cloth == 1 ? ($saint->reworked == 1 ? 'reworked' : 'not_reworked') : ''));

				// Mise en place de la skin pour le personnage
				$saint->avatar = $saint->icon;
				$saint->large_avatar = $saint->large_icon;
				$skn = $this->getSaintSkins($saint->saint_id);
				$saint->skins = $skn;

				if ($saint->id_skin != '0') {
					$icon = $this->getSkin($saint->id_skin);
					$saint->avatar = $icon->icon;
					$saint->large_avatar = $icon->large_icon;
				}

				if ($saint->rank < 3) {
					$saint->assault = $this->getAssaultPointBySaint($saint->rank, $skills);
					// $saint->assault = $this->getAssault($saint);
				}

				$saint->starwill_slug = $this->slugify($saint->starwill);

				$saint->skill_awk = $this->getSaintSkillsInfo($saint->saint_id, 'awaken');
				$saint->skill_rwk = $this->getSaintSkillsInfo($saint->saint_id, 'rework');

				$saint->skill_tome = $this->calcSkillTomes($saint);

				/*
				$saint->fullname_slug = $this->slugit($saint->fullname) . ' - test 7';

				$saint->fullskills = '';
				if (($saint->skill_1 + $saint->skill_2 + $saint->skill_3 + $saint->skill_4) == 0) {
					$saint->fullskills = 'n/a';
				} else {
					$saint->fullskills = $saint->skill_1;
					if (isset($saint->max_skill{1})) {
						$saint->fullskills .= $saint->skill_2;
					}
					if (isset($saint->max_skill{2})) {
						$saint->fullskills .= $saint->skill_3;
					}
					if (isset($saint->max_skill{3})) {
						$saint->fullskills .= $saint->skill_4;
					}
				}



				$skl = $this->getSaintSkills($saint->saint_id);
				$saint->skills = $skl;
				$saint->saint_skills = $skl;

				$saint->fully_maxed = '';
				if ($saint->eighth == '6666' && $saint->friendship == 10) {
					if ($saint->reworked == 1) {
						if ($saint->max_skill_rc == $saint->fullskills) {
							$saint->fully_maxed = 'maxedOut';
						}
					} else {
						if ($saint->max_skill == $saint->fullskills) {
							$saint->fully_maxed = 'maxedOut';
						}
					}
				}
				
				$saint->skills_json = $this->getSkillsJSON($saint);
				*/

				$skl = $this->getSaintSkills($saint->saint_id);
				$saint->skills = $skl;

				$saint->datas_skills = array();
				for ($s = 0; $s < strlen($saint->max_skill); $s++) {
					$sk = ($s + 1);
					$ssk = 'skill_' . $sk;
					$saint->datas_skills[$sk] = array(
						'temp' => $saint->skills->$sk->cost_rework,
						'picto' => (($saint->reworked == 1 && $saint->skills->$sk->icon_rework != '') ? $saint->skills->$sk->icon_rework : $saint->skills->$sk->icon),
						'name'  => (($saint->reworked == 1 && $saint->skills->$sk->name_rework != '') ? $saint->skills->$sk->name_rework : $saint->skills->$sk->name), 
						// 'cost'  => (($saint->reworked == 1 && $saint->skills->$sk->cost_rework != '') ? ($saint->skills->$sk->cost_rework == 'P' ? '' : $saint->skills->$sk->cost_rework) : ($saint->skills->$sk->cost == 'P' ? '' : $saint->skills->$sk->cost)), 
						'cost'  => (($saint->reworked == 1 && $saint->skills->$sk->cost_rework != '') ? ($saint->skills->$sk->cost_rework == 'P' ? 'P' : $saint->skills->$sk->cost_rework) : ($saint->skills->$sk->cost == 'P' ? 'P' : $saint->skills->$sk->cost)), 
						'level' => $saint->$ssk
					);
				}





			}
			

			return json_encode($nfo);

		}


		public function calcSkillTomes($saint){

			$nb_tomes = 0;
			$needs = array('0' => 0, '1' => 4, '2' => 7, '3' => 9, '4' => 10);

			// Préparation des skills pour comparaison
			$max_skills = $saint->max_skill;
			if ($saint->rework_cloth == 1) {
				$max_skills = $saint->max_skill_rc;
			}

			// $nb_tomes = 'max›'.$max_skills{0}.' // cur›'.$saint->current_skills{0}.' --- ';

			for ($i=0; $i < strlen($max_skills); $i++) { 
				if (isset($needs[($max_skills{$i} - $saint->current_skills{$i})])) {
			 		$nb_tomes = $nb_tomes + $needs[($max_skills{$i} - $saint->current_skills{$i})];
				}
			}

			// Si c'est un SS ou un EX, on double le nombre nécessaire
			if ($saint->rank < 2) {
				$nb_tomes = $nb_tomes * 2;
			}

			return $nb_tomes;

		}


		public function getSkillsJSON($saint){

			$skills = array();

			foreach ($saint->skills as $key => $skill) {
				if (is_numeric($key)) {
					if ($saint->reworked == 1 && $skill->rework == 1) {
						$skills['skill_' . $key] = array('position' => $key, 'icon' => $skill->icon_rework, 'cost' => $skill->cost_rework, 'name' => $skill->name_rework);
					} else {
						$skills['skill_' . $key] = array('position' => $key, 'icon' => $skill->icon, 'cost' => $skill->cost, 'name' => $skill->name);
					}
				}
			}

			return $skills;

		}


		public function getSkin($uid){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$skl = new stdClass();
			$s = 1;

			// Préparation et exécution de la requête
			$req = "SELECT `icon`, `large_icon` FROM `" . $tab->skins . "` 
					WHERE 1 AND `id` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $uid, 	PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetch(PDO::FETCH_OBJ);

			return $nfo;

		}


		public function getSaintSkillsInfo($uid, $fld){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$skl = new stdClass();
			$s = 1;

			// Préparation et exécution de la requête
			$req = "SELECT `position` FROM `" . $tab->skills . "` 
					WHERE 1 AND `id_saint` = :uid AND `" . $fld . "` = 1;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $uid, 	PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetch(PDO::FETCH_OBJ);

			if ($nfo !== false) {
				return $nfo->position;
			}

		}


		public function getSaintSkills($uid){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$skl = new stdClass();
			$s = 1;

			// Préparation et exécution de la requête
			$req = "SELECT `position`, `icon`, `icon_rework`, `cost`, `cost_rework`, `name`, `name_rework`, `rework`, `awaken`
					FROM `" . $tab->skills . "` 
					WHERE 1 AND `id_saint` = :uid
					ORDER BY `position` ASC;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $uid, 	PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);

			foreach ($nfo as $skill) {
				$skl->$s = $skill;
				if ($skill->awaken == 1) {
					$skl->awk = $skill;
				}
				if ($skill->rework == 1) {
					$skl->rwk = $skill;
				}
				$s++;
			}

			return $skl;

		}


		public function getSaintSkins($uid){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$skl = new stdClass();
			$s = 1;

			// Préparation et exécution de la requête
			$req = "SELECT `id`, `name`, `icon`
					FROM `" . $tab->skins . "` 
					WHERE 1 AND `id_saint` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $uid, 	PDO::PARAM_INT);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);

			return $nfo;

		}


		//## [  ] 
		public function getAllSaints() {

			// Définition des variables
			$tab = $this->SQLTABLE;

			// Préparation et exécution de la requête
			$req = "SELECT `id`, `icon`, `name`, TRIM(CONCAT(`name`, `particle`, `zodiac`)) AS `fullname`, `rank` FROM `" . $tab->saints . "` 
					WHERE 1 AND `on_global` = 1 
					ORDER BY `rank` ASC, `name` ASC;";
			$sql = DB::cnx()->prepare($req);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);

			return $nfo;

		}


		public static function slugit($text) {

			// transliterate
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

			// lowercase
			$text = strtolower($text);

			return $text;

		}

		public static function slugify($text) {
			// replace non letter or digits by -
			$text = preg_replace('~[^\pL\d]+~u', '-', $text);

			// transliterate
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

			// remove unwanted characters
			$text = preg_replace('~[^-\w]+~', '', $text);

			// trim
			$text = trim($text, '-');

			// remove duplicate -
			$text = preg_replace('~-+~', '-', $text);

			// lowercase
			$text = strtolower($text);

			if (empty($text)) {
			return 'n-a';
			}

			return $text;
		}


	}
