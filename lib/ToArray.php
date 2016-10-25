<?php
namespace phputil\traits;

/**
 *  Adds the method toArray().
 *  
 *  @author	Thiago Delgado Pinto
 */
trait ToArray {
	
	/**
	 * Return the attributes as an array.
	 *
	 * @return array
	 */
	function toArray() {
		return get_object_vars( $this ); // all but static ones
	}	
	
}

?>