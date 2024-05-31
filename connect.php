<?php 
try {
    $bd=new PDO("mysql:host=localhost;dbname=votes","root","");
} catch (PDOException $e) {
    echo "error". $e->getMessage();
}
?>