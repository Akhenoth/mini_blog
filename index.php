<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');
?>

<div class="row">              
  <form method="post" action='message.php'>
    <div class="col-sm-10">  
      <div class="form-group">
       <?php
       /*Si on a un ID, on récupère la donné en base*/
        if(isset($_GET['id']) && !empty($_GET['id'])){
        ?>  <input type="hidden" name="id" value="">  
        <?php 
          $query = 'SELECT * FROM messages WHERE id='.$_GET['id'];
          $msgmodif = $pdo->query($query)->fetch();
        //  $msgmodif->fetch();
          }
        ?>
        <textarea id="message" name="message" class="form-control" placeholder="Message"> 
        <?php 
        /*et on l'affiche ici*/
          if(isset($_GET['id'])){
            echo $msgmodif['contenu'];
          }
        ?>  
        </textarea>
      </div>
    </div>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
    </div>                        
  </form>
</div>

<button type="button" class="btn btn-info">Info</button>

<?php
/*Permet d'afficher sur la page les données insérées en base*/
$query = 'SELECT * FROM messages ORDER BY id DESC';
$stmt = $pdo->query($query);

while ($data = $stmt->fetch()) {
    ?>
    <blockquote>
    <!-- Design des messages envoyés -->
        <?= $data['contenu'] ?>
        <a href="index.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-info">Modifier</button></a>
    </blockquote>
    <?php
}
?>

<?php include('includes/bas.inc.php'); ?>