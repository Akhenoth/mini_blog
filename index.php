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
  //Nombre de messages par page
  $messagesParPages = 7;
  //Récupération du nombre total de message 
  $nombreMessages = 'SELECT COUNT(*) AS TotalMessages FROM messages';
  $prep = $pdo->prepare($nombreMessages);
  $prep->execute();
  $donneesTotales = $prep->fetch();
  $total = $donneesTotales['TotalMessages'];
  //Compter le nombre de pages vis à vis du nombre de messages à afficher
  $nombrePages = ceil($total/$messagesParPages);

  if(isset($_GET['page'])){
    $pageActuelle=intval($_GET['page']);
    if($pageActuelle > $nombrePages){
      $pageActuelle = $nombrePages;
    }
  }else{
    $pageActuelle=1;
  }
  //Récupération de la derniere donnée pour afficher à partir du bon message
  $lecturePremiereDonnee = ($pageActuelle-1)*$messagesParPages;

  $lectureMessage = 'SELECT * FROM messages ORDER BY id DESC LIMIT '.$lecturePremiereDonnee.','.$messagesParPages.'';
  $prepa = $pdo->prepare($lectureMessage);
  $prepa ->execute();

  while ($data = $prepa->fetch()) {
     
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

  for($i=1; $i<=$nombrePages; $i++){
    if($i==$pageActuelle){
      echo '<ul class="pagination">
            <li><a href="#">'.$i.'</a></li>
            </ul>';
    }else{ 
      echo '<ul class="pagination">
            <li><a href="index.php?page='.$i.'">'.$i.'</a></li>
           </ul>';
      }
  }

?>

<?php include('includes/bas.inc.php'); ?>

<!-- UNIX_TIMESTAMP lors de l'ajout ou de la modification d'une date -->
<!-- setcookie('nom','valeur',validité en seconde')
$_COOKIE('nom')
mot d epasse -> MD5 permet de crypter la chaine de caractère // comparer les deux MD5 lors de la connection
fonction en phph déjà dispo pour MD5 voir doc

