<?php

class product
{

	public $name = "Qualitative reasoning";
	public $price = 25000;
	public $publication = "Bharti publication";

	 public function book()
	{
	  return "Book price is = ".$this->price ; 

	}

}

$p1 = new product();
echo "The class name is ". get_class($p1);

?>