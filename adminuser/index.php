<?php 
	include('functions.php');

    if (!isAdmin()) {
        // Code to execute if the user is not an admin
        // For example:
        $_SESSION['peermission'] = "you must add roles";
        header('location: home.php');
        echo "You do not have admin privileges.";
    } else {
        // Code to execute if the user is an admin
        // For example:
        echo "<p style='text-align:center;color:black;'>Welcome, user!</p>";
    }
    // function isAdmin()
    // {
    //     if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
		exit();
	}
    if (!isLoggedIn()) { $_SESSION['msg'] = "You must log in firsFirst Did THe Login"; echo'msg'; header('location: login.php'); } function isLoggedIn() { if (isset($_SESSION['user'])) { return true; }else{ return false; } }

    $userInfo = getUserInfo(); // Assuming you have a function to retrieve user information

if ($userInfo) {
    $_SESSION['user_info'] = $userInfo;
}

function getUserInfo()
{
    // Add your code here to retrieve user information from the database
    // Example code to fetch user information using MySQLi
    $conn = mysqli_connect("localhost", "root", "", "multi_login");
    $userId = $_SESSION['user']['id'];
    $query = "SELECT * FROM user_info WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}
$username = $_SESSION['user']['username'];
$userId = $_SESSION['user']['id'];

// Insert user information into user_info table

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="./images.png">

    <title>Home Page </title>
    <style>
    body {
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        animation: kashyap 5s infinite linear;
    }

    @keyframes kashyap {
        100% {
            background-position: 100% 80%;
        }
    }


    .header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        background-size: cover;
        animation: pan 6s infinite alternate linear;
        height: 100vh;
        font-weight: bold;
    }

    @keyframes pan {
        100% {
            background-position: 100% 60%;
        }
    }

    .profile_info {
        display: flex;
        align-items: center;
    }

    .profile_info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .profile_info small {
        color: #888;
    }

    .navbar {
        background-color: #333;
        padding: 10px;
    }

    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .navbar li {
        display: inline-block;
        margin-right: 10px;
    }

    .navbar li a {
        color: #fff;
        text-decoration: none;
        padding: 5px;
    }

    .navbar li a:hover {
        background-color: #555;
    }

    marquee:hover {
        color: aqua;
    }
    </style>
</head>

<body>
    <div class="header">
        <marquee width="25%" direction="right" speed="100">
            <h2> Welcome To Home Page</h2>
        </marquee>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>

            <li><a href="contact.php">Contact Us</a></li>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] === 'admin'): ?>

            <?php endif; ?>
            <?php if (isset($_SESSION['user'])): ?>
            <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="content" style="background-image: url('./gradient-background-green-tones_23-2148387744.avif');">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3><?php echo $_SESSION['success']; ?></h3>
        </div>
        <?php endif; ?>

        <!-- logged in user information -->
        <div class="profile_info">
            <img src="./th-1.jfif">
            <div>

                <small>
                    <?php if (isset($_SESSION['roles'])) : ?>
                    <strong><?php echo $_SESSION['user_info']['username']; ?></strong>
                    <?php endif; ?><br>

                    <!-- Display user information -->

                    <h3>User Information:</h3>
                    <i>
                        <p>Username: <?php echo ucfirst($_SESSION['user_info']['username']); ?></p>
                    </i>
                    <i>
                        <p>Role Name: <?php echo $_SESSION['user_info']['role_name']; ?></p>
                    </i>
                    <i>
                        <p>Role Status: <?php echo $_SESSION['user_info']['role_status']; ?></p>
                    </i>
                    <i>
                        <p>Permission: <?php echo $_SESSION['user_info']['permission']; ?></p>
                    </i>

                    <a href="logout.php" style="color: red;">logout</a>

                </small>

            </div>
        </div>


</body>

</html>
