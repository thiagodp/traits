<?php
namespace phputil\traits;

/**
 *  Allows the use of getters, and chainable setters and withXXX methods,
 *  where XXX is the name of an attribute in camelCase.
 *  
 *  Example:
 *  
 *  	class MyClass {
 *  		use GetterSetterWithBuilder;
 *  		private $name = '';
 *  		private $description = '';
 *  	}
 *  
 *  	$obj = ( new MyClass() )->withName( 'Bob' )->setDescription( 'I am Bob' );
 *  	echo $obj->getName(); // Bob
 *  	echo $obj->getDescription(); // I am Bob
 *  	$obj->setName( 'Bob Dylan' );
 *  	echo $obj->getName(); // Bob Dylan
 *  
 *  @author	Thiago Delgado Pinto
 */
trait GetterSetterWithBuilder {
	
	use CallBasedMethodBuilder {
		_buildMethods as private;
	}
	
	/**
	 *  getXXX(), setXXX, or withXXX - where XXX is an attribute.
	 *  
	 *  @return mixed
	 */
	function __call( $name, $args ) {
		$chainableOptions = array( 'get' => false, 'set' => true, 'with' => true );
		return $this->_buildMethods( $name, $args, $chainableOptions );
	}	
	
}

?>