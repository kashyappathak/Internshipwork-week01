<?php include('./functions.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <style>
    body {
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .header {
        background-color: #003366;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .form-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container label {
        display: block;
        margin-bottom: 10px;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"],
    .form-container select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .form-container .input-group {
        margin-bottom: 15px;
    }

    .form-container .btn {
        background-color: #003366;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .form-container .btn:hover {
        background-color: #002d52;
    }

    .form-container .error {
        color: #ff0000;
        margin-bottom: 10px;
    }

    body {
        background-size: cover;
        animation: kp 5s linear infinite alternate;
        height: 100vh;

    }

    @keyframes kp {
        100% {
            background-position: 100% 90%;

        }


    }
    </style>
</head>

<body style="background-image:url('./KSPA.jpg')">
    <div class="header">

        <marquee width="25%" direction="right" speed="50">
            <h2>Admin - Create User</h2>
        </marquee>



    </div>
    <br>
    <div class="form-container">
        <form method="post" action="create_user.php">

            <?php echo display_error(); ?>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label>User Type</label>
                <select name="user_type" id="user_type">
                    <option value=""></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password_1">
            </div>
            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_2">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="register_btn">Create User</button>
            </div>
        </form>
    </div>
</body>

</html>