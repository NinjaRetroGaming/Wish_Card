<?php
    try
    {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=nicolaf_db;charset=utf8', 'nicolaf', 'Hqr318zntI');
    }
        catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '. $e->getMessage());
    }
        // Si tout va bien, on peut continuer
        // On récupère le contenu voulu dans la table nicolaf_db
        $reponse = $bdd->query('SELECT * FROM nicolaf_db WHERE email= *');
        // On affiche chaque entrée une à une
        //array['champ demandé'], fetch renvoie à la première ligne
        while ($donnees = $reponse->fetch())
    {
        echo $donnees['id']." ".$donnees['message']." ".$donnees['email']." "."<br />";
    }
        $reponse->closeCursor();
?>