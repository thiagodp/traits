<?php
namespace phputil\traits;

/**
 *  Allows the use of getXXX methods, where XXX is the name of an
 *  attribute in camelCase.
 *  
 *  Example:
 *  
 *  	class MyClass {
 *  		use GetterBuilder;
 *  		private $name = '';
 *  		private $description = '';
 *  		function __construct( $name, $description ) {
 *  			$this->name = $name;
 *  			$this->description = $description;
 *  		}
 *  	}
 *  
 *  	$obj = new MyClass( 'Bob', 'I am Bob' );
 *  	echo $obj->getName(); // Bob
 *  	echo $obj->getDescription(); // I am Bob
 *  
 *  @author	Thiago Delgado Pinto
 */
trait GetterBuilder {
	
	use CallBasedMethodBuilder {
		_buildMethods as private;
	}
	
	/**
	 *  getXXX(), where XXX is an attribute.
	 *  
	 *  @return mixed
	 */
	function __call( $name, $args ) {
		$chainableOptions = array( 'get' => false );
		return $this->_buildMethods( $name, $args, $chainableOptions );
	}	
	
}

?>