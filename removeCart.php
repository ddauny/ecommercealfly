<?php
session_start();
include("connection.php");
$idUtente = $_SESSION["id"]; //dovrebbe essere di default se non si è loggati
$idCarrello = $_SESSION["idCarrello"];//preso dalla query se loggato else preso dai cookie 
if (isset($_GET["id"]) && isset($_GET["q"])) { //recupero id dell'articolo
    $idArt =  $_GET["id"];
    $sql = "delete from contiene where $idArt = IDArticolo and $idCarrello = IDCarrello";
    $result = $conn->query($sql);

    $sql = "select quantita from articoli where ID = $idArt";
    $result = $conn->query($sql);
    $r = $result->fetch_assoc();
    $qPrima = $r["quantita"];
    $qDopo = $qPrima + $_GET["q"];
    $sql = "update articoli set quantita = $qDopo where ID = $idArt"; //aggiorno le quantità nel database
    $conn->query($sql);

    header("location:cart.php");
} else {
    header("location:cart.php?msg=Errore durante cancellazione");
}
?>
