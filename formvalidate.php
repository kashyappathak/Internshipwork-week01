<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
    color: #FF0000;
    text-align: center;
 }
input{
    text-align:center;
}
form{
    text-align: center;
    font-weight: bold;
    background-color: aquamarine;
    display: block;
}
span{
    text-align: center;
}
body{
    background-image: url("./image/kp.jpg");
    animation: pan 6s infinite alternate linear;
    background-size: cover;
    height:100vh;
}
@keyframes pan{
    100% {
        background-position: 15% 60%;
    }
}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $password = $Cpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email& passweord is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2 style="text-align:center;">PHP Form Validation Example</h2><hr>
<p style="text-align:center;font-weight:bold;"><span class="error" style="text-align:center;">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 User Name: <input type="text" name="name" value="<?php echo $name;?>" required>
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
Your  E-mail: <input type="text" name="email" value="<?php echo $email;?>" required>
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
 <input type="submit" name="submit" value="Submit">  
</form>
<br>
<?php
echo "<table style='margin: 0 auto;background-color:yellow;'>";
echo "<tr><th>UserName:</th><td>".$name."</td></tr>";
echo "<tr><th> Your Email:</th><td>".$email."</td></tr>";
echo "</table>";

?>

</body>
</html>