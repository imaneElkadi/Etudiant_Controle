<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <h1 style="color:brown;">Choix Etudiant</h1>
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<fieldset style="width:200px;">
    <form action="validateNotes.php" method="POST">
    <table>
        <tr>
   <td><label for="cne">CNE</label></td>
    </tr>
    <tr>
    <td><select name="cne" style="width:5cm; height:0.7cm; border-color:green;"  class="form-select" aria-label="Default select example" >

<?php

session_start();
require "connection.php";
$res=$cnx->query("select cne,nom from etudiant");
while($resultat=$res->fetch_assoc()){

$cne=$resultat['cne'];
$nom=$resultat['nom'];
echo"
<option value='$cne'>$nom
</option>
";
}

?>
    </select></td>
    </tr>

    <tr>
    <td><button type="submit" class="btn"> Valider Notes</button></td>
    </tr>
    </table>
    </form>
    </fieldset>
</body>
</html>
<?php

if(isset($_POST['confirmer'])){
    foreach($_POST['nvNote'] as $note){
    $cne=$_SESSION['cneSes'];
   $cm= $_SESSION['codeMSes'];
   
$rq="update note set valeur=$note where CNE='$cne' and codeM='$cm'";
$cnx->query($rq);

    }
}

?>