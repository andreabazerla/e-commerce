<?php

	/**
	 * Template Name: Home
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Music Store
	 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="title">
				<?php $website->createWebsite("HOME"); ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
