<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./th3.jpg">
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
    </style>
</head>

<body style="background-image: url('./KSP.jpg');">
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Product List</h1>
            <div>
                <a href="create.php" class="btn btn-primary" style="font-weight:bold;border:4px solid black;">Add New
                    Product</a>
                <a href="signuppage.php" class="btn btn-info"
                    style="font-weight:bold;border:4px solid black;color:white;">Signup</a>
                <a href="login.php" class="btn btn-info"
                    style="font-weight:bold;border:4px solid black;color:white;">Login</a>
            </div>
        </header>
        <?php
        session_start();
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
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-success"
                            style="font-weight:bold;border:4px solid black;">Edit</a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger"
                            style="font-weight:bold;border:4px solid black;">Delete</a>
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
