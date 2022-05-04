<?php
session_start();
include("connection.php");
if (isset($_SESSION["admin"])) {
    if ($_SESSION["admin"] == 1) {
        $id = $_GET["id"];
        $sql = "delete from articoli where $id = ID";
        $conn->query($sql);
        header("location:index.php");
    }
}

?>