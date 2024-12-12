<?php
session_start();

//spojenie cisel do kodu
$code = $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4'] . $_POST['digit5'];

//spravny kod
$correctCode = "69304";

if ($code === $correctCode) {
    //ak je kod spravny - nastavit session
    $_SESSION['access_granted'] = true;
    header("Location: sikovna.php");
    exit();
} else {
    //ak je kod nespravny - presmeruj naspat na index.php
    echo "<script>alert('nespravni.kod saska ti nato.prides si sikovne a mudre.dievca!');</script>";
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
?>