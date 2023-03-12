<?php
session_start();
$cne=$_POST['cne'];
$_SESSION['cneSes']=$cne;
echo"
<fieldset style='width:700px;'>
<form method='POST' action='index.php'>
<h1> Valider les notes de l'etudiant : $cne </br> Liste des notes.</h1>

<table border=1>
<tr>
<th>Code Module</th>
<th>Libelle</th>
<th>Note</th>
<th></th>
</tr>
";
require "connection.php";
$res=$cnx->query("select note.codeM,libelle,valeur from module,note where note.codeM=module.codeM and CNE='$cne'");
while($resu=$res->fetch_assoc()){

$cm=$resu['codeM'];
$lib=$resu['libelle'];
$note=$resu['valeur'];
$_SESSION['codeMSes']=$cm;
echo"
<tr>
<td>$cm</td>
<td>$lib</td>
<td><input type='text' value='$note' name='nvNote'></td>
<td><a href='modifier.php?cne=$cne&codem=$cm'>Modifier</a></td>

</tr>

";

}

echo"</table></br>
<input type='submit' value='Confirmer'>
</form>
</fieldset>";

?>