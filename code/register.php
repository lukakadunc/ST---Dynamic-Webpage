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

<!-- Register -->
<div class="section"></div>
<main>
    <center>

        <h5 class="light-blue-text">Registracija</h5>
        <div class="section"></div>

        <div class="container">
            <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 400px">

                <form class="col s12" id="form-register" method="post">
                    <div class='row'>
                        <div class='col s12'>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='text' name='name' id='name'  required="" />
                            <label for='name'>Ime</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='text' name='lastname' id='lastname' required="" />
                            <label for='lastname'>Priimek</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='email' name='email' id='email' required="" />
                            <label for='email'>E-mail</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='tel' name='tel_number' id='tel_number'  required=""/>
                            <label for='tel_number'>Telefonska številka</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='text' name='address' id='address' required=""/>
                            <label for='address'>Naslov</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password' id='password' required="" />
                            <label for='password'>Geslo</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='password_match' id='password_match' required=""/>
                            <label for='password_match'>Ponvono vnesite geslo</label>
                        </div>
                    </div>


                    <br />
                    <center>
                        <div class='row'>
                            <button type='submit'  name='btn_login' class='col s12 btn btn-large waves-effect light-blue lighten-1'>Registracija</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
</main>


<?php

$mysqli = new mysqli("localhost", "root", "", "imenik");
if (mysqli_connect_errno())
{
    echo "Link z bazo ni uspesen:";
    echo mysqli_connect_error();
    exit();
}

/*


$exists = mysql_query("SELECT email FROM uporabniki WHERE email='".$_POST['email']."'");
if(mysql_num_rows($exists) != 0){
    echo '<script>alert("Email že obstaja")</script>';
}
*/

//pregelde, da smo v formo vpisali vse potrebne podatke
if(isset($_POST['name'], $_POST['lastname'],$_POST['email'], $_POST['tel_number'],$_POST['address'],$_POST['password'],$_POST['password_match']))
{

    $_POST['name'] = stripslashes($_POST['name']);
    $_POST['lastname'] = stripslashes($_POST['lastname']);
    $_POST['email'] = stripslashes($_POST['email']);
    $_POST['tel_number'] = stripslashes($_POST['tel_number']);
    $_POST['address'] = stripslashes($_POST['address']);
    $_POST['password'] = stripslashes($_POST['password']);
    $_POST['password_match'] = stripslashes($_POST['password_match']);



    //pregled, da se gesli ujemata
    if($_POST['password']==$_POST['password_match'])
    {
        //pregled, da ima geslo vsaj 1 znak
        if(strlen($_POST['password'])>=1)
        {
            //pregled emaila
            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)!=FALSE)
            {

                $name = mysqli_real_escape_string($mysqli,$_POST['name']);
                $lastname = mysqli_real_escape_string($mysqli,$_POST['lastname']);
                $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                $tel_number = mysqli_real_escape_string($mysqli,$_POST['tel_number']);
                $address = mysqli_real_escape_string($mysqli,$_POST['address']);
                $password = mysqli_real_escape_string($mysqli,$_POST['password']);
                $password_match = mysqli_real_escape_string($mysqli,$_POST['password_match']);
                $delovno_mesto = "mesto1";

                $sql="SELECT id_user FROM uporabnik";
                if ($result=mysqli_query($mysqli,$sql))
                    $st=mysqli_num_rows($result);

                if($st>=0)
                {
                    $id = $st+1;
                    $datum = date_create()->format('Y-m-d H:i:s');
                    mysqli_query($mysqli,'insert into uporabnik(id_user, ime, priimek, email,geslo,tel_st,delovno_mesto,naslov,admin) values ('.$id.', "'.$name.'", "'.$lastname.'", "'.$email.'","'.$password.'","'.$tel_number.'","'.$delovno_mesto.'","'.$address.'",0)');
                    echo '<script>window.location.replace("http://localhost/ST_imenik/imenik/imenik.php");</script>';
                }
            }
        }
    }
}



mysqli_close($mysqli);
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


<!--Pomožne funkcije-->
<script>
    function RegisterPressed() {
        if (window.confirm('Registracija uspešna želite nadaljevati na prijavo?'))
        {
            window.location = "index.php";
            return true;
        }
        else
        {
            document.location = 'index.php';
            return false;
        }
        window.location = "index.php";
        return false;
    }

    function wrongData()
    {
        alert("Vaši vhodni parametri niso OK");
    }


</script>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
