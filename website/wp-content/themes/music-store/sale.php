<?php

	/**
	 * Template Name: Sale
	 * 
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 * 
	 * @package Music Store
	 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="title">
				<?php $website->createWebsite("SALE"); ?>
			</div>
			
			<?php
			
			$username = $_SESSION["username"];
			
			$sql = "SELECT type FROM users WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			
			if (($row["type"] == "professional_musician") && (isset($username))) {
				
				echo '

					<form class="form" action="http://127.0.0.1/index.php/store/" method="POST">
						<fieldset class="fieldset">
							<legend class="legend">Sale</legend>
							<div class="field">
								<label class="label" for="name">*Name</label>
								<input class="input" type="text" name="name" id="name" />
							</div>
							<div class="field">
								<label class="label" for="description">*Description</label>
								<input class="input" type="text" name="description"/>
							</div>
							<div class="field">
								<label class="label" for="price">*Price</label>
								<input class="input" type="text" name="price" />
							</div>
							<div class="field">
								<label class="label" for="weight">*Weight</label>
								<input class="input" type="text" name="weight" />
							</div>
							<div class="field">
								<label class="label" for="photo">Photo</label>
								<input class="input" type="text" name="photo" />
							</div>
							<fieldset class="fieldset" style="margin: 10px 0px 20px 0px">
								<legend>*Type</legend>
								<div class="field">
									<label class="label" for="school_instrument">School instrument</label>
									<input class="input" type="radio" name="type" value="school_instrument" />
								</div>
								<div class="field">
									<label class="label" for="professional_instrument">Professional instrument</label>
									<input class="input" type="radio" name="type" value="professional_instrument" />
								</div>
							</fieldset>
							<div class="field">
								<label class="label" for="discount">Discount</label>
								<input class="input" type="text" name="discount" />
							</div>
							<fieldset class="fieldset" style="margin: 10px 0px 20px 0px">
								<legend>Level</legend>
								<div class="field">
									<label class="label" for="beginner">Beginner</label>
									<input id="unchecked" class="input" type="radio" name="level" value="beginner"/>
								</div>
								<div class="field">
									<label class="label" for="intermediate">Intermediate</label>
									<input class="input" type="radio" name="level" value="intermediate" />
								</div>
								<div class="field">
									<label class="label" for="advanced">Advanced</label>
									<input class="input" type="radio" name="level" value="advanced" />
								</div>
							</fieldset>
							<input class="submit" name="sell" value="Sell" type="submit" />
						</fieldset>
					</form>';
					
				} else {
					echo "<div class='div'>Error: you can't sell</div>";
				}
				
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
