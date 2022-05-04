<?php
session_start();
include("connection.php");
$idUtente = $_SESSION["id"]; //dovrebbe essere di default se non si è loggati
$idCarrello = $_SESSION["idCarrello"];//preso dalla query se loggato else preso dai cookie 
if (isset($_GET["id"])) { //recupero id dell'articolo
    $idArt =  $_GET["id"];
    $sql = "delete from contiene where $idArt = IDArticolo and $idCarrello = IDCarrello";
    $result = $conn->query($sql);
    header("location:cart.php");
} else {
    header("location:cart.php?msg=Errore durante cancellazione");
}
?>
