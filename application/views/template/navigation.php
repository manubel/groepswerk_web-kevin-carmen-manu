<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
	<a class="navbar-brand" href="#">Groepswerk</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mijn-navbar"
			aria-controls="mijn-navbar" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="mijn-navbar">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php echo active_link('home'); ?>">
				<a class="nav-link" href="<?php echo site_url('home'); ?>">Home <span
						class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item <?php echo active_link('about'); ?>">
				<a class="nav-link" href="<?php echo site_url('about'); ?>">About</a>
			</li>
			<li class="nav-item <?php echo active_link('contacts'); ?>">
				<a class="nav-link" href="<?php echo site_url('contacts'); ?>">Contacts</a>
			</li>
		</ul>
	</div>
</nav>
