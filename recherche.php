<?php
	include('includes/connexion.inc.php');

	if($connecte == true){
		/*Vérfication de l'ID pour préparer l'update*/
		if(isset($_GET['search']) && !empty($_GET['search'])){
			$query = 'SELECT * FROM messages WHERE contenu = (:search)';
			$prep = $pdo->prepare($query);
			$prep->bindValue(':search',$_GET['contenu']);
			$prep->execute();
		}
	}
	

	

/*Redirection vers la page d'accueil*/
	header('Location: index.php');
?>
