const baseurl = 'https://www.marc-grondin.com/wcs-drawstudents/';
const ajaxurl = baseurl + '/inc/ajax.call.php';
const container = document.querySelector('#students')

//## [OK] Initialisation de la liste des étudiants
listStudents()

//## [OK] Création du listing HTML des étudiants à partir du JSON
function listStudents() {
	container.innerHTML = `	<div class="tableHeader">
								<div class="headCell headText"><span>First name</span></div>
								<div class="headCell headText"><span>Last name</span></div>
								<div class="headCell headFlex"><span>Speeches count</span></div>
								<div class="headCell headActs"><span>Actions</span></div>
							</div>`

	students.forEach( student => {

		let studentRow = document.createElement('div')
			studentRow.setAttribute('id', 'member_row_' + student.id)
			studentRow.setAttribute('rel', student.id)
			studentRow.setAttribute('class', 'member-row')
			studentRow.setAttribute('data-json', JSON.stringify(student))

			studentRow.innerHTML = `	<form action="?" class="editStudent" id="editStudent_${student.id}" method="post" rel="${student.id}">
											<div class="member-cell member-txt"><input type="text" name="first_name" id="first_name_${student.id}" value="${student.first_name}"><label for="first_name_${student.id}">${student.first_name}</label></div>
											<div class="member-cell member-txt"><input type="text" name="last_name" id="last_name_${student.id}" value="${student.last_name}"><label for="last_name_${student.id}">${student.last_name}</label></div>
											<div class="member-cell member-num"><span>${student.speech_count}</span></div>
											<div class="member-cell member-action"><button class="edtStudent"><img src="assets/img/edit.png" alt="Edit ${student.first_name} ${student.last_name} informations" title="Edit ${student.first_name} ${student.last_name} informations"></button></div>
											<div class="member-cell member-action"><button class="delStudent"><img src="assets/img/delete.png" alt="Delete ${student.first_name} ${student.last_name} from list" title="Delete ${student.first_name} ${student.last_name} from list"></button></div>
											<div class="member-cell member-confirm">
												<button class="confirmDelete">Confirm Deletion</button>
												<button class="cancelDelete">Cancel</button>
											</div>
											<div class="member-cell member-valid">
												<button class="validButton">Valid</button>
												<button class="cancelButton">Cancel</button>
											</div>
										</form>
			`

		container.appendChild(studentRow)

	})

	initStudentActions()
	
}

//## [OK] Création du listing HTML des étudiant ayant parlé pour cette session
function listSpeakers(speaker) {
	let listSpeakers = document.querySelector('#speakers')

	let speakerRow = document.createElement('div')
		speakerRow.setAttribute('id', 'speaker_row_' + speaker.id)
		speakerRow.setAttribute('rel', speaker.id)
		speakerRow.setAttribute('class', 'member-row')
		speakerRow.setAttribute('data-json', JSON.stringify(speaker))

		speakerRow.innerHTML = `	<div class="member-cell member-txt">${speaker.first_name}</div>
									<div class="member-cell member-txt">${speaker.last_name}</div>
									<div class="member-cell member-dat"><span>${new Date(Date.now()).toLocaleString().split(',')[0]}</span></div>
									<div class="member-cell member-tim"><span>${new Date(Date.now()).toLocaleString().split(',')[1]}</span></div>
		`

	listSpeakers.appendChild(speakerRow)
	
}

//## [OK] Initialisation des actions sur les étudiants
function initStudentActions() {

	// Bouton de validation de modification d'un étudiant
	const btnsValid = [...container.querySelectorAll('.validButton')]
	btnsValid.forEach( btn => {
		btn.addEventListener('click', function(e){
			e.preventDefault()
			let uid = this.closest('form').getAttribute('rel')
			updateStudent(uid)
			return false
		}, false)
	})

	// Soumission du formulaire de modification d'un étudiant
	const frmsEdit = [...container.querySelectorAll('.editStudent')]
	frmsEdit.forEach( frm => {
		frm.addEventListener('submit', function(e){
			e.preventDefault()
			let uid = this.getAttribute('rel')
			updateStudent(uid)
			return false
		}, false)
	})

	// Confirmation de suppression d'un étudiant
	const btnsConfirm = [...container.querySelectorAll('.confirmDelete')]
	btnsConfirm.forEach( frm => {
		frm.addEventListener('click', function(e){
			e.preventDefault()
			let uid = this.closest('form').getAttribute('rel')
			deleteStudent(uid)
			return false
		}, false)
	})

	// Activation du formulaire de modification d'un étudiant
	const btnsEdit = [...container.querySelectorAll('.edtStudent')]
	btnsEdit.forEach( btn => {
		btn.addEventListener('click', function(e) {
			e.preventDefault()
			const frm = this.closest('form')
			frm.classList.add('active')
			return false
		}, false)
	})

	// Demande de confirmation de la suppression d'un étudiant
	const btnsDelete = [...container.querySelectorAll('.delStudent')]
	btnsDelete.forEach( btn => {
		btn.addEventListener('click', function(e) {
			e.preventDefault()
			const frm = this.closest('form')
			frm.classList.add('deletion')
			return false
		}, false)
	})

	// Annulation de la modification d'un étudiant
	const btnsCancel = [...container.querySelectorAll('.cancelButton')]
	btnsCancel.forEach( btn => {
		btn.addEventListener('click', function(e) {
			e.preventDefault()
			const frm = this.closest('form')
			frm.classList.remove('active')
			return false
		}, false)
	})

	// Annulation de la suppression d'un étudiant
	const btnsNoDelete = [...container.querySelectorAll('.cancelDelete')]
	btnsNoDelete.forEach( btn => {
		btn.addEventListener('click', function(e) {
			e.preventDefault()
			const frm = this.closest('form')
			frm.classList.remove('deletion')
			return false
		}, false)
	})

}

