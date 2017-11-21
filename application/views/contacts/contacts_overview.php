<div class="container-fluid text-center">

	<div id="contacts-table">Loading data...</div>

	<a href="<?php echo site_url('contacts/create'); ?>" class="btn btn-default" role="button" data-toggle="tooltip"
		   title="New">
		<span class="fa fa-plus" aria-hidden="true"></span>
	</a>
	<a class="btn btn-default" role="button" data-toggle="tooltip"
	   title="Refresh" id="getContacts">
		<span class="fa fa-refresh" aria-hidden="true"></span>
	</a>
	<a href="<?php echo site_url('contacts/remove'); ?>"  class="btn btn-default" role="button" data-toggle="tooltip" title="Remove">
		<span class="fa fa-times" aria-hidden="true"></span>
	</a>

</div>
