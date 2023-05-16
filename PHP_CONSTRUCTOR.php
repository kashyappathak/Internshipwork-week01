<!DOCTYPE html>
<html>
<body>

<?php
class Intro {
  public $name;
  public $from;

  function __construct($name) {
    $this->name = $name; 
  }
  function get_name() {
    return $this->name;
  }
}

$kp = new Intro("KASHYAP PATHAK");
echo $kp->get_name();
$KP1 = new Intro("From Rajkot And Student Of Marwadi University.");
echo $KP1->get_name();
?>
 
</body>
</html>
