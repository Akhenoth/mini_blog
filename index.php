<?php
session_start();
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
        <?php if($connecte==true){

        ?>
        <textarea id="message" name="message" class="form-control" placeholder="Message"><?php if(isset($_GET['id'])){echo $msgmodif['contenu']; } ?></textarea>
        
      </div>
    </div>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
      <?php } ?>
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
        
        <?= $data['contenu'] ?>
        <span class ="pull-right">
        <?php if($connecte==true){ ?>
          <a href="index.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-info">Modifier</button></a>
          <a href="suppression-msg.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></span></br>
          <?php  
          }
            echo "Date d'ajout : " ;
            echo date("Y-m-d H-i-s",$data['date_emission']); 
          ?> 
        </span>
    </blockquote>
    <?php
}
?>
<ul class="pagination">
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>  
<?php include('includes/bas.inc.php'); ?>

<!-- UNIX_TIMESTAMP lors de l'ajout ou de la modification d'une date -->
<!-- setcookie('nom','valeur',validité en seconde')
$_COOKIE('nom')
mot d epasse -> MD5 permet de crypter la chaine de caractère // comparer les deux MD5 lors de la connection
fonction en phph déjà dispo pour MD5 voir doc

