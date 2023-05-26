<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/
    jquery/3.3.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./th3.jpg">
    <title>Category Create</title>
    <style>
    body {
        background-size: cover;
        animation: pan 5s infinite alternate linear;
        height: 100vh;
    }

    @keyframes pan {
        100% {
            background-position: 100% 80%;
        }
    }

    svg {
        transform: rotate(60deg);
    }

    input {
        font-weight: bold;

    }

    label.error {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    input.error {
        border-color: red;
    }
    </style>
</head>

<body style="background-image: url('./KSPA.jpg');">

    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1 style="color:aliceblue;">Add New Product</h1>
            <div>
                <a href="products.php" class="btn btn-primary" style="font-weight:bold;border:4px solid black;">Back</a>
            </div>
        </header>

        <form action="process.php" id="myForm" method="post" enctype="multipart/form-data">

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="product" placeholder="product name:"
                    style="border:4px solid black;font-weight:bold;" required>
            </div>
            <div class="form-elemnt my-4">
                <select name="type" id="" class="form-control" style="border:4px solid black;font-weight:bold;"
                    required>
                    <option value="">Select Category Type:</option>
                    <option value="Fruit">Fruit</option>
                    <option value="Grocery">Grocery</option>
                    <option value="Vegetables">Vegetables</option>
                    <option value="Cold-drinks">Cold-drinks</option>
                    <option value="Laptops">Laptops</option>
                    <option value="Mobile Accesories">Mobile accsories</option>
                    <option value="Elctronicas item  ">Electronicas item</option>
                    <option value="T-shirt">T-shirt</option>
                </select>
            </div>
            <div class="form-element my-4">
                <label for="image" style="color:white;font-weight:bold;">Image:</label>
                <input type="file" id="image" name="image" required>
            </div>
            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Description:"
                    style="border:4px solid black;font-weight:bold;" required></textarea>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Category" class="btn btn-success"
                    style="font-weight:bold;border:4px solid black;" required>
                <input type="submit" class="btn btn-success" style="border:4px solid black;font-weight:bold;"
                    name="export" value="Export to Excel">
            </div>

        </form>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                product: {
                    required: true

                },
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
                    accept: "image/*",
                    extension: "jpg|jpeg|png|gif"


                }
            },
            messages: {
                product: {
                    product: "Please enter a product name",
                },
                type: {
                    required: "<p style='font-weight:bold;font-size:20px;'>Please select appropriate Type</p>"
                },
                name: {
                    required: "<p style='font-weight:bold;font-size:20px;'>Please enter product name</p>"
                },
                description: {
                    required: "<p style='font-weight:bold;font-size:20px;'>Please enter product description</p>"
                },
                image: {
                    required: "<p style='font-weight:bold;font-size:20px;'>Please select an image</p>",
                    extension: "<p style='font-weight:bold;font-size:20px;'>Please select a valid image format (jpg, jpeg, png, gif)</p>"
                }

            }
        });
    });
    </script>
</body>

</html