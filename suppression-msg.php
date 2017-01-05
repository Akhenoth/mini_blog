<?php
	include('includes/connexion.inc.php');

	if($connecte == true){
		/*Vérfication de l'ID pour préparer l'update*/
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$query = 'DELETE FROM messages WHERE id = (:id)';
			$prep = $pdo->prepare($query);
			$prep->bindValue(':id',$_GET['id']);
			$prep->execute();
		}
	}
	

	

/*Redirection vers la page d'accueil*/
	header('Location: index.php');
?>
