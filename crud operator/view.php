<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Staus</title>

    <!---BOOOTSTRAP CDN---!-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!---CSS LINK---!-->
    <link rel="stylesheet" href="http://localhost:8080/CRUD%20OPERATOR/stlyes.css">

</head>

<body>
    <div class="container">

        <header class="d-flex justify-content-betweeen my-4">
            <h1>Book List</h1>
            <div>
                <a href="http://localhost:8080/CRUD%20OPERATOR/index.php" class="btn btn-primary">back</a>
            </div>

        </header>
        <div class="book-details my-4">
            <?php
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                include("connect.php");
                $sql = "SELECT * FROM books WHERE ID='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
            }

            ?>
            <h2>Title</h2>
            <p><?php
                echo $row['Title']
                ?></p>
            <h2>Description</h2>
            <p><?php
                echo $row['Description']
                ?></p>
            <h2>Type</h2>
            <p><?php
                echo $row['Type']
                ?></p>
            <h2>Author</h2>
            <p><?php
                echo $row['Author']
                ?></p>



        </div>
    </div>

</body>

</html>