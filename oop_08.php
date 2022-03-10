<?php

// In order to ensure that the classes do implement the polymorphism principle, we can choose between one of the two options of either abstract classes or interfaces.

interface Shape {
    public function calcArea();
}

class Circle implements Shape {
    private $radius;
     
    public function __construct($radius)
    {
      $this->radius = $radius;
    }
    
    // calcArea calculates the area of circles 
    public function calcArea()
    {
      return $this->radius * $this->radius * pi();
    }
}

class Rectangle implements Shape {
    private $width;
    private $height;
     
    public function __construct($width, $height)
    {
      $this->width = $width;
      $this->height = $height;
    }
    
    // calcArea calculates the area of rectangles   
    public function calcArea()
    {
      return $this->width * $this->height;
    }
}

$circ = new Circle(3);
$rect = new Rectangle(3,4);

echo $circ->calcArea();
echo $rect->calcArea();

// Polymorphism allows objects of different classes to respond differently to the same message.
// Use interfaces or abstract classes to implement polymorphism in PHP.