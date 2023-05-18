<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Product Login page</title>
    <style>
    .container {
        width: 300px;
        padding: 20px;
        margin: 0 auto;
        margin-top: 100px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }

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

    svg {
        transform: rotate(60deg);
    }

    h2 {
        color: white;
        font-weight: bold;
    }

    a {
        color: white;
        font-weight: bold;
        text-decoration: none;
    }

    p {
        font-weight: bold;
        color: #ccc;
    }

    h1 {
        color: #ccc;
        text-align: center;
    }
    </style>
</head>

<body style="background-image: url('./kspm.jpg');">>
    <h1>Product Login Page</h1>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($_SESSION["error"])): ?>
        <p class="error"><?php echo $_SESSION["error"]; ?></p>
        <?php unset($_SESSION["error"]); ?>
        <?php endif; ?>
        <form id="login-form" method="POST" action="loginprocess.php">
            <input type="text" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="signuppage.php">Sign up</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#login-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    containsSpecialChar: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                email: {
                    required: "<p style='font-weight:bold;font-size:20px;'>Please enter your email.</p>",
                    email: "<p style='font-weight:bold;font-size:20px;'>Please enter a valid email address.</p>",
                    containsSpecialChar: "<p style='font-weight:bold;font-size:20px;'>Email must contain at least one special character.</p>"
                },
                password: {
                    required: "<p style='font-weight:bold;font-size:20px;'>Please enter your password.</p>",
                    minlength: "<p style='font-weight:bold;font-size:20px;'>Password must be at least 8 characters long.</p>"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // Custom method for checking if email contains special characters
        $.validator.addMethod('containsSpecialChar', function(value, element) {
            return this.optional(element) || /[^a-zA-Z0-9]/.test(value);
        }, 'Email must contain at least one special character.');
    });
    </script>
</body>

</html>