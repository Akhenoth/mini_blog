<?php
  include('includes/connexion.inc.php');
  include('includes/haut.inc.php');


  if(isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['pseudo'])){

    /*Vérification de la présence de données déjà existante en base*/
    $verif = "SELECT * FROM utilisateur WHERE pseudo = (:pseudo) OR mail = (:mail)";
    $prep = $pdo -> prepare($verif);
    $prep->bindValue(':pseudo', $_POST['pseudo']);
    $prep->bindValue(':mail', $_POST['mail']);
    $prep->execute();
    $verification = $prep->fetch();
    $rowcount = $prep->rowCount();

    if($rowcount == 0){
      /* Inscription */
      $query = "INSERT INTO utilisateur (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)";
      $prep = $pdo->prepare($query);
      $prep -> bindValue(':pseudo', $_POST['pseudo']);
      $prep ->bindValue(':mail', $_POST['mail']);
      $prep ->bindValue(':mdp', $_POST['mdp']);
      $prep->execute();
    }
    else{ ?>
      <script>
        // Script vérifiant les log (champs vides)
          $(document).ready(function(){
            $('#cache').removeClass();
            $('#cache').addClass("alert alert-danger");
            $('#cache').html("Le pseudo ou le mail est déjà existant.");
            $('#cache').slideDown("slow");
            return false;
          });
          </script>
<?php }
  }
?>

<div id="cache" class="hidden"></div>

<form action="inscription.php" method="POST" id="Form">
  <div class="form-group">
    <label for="pseudo">Pseudonyme</label>
    <input type="input" name='pseudo' class="form-control" id="pseudo" placeholder="Pseudo">
  </div>
  <div class="form-group">
    <label for="mail">E-Mail de connexion</label>
    <input type="input" name='mail' class="form-control" id="mail" placeholder="xxxx@domaine.fr">
  </div>
  <div class="form-group">
    <label for="mdp">Mot de passe</label>
    <input type="password" name='mdp' class="form-control" id="mdp" placeholder="Mot de passe">
  </div>
  <div class="form-group">
    <label for="mdp-conf">Confirmer mot de passe</label>
    <input type="password" name='mdp-conf' class="form-control" id="mdp-conf" placeholder="Confirmer mot de passe">
  </div>
  <button type="submit" id="inscription" class="btn btn-default" onsubmit="PassMatches()">S'inscrire</button>
</form>

<script>
// Script vérifiant les log (champs vides)
  $(document).ready(function(){
    $('#Form').submit(function(){
      if( $('#mail').val() == '' || $('#mdp').val() == '' || $('#pseudo').val() == '' ){

        $('#cache').removeClass();
        $('#cache').addClass("alert alert-danger");
        $('#cache').html("Le pseudo, l'adresse mail et/ou le mot de passe est manquant");
        $('#cache').slideDown("slow");
        return false;
      }

      if( $('#mdp').val() != $('#mdp-conf').val()){
        $('#cache').removeClass();
        $('#cache').addClass("alert alert-danger");
        $('#cache').html("Les mots de passe ne correspondent pas");
        $('#cache').slideDown("slow");
        return false;
      }
      return true;

    });
  }); 

</script>

<?php 
include('includes/bas.inc.php'); 
?> 