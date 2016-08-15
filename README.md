# phputil\traits
Useful traits for PHP.

[![Build Status](https://travis-ci.org/thiagodp/traits.svg?branch=master)](https://travis-ci.org/thiagodp/traits)

We use [semantic version](http://semver.org/). See [our releases](https://github.com/thiagodp/traits/releases).

## Installation

```command
composer require phputil/traits
```

## Classes

* [GetterBuilder](https://github.com/thiagodp/traits/blob/master/lib/GetterBuilder.php)
* [WithBuilder](https://github.com/thiagodp/traits/blob/master/lib/WithBuilder.php)
* [GetterSetterWithBuilder](https://github.com/thiagodp/traits/blob/master/lib/GetterSetterWithBuilder.php)

## Examples

Example on GetterBuilder:

```php
class MyClass {

	use GetterBuilder; // simulate getters
	
	private $name = '';
	private $description = '';
	
	function __construct( $name, $description ) {
		$this->name = $name;
		$this->description = $description;
	}
}
 
$obj = new MyClass( 'Bob', 'I am Bob' );
echo $obj->getName(); // Bob
echo $obj->getDescription(); // I am Bob
```

Example on WithBuilder:

```php
class MyClass {

	use WithBuilder;
	
	public $name = '';
	public $description = '';
}

$obj = ( new MyClass() )->withName( 'Bob' )->withDescription( 'I am Bob' );
echo $obj->name; // Bob
echo $obj->description; // I am Bob
```

Example on GetterSetterWithBuilder:

```php
class MyClass {

	use GetterSetterWithBuilder;
	
	private $name = '';
	private $description = '';
}
  
$obj = ( new MyClass() )->withName( 'Bob' )->setDescription( 'I am Bob' );
echo $obj->getName(); // Bob
echo $obj->getDescription(); // I am Bob
$obj->setName( 'Bob Dylan' );
echo $obj->getName(); // Bob Dylan
```