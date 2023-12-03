<?php

interface shape
{
    public function calcArea();
}

class circle implements shape
{
    private $radius;

    public function __construct($r)
    {
      $this->radius = $r;
    }

    public function calcArea()
    {
      echo "area of circle is =  ".$this->radius * $this->radius * 3.14; 
    } 

}

class rectangle implements shape
{
    private $length;
    private $breadth;

    public function __construct($l, $b)
    {
      $this->length = $l;
      $this->breadth = $b;
    }

    public function calcArea()
    {
      echo "area of rectangle is =  ".$this->length * $this->breadth ; 
    } 

}

$c = new circle(20);
$r = new rectangle(5, 7);
$c->calcArea();
echo "<br/>";
$r->calcArea();



?>