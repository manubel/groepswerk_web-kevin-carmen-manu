function getContacts() {
	let apiLink = window.location.href.replace("contacts", "api/contacts");

	fetch(apiLink)
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
                    <a href="#">${contact.naam}</a>
                </td>
                <td>${contact.email}</td>
                <td>
                    <div class="btn-group">
                    <a href="${document.location}/update/${contact.id}"  class="btn btn-default" role="button" data-toggle="tooltip" title="Edit" id="updateContact${+contact.id}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
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

			$("#contacts-table").html(table);
		})
}

window.onload = getContacts;
document.getElementById('getContacts').addEventListener('click', getContacts);
