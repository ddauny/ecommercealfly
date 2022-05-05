<?php
session_start();
include("connection.php");
if (isset($_GET["msg"])) echo $_GET["msg"];
if (!isset($_SESSION["id"])) {
    $password = ($_POST["password"]);
    $password2 = ($_POST["password2"]); 
    echo $password . $password2;
    if ($password == $password2) { 
        $cognome = $_POST["cognome"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $indirizzo = $_POST["indirizzo"];  
        $password = md5($password);      
        $sql = "insert into utenti (email, nome, cognome, indirizzo, password) values ('$email','$nome','$cognome','$indirizzo', '$password')";
        if ($conn->query($sql) === true) {
            echo $email;
            $sql = "select ID from utenti where '$email' = email";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["ID"];
            header("location:index.php");
        } else {
            header("location:registrazione.html?msg=Errore nella registrazione");
        }
    }
}
?>
