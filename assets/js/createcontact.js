function createContact() {
	let name = document.getElementById('name').value;
	let email = document.getElementById('email').value;

	if (name === "" || email === "") {
		alert("Didn't receive form details, please try again.");
		return false;
	}

	fetch('http://192.168.33.22/groepwk/api/contacts', {
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
	let re = /[a-zA-Z]{5,}/;
	return re.test(name);
}

function createContactValidator() {
	$("#emailError").text("");
	$("#nameError").text("");

	let email = $("#email").val();
	let name = $("#name").val();

	if (!validateName(name)){
		$("#nameError").text(name + " is not a valid name");
	} else if (!validateEmail(email)) {
		$("#emailError").text(email + " is not a valid email");
	} else {
		createContact();
		window.location = "http://192.168.33.22/groepwk/contacts";
	}
	return false;
}

$("#validateEmail").bind("click", createContactValidator);
