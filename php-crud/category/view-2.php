<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./images/ks.jpeg">
    <title>Category Details</title>
    <style>
    .book-details {
        background-color: #f5f5f5;
    }

    body {

        background-size: cover;
        animation: pan 6s infinite alternate linear;
        height: 100vh;
    }

    @keyframes pan {
        100% {
            background-position: 15% 60%
        }
    }

    svg {
        transform: rotate(60deg);
    }
    </style>
</head>

<body style="background-image: url('./1kps.jpg');">
    <div class=" container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Category Details</h1>
            <div>
                <a href="index-3.php" class="btn btn-primary" style="font-weight:bold;border:4px solid black;">Back</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("connect-2.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM category1 WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
            <h3>id:</h3>
            <p><?php echo $row["id"]; ?></p>
            <h3>Title:</h3>
            <p><?php echo $row["title"]; ?></p>
            <h3>price</h3>
            <p><?php echo $row["price"]; ?></p>
            <h3>sku</h3>
            <p><?php echo $row["sku"]; ?></p>
            <h3>Description:</h3>
            <p><?php echo $row["description"]; ?></p>


            <?php
                }
            }
            else{
                echo "<h3>No Record found</h3>";
            }
            ?>

        </div>
    </div>
</body>

</html>