<?php

class gloves {
  
  public $type;
  public $name;
  public $colour;
  public $code;
  public $price;
  public $size;
  
  public static $count=0;

  public function __construct($type, $name, $colour, $code, $price, $size, $image) {
    $this->type = $type;
    $this->name = $name;
    $this->colour = $colour;
    $this->code = $code;
    $this->price = $price;
    $this->size = $size;
    $this->image = $image;
    gloves::$count++;
      
  }
  function get_type(){
      return $this->type;
  }
  function get_name() {
    return $this->name;
  }
  function get_colour() {
    return $this->colour;
  }
  function get_code(){
      return $this->code;
  }
  function get_price(){
      return $this->price;
  }
  function get_size(){
      return $this->size;
  }
  function get_image(){
      return $this->image;
  }
}

$id1 = new gloves("amateur","Contest","red","GN010","89.90","10oz","Contest.jpg");
$id2 = new gloves("amateur", "Tecnico", "black_white_red", "GN013", "79.90", "12oz","Tecnico.jpg");
$id3 = new gloves("pro", "Anniversary", "white", "GN100", "127.90", "14oz","Anniversary.jpg");
$id4 = new gloves("pro", "Authentic", "white_gold", "GN106", "99.90", "10oz","Authentic.jpg");
$id5 = new gloves("bag", "Mexico", "terracotta", "GS503", "69.90", "M","Mexico.jpg");
$id6 = new gloves("bag", "Contact", "black", "GS080", "27.90", "M","Contact.jpg");


/* bolj praktično:
$id[0] = new gloves("amateur","Contest","red","GN010","89.90","10oz","Contest.jpg");
$id[] = new gloves("amateur", "Tecnico", "black_white_red", "GN013", "79.90", "12oz","Tecnico.jpg");
$id[] = new gloves("pro", "Anniversary", "white", "GN100", "127.90", "14oz","Anniversary.jpg");
$id[] = new gloves("pro", "Authentic", "white_gold", "GN106", "99.90", "10oz","Authentic.jpg");
$id[] = new gloves("bag", "Mexico", "terracotta", "GS503", "69.90", "M","Mexico.jpg");
$id[] = new gloves("bag", "Contact", "black", "GS080", "27.90", "M","Contact.jpg");
 */