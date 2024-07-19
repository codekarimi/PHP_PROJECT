<?php

include('./include/header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>School Mangament System</title>
</head>

<body>

    <section>
        <div class="overlay">

        </div>

        <div class="main col-md-4 text-center">
            <h3 class="text-white">Programming with Karimi</h3>
            <a href="#main"> <button class="btn btn-danger my-4 text-center">GET Started</button> </a>

        </div>

    </section>

    <main id="main">
        <div class="col-md-12 my-2">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-5">
                    <img src="./img/teacher1.jpg" alt="">
                </div>
                <div class="col-md-5">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, eligendi repellendus hic vero ipsum explicabo iusto, ratione adipisci aliquam expedita quidem minus, tenetur id ex quae? Perspiciatis doloremque totam minus laborum aperiam, officia qui inventore! Voluptates iusto maiores minus quasi totam quidem obcaecati consectetur dignissimos, illum eligendi ipsum dolorem qui. Facere provident deserunt perspicia</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 my-2">
            <div class="row d-flex justify-content-center text-center">

                <div class="col-md-5">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere, eligendi repellendus hic vero ipsum explicabo iusto, ratione adipisci aliquam expedita quidem minus, tenetur id ex quae? Perspiciatis doloremque totam minus laborum aperiam, officia qui inventore! Voluptates iusto maiores minus quasi totam quidem obcaecati consectetur dignissimos, illum eligendi ipsum dolorem qui. Facere provident deserunt perspicia</p>
                </div>

                <div class="col-md-5">
                    <img src="./img/teaecher2.jpg" alt="">
                </div>

            </div>
        </div>


        <div class="col-md-12 my-4">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-3">
                    <div class="col-md-12">
                        <img src="./img/teacher4.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <img src="./img/teacher5.png" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12">
                        <img src="./img/teacher6.png" alt="">
                    </div>
                </div>
            </div>


        </div>

        <div class="col-md-12">
            <div class="row d-flex justify-content-center text-center">
                <h3 class="text-center my-5">Contant Us</h3>
                <div class="col-md-5">
                    <h4><b>Get in Touch</b></h4>
                    <p>My Adresss</p>
                    <p>+2354115107853</p>
                    <p>Ckarim676@gmail.com</p>
                </div>
                <div class="col-md-5">
                    <h4>Send Message</h4>
                    <form action="" method="post">

                        <input type="text" name="name" id="" class="form-control my-2" placeholder="Your Name">
                        <input type="email" name="email" id="" class="form-control my-2" placeholder="Your Email">
                        <input type="text" name="subject" id="" class="form-control my-2" placeholder="Enter Message Sugject">

                        <textarea name="message" id="" style="height: 200px;" class="form-control"></textarea>

                        <input type="submit" value="send message" name="send" class="btn btn-info btn-lg my-2 text-white">

                    </form>
                </div>
            </div>
        </div>



    </main>

    <?php

    include('./include/footer.php');
    ?>

</body>

</html>