<?php
namespace phputil\traits;

/**
 *  Allows the use of chainable withXXX methods, where XXX is the name
 *  of an attribute in camelCase.
 *  
 *  Example:
 *  
 *  	class MyClass {
 *  		use WithBuilder;
 *  		public $name = '';
 *  		public $description = '';
 *  	}
 *  
 *  	$obj = ( new MyClass() )->withName( 'Bob' )->withDescription( 'I am Bob' );
 *  	echo $obj->name; // Bob
 *  	echo $obj->description; // I am Bob
 *  
 *  @author	Thiago Delgado Pinto
 */
trait WithBuilder {
	
	use CallBasedMethodBuilder {
		_buildMethods as private;
	}
	
	/**
	 *  withXXX( $value ), where XXX is an attribute.
	 *  
	 *  @param mixed $value	Value to be set.
	 *  @return object		Reference to $this.
	 */
	function __call( $name, $args ) {
		$chainableOptions = array( 'with' => true );
		return $this->_buildMethods( $name, $args, $chainableOptions );
	}	
	
}

?>