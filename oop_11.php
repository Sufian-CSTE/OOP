<!-- In programming, unexpected errors are called exceptions. Exceptions can be attempting to read a file that does not exist or connecting to the database server that is currently down.

Instead of halting the script, you can handle the exceptions gracefully. This is known exception handling.

To handle the exceptions, you use the try...catch statement. Here’s a typical syntax of the try...catch statement: -->

<?php

try {
	// perform some task
} catch (Exception $ex) {
	// jump to this part
	// if an exception occurred
}

// In this syntax, the try...catch statement has two blocks: try and catch.

// In the try block, you do some tasks e.g.,reading a file. If an exception occurs, the execution jumps to the catch block.

// In the catch block, you specify the exception name and the code to handle a specific exception.

// PHP try…catch example
// The following example shows how to read data from a CSV file:

$data = [];

$f = fopen('data.csv', 'r');

do {
	$row = fgetcsv($f);
	$data[] = $row;
} while ($row);

fclose($f);

// If the data.csv file doesn’t exist, you’ll get many warrnings. The following shows the first warning:

// PHP Warning:  fopen(data.csv): failed to open stream: No such file or directory in ... on line 5
// Code language: plaintext (plaintext)
// To fix this, you may add an if statement in every step:

$data = [];

$f = fopen('data1.csv', 'r');

if (!$f) {
	echo 'The file is not accessible.';
	exit;
}

do {
	$row = fgetcsv($f);
	if ($row === null) {
		echo 'The stream is invalid.';
		exit;
	}

	if ($row === false) {
		echo 'Other errors occurred.';
		exit;
	}

	$data[] = $row;
} while ($row);

// close the file
if (!$f) {
	fclose($f);
}

print_r($data);

// However, this code mixes the program logic and error handlers.

// The advantage of the try...catch statement is to separate the program logic from the error handlers. Therefore, it makes code easier to follow.

// The following illustrates how to use the try...catch block for reading data from a CSV file:

$data = [];

try {
	$f = fopen('data.csv', 'r');

	do {
		$row = fgetcsv($f);
		$data[] = $row;
	} while ($row);

	fclose($f);
} catch (Exception $ex) {
	echo $ex->getMessage();
}

// In this example, if any error occurs in the try...block, the execution jumps to the catch block.

// The exception variable $ex is an instance of the Exception class that contains the detailed information of the error. In this example, we get the detailed error message by calling the getMessage() method of the $ex object.

// Multiple catch blocks
// A try...catch statement can have multiple catch blocks. Each catch block will handle a specific exception:

try {
	//code...
} catch (Exception1 $ex1) {
	// handle exception 1
} catch (Exception2 $ex2) {
	// handle exception 2
} catch (Exception1 $ex3) {
	// handle exception 3
}

// When a try...catch statement has multiple catch blocks, the order of exception should be from the specific to generic. And the last catch block should contain the code for handling the most generic exception. By doing this, the try...catch statement can catch all the exceptions.

// If you have the same code that handles multiple types of exceptions, you can place multiple exceptions in one catch block and separate them by the pipe (|) character like this:

try {
	//code...
} catch (Exception1 | Exception2 $ex12) {
	// handle exception 1 & 2
} catch (Exception3 $ex3) {
	// handle exception 3
}

// By specifying multiple exceptions in the catch block, you can avoid code duplication. This feature has been supported since PHP 7.1.0.

// Ignoring the exception variable
// As of PHP 8.0, the variable name for the caught exception is optional like this:

// try {
// 	//code...

// } catch (Exception) {
// 	// handle exception
// }

// In this case, the catch block will still execute but won’t have access the Exception object.

// Summary
// Use the try...catch statement to handle exceptions.
// The try...catch statement separates the program logic and exception handlers.
// Use multiple catch blocks to handle multiple exceptions. Place the most specific exception first and the least specific exception after.
// Specify a list of pipe-separated exceptions in a single catch block if the same code can handle multiple exceptions.
// Ignore the exception variable when you don’t want to access the detail of the exception.