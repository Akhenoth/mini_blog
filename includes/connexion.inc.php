<?php
$pdo = new PDO('mysql:host=localhost;dbname=micro_blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connecte=false;
  if(isset($_COOKIE['Uncookie']))
  {

    $cook=$_COOKIE['Uncookie'];
    //var_dump($cook);
    $query = "Select * from utilisateur where sid=?";
    $prep = $pdo->prepare($query);
    $prep->bindValue(1, $cook);
    $prep->execute();

    if($data=$prep->fetch()){
      $connecte=true;

    }
  }

?>

//Ajouter une vérification de cookie pour s'assurer de la connection de l'utilisateur
//Mettre a true une variable globale $_UserConnected -> pour limiter ajouter / supprimer messages 
//Récupérer le pseudo pour l'afficher (message / dans le menu .. )
//Pour la page de déconnexion, lors du setcookie('sid'...., time()-1)
//Le time -1 permet de générer un cookie déjà expiré qui nous assure d'une manière a peu près certaine que les donénes ne seront plus visible
//Puis on refait une redirection