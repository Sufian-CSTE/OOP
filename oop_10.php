<!-- Introduction to the PHP class constants
Sometimes, you need to define a constant that is specific to a class. In this case, you can use the PHP class constants.

To define a constant of a class, you use the const keyword. For example: -->

<?php

class Circle
{
    const PI = M_PI;
}

// In this example, we define the PI constant in the Circle class. By convention, a constant name is in uppercase. If the constant name contains multiple words, you can use the underscore (_) to separate the words, for example MY_CONSTANT.

// Since a constant is defined per class, not per instance of the class, you use the self keyword to reference the constant inside the class. For example:


class Circle
{
    const PI = M_PI;

    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function area(): float
    {
        return self::PI * $this->radius ** 2;
    }
}

// In this example, we define the Circle class with the $radius property. Inside the area() method, we calculate the area of the circle using the radius and the self::PI constant.

// When you define a constant in a class, its visibility is public by default. It means that you can also access the constant outside of the class.

// To reference to the constant outside the class, you use the class name and :: operator like this:


//  Circle class
//  ...

echo Circle::PI;

// Note that you can reference the class using a variable with the value is the class name. For example:


$className = 'Circle';

echo $className::PI;

// In this example, instead of using Circle::PI, we use the $className::PI to reference the PI constant.

// Since PHP 7.1.0, you can use visibility modifier keywords such as private, protected, and public with the class constant. For example:


class Circle
{
    private const PI = M_PI;

    // other methods   
}

// In this example, the PI constant is private and cannot be used outside the Circle class.

// It’s possible to define a class constant using a constant expression. A constant expression is an expression that contains only constants. For example:


class MyClass 
{
    const ONE_THIRD = 1/3;
}

// PHP class constants and inheritance
// The following example illustrates how to define a constant in the parent class and override it in the child class. For example:


abstract class Model
{
    protected const TABLE_NAME = '';

    public static function all()
    {
        return 'SELECT * FROM ' . static::TABLE_NAME;
    }
}

class User extends Model
{
    protected const TABLE_NAME = 'users';
}

class Role extends Model
{
    protected const TABLE_NAME = 'roles';
}

echo User::all(); // SELECT * FROM users;
echo Role::all(); // SELECT * FROM roles;

// How it works.

// First, define a constant TABLE_NAME in the Model class. In the all() static method, returns a query that selects all rows from the table name specified by the TABLE_NAME constant.

// Second, define the User and Role classes that extend the Model class. In the User and Role class, redefine the TABLE_NAME constant.

// Since the User and Role classes inherits the all() method of the Model class, they can call the all() method.

// When the User class calls the all() method, the all() method returns the expected TALBE_NAME constant defined in the User class. The same logic is applied to the Role class.

// Summary
// Use the const keyword to define a class constant.
// Use the visibility modifier keywords, including public, protected, and private. By default, a class constant is public.