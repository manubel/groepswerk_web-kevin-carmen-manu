function getContacts() {
	fetch('http://192.168.33.22/groepwk/api/contacts')
		.then((res) => res.json())
		.then((data) => {
			let options = `
					<label for="contactsSelect">Choose a contact to remove</label>
							<select multiple class="form-control" id="contactsSelect" form="removeContactForm">
		`;
			data.forEach(function (contact) {
				options += `
					<option value="${contact.id}">${contact.naam}</option>
					
				`
			});
			options +=
				`
					</select>
				`;
			$("#contactsJavascript").html(options);
		});
}

function removeContact() {
	let selectElement = document.getElementById("contactsSelect");
	let selectedValue = selectElement.options[selectElement.selectedIndex].value;

	console.log(JSON.stringify({id:selectedValue}));

	fetch('http://192.168.33.22/groepwk/api/contacts', {
		method: 'DELETE',
		headers: {
			'Accept': 'application/json',
			'Content-type': 'application/json'
		},
		body: JSON.stringify({id: selectedValue})
	})
		.then((res) => {
			console.log(res.json())
		});
	window.location = "http://192.168.33.22/groepwk/contacts";
}

window.onload = getContacts();
