<head>
    <h2>Using For Loop</h2>
    <style>
        p{
            border:3px solid black;
            text-align:center;
        }
        h2{
            text-align:center;
            text-decoration: dashed;
        }
    </style>
</head>
<body>
<?php
for ($x = 0; $x <= 10; $x++) {
  echo "<p>The number is: $x <br></p>";
}
?>
</body>