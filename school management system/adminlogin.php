<?php

include('./include/header.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background: #d0d5db;">

    <div class="container">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 shadow-sm bg-white my-5">

                    <h5 class="text-center">Admin Login</h5>
                    <form action="" method="post">
                        <div id="login-result"></div>
                        <label for="">Username</label>
                        <input type="text" name="uname" id="username" class="form-control my-2" placeholder="Enter Username" autocomplete="off">
                        <label for="">Password</label>
                        <input type="password" name="pass" id="password" class="form-control my-2" placeholder="Enter Password" autocomplete="off">

                        <div class="d-grid gap-2">
                            <input type="submit" value="Login" name="login" id="login" class="btn btn-success my-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

    include('./include/footer.php')
    ?>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#login').click(function(event) {
                event.preventDefault(); //The preventDefault() method cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur.

                var password = $('#password').val();
                var username = $('#username').val(); //The .val() method is primarily used to get the values of form elements such as input, select and textarea. When called on an empty collection, it returns undefined.

                $.ajax({
                    method: "POST",
                    url: "ajax/adminlogin.php",
                    data: {
                        username:username,
                        password:password
                    },
                    success: function(data) {
                        $('#login-result').html(data)
                    }
                })


            })
        })
    </script>
</body>

</html>