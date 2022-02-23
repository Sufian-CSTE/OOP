<?php

// The PHP constructor to initialize the properties of an object.

class BankAccount
{
	private $accountNumber;

	private $balance;

    // Declare a constructor method for a class with the name __construct()

	function __construct($accountNumber, $balance)
	{
		$this->accountNumber = $accountNumber;
		$this->balance = balance;
	}

    // PHP 8.0 introduced the new concept called constructor promotion that promotes the constructor’s arguments to properties.

    function __construct(private $accountNumber, private $balance, $type)
	{	
        
 	}
}

// PHP constructor is a special method that is called automatically when an object is created.
// Do use constructor promotion as much as possible to make the code shorter.