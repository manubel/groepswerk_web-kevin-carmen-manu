function getContacts() {
	fetch('http://192.168.33.22/groepwk/api/contacts')
		.then((res) => res.json())
		.then((data) => {
			let table = `
				<table class="table table-striped table-responsive ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
				`;
			data.forEach(function (contact) {
				table += `
            <tr>
                <td>
                    <a href="${document.location}/${contact.id}">${contact.naam}</a>
                </td>
                <td>${contact.email}</td>
                <td>
                    <div class="btn-group">
                    <a href="${document.location}/update/${contact.id}"  class="btn btn-default" role="button" data-toggle="tooltip" title="Edit">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>
                    <a href="${document.location}/delete/${contact.id}"  class="btn btn-default" role="button" data-toggle="tooltip" title="Remove">
                        <span class="fa fa-times" aria-hidden="true"></span>
                    </a>
                    </div>
                </td>
            </tr>
          `;
			});
			table += `
						</tbody>
    					</table>
					`;
			document.getElementById('contacts-table').innerHTML = table;
		})
}

function createContact(e) {
	e.preventDefault();

	let name = document.getElementById('name').value;
	let email = document.getElementById('email').value;

	fetch('http://192.168.33.22/groepwk/api/contacts', {
		method: 'POST',
		headers: {
			'Accept': 'application/json',
			'Content-type': 'application/json'
		},
		body: JSON.stringify({name: name, email: email})
	})
		.then((res) => res.json())
		.then((data => console.log(data)))
}

const pathName = document.location.pathname;
if (pathName.endsWith("contacts") || pathName.endsWith("contacts/")) {
	window.onload = getContacts;
	document.getElementById('getContacts').addEventListener('click', getContacts);
}
if (document.getElementById('createContact') !== null) document.getElementById('createContact').addEventListener('submit', createContact);

console.log(document.location.pathname);
