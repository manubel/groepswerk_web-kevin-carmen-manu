function getContacts() {
	let apiLink = window.location.href.replace("contacts/remove", "api/contacts");
	fetch(apiLink)
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

	let apiLink = window.location.href.replace("contacts/remove", "api/contacts");

	fetch(apiLink, {
		method: 'DELETE',
		headers: {
			'Accept': 'application/json',
			'Content-type': 'application/json'
		},
		body: JSON.stringify({id: selectedValue})
	})
		.then((res) => {
        let apiLink = window.location.href.replace("contacts/remove", "contacts");
        window.location = apiLink;
		});

}

window.onload = getContacts();
