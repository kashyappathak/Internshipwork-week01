<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./th3.jpg">
    <title>Sign up page</title>
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

    svg {
        transform: rotate(60deg);
    }

    form {
        text-align: center;
        margin-top: 100px;

    }

    label {
        color: white;
        font-weight: bold;
        display: block;
    }

    .form-control {
        display: block;
        text-align: center;
        width: 50%;
        margin-left: 500px;

    }

    h2 {
        color: white;
        font-weight: bold;
    }
    </style>
</head>

<body style="background-image: url('./kspm.jpg');">
    <form id="signup-form" method="POST" action="signup_process.php">
        <h2>Product Signup Page</h2>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#signup-form').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    containsSpecialChar: true,
                    containsAtSymbol: true,
                    remote: {
                        url: 'check_email.php', // Path to your server-side script that checks email uniqueness
                        type: 'post',
                        data: {
                            email: function() {
                                return $('#email').val();
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                name: {
                    required: 'Please enter your name.'
                },
                email: {
                    required: 'Please enter your email.',
                    email: 'Please enter a valid email address.',
                    containsSpecialChar: 'Email must contain at least one special character.',
                    containsAtSymbol: 'Email must contain an "@" symbol.',
                    remote: 'Email already exists.'
                },
                password: {
                    required: 'Please enter a password.',
                    minlength: 'Your password must be at least 6 characters long.'
                },
                confirm_password: {
                    required: 'Please confirm your password.',
                    equalTo: 'Passwords do not match.'
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

        // Custom method for checking if email contains an '@' symbol
        $.validator.addMethod('containsAtSymbol', function(value, element) {
            return this.optional(element) || value.indexOf('@') !== -1;
        }, 'Email must contain an "@" symbol.');

        // Custom method for checking if password and confirm password match
        $.validator.addMethod('passwordMatch', function(value, element) {
            return this.optional(element) || value === $('#password').val();
        }, 'Passwords do not match.');

        // Add the passwordMatch rule to the confirm_password field
        $('#confirm_password').rules('add', {
            passwordMatch: true
        });
    });
    </script>

</body>

</html>