//## [OK] Modification d'un étudiant
function updateStudent(uid){

	// Prepare datas for insert
	let formData = new FormData()
		formData.append('action', 'upd.studs')
		formData.append('uid', uid)
		formData.append('pre', document.querySelector('#first_name_' + uid).value)
		formData.append('nom', document.querySelector('#last_name_' + uid).value)

	// Sending datas through AJAX Request
	const xhr = new XMLHttpRequest()
	xhr.open('POST', ajaxurl, true)
	xhr.onload = function () {
		if (xhr.status == 200) {

			const datas = JSON.parse(xhr.response)
			students = JSON.parse(datas)
			listStudents()

		} else {
			alert('Something went wrong…')
			return false
		}
	}
	xhr.send(formData)
	return false

}

//## [OK] Suppression d'un étudiant
function deleteStudent(uid){

	// Prepare datas for insert
	let formData = new FormData()
		formData.append('action', 'del.studs')
		formData.append('uid', uid)

	// Sending datas through AJAX Request
	const xhr = new XMLHttpRequest()
	xhr.open('POST', ajaxurl, true)
	xhr.onload = function () {
		if (xhr.status == 200) {

			const datas = JSON.parse(xhr.response)
			students = JSON.parse(datas)
			listStudents()

		} else {
			alert('Something went wrong…')
			return false
		}
	}
	xhr.send(formData)
	return false

}

//## [OK] Masquer automatiquement un objet après quelques secondes
function autohide(obj, tim) {
	setTimeout(() => {obj.classList.remove('show')}, (tim * 1000));
}

//## [OK] Action sur le bouton de récupération d'un étudiant au hasard
document.querySelector('#getRandom').addEventListener('click', function(e){
	e.preventDefault()

	// Récupération du nombre de speech le plus haut
	let maxSpeech = students.reduce((a, stud) => a = a > stud.speech_count ? a : stud.speech_count, 0)
	
	// Création du tableau associatif des étudiants 'les plus silencieux'
	let quietStudents = students.filter((stud) => stud.speech_count < maxSpeech)
	if (quietStudents.length == 0) { quietStudents = students }

	// Récupération aléatoire d'un étudiant parmi 'les plus silencieux'
	const student = quietStudents[Math.floor(Math.random()*quietStudents.length)];

	// Affichage de l'étudiant choisi
	let popin = document.querySelector('#chosenOne')
	popin.innerHTML = `<span>${student.first_name} ${student.last_name}</span>`
	popin.classList.add('show')
	autohide(popin, 3)

	// Incrémentation du nombre de fois qu'il a eu la parole
	let formData = new FormData()
		formData.append('action', 'spk.studs')
		formData.append('uid', student.id)

	// Sending datas through AJAX Request
	const xhr = new XMLHttpRequest()
	xhr.open('POST', ajaxurl, true)
	xhr.onload = function () {
		if (xhr.status == 200) {

			const datas = JSON.parse(xhr.response)
			students = JSON.parse(datas)
			listStudents()
			listSpeakers(student)

		} else {
			alert('Something went wrong…')
			return false
		}
	}
	xhr.send(formData)

	return false
})

//## [OK] Ajout d'un étudiant
document.querySelector('#newStudent').addEventListener('submit', function(e){
	e.preventDefault()

	// Prepare datas for insert
	let formData = new FormData()
		formData.append('action', 'add.studs')
		formData.append('pre', document.querySelector('#studentFirstName').value)
		formData.append('nom', document.querySelector('#studentLastName').value)

	// Sending datas through AJAX Request
	const xhr = new XMLHttpRequest()
	xhr.open('POST', ajaxurl, true)
	xhr.onload = function () {
		if (xhr.status == 200) {

			const datas = JSON.parse(xhr.response)
			students = JSON.parse(datas)
			listStudents()
			e.target.reset()

		} else {
			alert('Something went wrong…')
			return false
		}
	}
	xhr.send(formData)
	return false
})