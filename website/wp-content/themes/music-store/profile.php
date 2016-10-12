<?php

  /**
   * Template Name: Profile
   *
   * @link https://codex.wordpress.org/Template_Hierarchy
   *
   * @package Music Store
   */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <div class="title">
        <?php $website->createWebsite("PROFILE"); ?>
      </div>
      
      <form class="form" action="http://127.0.0.1/index.php/profile/" method="POST">
				<fieldset class="fieldset">
					<legend class="legend">Profile</legend>

				<?php

						$username = $_SESSION["username"];

						if (isset($username)) {

							$customer = (new Profile)->getProfile($username);

							$firstname = $customer[0];
							$lastname = $customer[1];
							$fc = $customer[2];
							$city = $customer[3];
							$phone = $customer[4];
							$mobile = $customer[5];
							$type = $customer[6];
						
							echo "<p>Firstname: " . $firstname . "</p>";
							echo "<p>Lastname: " . $lastname . "</p>";
							echo "<p>FC: " . $fc . "</p>";
							echo "<p>City: " . $city . "</p>";
							echo "<p>Phone: " . $phone . "</p>";
							echo "<p>Mobile: " . $mobile . "</p>";
							echo "<p>Type: " . $type . "</p>";
						
					} else {
						echo "Error: you are not login, please login or signup";
					}

				?>
				
				</fieldset>
      </form>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
