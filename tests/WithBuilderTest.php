<?php
namespace phputil\traits\tests;

require_once 'vendor/autoload.php';

use \PHPUnit_Framework_TestCase;
use \phputil\traits\WithBuilder;

class Dummy {
	use WithBuilder;
	public $name;
}

/**
 * Tests WithBuilderTest.
 *
 * @author	Thiago Delgado Pinto
 */
class WithBuilderTest extends PHPUnit_Framework_TestCase {
	
	function test_can_modify_attributes() {
		$d = ( new Dummy() )->withName( 'Bob' );
		$this->assertEquals( 'Bob', $d->name );
	}

}

?>