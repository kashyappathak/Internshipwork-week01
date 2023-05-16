<!DOCTYPE html>
<html>
    <head>
        <style>
            p{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            text-align: center;
            border: 5px solid black;
        }
        
        </style>
    </head>
<body>
    <?php
        $collage = array("Marwadi University","Nirma University","PDPu University");
        echo "<p>I Am Intrested in".$collage[0].",".$collage[1].",".$collage[2].".</p>";
       
    ?>
    <p>Total: <?php echo count($collage); ?></p>


    <!-- assosiative array -->
    <!-- Associative arrays are arrays that use named keys that you assign to them. -->
    <?php
$age = array("kashyap"=>"21", "kunal"=>"21", "Hiren"=>"19","Namra"=>"19");
echo "Kashyap is " . $age['kashyap'] . " years old.";
?>
</body>