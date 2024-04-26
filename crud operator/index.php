<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>

    <!---BOOOTSTRAP CDN---!-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<div class="container">

    <header class="d-flex justify-content-betweeen my-4">
        <h1>Book List</h1>
        <div>
            <a href="/create.php" class="btn btn-primary">Add new book</a>
        </div>

    </header>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("connect.php");
            $sql = "SELECT *  FROM books";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php
                        echo $row['ID'];
                        ?></td>
                    <td><?php
                        echo $row['Title'];
                        ?></td>
                    <td><?php
                        echo $row['Author'];
                        ?></td>
                    <td><?php
                        echo $row['Type'];
                        ?></td>

                    <td>
                        <a href="view.php?id=<?php
                                                echo $row['ID'];
                                                ?>" class="btn  btn-info">Read More</a>
                        <a href="edit.php?id=<?php
                                                echo $row['ID'];
                                                ?>" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            }
            print_r($row);
            ?>
        </tbody>
    </table>


</div>

<body>

</body>

</html>