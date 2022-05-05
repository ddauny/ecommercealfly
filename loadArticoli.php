<?php
session_start();
include("connection.php");
if (isset($_GET["msg"])) echo $_GET["msg"];
$sql = "select * from articoli where 1";
$i = 0;
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    echo "<div class='container'><div class='row'>";
    while ($row = $result->fetch_assoc()) {
        if ($i < 4) {
            echo $row['img'];
            echo "<div class='col-sm-3'><img src='$row[img]' alt='$row[nome]'><br>$row[nome]<br>$row[prezzo]<br><button onclick='add($row[ID])'>Aggiungi al carrello</button></div>";
            $i++;
        } else {
            echo "</div>";
            $i = 0;
        }
    }
    echo "</div>";
} else {
    header("location:loadArticoli.php?msg=Errore durante il carimento degli articoli");
}
?>
<script>
    function add(id) {
        window.location.replace("addCart.php?id=" + id + "&q=1");
    }
</script>