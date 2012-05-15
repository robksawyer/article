<?php
App::uses('Publication', 'Model');

/**
 * Publication Test Case
 *
 */
class PublicationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.publication', 'app.work');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Publication = ClassRegistry::init('Publication');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Publication);

		parent::tearDown();
	}

}
