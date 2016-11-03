<?php
	include('includes/connexion.inc.php');

/*Vérification de la présence du message*/
	if (isset($_POST['message']) && !empty($_POST['message'])) {

		/*Vérfication de l'ID pour préparer l'update*/
		if(isset($_POST['id']) && !empty($_POST['id'])){
		$query = 'UPDATE message SET contenu WHERE id = (:id)';
		$prep = $pdo->prepare($query);
		$prep->bindValue(':contenu',$_POST['message']);
		$prep->execute();

		}else {
		/*On effectue l'insertion de la donnée dans la base*/
		$query = 'INSERT INTO messages (contenu) VALUES (:contenu)';
		$prep = $pdo->prepare($query);
		$prep->bindValue(':contenu', $_POST['message']);
		$prep->execute();
		}
	}
	

/*Redirection vers la page d'accueil*/
	header('Location: index.php');
?>

