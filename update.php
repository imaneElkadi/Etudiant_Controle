<?php
session_Start();
require "connection.php";
$note=$_POST['note'];
$codeM=$_SESSION['codeMSes'];
$cne=$_SESSION['cneSes'];

$cnx->query("update note set valeur=$note where CNE='$cne' and codeM=$codeM");
echo"
<h1> Merci .</h1>
</br>
Vous pouvez revenir a la page pricipale:
<a href='index.php'> Page principale</a>


";
?>