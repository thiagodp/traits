<?php
namespace phputil\traits\tests;

require_once 'vendor/autoload.php';

use \PHPUnit_Framework_TestCase;
use \phputil\traits\GetterSetterWithBuilder;

class A {
	use GetterSetterWithBuilder;
	public $name;
	private $description;
}

/**
 * Tests GetterSetterWithBuilder.
 *
 * @author	Thiago Delgado Pinto
 */
class GetterSetterWithBuilderTest extends PHPUnit_Framework_TestCase {
	
	function test_can_modify_attributes() {
		$a = ( new A() )->withName( 'Bob' )->setDescription( 'I am Bob' );
		$this->assertEquals( 'Bob', $a->name );
		$this->assertEquals( 'Bob', $a->getName() );
		$this->assertEquals( 'I am Bob', $a->getDescription() );
	}

}

?>