<!-- if(){
  requete préparée de vérification utilisateur (where email = et mdp = md5(mdp))
   SI OK génération sid
  stockage sid dans le cookie et dans la bd (mettre à jour l'utilisateur avec l'identifiant de session)
}else{ -->

<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');
?>

  <form action="connexion.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php include('includes/bas.inc.php'); ?>

<!-- $sid = md5($_POST['email'].time());

DOnnée table utilisateur
ID
Pseudo
Email
Mdp
Sid -->