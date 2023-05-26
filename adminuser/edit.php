<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./images.png">
    <title>Edit Product</title>
    <style>
    body {
        background-size: cover;
        animation: pan 6s infinite alternate linear;
        height: 110vh;
    }

    @keyframes pan {
        100% {
            background-position: 100% 80%;
        }
    }

    svg {
        transform: rotate(20deg);
    }
    </style>
</head>

<body class="container my-5" style="background-image: url('./pk.jpg');">
    <div>
        <header class="d-flex justify-content-between my-4">
            <h1 style="color:white;">Edit Product</h1>
            <div>
                <a href="products.php" class="btn btn-primary"
                    style="font-weight:bold;border:3px solid black;color:white;background-color:orange;">Back</a>
            </div>
        </header>
        <form id="myForm" action="process.php" method="post">
            <?php 
            
            if (isset($_GET['id'])) {
                include("connect-2.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM category WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" style="border:4px solid black;" name="name"
                    placeholder="Product name:" value="<?php echo $row["id"]; ?>">
            </div>

            <div class="form-elemnt my-4">
                <select name="type" id="" class="form-control" style="border:4px solid black;" required>
                    <option value="">Select Product Type:</option>
                    <option value="Fruit" <?php if($row["type"]=="Fruit"){echo "selected";} ?>>Fruit
                    </option>
                    <option value="Vegetables" <?php if($row["type"]=="Vegetables"){echo "selected";} ?>>Vegetables
                    </option>
                    <option value="Grocery" <?php if($row["type"]=="Grocery"){echo "selected";} ?>>Grocery</option>
                    <option value="Cold-drinks" <?php if($row["type"]=="Cold-drinks"){echo "selected";} ?>>Cold-drinks
                    </option>
                    <option value="Mobile Accesories" <?php if($row["type"]=="Mobile Accesories"){echo "selected";} ?>>
                        Mobile Accesories</option>
                    <option value="Laptops" <?php if($row["type"]=="Laptop"){echo "selected";} ?>>Laptops
                    </option>
                </select>
            </div>
            <div class="form-element my-4">
                <input type="file" name="file" id="fileInput" class="form-control" placeholder="File"
                    style="border:4px solid black;color:white;">
                <?php
    $image = $row["image"];
    if (!empty($image)) {
        echo '<img src="' . $image . '" alt="Image" width="100">';
    }
    ?>
            </div>

            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Description:"
                    style="border:4px solid black;" required><?php echo $row["description"]; ?></textarea>
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Category" class="btn btn-success"
                    style="font-weight:bold;border:3px solid black;">
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
                type: {
                    required: true
                },
                name: {
                    required: true
                },
                description: {
                    required: true
                },
                image: {
                    required: true,
                    accept: "image/*"
                }
            },
            messages: {
                type: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please select appropriate Type</p>"
                },
                name: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please enter product name</p>"
                },
                description: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please enter product description</p>"
                },
                image: {
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please select an image</p>",
                    required: "<p style='font-weight:bold;font-size:20px;color:white;'>Please select a valid image format (jpg, jpeg, png, gif)</p>"
                }
            }
        });
    });
    </script>
</body>

</html>