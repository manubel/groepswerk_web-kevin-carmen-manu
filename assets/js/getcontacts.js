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

window.onload = getContacts;
document.getElementById('getContacts').addEventListener('click', getContacts);
