<?php
$pdo = new PDO('mysql:host=localhost;dbname=micro_blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Ajouter une vérification de cookie pour s'assurer de la connection de l'utilisateur
//Mettre a true une variable globale $_UserConnected -> pour limiter ajouter / supprimer messages 
//Récupérer le pseudo pour l'afficher (message / dans le menu .. )
