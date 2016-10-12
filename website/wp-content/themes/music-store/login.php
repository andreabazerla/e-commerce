<?php

	/**
	 * Template Name: Login
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Music Store
	 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="title">
				<?php $website->createWebsite("LOGIN"); ?>
			</div>

			<form class="form" action="http://127.0.0.1/index.php/profile/" method="POST">
				<fieldset class="fieldset">
					<legend class="legend">Login</legend>
					<div class="field">
						<label class="label" for="username">Username</label>
						<input class="input" type="text" name="username" id="username" />
					</div>
					<div class="field">
						<label class="label" for="password">Password</label>
						<input class="input" type="password" name="password" id="password" />
					</div>
					<input class="submit" name="login" value="Login" type="submit" />
				</fieldset>
			</form>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
