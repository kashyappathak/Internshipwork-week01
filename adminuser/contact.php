<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./images.png">

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    .header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .content {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border: 2px solid black;
    }

    form {
        display: grid;
        gap: 10px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #555;
    }

    body {
        background-size: cover;
        animation: pan 5s infinite alternate linear;
        height: 100vh;
    }

    @keyframes pan {
        100% {
            background-position: 100% 80%;
        }

        75% {
            background-repeat: repeat-x;
        }
    }

    .social {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .social ul {
        list-style: none;
        display: flex;
        gap: 10px;
    }

    .social ul li a {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: #333;
        font-size: 14px;
        width: 40px;
        /* Adjust width as needed */
        height: 40px;
        /* Adjust height as needed */
        border-radius: 50%;
        /* Makes the icons circular */
        background-color: #e6e6e6;
        /* Background color for icons */
        transition: all 0.3s ease;
        /* Smooth transition on hover */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        /* Adds a subtle shadow */
    }

    .social ul li a i {
        margin-bottom: 5px;
        font-size: 24px;
    }

    /* Hover effect */
    .social ul li a:hover {
        transform: scale(1.1);
        /* Increases size on hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        /* Enhances shadow on hover */
    }
    </style>
    <script>
    $(document).ready(function() {
        $.validator.addMethod("capitalizedEmail", function(value, element) {
            var firstChar = value.charAt(0);
            return firstChar === firstChar.toUpperCase();
        }, "<p style='color:red;'>Please enter an email with the first letter capitalized.</p>");

        $('#contactForm').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    capitalizedEmail: true
                },
                message: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: '<p style="color:red;font-weight:bold;">Please enter your name</p>'
                },
                email: {
                    required: '<p style="color:red;font-weight:bold;">Please enter your email</p>',
                    email: '<p style="color:red;font-weight:bold;">Please enter a valid email</p>'
                },
                message: {
                    required: '<p style="color:red;font-weight:bold;">Please enter a message</p>'
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    </script>

</head>

<body style="background-image:url('./kashyap.avif');">
    <div class="header">
        <marquee width="25%" direction="right" speed="100px">
            <h2>Contact us</h2>
        </marquee>
    </div>

    <div class="content">
        <form id="contactForm" action="submit_contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" style="width:95%;" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" style="width:95%;" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" style="width:95%;" required></textarea>

            <p style="font-size: 17px;font-weight:bold;">If You Have Any Query:</p>
            <div class="basr-social-share social">

                <ul class="">
                    <li>
                        <a class="gitlab" href="https://gitlab.com/pathakkashyap80">
                            <i class="fab fa-gitlab" style="margin-top: 10px;"></i>

                        </a>
                    </li>

                    <li>
                        <a class="github" href="https://github.com/kashyappathak/Internshipwork-week01">
                            <i class="fab fa-github" style="margin-top: 10px;"></i>

                        </a>
                    </li>


                    <li>
                        <a class="linkedin" href="">
                            <i class="fab fa-linkedin" style="margin-top: 10px;"></i>

                        </a>
                    </li>

                    <li>
                        <a class="phone" href="tel:+9179990653556">
                            <i class="fa fa-phone" style="margin-top: 10px;"></i>

                        </a>
                    </li>

                    <li>
                        <a class="codechef" href="https://www.codechef.com/learn/dashboard">
                            <i class="fas fa-code" style="margin-top:10px;"></i>

                        </a>
                    </li>

                </ul>
            </div>
            <input type="submit" value="Submit">
        </form>

    </div>
</body>


</html>