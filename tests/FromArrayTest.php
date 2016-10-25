<?php
namespace phputil\traits\tests;

require_once 'vendor/autoload.php';

use \PHPUnit_Framework_TestCase;
use \phputil\traits\GetterBuilder;
use \phputil\traits\FromArray;

class DummyB {
	use GetterBuilder;
	use FromArray;
	
	private $id;
	protected $name;
	public $age;
	
	function toArray() {
		return array(
			'id' => $this->id,
			'name' => $this->name,
			'age' => $this->age
			);
	}
}

/**
 * Tests FromArray
 *
 * @author	Thiago Delgado Pinto
 */
class FromArrayTest extends PHPUnit_Framework_TestCase {
	
	function test_modify_all_attributes() {
		$map = array( 'id' => 10, 'name' => 'Bob', 'age' => 18 );
		$d = new DummyB();
		$d->fromArray( $map );
		$r = $d->toArray();
		
		$this->assertEquals( $map, $r );
	}

}

?>