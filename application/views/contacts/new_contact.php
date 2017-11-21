<div class="container-fluid">
	<div id="createContact">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" id="name"/>
			<small id="nameError" class="text-danger"></small>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email"/>
			<small id="emailError" class="text-danger"></small>
		</div>
		<div><input type="button" value="Submit" class="btn btn-form" id="validateEmail"/></div>
		<div class="row">
			<div class="col-lg-12 text-sm-center">
				<p><?php echo anchor('contacts', 'Terug naar overzicht'); ?></p>
			</div>
		</div>
	</div>
</div>
