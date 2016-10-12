<?php

	use PHPUnit\Framework\TestCase;

	class storeTest extends TestCase {
		
		public function testStoreCreation() {
			
			global $conn, $store;
			
			$id = 0;
			
			$store = new Store;
			$store = $store->createStore();
			
			foreach ($store as $instrument) {
				$id++;
				$this->assertEquals($id, $instrument[0]);
			}
							
		}
		
	}

?>
