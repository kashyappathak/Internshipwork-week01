    <?php include('functions.php') ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Registration system PHP and MySQL</title>
        <link rel="stylesheet" type="text/css" href="stylw2.css">
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
        </style>
    </head>

    <body style="background-image: url('./kspd.jpg');">
        <div class="header">
            <marquee width="25%" direction="right" speed="70">
                <h2>Login page</h2>
            </marquee>
        </div>
        <form method="post" action="login.php">

            <?php echo display_error(); ?>

            <div class="input-group">
                <label style="text-align:center;">Username:</label>
                <input type="text" name="username" style="width:95%;">
            </div>
            <div class="input-group">
                <label style="text-align:center;">Password:</label>
                <input type="password" name="password" style="width:95%;">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_btn" style="margin-left: 150px;">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php" style="text-decoration:none;">Sign up</a>
            </p>
        </form>
    </body>

    </html>