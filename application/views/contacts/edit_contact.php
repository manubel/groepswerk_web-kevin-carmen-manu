<?php echo validation_errors(); ?>

<?php echo form_open('contacts/update/' . $contact->id); ?>
<div class="container-fluid">
	<form>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name" id="name" value="<?php echo $contact->naam; ?>" size="50"/>
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" id="email" value="<?php echo $contact->email; ?>"
			   size="50"/>
	</div>
	<div><input type="submit" value="Submit" class="btn btn-form"/></div>
	</form>
</div>
