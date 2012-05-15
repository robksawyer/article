<?php
App::uses('MediaType', 'Model');

/**
 * MediaType Test Case
 *
 */
class MediaTypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.media_type', 'app.work', 'app.artist', 'app.publication', 'app.upload');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MediaType = ClassRegistry::init('MediaType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MediaType);

		parent::tearDown();
	}

}
