<div class="container-fluid">
	<form id="createContact" action="<?php echo site_url('contacts/create'); ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" id="name" value="" size="50"/>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email" value="" size="50"/>
		</div>
		<div><input type="submit" value="Submit" class="btn btn-form"/></div>
	</form>
</div>
