<?php
// set variables after validation
$fName      = validate($_POST['fName']);
$lName      = validate($_POST['lName']);
$email      = validate($_POST['email']);
$street     = validate($_POST['street']);
$street2    = validate($_POST['street2']);
$city       = validate($_POST['city']);
$zip        = validate($_POST['zip']);
$linuxLove  = validate($_POST['linuxLove']);

// error variables
$fnError = $lnError = $emailErro = $unError = $stError = $st2Error = "";
$cityError = $zipError = "";

// set variables after validation
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST['fName']) || !preg_match("/^[a-zA-Z-\'\`]+$/", $_POST['fname']))
        $fnError = "Please enter your first name!";
    else
        $fName = validate($_POST['fName']);

    if(empty($_POST["lName"]) || !preg_match("/^[a-zA-Z-\'\`]+$/", $_POST['lName']))
        $lnError = "Please enter your last name!";
    else
        $lName = validate($_POST['lName']);

    if(empty($_POST["uName"]) || !preg_match("/^\w{3}\w*$/", uName))
        $unError = "Please enter your username! (At least 3 characters)";
    else
        $uName = validate($_POST['uName']);

    if(empty($_POST['email']) || preg_match("/$\w*@[\w-_.]*.\w*$/", $_POST['email']))
        $emailError = "Please enter your email!";
    else
        $email = validate($_POST['email']);

    if(empty($_POST['street']) || preg_match("/$[\w-.,#]*$/", $_POST['street']))
        $stError= "Please enter your street address!";
    else
        $street = validate($_POST['street']);

    $street2 = validate($_POST['street2']);
    if(!preg_match("/^[a-zA-Z0-9]+$/", $street2))
        $st2Error = "Please enter a valid additional address";

    if(empty($_POST['city']) || preg_match("/^[a-zA-Z-\`\']+$/", $_POST['city']))
        $cityError = "Please enter your residential city!";
    else
        $city = validate($_POST['city']);

    if(empty($_POST['zip']) || preg_match("/^[0-9]+$/", $_POST['zip']))
        $zipError = "Please enter your residential zip code!";
    else
        $zip = validate($_POST['zip']);

    if(empty($_POST['linuxLove'])
        $cityError = "Please tell us how you feel about Linux!";
    else
        $linuxLove = validate($_POST['linuxLove']);
}

function validate($input)
// strip input of un-needed chars
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- fav icon -->
    <link rel="shortcut icon" href="./SiteThumb.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  </head>
  <body>
    <!--Site nav bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <!--Logo and brand name-->
      <a class="navbar-brand" href="#">
        <img src="./assets/img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="LinStall Logo">
        LinStall | The One Stop Shop for Linux Installers
      </a>

      <!--Nav bar links-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./index.html">Shop<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Forums</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            |
          <button class="btn btn-outline-success my-2 my-sm-0" type="link">Log In</button>
        </form>

      </div>
    </nav>

    // insert new content here

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
  
  <footer>
    <div class="footer align-bottom">
      <div class="container">
        <br>
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <iframe src="https://ghbtns.com/github-btn.html?user=martinak1&type=follow&count=true&size=large" frameborder="0" scrolling="0" width="220px" height="30px"></iframe>
      </div>
    </div>
  </footer>
</html>
