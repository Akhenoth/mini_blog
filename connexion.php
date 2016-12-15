<!-- if(){
  requete préparée de vérification utilisateur (where email = et mdp = md5(mdp))
   SI OK génération sid
  stockage sid dans le cookie et dans la bd (mettre à jour l'utilisateur avec l'identifiant de session)
}else{ -->

<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

/*Hachage du mot de passe*/


/* Vérification de la connexion */
$query = 'SELECT id FROM utilisateur WHERE pseudo = (:pseudo) AND mdp=(:mdp)';
$prep = $pdo->prepare($query);
$prep ->bindValue(':pseudo', $_POST['pseudo']);
$prep ->bindValue(':mdp', $_POST['mdp']);
$prep->execute();
$resultat = $prep->fetch();
$sid = md5($_POST['pseudo']).time();

if(!$resultat){
  echo 'Mauvais identifiant ou mot de passe !';
}else{
  session_start();
  setcookie(":pseudo",":sid", time()+6*60);
//  $_SESSION['pseudo'] = $pseudo;
  echo 'Vous êtes connecté !';
}



?>

<form action="connexion.php" method="post">
  <div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="input" class="form-control" id="pseudo" placeholder="UnPseudoCommeUnAutre">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" class="form-control" id="mdp" placeholder="°°°°°°°">
  </div>
  <button type="submit" id="connexion" class="btn btn-default">Me connecter</button>
</form>

<?php include('includes/bas.inc.php'); ?>

<!-- $sid = md5($_POST['email'].time());

Donnée table utilisateur
ID
Pseudo
Email
Mdp
Sid 
-->