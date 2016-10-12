<?php

	/**
	 * Template Name: Store
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Music Store
	 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="title">
				<?php $website->createWebsite("STORE"); ?>
			</div>

			<div class="div">
				<?php
				
					$store = new Store;
					$store = $store->createStore();
					
					foreach ($store as $instrument) {
						echo "<form class='item' action='http://127.0.0.1/index.php/item/' method='POST'>";
							echo "<input type='hidden' name='id' value='$instrument[0]' />";
							echo "<p>Name: " . $instrument[2] . "</p>";
							echo "<p>Price: €" . $instrument[4] . "</p>";
							echo "<p>Photo: " . $instrument[6] . "</p>";
							echo "<input class='submit' type='submit' value='Details' />";
						echo "</form>";
					}
					
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
