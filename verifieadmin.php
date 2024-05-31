<?php 
session_start();
require("connectprojet.php");    
$nom=$_POST['EmailAdmin'];
$pass=$_POST['PasswordAdmin'];
$req="SELECT * FROM admin ";
$stmt=$bd->prepare($req);
$stmt->execute();
$rep=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rep as $row){
    if($row['EmailAdmin']==$nom && $row['PasswordAdmin']==$pass)
    {
        $_SESSION['idAdmin'] = $row['idAdmin'];
        header("location:admin.php");
        exit;
    }
}
header("location:PROJEt_login.php");

?>