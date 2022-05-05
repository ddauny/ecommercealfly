<?php
session_start();
include("connection.php");
//$id = $_SESSION["id"]; //dovrebbe essere di default se non si è loggati
$q = $_GET["q"]; //quantita


if (isset($_GET["id"])) { //recupero id dell'articolo
    $idArt =  $_GET["id"];
    $idCarrello = $_SESSION["idCarrello"];
   // echo $idCarrello;
    // if (isset($_SESSION["id"])) {
    //     $sql = "select ID from carrelli where IDUtente = $id";
    //     $result = $conn->query($sql);
    //     $row = $result->fetch_assoc();
    //     $idCarrello = $row["ID"]; //salvo id carrello da inserire in contiene
    // } else {
    //     $idCarrello = $_SESSION["idCarrello"]; //salvo id carrello da inserire in contiene
    // }
} else {
    header("location:index.php");
}
$quantita = 0; //quantita dell'articolo già presente
$sql = "select quantita from contiene where IDCarrello = $idCarrello and IDArticolo = $idArt";
$result = $conn->query($sql);
if ($result != null) {
    $sql = "select quantita from articoli where ID = $idArt";
    $resultt = $conn->query($sql);
    $r = $resultt->fetch_assoc();
    $qPrima = $r["quantita"];
    
    if ($result->num_rows > 0) { //avrei già l'articolo nel carrello
        $row = $result->fetch_assoc();
        $quantita = $row["quantita"]; //salvo la quantità
        $quantita = $quantita + $q;
        $sql = "update contiene set quantita = $quantita where IDCarrello = $idCarrello and IDArticolo = $idArt";
        $conn->query($sql);
        
        $qDopo = $qPrima - $quantita;//aggiorno la quantita disponibile dopo aver messo nel carrello
        $sql = "update articoli set quantita = $qDopo where ID = $idArt"; //aggiorno le quantità nel database
        $conn->query($sql);
        
        header("location:index.php");
    } else { //se invece l'articolo non era già presente
        $qDopo = $qPrima - $q;
        $sql = "update articoli set quantita = $qDopo where ID = $idArt"; //aggiorno le quantità nel database
        $conn->query($sql);

        $sql = $conn->prepare("insert into contiene (IDArticolo, IDCarrello, quantita) values (?,?,?)");
        $sql->bind_param("iii", $idArt, $idCarrello, $q);
        if ($sql->execute() === TRUE) {
            header("location:index.php");
        } else {
            header("location:index.php?msg=Errore durante inserimento al carrello");
        }
    }
}
