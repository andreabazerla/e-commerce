<?php

	/**
	 * Template Name: Cart
	 * 
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 * 
	 * @package Music Store
	 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="title">
				<?php $website->createWebsite("CART"); ?>
			</div>
			
			<div class='div'>
				
				<?php

					$username = $_SESSION["username"];

					if (isset($username)) {

						$sql = "
							SELECT *
							FROM cart
							JOIN store
							ON cart.instrument = store.id
							WHERE cart.username = '$username';
						";

						$result = mysqli_query($conn, $sql);

						if (!$conn->query($sql)) {
							echo "Error: " . $conn->error;
						} else {
							if (mysqli_num_rows($result) != 0) {
								while($instrument = mysqli_fetch_array($result, MYSQLI_NUM)) {
										
										echo "<form class='item' action='http://127.0.0.1/index.php/cart/' method='POST'>";
											echo "<input type='hidden' name='instrument' value='$instrument[3]' />";
											echo "<input type='hidden' name='username' value='$username' />";
											echo "<p>Name: " . $instrument[5] . "</p>";
											echo "<p>Description: " . $instrument[6] . "</p>";
											echo "<p>Price: " . $instrument[7] . "</p>";
											echo "<p>Weight: " . $instrument[8] . "</p>";
											echo "<p>Photo: " . $instrument[9] . "</p>";
											echo "<p>Type: " . $instrument[10] . "</p>";
											echo "<p>Discount: " . $instrument[11] . "</p>";
											echo "<p>Level: " . $instrument[12] . "</p>";
											echo "<input class='submit' type='submit' name='delete' value='Delete' />";
										echo "</form>";

								}
							}
						}
						
					} else {
						echo "Error: you are not login, please login or signup";
					}

				?>
				
      </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
