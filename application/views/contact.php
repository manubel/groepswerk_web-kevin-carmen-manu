<?php echo validation_errors(); ?>

<?php echo form_open('contacts/update/'.$contact->id); ?>
<div class="container-fluid">
    <h5>Name</h5>
    <input type="text" name="name" id="name" value="<?php echo $contact->naam; ?>" size="50" />

    <h5>Email</h5>
    <input type="email" name="email" id="email" value="<?php echo $contact->email; ?>" size="50" />

    <div><input type="submit" value="Submit" /></div>

    </form>
</div>