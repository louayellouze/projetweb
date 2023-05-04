<?php
include ("../../Controller/commentaireC.php");
include ("../../Model/commentaireModel.php");

session_start();

$id_u=$_SESSION['id_u'];
$id_p=$_SESSION['id_p'];
$id_c=$_SESSION['id_c'];

$date=$_POST['date'];
$commentaire=$_POST['commentaire'];


$comC = new CommentaireC();
$comC->modifier_commentaire($id_p,$id_u,$commentaire,$date,$id_c);

header("location: detail.php?id=$id_p"); 



?>