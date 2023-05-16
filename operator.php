<html>
<body>

<?php
$x = 10;  
$y = 6;

// arithmetic operator
echo $x + $y . "<br>";
echo $x - $y . "<br>";
echo $x / $y . "<br>";
echo $x * $y . "<br>";
echo $x % $y . "<br>";
echo $x ** $y . "<br>";


?><br>
<?php
// assignment operator
$x = 200;  
$x += 100;
$x -= 30;
$x *= 10;
$x /= 5;
echo $x;
?><br>
<!-- comparision operator -->
<?php

$x = 10;
$y = 10;

var_dump($x == $y);
var_dump($x === $y);
var_dump($x != $y);
var_dump($x !== $y);
var_dump($x > $y);
var_dump($x < $y);
var_dump($x >= $y);
var_dump($x <= $y);
echo ($x <=> $y);
echo ($x == $y) . "<br>";
echo ($x === $y) . "<br>";
echo ($x != $y) . "<br>";
echo ($x !== $y) . "<br>";
echo ($x > $y) . "<br>";
echo ($x < $y) . "<br>";
echo ($x >= $y) . "<br>";
echo ($x <= $y) . "<br>";

?>
</body>
</html>
