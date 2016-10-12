<?php

	/**
	 * Template Name: Item
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Music Store
	 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="title">
				<?php $website->createWebsite("ITEM"); ?>
			</div>
			
			<div class='div'>
				<?php
					
					$username = $_SESSION["username"];
					
					$id = $_POST["id"];
					
					$store = new Store;
					$store->addInstrument($id);
					$instrument = $store->getInstrument($id);
					
							echo "<form class='item' action='http://127.0.0.1/index.php/store/' method='POST'>";
								echo "<input type='hidden' name='instrument' value='$instrument[0]' />";
								echo "<input type='hidden' name='username' value='$username' />";
								echo "<p>Name: " . $instrument[2] . "</p>";
								echo "<p>Description: " . $instrument[3] . "</p>";
								echo "<p>Price: €" . $instrument[4] . "</p>";
								echo "<p>Weight: " . $instrument[5] . "Kg</p>";
								echo "<p>Photo: " . $instrument[6] . "</p>";
								echo "<p>Type: " . $instrument[7] . "</p>";
								echo "<p>Discount: " . $instrument[8] . "</p>";
								echo "<p>Level: " . $instrument[9] . "</p>";
								echo "<input class='submit' type='submit' name='buy' value='Buy' />";
							echo "</form>";
					
				?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
