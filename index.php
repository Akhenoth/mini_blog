<?php
include('includes/connexion.inc.php');
include('includes/haut.inc.php');
?>

<div class="row">              
  <form method="post" action='message.php'>
    <div class="col-sm-10">  
      <div class="form-group">
       <?php
       /*Si on a un ID, on récupère la donnée en base*/
        if(isset($_GET['id']) && !empty($_GET['id'])){
        ?>  <input type="hidden" name="id" value="<?=$_GET['id']?>">  
        <?php 
          $query = 'SELECT * FROM messages WHERE id='.$_GET['id'];
          $msgmodif = $pdo->query($query)->fetch();
        //  $msgmodif->fetch();
          }
        ?>
        <textarea id="message" name="message" class="form-control" placeholder="Message"><?php if(isset($_GET['id'])){echo $msgmodif['contenu']; } ?></textarea>
      </div>
    </div>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
    </div>                        
  </form>
</div>


<?php
/*Permet d'afficher sur la page les données insérées en base*/
$query = 'SELECT * FROM messages ORDER BY id DESC';
$stmt = $pdo->query($query);

while ($data = $stmt->fetch()) {
    ?>
    <blockquote>
    <!-- Design des messages envoyés -->
        
        <div class="col-md-8"><?= $data['contenu'] ?></div>
        <div class="col-md-1">
        <a href="index.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-info">Modifier</button></a></div>
        <div class="col-md-2">
        <a href="suppression-msg.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
        </div>
    </blockquote>
    <?php
}
?>

<?php include('includes/bas.inc.php'); ?>