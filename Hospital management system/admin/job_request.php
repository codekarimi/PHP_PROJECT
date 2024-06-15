<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Request</title>
</head>

<body>

    <?php

    include('../include/header.php');

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include('../admin/sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Job Request</h5>

                    <div id="show"></div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() { //(jquery)Use ready() to make a function available after the document is loaded
            // alert('done');


            show();

            function show() {
                //AJAX is the art of exchanging data with a server, and update parts of a web page - without reloading the whole page. 

                $.ajax({ //Performs an async AJAX request(an Ajax request, this sequence of actions happens behind the scenes, asynchronously, so that the user is not interrupted.)
                    url: 'ajax_job_request.php', //Specifies the URL to send the request to. Default is the current page
                    method: 'POST',
                    success: function(data) { //A function to be run when the request succeeds
                        $("#show").html(data);
                    }
                });
            }


            //Approved button
            $(document).on('click', '.approve', function() {

                var id = $(this).attr('id'); //The attr() method sets or returns attributes and values of the selected elements.
                $.ajax({
                    url: 'ajax_approve.php', //Specifies the URL to send the request to. Default is the current page
                    method: 'POST',
                    data: {
                        id: id
                    }, //Specifies data to be sent to the server
                    success: function(data) { //A function to be run when the request succeeds
                        show();
                    }
                });

            })


            //Reject Button
            $(document).on('click', '.reject', function() {

                var id = $(this).attr('id'); //The attr() method sets or returns attributes and values of the selected elements.
                $.ajax({
                    url: 'ajax_reject.php', //Specifies the URL to send the request to. Default is the current page
                    method: 'POST',
                    data: {
                        id: id
                    }, //Specifies data to be sent to the server
                    success: function(data) { //A function to be run when the request succeeds
                        show();
                    }
                });

            })



        });
    </script>
</body>

</html>