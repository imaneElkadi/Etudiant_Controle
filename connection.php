<?php

$cnx=new mysqli('localhost','root','','etudiant');
if($cnx->connect_error)
die("error:$cnx->connect_error");

?>