<?php

// The public access modifier
class Customer
{
    // you can access the property and method from both inside and outside of the class.
	public $name;

	public function getName()
	{
		return $this->name;
	}
}

$customer = new Customer();
$customer->name = 'Bob';
echo $customer->getName(); // Bob


// The private access modifier
class Customer
{
	private $name;

	public function getName()
	{
		return $this->name;
	}
}
// If you attempt to access the $name property from the outside of the class, you’ll get an error.
$customer = new Customer();
$customer->name = 'Bob';

// Fatal error: Uncaught Error: Cannot access private property Customer::$name

// Use the public access modifier to allow access to properties and methods from both inside and outside of the class.
// Use the private access modifier to prevent access from the outside of the class.
// Do use private properties with a pair of public getter/setter methods.