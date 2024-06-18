<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <!-- jquery cdn link -->
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

  <!-- jquery Google CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  <!-- fontawesome cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

  <!-- fontawesome cdn for all assests -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <title>HMS</title>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-info bg-info" style="display:flex;justify-content:space-between ;">


    <a href="http://localhost:8080/Hospital%20management%20system/index.php" style="text-decoration: none;">
      <h5 class="text-white">Hospital Management System</h5>
    </a>


    <div class="mr-auto"></div>

    <ul class="navbar-nav">
      <?php
      if (isset($_SESSION['admin'])) { #Check whether a variable is empty. Also check whether the variable is set/declared

        $user = $_SESSION['admin'];

        echo '
            <li class="nav-item"><a href="" class="nav-link text-white">', $user, '</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
';
      }else if (isset($_SESSION['doctor'])) {

        $user = $_SESSION['doctor'];
        echo '
            <li class="nav-item"><a href="" class="nav-link text-white">',$user, '</a></li>
            <li class="nav-item"><a href="http://localhost:8080/Hospital management system/doctor/logout.php" class="nav-link text-white">logout</a></li>
';

      }elseif (isset($_SESSION['patient'])) {

        $user = $_SESSION['patient'];
        echo '
            <li class="nav-item"><a href="" class="nav-link text-white">', $user, '</a></li>
            <li class="nav-item"><a href="http://localhost:8080/Hospital management system/patient/logout.php" class="nav-link text-white">logout</a></li>
';
      }
      else {
        echo '

            <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
            <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
            <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>
';
      }

      ?>
    </ul>
  </nav>




</body>

</html>