<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./images/">
    <title>Edit Category</title>
    <style>
    body {
        background-size: cover;
        animation: pan 6s infinite alternate linear;
        height: 130vh;
    }

    @keyframes pan {
        100% {
            background-position: 100% 50%
        }
    }

    svg {
        transform: rotate(60deg);
    }
    </style>
</head>

<body class="container my-5" style="background-image: url('./ksp.jpg');">
    <div>
        <header class="d-flex justify-content-between my-4">
            <h1 style="color:white; ">Edit Category</h1>
            <div>
                <a href="index-3.php" class="btn btn-primary"
                    style="font-weight:bold;border:4px solid black;color:white;background-color:purple;">Back</a>
            </div>
        </header>
        <form id="myForm" action="process.php" method="post">
            <?php 
            
            if (isset($_GET['id'])) {
                include("connect-2.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM category1 WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" style="border:4px solid black;" name="title"
                    placeholder="Category Title:" value="<?php echo $row["title"]; ?>">
            </div>
            <div class="form-element my-4">
                <input type="price" name="price" id="price" class="form-control" placeholder="price"
                    style="border:4px solid black;font-weight:bold;" required value="<?php echo $row["price"]; ?>">
            </div>
            <div class="form-element my-4">
                <input type="sku" name="create" class=" form-control" style="font-weight:bold;border:4px solid black;"
                    required value="<?php echo $row["sku"]; ?>">
            </div>
            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Description:"
                    style="border:4px solid black;" required><?php echo $row["description"]; ?></textarea>
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Category" class="btn btn-success"
                    style="font-weight:bold;border:4px solid black;">
            </div>
            <?php
            }else{
                echo "<h3 style='font-weight:bold;'>Category  Does Not Exist</h3>";
            }
            ?>

        </form>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                title: {
                    required: true
                },
                price: {
                    required: true,

                },
                sku: {
                    required: true,
                },
                description: {
                    required: true
                }
            },
            messages: {

                Title: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please enter category Title</p>"
                },
                price: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please  insert price</p>",

                },
                sku: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please enter category sku</p>"
                },
                description: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please enter category description</p>"
                }
            }
        });
    });
    </script>
</body>

</html>