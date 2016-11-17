<?php
	include('includes/connexion.inc.php');


/*Vérification de la présence du message*/
	if (isset($_POST['id']) && !empty($_POST['id'])) {
		/*Vérfication de l'ID pour préparer l'update*/
		//MODIFICATION DU MESSAGE
	//	if(isset($_POST['id']) && !empty($_POST['id'])){
	//	$query = 'UPDATE messages SET contenu=(:contenu)/*, date_emission =(:UNIX_TIMESTAMP) */WHERE id = (:id)';
	//	$prep = $pdo->prepare($query);
	//	$prep->bindValue(':contenu',$_POST['message']);
	//	$prep->bindValue(':id',$_POST['id']);
	//	$prep->execute();


		$query = 'UPDATE messages SET contenu=(:contenu), date_emission =UNIX_TIMESTAMP() WHERE id = (:id)';
		$prep = $pdo->prepare($query);
	//	$prep->bindValue(':contenu',$_POST['message']);
	//	$prep->bindValue(':id',$_POST['id']);
		$prep->execute(array(':contenu' => $_POST['message'], ':id' => $_POST['id']));


		}else {
		/*On effectue l'insertion de la donnée dans la base*/
	//	$query = 'INSERT INTO messages (contenu/*, date_emission*/) VALUES (:contenu)/*, (date_emission)*/';
	//	$prep = $pdo->prepare($query);
	//	$prep->bindValue(':contenu', $_POST['message']);
	//	$prep->bindValue(':date_emission', $now);
	//	$prep->execute();
	//	}

	/*On effectue l'insertion de la donnée dans la base*/
		$query = 'INSERT INTO messages (contenu, date_emission) VALUES (:contenu, UNIX_TIMESTAMP())';
		$prep = $pdo->prepare($query);
		$prep->execute(array(':contenu' => $_POST['message']));
		}

	

/*Redirection vers la page d'accueil*/
	header('Location: index.php');
?>

