<?php
$pdo = new PDO('mysql:host=localhost;dbname=micro_blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connecte=false;
  if(isset($_COOKIE['Uncookie']))
  {

    $cook=$_COOKIE['Uncookie'];
    $query = "Select * from utilisateur where sid=?";
    $prep = $pdo->prepare($query);
    $prep->bindValue(1, $cook);
    $prep->execute();

    if($data=$prep->fetch()){
      $connecte=true;

    }
  }

?>