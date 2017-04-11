# phputil\traits
Useful traits for PHP.

[![Build Status](https://travis-ci.org/thiagodp/traits.svg?branch=master)](https://travis-ci.org/thiagodp/traits)

We use [semantic version](http://semver.org/). See [our releases](https://github.com/thiagodp/traits/releases).

## Installation

```command
composer require phputil/traits
```

## Traits

* [GetterBuilder](https://github.com/thiagodp/traits/blob/master/lib/GetterBuilder.php)
* [WithBuilder](https://github.com/thiagodp/traits/blob/master/lib/WithBuilder.php)
* [GetterSetterWithBuilder](https://github.com/thiagodp/traits/blob/master/lib/GetterSetterWithBuilder.php)
* [FromArray](https://github.com/thiagodp/traits/blob/master/lib/FromArray.php)
* [ToArray](https://github.com/thiagodp/traits/blob/master/lib/ToArray.php)

## Examples

Example on `GetterBuilder`:

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

Example on `WithBuilder`:

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

Example on `GetterSetterWithBuilder`:

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

Example on `FromArray`:

```php
class MyClass {

	use FromArray;
	
	private $id;
	protected $name;
	public $age;
}
  
$obj = new MyClass();
$obj->fromArray( array( 'id' => 10, 'name' => 'Bob', 'age' => 18 ) );
var_dump( $obj ); // the attributes will have the array values
```

Example on converting from a dynamic object:

```php
// From a converting from a dynamic object, just use a type casting
$p = new \stdClass;
$p->id = 10;
$p->name = 'Bob';
$p->age = 18;

$obj = new MyClass();
$obj->fromArray( (array) $p ); // Just make a type casting to array ;)
```

Example on `ToArray`:

```php
class MyClass {

	use ToArray;
	
	private $id = 50;
	protected $name = 'Bob';
	public $age = 21;
}
  
$obj = new MyClass();
var_dump( $obj->toArray() ); // array( 'id' => 50, 'name' => 'Bob', 'age' => 21 )
```