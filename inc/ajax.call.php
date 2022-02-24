<?php

	if (isset($_POST)){

		include 'global.php';

		// Choix de la méthode à utilister en fonction de la section
		switch ($_POST['action']) {
			
			case 'add.studs': 
				$datas = $students->createStudent($_POST);
				break;
			
			case 'upd.studs': 
				$datas = $students->updateStudent($_POST);
				break;
			
			case 'del.studs': 
				$datas = $students->deleteStudent($_POST);
				break;
			
			case 'spk.studs': 
				$datas = $students->chosenStudent($_POST);
				break;
			
		}

	}

	echo json_encode($datas);
