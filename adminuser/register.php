<?php include('functions.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./images.png">


    <style>
    body {

        background-size: cover;
        animation: pan 6s infinite alternate linear;
        height: 100vh;
    }

    @keyframes pan {
        100% {
            background-position: 100% 60%;
        }
    }

    .switch-container {
        display: inline-block;
        position: relative;
    }

    .switch {
        display: none;
    }

    .switch-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        width: 80px;
        height: 40px;
        background-color: #ccc;
        border-radius: 20px;
        position: relative;
    }

    .switch-text {
        flex: 1;
        text-align: center;
        color: #fff;
        font-weight: bold;

        transition: color 0.3s ease;
    }

    .switch-text a {
        /* Additional styles for the anchor elements if needed */
        font-size: 12px;
        font-weight: bold;
        text-decoration: none;
    }

    .switch-text:first-child {
        color: #555;
    }

    .switch:checked+.switch-label {
        background-color: #2196f3;
    }

    .switch:checked+.switch-label .switch-text:first-child {
        color: #fff;
    }

    .switch:checked+.switch-label .switch-text:last-child {
        color: #555;
    }

    .switch-label:before {
        content: "";
        position: absolute;
        width: 36px;
        height: 36px;
        background-color: #fff;
        border-radius: 50%;
        top: 2px;
        left: 2px;
        transition: left 0.3s ease;
    }

    .switch:checked+.switch-label:before {
        left: 42px;
    }
    </style>
</head>

<body style="background-image: url('./kp.avif');">
    <div class="header">
        <marquee width="25%" direction="right" speed="50">
            <h2>Register</h2>
        </marquee>
    </div>


    <form method="post" action="register.php">
        <?php echo display_error(); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>"">
        </div>
        <div class=" input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="switch-container">
            <input type="checkbox" id="switch" class="switch" />
            <label for="switch" class="switch-label">
                <span class="switch-text">
                    <a href="create_user.php" target="_blank">admin</a>
                </span>
                <span class="switch-text">
                    <a href="index.php">user</a>
                </span>
            </label>
        </div>



        <div class="input-group">
            <button type="submit" class="btn" name="register_btn">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php" style="text-decoration:none;">Sign in</a>
        </p>

    </form>
</body>

</html>