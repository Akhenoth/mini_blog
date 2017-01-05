<!-- if(){
  requete préparée de vérification utilisateur (where email = email et mdp = md5(mdp))
   SI OK génération sid
  stockage sid dans le cookie et dans la bd (mettre à jour l'utilisateur avec l'identifiant de session)
}else{ -->

<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');

/*Hachage du mot de passe*/
if(isset($_POST['pseudo']) && isset($_POST['mdp'])){
  /* Vérification de la connexion */
  $query = 'SELECT id FROM utilisateur WHERE pseudo = (:pseudo) AND mdp=(:mdp)';
  $prep = $pdo->prepare($query);
  $prep ->bindValue(':pseudo', $_POST['pseudo']);
  $prep ->bindValue(':mdp', $_POST['mdp']);
  $prep->execute();
  $resultat = $prep->fetch();
  $recount = $prep->rowCount();

  if($recount == 0){
    ?><script>alert('Mauvais identifiant ou mot de passe !');</script> <?php
  }else{



    $sid = md5($_POST['pseudo']).time();


    setcookie('Uncookie',$sid, time()+6*60,null, null, false, true);
    
      $query = "UPDATE utilisateur SET sid = ? WHERE pseudo=? and mdp=?";
            $prep = $pdo->prepare($query);
            $prep->bindValue(1, $sid);
            $prep->bindValue(2, $_POST['pseudo']);
            $prep->bindValue(3, $_POST['mdp']);
            $prep->execute();
    header('Location: index.php');
  //  $_SESSION['pseudo'] = $pseudo;
  }

}




  



?>

<form action="connexion.php" method="POST">
  <div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="input" name='pseudo'class="form-control" id="pseudo" placeholder="UnPseudoCommeUnAutre">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" name='mdp' class="form-control" id="mdp" placeholder="°°°°°°°">
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