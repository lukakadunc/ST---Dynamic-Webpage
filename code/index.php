<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Interni imenik</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>


<!--Povezava z bazo-->
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "imenik");
if (mysqli_connect_errno())
{
    echo "Link z bazo ni uspesen:";
    echo mysqli_connect_error();
    exit();
}

?>



  <nav class="green" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  </div>




  <!-- Login -->
  <div class="section"></div>
  <main>
      <center>

          <div class="section"></div>
          <h2 class="light-blue-text">KADUNC d.o.o</h2>
          <h5 class="light-blue-text">Prosimo prijavite se če želite dostopati do imenika.</h5>
          <div class="section"></div>

          <div class="container">
              <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                  <form class="col s12" method="post">
                      <div class='row'>
                          <div class='col s12'>
                          </div>
                      </div>

                      <div class='row'>
                          <div class='input-field col s12'>
                              <input class='validate' type='email' name='email' id='email' />
                              <label for='email'>Vnesite e-mail</label>
                          </div>
                      </div>

                      <div class='row'>
                          <div class='input-field col s12'>
                              <input class='validate' type='password' name='password' id='password' />
                              <label for='password'>Vnesite geslo</label>
                          </div>
                          <label style='float: right;'>
                              <a class='light-blue-text' href='admin_login.php'><b>Admin</b></a>
                          </label>
                      </div>

                      <br />
                      <center>
                          <div class='row'>
                              <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect light-blue lighten-1'>Login</button>
                          </div>
                      </center>
                  </form>
              </div>
          </div>
          <a href="register.php">Registracija</a>
      </center>

      <div class="section"></div>
      <div class="section"></div>
  </main>

<?php
if(isset($_SESSION['email']))
{
    unset($_SESSION['email'], $_SESSION['userid']);
    session_unset();
    echo '<p>YOU HAVE LOGOUT</p>';
}
else{

    if (isset($_POST['email'], $_POST['password'])) {

        if (get_magic_quotes_gpc()) {
            $ousername = stripslashes($_POST['email']);
            $email = mysqli_real_escape_string($mysqli, stripslashes($_POST['email']));
            $password = stripslashes($_POST['password']);
        } else {
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $password = $_POST['password'];
        }

        $req = mysqli_query($mysqli, 'select geslo,id_user from uporabnik where email="' . $email . '"');
        $dn = mysqli_fetch_array($req);

        if ($dn['geslo'] == $password and $password != "") {
            $form = false;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['userid'] = $dn['id_user'];
            $datum = date_create()->format('Y-m-d H:i:s');
            Redirect('/ST_imenik/code/imenik/imenik_brezpavic.php');
        } else {
            $form = true;
            $message = 'Napacno geslo.';
        }
    } else {
        $form = true;
    }
    if ($form) {
        if (isset($message)){
            echo '<div class="message">' . $message . '</div>';
        }
    }
}
?>





<footer class="page-footer green">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Zakaj ravno imenik?</h5>
          <p class="grey-text text-lighten-4">Ker v podjetju SRC imamo nekaj podobnega vendar je zelo slabo narejeno</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Ostale povezave</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" >Luka Kadunc</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
<!-- Pomozne funkcije -->
<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
?>

  </body>
</html>
