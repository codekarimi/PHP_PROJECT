<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit book</title>

    <!---BOOOTSTRAP CDN---!-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!---CSS LINK---!-->
    <link rel="stylesheet" href="http://localhost:8080/CRUD%20OPERATOR/stlyes.css">
</head>

<body>

    <div class="container">

        <header class="d-flex justify-content-betweeen my-4">
            <h1>Add New Book</h1>
            <div>
                <a href="http://localhost:8080/CRUD%20OPERATOR/index.php" class="btn btn-primary">Back</a>
            </div>

        </header>

        <?php
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            include("connect.php");
            $sql = "SELECT * FROM books WHERE ID='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

        }
        
        ?>
        <form action="process.php" method="post">
            <div class="form-element my-4">
                <input type="text" name="title" class="form-control" id="" placeholder="Book title">
            </div>
            <div class="form-element my-4">
                <input type="text" name="author" class="form-control" id="" placeholder="Author Name">
            </div>
            <div class="form-element my-4">
                <select name="type" id="" class="form-control">
                    <option value="">Selct book Type</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Fanatansy">Fanatansy</option>
                    <option value="Sci-fi">Sci-fi</option>
                    <option value="Horror">Horror</option>
                </select>
            </div>
            <div class="form-element my-4">
                <input type="text" name="description" class="form-control" id="" placeholder="Book Description">
            </div>

            <div class="form-element">
                <input type="submit" name="create" value="Add book" class="btn btn-primary">
            </div>

        </form>
    </div>
</body>

</html>