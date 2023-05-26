<link rel="icon" type="image/x-icon" href="./images.png">
<?php
if (isset($_GET['id'])) {
include("connect-2.php");
$id = $_GET['id'];
$sql = "DELETE FROM category WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "Category  Deleted Successfully!";
    header("Location:products.php");
}else{
    die("Something went wrong");
}
}else{
    echo "category does not exist";
}
?>