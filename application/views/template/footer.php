<footer class="container-fluid text-center">
	<p>&copy; Groepswerk Carmen - Kevin - Manu</p>
</footer>

<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/lodash.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<?php
if (isset($javascripts)) {
	foreach ($javascripts as $javascript) {
		echo "<script src=\"" . base_url($javascript) . "\"></script>";
	}
}
?>

</body>
</html>
