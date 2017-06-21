<!DOCTYPE html>

<title>Telefonski imenik</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script/scriptImenik.js"></script>
<link href="style.css" rel="stylesheet">



<!-- CSS  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="C:/xampp/htdocs/ST_imenik/css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="C:/xampp/htdocs/ST_imenik/css" type="text/css" rel="stylesheet" media="screen,projection"/>

<header id="header" class="green">
    <h1>Kadunc d.o.o</h1>
</header>


<?php
//lukakadunc lukakadunc
session_start();
//$mysqli = mysqli_connect("localhost", "lukakadunc", "lukakadunc", "imenik1");
$mysqli = mysqli_connect("localhost", "root", "", "imenik");
if (mysqli_connect_errno())
{
    echo "Link z bazo ni uspesen:";
    echo mysqli_connect_error();
    exit();
}


if ($_SESSION['email'] == "")
    Redirect('http://localhost/ST_imenik/code/');

$result = mysqli_query($mysqli, "SELECT * FROM uporabnik");

?>

<div class="row">
 <?php echo '<p> Prijavlejni ste z e-mailom: '.$_SESSION['email'].'</p>' ?>
    <nav class="col-3">
        <div id="search-navigation">
            Isci: <input type="text" id="search" onkeyup="search()" />
            <button id="addBtn" onclick="window.location= '../register.php'">+</button>
            <button id="removeBtn" onclick="removeCustomer()">-</button>
        </div>
    </nav>



    <div id="imenik" >

        <?php
        echo '<table id="imeniktable" class="col-12 col-m-9">';
        ?>
        <tr>

            <th>Ime in Priimek</th>
            <th>E-mail</th>
            <th>Številka</th>
            <th>Naslov</th>
            <th>Delovno mesto</th>
        </tr>

        <?php
        while($row = mysqli_fetch_array($result)){
            echo "<tr>
             <td>".$row['ime']." ".$row['priimek']."</td>
             <td>".$row['email']."</td>
             <td>".$row['tel_st']."</td>
             <td>".$row['naslov']."</td>
             <td>".$row['delovno_mesto']."</td>
             </tr>";
        }


        mysqli_close($mysqli);
        ?>

        </table>
    </div>

</div>



<!-- The Modal -->
<div id="add-window" class="add-window">

    <!-- Modal content -->
    <div id="modal-content" class="modal-content" >
        <fieldset>
            <legend>Dodajte nov kontatk:</legend>
            <label for="first-name">Ime: </label>
            <input id="first-name" type="text" name="first-name" autofocus />
            <br>
            <label for="last-name">Priimek: </label>
            <input id="last-name" type="text" name="last-name" />
            <br>
            <label for="address">Naslov: </label>
            <input id="address" type="text" name="address" />
            <br>
            <label for="phone-number">Telefon: </label>
            <input id="phone-number" type="number" name="phone-number" />
            <br>
            <p id="label"></p>

            <button onclick="addContact()">Dodaj</button>
        </fieldset>
    </div>

</div>

<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
?>


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

<footer class="col-12">
    <p>Luka Kadunc - <a href="viri.html">VIRI</a>    <a href="https://ucilnica.fri.uni-lj.si/mod/assign/view.php?id=13878">UCILNICA</a>  <a href="http://localhost/ST_imenik/code/">ODJAVA</a></p>
</footer>
