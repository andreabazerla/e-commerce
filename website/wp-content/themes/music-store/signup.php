<?php

	/**
	 * Template Name: Signup
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Music Store
	 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="title">
				<?php $website->createWebsite("SIGNUP"); ?>
			</div>

			<form class="form" action="http://127.0.0.1/index.php/login/" method="POST">
				<fieldset class="fieldset">
					<legend class="legend">Signup</legend>
					<div class="field">
						<label class="label" for="firstname">*Firstname</label>
						<input class="input" type="text" name="firstname"/>
					</div>
					<div class="field">
						<label class="label" for="lastname">*Lastname</label>
						<input class="input" type="text" name="lastname"/>
					</div>
					<div class="field">
						<label class="label" for="fc">*FC</label>
						<input class="input" type="text" name="fc" />
					</div>
					<div class="field">
						<label class="label" for="city">*City</label>
						<input class="input" type="text" name="city" />
					</div>
					<div class="field">
						<label class="label" for="phone">*Phone</label>
						<input class="input" type="text" name="phone" />
					</div>
					<div class="field">
						<label class="label" for="mobile">Mobile</label>
						<input class="input" type="text" name="mobile" />
					</div>
					<fieldset class="fieldset" style="margin: 10px 0px 20px 0px">
						<legend>*Type</legend>
						<div class="field">
							<label class="label" for="occasional_customer">Occasional customer</label>
							<input class="input" type="radio" name="type" value="occasional_customer" checked />
						</div>
						<div class="field">
							<label class="label" for="school_owner">School owner</label>
							<input class="input" type="radio" name="type" value="school_owner" />
						</div>
						<div class="field">
							<label class="label" for="professional_musician">Professional musician</label>
							<input class="input" type="radio" name="type" value="professional_musician"/>
						</div>
					</fieldset>
					<div class="field">
						<label class="label" for="username">*Username</label>
						<input class="input" type="text" name="username" />
					</div>
					<div class="field">
						<label class="label" for="password">*Password</label>
						<input class="input" type="password" name="password" />
					</div>
					<input class="submit" name="signup" value="Signup" type="submit" />
				</fieldset>
			</form>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
