<?php

	class Students {

		public function __construct(){
		
			$this->SQLTABLE = new stdClass();
			$this->SQLTABLE->studs 	= 'wcs_students';

		}


		//## [OK] LIST STUDENTS FROM DB
		public function listNamesJSON(){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$htm = '';

			// Préparation et exécution de la requête
			$req = "SELECT  `id`, `first_name`, `last_name`, `speech_count`, `stamp_last_speech`
					FROM `" . $tab->studs . "` 
					WHERE 1 AND `display` = 1 AND `stamp_delete` = '0000-00-00 00:00:00'
					ORDER BY `stamp_insert` ASC;";
			$sql = DB::cnx()->prepare($req);
			$sql->execute();
			$nfo = $sql->fetchAll(PDO::FETCH_OBJ);

			return json_encode($nfo);

		}


		//## [OK] INSERT STUDENT IN DB
		public function createStudent($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;

			// Ajout du tout dans la base de données
			$req = "INSERT INTO `" . $tab->studs . "` 
					(`first_name`, `last_name`, `display`, `stamp_insert`) 
					VALUES (:pre, :nom, 1, NOW());";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':pre', $datas['pre'], 	PDO::PARAM_STR);
			$sql->bindParam(':nom', $datas['nom'], 	PDO::PARAM_STR);
			$sql->execute();
			$sql->closeCursor();

			return $this->listNamesJSON();

		}


		//## [OK] INCREMENT VALUE OF SPEECH COUNT IN DB
		public function chosenStudent($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$htm = '';

			// Préparation et exécution de la requête
			$req = "UPDATE `" . $tab->studs . "` 
					SET `speech_count` = `speech_count` + 1, `stamp_last_speech` = NOW()
					WHERE 1 AND `id` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $datas['uid'], 	PDO::PARAM_INT);
			$sql->execute();
			$sql->closeCursor();
			
			return $this->listNamesJSON();

		}


		//## [OK] DELETE STUDENT IN DB
		public function deleteStudent($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$htm = '';

			// Préparation et exécution de la requête
			$req = "UPDATE `" . $tab->studs . "` 
					SET `display` = 0, `stamp_delete` = NOW()
					WHERE 1 AND `id` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':uid', $datas['uid'], 	PDO::PARAM_INT);
			$sql->execute();
			$sql->closeCursor();
			
			return $this->listNamesJSON();

		}


		//## [OK] UPDATE STUDENT IN DB
		public function updateStudent($datas){

			// Définition des variables
			$tab = $this->SQLTABLE;
			$htm = '';

			// Préparation et exécution de la requête
			$req = "UPDATE `" . $tab->studs . "` 
					SET `first_name` = :pre, `last_name` = :nom, `stamp_last_edit` = NOW()
					WHERE 1 AND `id` = :uid;";
			$sql = DB::cnx()->prepare($req);
			$sql->bindParam(':pre', $datas['pre'], 	PDO::PARAM_STR);
			$sql->bindParam(':nom', $datas['nom'], 	PDO::PARAM_STR);
			$sql->bindParam(':uid', $datas['uid'], 	PDO::PARAM_INT);
			$sql->execute();
			$sql->closeCursor();
			
			return $this->listNamesJSON();

		}

	}