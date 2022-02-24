<?php require_once 'inc/global.php'; ?>
<!--/                            _\\|//_
                                (` o-o ')
-------------------------------ooO-(_)-Ooo-----------------------------
                     Développement : Marc Grondin
                     contact@marc-grondin.com
                         +33 6 13 93 66 12
-----------------------------------------------------------------------
/-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Wild Code School - Random draws among students ♥</title>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

	<!-- Header section -->
	<header>
		<h1><span>Student Random Draw</span><img src="assets/img/random.png" alt="Student Random Draw" title="Student Random Draw" /></h1>
	</header>

	<!-- Main section -->
	<main>

		<button id="getRandom">
			<figure>
				<img src="assets/img/random.png" alt="Draw a student!" title="Draw a student!">
				<figcaption>Draw a student!</figcaption>
			</figure>
		</button>

		<section id="crew">

			<h2>
				<figure>
					<img src="assets/img/student.png" alt="Manage your students" title="Manage your students">
					<figcaption>Manage your students</figcaption>
				</figure>
			</h2>

			<!-- New member form -->
			<form class="new-member-form" id="newStudent">
				<div class="formCell">
					<label for="studentFirstName">First name<span class="req">*</span>: </label>
					<input id="studentFirstName" name="firstname" type="text" placeholder="Hubert" required="required" />
				</div>
				<div class="formCell">
					<label for="studentLastName">Last name<span class="req">*</span>: </label>
					<input id="studentLastName" name="lastname" type="text" placeholder="Bonisseur de La Bath" required="required" />
				</div>
				<div class="formCell formButn">
					<button type="submit">
						<figure>
							<img src="assets/img/save.png" alt="Save this student" title="Save this student">
							<figcaption>Save</figcaption>
						</figure>
					</button>
				</div>
			</form>

			<!-- Member list -->
			<h2>
				<figure>
					<figcaption>Students list</figcaption>
				</figure>
			</h2>
			<section class="member-list" id="students"></section>

		</section>

		<section id="talk">
			
			<!-- Speaker list -->
			<h2>
				<figure>
					<img src="assets/img/speaker.png" alt="List of speeches" title="List of speeches">
					<figcaption>List of speeches</figcaption>
				</figure>
			</h2>
			<section class="member-list" id="speakers">
				<div class="tableHeader">
					<div class="headCell headText"><span>First name</span></div>
					<div class="headCell headText"><span>Last name</span></div>
					<div class="headCell headDate"><span>Date</span></div>
					<div class="headCell headTime"><span>Time</span></div>
				</div>
			</section>

		</section>
	</main>

	<div id="chosenOne"></div>

	<footer>
		<p>Coded with love by Kamui Shirou ❤</p>
	</footer>

	<script>let students = <?php echo $students->listNamesJSON(); ?></script>
	<script src="assets/js/app.js" defer></script>

</body>
</html>