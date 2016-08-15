<?php
namespace phputil\traits;

/**
 * Helps the magic __call methods to simulate another methods.
 *
 * @author	Thiago Delgado Pinto
 */
trait CallBasedMethodBuilder {
	
	function _buildMethods( $name, $args, array $chainableOptions  ) {
		foreach ( $chainableOptions as $word => $chainable ) {
			$len = mb_strlen( $word );
			$posWith = mb_strpos( $name, $word );
			$isGetter = ! $chainable;
			$isSetter = $chainable && isset( $args[ 0 ] );
			if ( 0 === $posWith && ( $isGetter || $isSetter ) ) {
				$attr = mb_strtolower( mb_substr( $name, $len, 1 ) )
					. mb_substr( $name, $len + 1 );
				if ( $isSetter ) {
					$this->{ $attr } = $args[ 0 ];
					return $this;
				}
				return $this->{ $attr };
			}
		}
		return null;
	}
	
}

?>