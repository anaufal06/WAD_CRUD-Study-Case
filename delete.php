<?php
include 'config.php';

if(isset($_GET['idBook']) && !empty($_GET['idBook'])) {
    $idBook = $_GET['idBook'];
    
    $sql = "DELETE FROM product WHERE idBook = $idBook";
    
    if($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error delete : " . $conn->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>