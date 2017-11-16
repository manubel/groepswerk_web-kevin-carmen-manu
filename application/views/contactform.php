<?php echo validation_errors(); ?>

<?php echo form_open('contacts/create'); ?>

<h5>Name</h5>
<input type="text" name="name" value="" size="50" />

<h5>Email</h5>
<input type="text" name="email" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>
