<?php 
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location:login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}


// Retrieve the user information from the database
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <style>
    .navbar {
        background: #003366;
        padding: 10px;
    }

    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .navbar li {
        margin-right: 10px;
    }

    .navbar li a {
        color: #fff;
        text-decoration: none;
    }

    .navbar li a:hover {
        text-decoration: underline;
    }

    /* Header */
    .header {
        background: #003366;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    /* Content */
    .content {
        padding: 20px;
    }

    /* Profile Info */
    .profile_info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .profile_info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .profile_info strong {
        font-size: 18px;
    }

    .profile_info small {
        color: #888;
    }

    .profile_info a {
        color: red;
        margin-left: 10px;
        text-decoration: none;
    }

    .profile_info a:hover {
        text-decoration: underline;
    }

    /* Add Role Form */
    .add-role-form label {
        display: block;
        margin-bottom: 10px;
    }

    .add-role-form input[type="text"],
    .add-role-form input[type="checkbox"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .add-role-form .btn {
        background: #003366;
        color: #fff;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
    }

    .add-role-form .btn:hover {
        background: #002255;
    }
    </style>
</head>

<body>

    <div class="header">
        <h2>Admin - Home Page</h2>
        <div class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="create_user.php">create_user</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] === 'admin'): ?>
                <!-- <li><a href="admin.php">Admin</a></li>
            <?php endif; ?>  -->
                <?php if (isset($_SESSION['user'])): ?>
                <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php echo $_SESSION['success']; 
                    unset($_SESSION['success']); ?>
            </h3>
        </div>
        <?php endif ?>

        <!-- logged in user information -->
        <div class="profile_info">
            <img src="./images.png">
            <div>
                <?php if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>
                <small>
                    <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    <br>
                    <a href="home.php?logout='1'" style="color: red;">logout</a>
                    &nbsp; <a href="create_user.php"> + add user</a>
                </small>
                <?php endif ?>
            </div>
        </div>

        <div class="content">
            <!-- Rest of the code -->


            <!-- Add role form -->

        </div>
        <?php if (isset($_SESSION['user_info'])) : ?>
        <h3>User Information:</h3>
        <p>Username: <?php echo $_SESSION['user_info']['username']; ?></p>
        <p>Role Name: <?php echo $_SESSION['user_info']['role_name']; ?></p>
        <p>Role Status: <?php echo $_SESSION['user_info']['role_status']; ?></p>
        <?php if (isset($_SESSION['user_info']['permission'])) : ?>
        <p>Permission: <?php echo $_SESSION['user_info']['permission']; ?></p>
        <?php endif; ?>

        <small>
            <i>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i><br>
            <a href="logout.php" style="color: red;">logout</a>
        </small>
        <?php endif; ?>
    </div>
</body>

</html>