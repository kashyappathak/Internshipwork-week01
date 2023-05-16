<?php
class intern {
  public $name;
  protected $color;
  private $weight;
}

$KP = new Fruit();
$KP->name = 'KP'; // OK
$KP->color = 'Yellow'; // ERROR
$KP->weight = '300'; // ERROR
?>