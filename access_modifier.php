<?php


class shape
{

	private $length = 10;
	private $breadth = 20;

	protected function calculate_area()
	{
	  return "Area of rectangle is = ".$this->length * $this->breadth;

	}

}

class triangle extends shape{
 
  public function calc_area()
  {
    return $this->calculate_area();
  }

}

$s1 = new triangle();
echo $s1->calc_area();

?>