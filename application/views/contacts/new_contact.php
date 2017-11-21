<div class="container-fluid">
	<!-- TODO form vervangen door input velden, geen form nodig bij gebruik javascript -->
	<form id="createContact">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" required class="form-control" name="name" id="name" value="" size="50" pattern="[a-zA-Z]{5,}"/>
			<small id="nameError" class="text-danger"></small>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email" value="" size="50" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
			<small id="emailError" class="text-danger"></small>
		</div>
		<div><input type="submit" value="Submit" class="btn btn-form" id="validateEmail"/></div>
	</form>
</div>
