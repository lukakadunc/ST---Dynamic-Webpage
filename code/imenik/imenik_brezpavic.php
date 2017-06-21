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


<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
?>




<div class="col-5 col-m-10" id="okvir-okvirja">
    <h3>Kotiček za zabavo</h3>
    <div id="okvir1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="okvir2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <img id="slika1" alt="slika1" src="slike/vw1.png" draggable="true" ondragstart="drag(event)" width="150" height="150">
    <img id="slika2" alt="slika2" src="slike/vw2.png" draggable="true" ondragstart="drag(event)" width="150" height="150"><br>

    <div id="okvir3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div id="okvir4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <img id="slika3" alt="slika3" src="slike/vw3.png" draggable="true" ondragstart="drag(event)" width="150" height="150">
    <img id="slika4" alt="slika4" src="slike/vw4.png" draggable="true" ondragstart="drag(event)" width="150" height="150">
    <div id="okvir5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

<footer class="col-12">
    <p>Luka Kadunc - <a href="viri.html">VIRI</a>    <a href="https://ucilnica.fri.uni-lj.si/mod/assign/view.php?id=13878">UCILNICA</a>  <a href="http://localhost/ST_imenik/code/">ODJAVA</a></p>
</footer>
