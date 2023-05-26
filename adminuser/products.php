<?php
	include('functions.php');
   
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
		exit();
	}

// if (!isAdmin()) {
// 		$_SESSION['msg'] = "You must be an admin to access this page";
// 		header('location: index.php');
// 		exit();
// 	}	
    
    if (!isLoggedIn()) { $_SESSION['msg'] = "You must log in firsFirst Did THe Login"; echo'msg'; header('location: login.php'); } function isLoggedIn() { if (isset($_SESSION['user'])) { return true; }else{ return false; } }
    
// function isAdmin() {
//     if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] === 'admin') {
//         return true;
//     } else {
//         return false;
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./images.png">
    <title>Category List</title>
    <style>
    table td,
    table th {
        vertical-align: middle;
        text-align: right;
        padding: 20px !important;
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


    .sweet-alert-container {
        width: 400px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
        padding: 20px;
        margin: 0 auto;
        /* Center horizontally */
        margin-top: 20vh;
        /* Center vertically */
    }

    .sweet-alert-container .confirm-button,
    .sweet-alert-container .cancel-button {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .sweet-alert-container .confirm-button {
        background-color: #3f51b5;
        color: #fff;
    }

    .sweet-alert-container .confirm-button:hover {
        background-color: #2c387e;
    }

    .sweet-alert-container .cancel-button {
        background-color: #e0e0e0;
        color: #333;
    }

    .sweet-alert-container .cancel-button:hover {
        background-color: #bdbdbd;
    }

    .sweet-alert-container .confirm-button-text,
    .sweet-alert-container .cancel-button-text {
        font-weight: bold;
    }
    </style>
</head>

<body style="background-image: url('./KSP.jpg');">
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Product List</h1>
            <div>
                <a href="create.php" class="btn btn-primary" style="font-weight:bold;border:4px solid black;">Add New
                    Product</a>
                <!-- <a href="signuppage.php" class="btn btn-info"
                    style="font-weight:bold;border:4px solid black;color:white;">Signup</a>
                <a href="login.php" class="btn btn-info"
                    style="font-weight:bold;border:4px solid black;color:white;">Login</a> -->
            </div>
        </header>
        <?php
        // session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            print_r('create');
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
        <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Type</th>
                    <th>image</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
        include('connect-2.php');
        $limit = 10; // Number of records to display per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the URL
        $start = ($page - 1) * $limit; // Calculate the starting position for the records
        
        $sqlCount = "SELECT COUNT(*) AS total FROM category";
        $resultCount = mysqli_query($conn, $sqlCount);
        $dataCount = mysqli_fetch_assoc($resultCount);
        $totalPages = ceil($dataCount['total'] / $limit); // Calculate the total number of pages
        
        $sqlSelect = "SELECT * FROM category LIMIT $start, $limit";
        $result = mysqli_query($conn, $sqlSelect);
        
        while($data = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td style="font-weight:bold;"><?php echo $data['id']; ?></td>
                    <td style="font-weight:bold;"><?php echo $data['type']; ?></td>
                    <td><img width="100" src="<?php echo $data['image']; ?>" alt=""></td>
                    <td style="font-weight:bold;"><?php echo $data['description']; ?></td>
                    <td style="font-weight:bold;">
                        <a href="view-2.php?id=<?php echo $data['id']; ?>" class="btn btn-info"
                            style="font-weight:bold;border:4px solid black;color:white;">Read More</a>
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-success edit-button"
                            style="font-weight:bold;border:4px solid black;">Edit</a>

                        <script>
                        // Add a click event listener to the edit buttons
                        const editButtons = document.querySelectorAll('.edit-button');
                        editButtons.forEach(button => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault(); // Prevent the default click behavior

                                const editUrl = button.getAttribute('href'); // Get the edit URL

                                // Show the SweetAlert confirmation dialog
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'You are about to edit the category',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: '<span class="confirm-button-text">Yes, edit it!</span>',
                                    cancelButtonText: '<span class="cancel-button-text">Cancel</span>',
                                    customClass: {
                                        container: 'sweet-alert-container', // Add a custom class to the container
                                        confirmButton: 'confirm-button', // Add a custom class to the confirm button
                                        cancelButton: 'cancel-button' // Add a custom class to the cancel button
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // If the user confirms, proceed with the edit
                                        window.location.href = editUrl;
                                    }
                                });
                            });
                        });
                        </script>

                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger delete-button"
                            style="font-weight:bold;border:4px solid black;">Delete</a>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
                        <script>
                        // Add a click event listener to the delete buttons
                        const deleteButtons = document.querySelectorAll('.delete-button');
                        deleteButtons.forEach(button => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault(); // Prevent the default click behavior

                                const deleteUrl = button.getAttribute('href'); // Get the delete URL

                                // Show the SweetAlert confirmation dialog
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: 'You are about to delete the category',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: '<span class="confirm-button-text">Yes, delete it!</span>',
                                    cancelButtonText: '<span class="cancel-button-text">Cancel</span>',
                                    customClass: {
                                        container: 'sweet-alert-container',
                                        confirmButton: 'confirm-button', // Add a custom class to the confirm button
                                        cancelButton: 'cancel-button'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // If the user confirms, proceed with the deletion
                                        window.location.href = deleteUrl;
                                    }
                                });
                            });
                        });
                        </script>



                    </td>
                </tr>
                <?php
        }
        ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page-1); ?>">Previous</a></li>
                <?php endif; ?>

                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link"
                        href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo ($page+1); ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</body>

</html>