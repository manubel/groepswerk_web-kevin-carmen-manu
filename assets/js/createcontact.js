function createContact(name, email) {
	let apiLink = window.location.href.replace("contacts/create", "api/contacts");

	fetch(apiLink, {
		method: 'POST',
		headers: {
			'Accept': 'application/json',
			'Content-type': 'application/json'
		},
		body: JSON.stringify({name: name, email: email})
	})
		.then((res) => {
			res.json();
			console.log(res.json())
		});
}

function validateEmail(email) {
	let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function validateName(name) {
	let re = /[a-zA-Z]{3,}/;
	return re.test(name);
}

function createContactValidator() {
	let email = $("#email").val();
	let name = $("#name").val();

	let errorPresent = false;

	if (!validateName(name)) {
		$("#nameError").text(name + " is not a valid name");
		errorPresent = true;
	}
	if (!validateEmail(email)) {
		$("#emailError").text(email + " is not a valid email");
		errorPresent = true;
	}
	if (!errorPresent){
		createContact(name, email);
		window.location = "http://192.168.33.22/groepwk/contacts";
	}

	return false;
}

$("#validateEmail").bind("click", createContactValidator);
