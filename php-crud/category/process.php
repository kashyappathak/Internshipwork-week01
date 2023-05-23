<head>
    <link rel="icon" type="image/x-icon" href="./kp.jfif">
</head>
<?php

include('connect-2.php');
if (isset($_POST["create"])) {
   
    // $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    // $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $sku = mysqli_real_escape_string($conn, $_POST["sku"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sqlInsert = "INSERT INTO category1(title ,price,sku, description) VALUES ('$title','$price','$sku','$description')";
    echo $sqlInsert;
     exit(0);
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Category Added Successfully!";
        header("Location:index-3.php");
    }else{
        die("Something went wrong");
    }
    
}
if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    // $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $sku = mysqli_real_escape_string($conn, $_POST["sku"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE category1 SET id='$id',  title = '$title',price = '$price', sku = '$sku', description = '$description' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "category Updated Successfully!";
        header("Location:index-3.php");
    }else{
        die("Something went wrong");
    }
}
?>