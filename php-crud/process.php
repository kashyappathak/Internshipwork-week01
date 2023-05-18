<head>
    <link rel="icon" type="image/x-icon" href="./th3.jpg">
</head>
<?php

include('connect-2.php');
if (isset($_POST["create"])) {
   
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $product = $_POST['product'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    // Get the file name and target directory
    $file_name = $_FILES['image']['name'];
    $target_dir = './uploads/';

    // Set the target file path
    $target_file = $target_dir . basename($file_name);

    // echo $target_file;
   
    // Move the file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        echo 'The file ' . htmlspecialchars(basename($file_name)) . ' has been uploaded.';
        $image = $target_file;
    } else {
        echo 'Sorry, there was an error uploading your file.';
    }
    $sqlInsert = "INSERT INTO category(type,image, description) VALUES ( '$type','$image','$description')";
    // echo $sqlInsert;
    // exit(0);
     
    if(mysqli_query($conn,$sqlInsert)){ 
        session_start();
        $_SESSION["create"] = "Category Added Successfully!";
        header("Location:index-3.php");
    }else{
        die("Something went wrong");
    }
    
}
if (isset($_POST["edit"])) {
    // $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    // $price = mysqli_real_escape_string($conn, $_POST["price"]);
    // $image = mysqli_real_escape_string($conn, $_POST["image"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE category SET id='$id', type='$type' , description = '$description' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "category Updated Successfully!";
        header("Location:index-3.php");
    }else{
        die("Something went wrong");
    }
}
if (isset($_POST['create'])) {
    // Get the product name, category type, and description
  
}