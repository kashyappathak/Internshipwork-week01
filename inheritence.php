<!DOCTYPE html>
<html>
<body>

<?php
class intro1 {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color; 
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}."; 
  }
}

// intro2 is inherited from intro1
class intro2 extends intro1 {
  public function message() {
    echo "Am I a student or a developer? "; 
  }
}

$strawberry = new intro2("kashyap", "student");
$strawberry->message();
$strawberry->intro();
?>
 
</body>
</html>
