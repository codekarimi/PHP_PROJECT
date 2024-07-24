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
                        <div class="col-md-6">
                            <h3 class="tex-center my-3">Add New Member</h3>

                            <div class="add_result"></div>
                            <form action="" id="add_admin_form" method="post">

                                <label for="">Username</label>
                                <input type="text" name="uname" id="uname" placeholder="Enter Username" class="form-control" autocomplete="off">
                                <label for="">Password</label>
                                <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control" autocomplete="off">
                                <label for="">Confirm Password</label>
                                <input type="password" name="con_pass" id="con_pass" placeholder="Confirm Password" class="form-control" autocomplete="off">
                                <input type="submit" value="Add New Admin" name="add_admin" class="btn btn-success my-3" id="add_admin">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="display_admin"></div>

        <?php include("footer.php"); ?>

        <script type="text/javascript">
            $(document).ready(function() {

                $('#add_admin').click(function(event) {
                    event.preventDefault();

                    $.ajax({
                        method: "POST",
                        url: "ajax/add_remove_admin.php",
                        data: $("#add_admin_form").serialize(), //The serialize() method creates a URL encoded text string by serializing form values.
                        success: function(data) {
                            $(".add_result").html(data) //any thing that happens in the php

                        }
                    })


                })


                function display_admin() {
                    var action = "display";

                    $.ajax({
                        method: "POST",
                        url: "ajax/display_admin.php",
                        data: {
                            action:action
                        },
                        success: function(data) {
                            $(".display_admin").html(data)
                        }
                    })

                    

                }

                display_admin();

                //remove admin
                $(document).on("click", ".remove", function() {
                    var id = $(this).attr("id"); //collecting 
                    var action = "remove";
                    $.ajax({
                        method: "POST",
                        url: 'ajax/display_admin.php',
                        data: {
                            id:id,
                            action:action
                        },
                        success: function(data) {
                            display_admin();
                        }
                    })

                })


                //disable admin
                 $(document).on("click", ".disable", function() {
                    var id = $(this).attr("id"); //collecting 
                    var action = "remove";
                    $.ajax({
                        method: "POST",
                        url: 'ajax/display_admin.php',
                        data: {
                            id:id,
                            action:action
                        },
                        success: function(data) {
                            display_admin();
                        }
                    })

                })

            })
        </script>
</body>



</html>