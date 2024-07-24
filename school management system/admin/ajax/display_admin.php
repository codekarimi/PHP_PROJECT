<?php


session_start();
$admin=$_SESSION['admin'];

include('../include/connection.php');


if (isset($_POST['action'])) {
    # code...

    if ($_POST['action'] == 'display') {
        # code...
        $query ="SELECT * FROM admin ORDER BY id ASC";
        $res=mysqli_query($connect,$query);

        $output ="
        <div class='row justify-content-center'>
        <table class='table table-bordered table-striped text-center'>

        <tr>
        <th>ID</th>
        <th>USERNAME</th>
        <th>ACTION</th>
        </tr>
        ";
        while ($row=mysqli_fetch_array($res)) {
            # code...

            $output .="
            <tr>
            <td>".$row["id"]."</td>
            <td>".$row["username"]."</td>
            <td>
            <button id='".$row["id"]."' class='btn btn-danger remove'>Remove</button>
            </td>
            
            </tr>";

        }

         $output .="
            </table>
            </div>
            ";


            echo $output;

    }

    if ($_POST['action'] == 'remove') {
        # code...
        $id =$_POST['id'];

        $query=mysqli_query($connect,"DELETE FROM admin WHERE id='$id'");

        if ($query) {
            # code...
        }
    }
}

?>