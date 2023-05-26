<?php 
include('./functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location:login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the role details from the form
$roleName = $_POST['role_name'];
$roleStatus = $_POST['role_status'];
$permission = isset($_POST['permission']) ? $_POST['permission'] : array();
$_SESSION['permission'] = $permission;


// Convert the permission array to a string
$permissionString = implode(", ", $permission);

// Insert the role into the database
$query = "INSERT INTO roles (role_name, role_status, permission) VALUES ('$roleName', '$roleStatus' , '$permissionString')";
mysqli_query($db, $query);


// Store user information in session
$_SESSION['success'] = "Role added successfully.";
$_SESSION['role'] = array(
    'role_name' => $roleName,
    'role_status' => $roleStatus,
    'permission' => $permission
);

    
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <style>
    body {
        background-size: cover;
        animation: pan 0.5s infinite linear alternate;
        height: 100vh;
    }

    @keyframes pan {
        100% {
            background-position: 100% 100%;
        }
    }



    .add-role-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100;

        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        padding: 20px;
    }

    .permission-row {
        display: flex;
        flex-wrap: wrap;
    }

    .input-group {
        margin-bottom: 10px;
    }

    .permission-row {
        display: flex;
        flex-wrap: wrap;
    }

    .permission-row div {
        margin-right: 10px;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .header {
        background: #003366;
    }

    button[name=register_btn] {
        background: #003366;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background: #003366;
        color: #fff;
    }

    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .navbar li {
        display: inline-block;
        margin-right: 10px;
    }

    .navbar li a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
    }

    .header {
        background: #003366;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .content {
        margin: 20px;
    }

    .error {
        background-color: #f2dede;
        color: #a94442;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .success {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .profile_info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .profile_info img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .add-role-form {
        margin-top: 20px;
    }

    .add-role-form label {
        display: block;
        margin-bottom: 10px;
    }

    .add-role-form input[type="text"] {
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // AJAX function to add a role
        function addRole(userId, roleName) {
            $.ajax({
                url: 'add_role.php',
                method: 'POST',
                data: {
                    user_id: userId,
                    role_name: roleName
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        // Perform any necessary actions after successfully adding the role
                    } else {
                        alert(response.message);
                        // Perform any necessary actions if the role addition failed
                    }
                },
                error: function() {
                    alert('Error occurred during AJAX request');
                    // Perform any necessary error handling
                }
            });
        }

        // Example usage of the addRole() function
        $('#add-role-form').on('submit', function(e) {
            e.preventDefault();
            var userId = $(this).find('input[name="user_id"]').val();
            var roleName = $(this).find('input[name="role_name"]').val();
            addRole(userId, roleName);
        });
    });
    </script>
</head>

<body style="background-image:url('./Grey-Background.jpg');">


    <div class="header">
        <h2>Home Page</h2>
        <br>
        <div class="navbar">
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="create_user.php">create_user</a></li>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] === 'admin'): ?>
                <li><a href="admin.php">Admin</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])): ?>
                <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <br>

    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
            </h3>
        </div>
        <?php endif ?>

        <!-- logged in user information -->
        <div class="profile_info">
            <img src="./images.png">

            <div>
                <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>

                <small>
                    <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    <br>
                    <a href="home.php?logout='1'" style="color:red;text-decoration:none;font-weight:bold;">logout</a>
                    &nbsp; <a href="create_user.php" style="text-decoration:none;font-weight:bold;"> + add
                        user</a>
                </small>

                <?php endif ?>
            </div>
        </div>



        <div class="content">
            <!-- Rest of the code -->
            <h3>Add Role:</h3>
            <!-- Add role form -->
            <div class="add-role-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="input-group">
                        <label>Role Name:</label>
                        <input type="text" name="role_name">
                    </div>
                    <div class="input-group">
                        <label>Role Status:</label>
                        <input type="text" name="role_status">
                    </div>
                    <div class="input-group">
                        <label>Permissions:</label>
                        <div class="permission-row">
                            <div>
                                <input type="checkbox" name="permission[]" value="Home" id="permission_home">
                                <label for="permission_home">Home</label>
                            </div>
                            <div>
                                <input type="checkbox" name="permission[]" value="Products" id="permission_products">
                                <label for="permission_products">Products</label>
                            </div>
                            <div>
                                <input type="checkbox" name="permission[]" value="Contact Us" id="permission_contact">
                                <label for="permission_contact">Contact Us</label>
                            </div>
                            <div>
                                <input type="checkbox" name="permission[]" value="Create User"
                                    id="permission_create_user">
                                <label for="permission_create_user">Create User</label>
                            </div>
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] === 'admin'): ?>
                            <div>
                                <input type="checkbox" name="permission[]" value="Admin" id="permission_admin">
                                <label for="permission_admin">Admin</label>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn" name="add_role_btn"
                                style="text-decoration:none;font-weight:bold;">Add Role</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h1><?php echo print_r($permission); ?></h1>


</body>

</html>