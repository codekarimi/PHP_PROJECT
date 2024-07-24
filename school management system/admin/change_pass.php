<?php include("header.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>

    <?php include("sidenav.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="col-md-12">
                    <div class="row d-flex justify-content-center">

                        <div class="col-md-6 my-4">
                            <form action="" method="post" id="change_pass_form">
                                <div class="result"></div>
                                <h3 class="text-center my-2">Change Password</h3>
                                <label for="">Old Password</label>
                                <input type="password" name="old" id="old" placeholder="Enter Old Password" class="form-control">
                                <label for="">New Password</label>
                                <input type="password" name="new" id="new" placeholder="Enter New Password" class="form-control">
                                <label for="">New Password</label>
                                <input type="password" name="confirm" id="confirm" placeholder="Enter Confirm Password" class="form-control">

                                <input type="submit" value="Change Password" name="changepass" id="change_Pass" class="form-control btn btn-success my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>


        <script type="text/javascript">
            $(document).ready(function() {

                $('#change_Pass').click(function(event) {

                    event.preventDefault();
                    $.ajax({

                        url: "ajax/change_password.php",
                        method: "POST",
                        data: $("#change_pass_form").serialize(),
                        success: function(data) {
                            $(".result").html(data);
                        }
                    });

                });



            });
        </script>
</body>

</html>