<?php
namespace phputil\traits;

/**
 *  Adds the method fromArray.
 *  
 *  @author	Thiago Delgado Pinto
 */
trait FromArray {
	
	/**
	 * Copy values from an array, *not* recursively.
	 *
	 * @param array $map	Map of values.
	 * @return object		Return $this;
	 */
	function fromArray( array $map ) {
		$vars = get_object_vars( $this ); // all but static ones
		foreach ( $map as $attr => $value ) {
			if ( array_key_exists( $attr, $vars ) ) { // matches the attribute name
				$this->{ $attr } = $value;
			}
		}
		return $this;
	}	
	
}

?>