<?php

	use PHPUnit\Framework\TestCase;
	
	class pageTest extends TestCase {
		
		public function testPagesCreation() {
			
			$pagesArray = array();
			$pagesArray = ["HOME", "PROFILE", "SEARCH", "STORE", "SALE", "CART", "SIGNUP", "LOGIN"];
			
			foreach ($pagesArray as $pageName) {
				
				$newWebsite = new WebsiteFactory;
				$pageTitle = print $newWebsite->createWebsite($pageName);
				$this->assertEquals(print ucfirst(strtolower($pageName)), $pageTitle);
				
			}
				
		}
		
	}

?>
