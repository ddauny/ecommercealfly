<?php
session_start();
include("connection.php");
$user = $_POST["email"];
$pass = md5($_POST["password"]);
$sql = "select ID, nome, admin from utenti where password = '$pass' and email = '$user'";
$result = mysqli_query($conn, $sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $_SESSION["id"] = $row["ID"];
    $_SESSION["name"] = $row["nome"];
    if($row["admin"] == 1) $_SESSION["admin"] = 1;
    $sql = "select ID from carrelli where IDUtente = $row[ID]";//prendo il carrello se c'è
    $result = mysqli_query($conn, $sql);


    if($result == null)//se il carrello non c'è
    {//lo creo e lo associo
        $sql = "insert into carrelli (IDUtente) values ($row[ID])";//inserisco nuovo carrello
        $result = mysqli_query($conn, $sql);

        $sql = "select ID from carrelli where IDUtente = $row[ID]";//prendo id carrello
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        
    //    echo $_SESSION["idCarrello"];
    } else {
        $row = $result->fetch_assoc();
    }


    $_SESSION["idCarrello"] = $row["ID"];
    header("location:index.php");
} else {
    header("location:login.php?msg=Utente non trovato");
}
?>
