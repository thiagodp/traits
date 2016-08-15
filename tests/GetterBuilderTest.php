<?php
namespace phputil\traits\tests;

require_once 'vendor/autoload.php';

use \PHPUnit_Framework_TestCase;
use \phputil\traits\GetterBuilder;

class Immutable {
	use GetterBuilder;
	private $name;
	function __construct( $name ) { 
		$this->name = $name;
	}
}

/**
 * Tests GetterBuilder.
 *
 * @author	Thiago Delgado Pinto
 */
class GetterBuilderTest extends PHPUnit_Framework_TestCase {
	
	function test_returns_private_attribute() {
		$i = new Immutable( 'Bob' );
		$this->assertEquals( 'Bob', $i->getName() );
	}

}

?>