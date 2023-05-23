<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./kp.jfif">
    <title>Category Create</title>
    <style>
    body {
        background-size: cover;
        animation: pan 6s infinite alternate linear;
        height: 140vh;
    }

    @keyframes pan {
        100% {
            background-position: 100% 50%
        }
    }

    svg {
        transform: rotate(60deg);
    }

    input {
        font-weight: bold;

    }
    </style>
</head>

<body style="background-image: url('./1kps.jpg');">

    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Add New Category</h1>
            <div>
                <a href="index-3.php" class="btn btn-primary" style="font-weight:bold;border:4px solid black;">Back</a>
            </div>
        </header>

        <form id="myForm" action="process.php" method="post">
            <div class="form-elemnt my-4">
                <input type="title" class="form-control" name="title" placeholder="title:"
                    style="border:4px solid black;font-weight:bold;" required>
            </div>


            <div class="form-element my-4">
                <input type="number" name="price" id="price" class="form-control" placeholder="Price"
                    style="border: 4px solid black; font-weight: bold;" required>
                <span id="unit-label"></span>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#price').on('input', function() {
                    var productType = $('input[name="productType"]:checked').val();
                    var unitLabel = '';

                    if (productType === 'cold-drinks') {
                        unitLabel = 'liter';
                    } else if (productType === 'grocery') {
                        unitLabel = 'kg';
                    }

                    $('#unit-label').text(unitLabel);
                });
            });
            </script>

            <div class="form-element my-4">
                <input type="text" name="sku" id="sku" class="form-control"
                    style="font-weight:bold;border:4px solid black;" placeholder="Enter The sku:" required>
            </div>
            <div class="form-element my-4">
                <textarea name="description" value="description" class="form-control"
                    style="font-weight:bold;border:4px solid black;" placeholder="Enter The Description:"
                    required></textarea>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Category" class="btn btn-success"
                    style="font-weight:bold;border:4px solid black;" required>
            </div>
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
                },
            },
            messages: {

                title: {
                    required: "<p style='font-weight:bold;font-size:20px;color:red;'>Please enter category Title</p>"
                },
                description: {
                    required: "<p style='font-weight:bold;font-size:20px;color:red;'>Please enter category description</p>"
                },
                image: {
                    required: "<p style='font-weight:bold;font-size:20px;color:red;'>Please select an image</p>",
                    console: "<p style='font-weight:bold;font-size:20px;color:red;'>Please select a valid image format (jpg, jpeg, png, gif)</p>"
                }
            }
        });
    });
    </script>
</body>

</html