<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=nicolaf_db', 'nicolaf','');
        //$bdd = new PDO('mysql:host=localhost;dbname=carte_db', 'root','');
        
        // PDO display error
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $reponse = $bdd->prepare("INSERT INTO Carte (`email`, `message`) VALUES (:email , :message)");
    $reponse->bindParam(':email',$_POST['email']);
    $reponse->bindParam(':message', $_POST['message']);
    $reponse->execute();

    $message = $_POST['message']." "."<img src='https://nicolaf.promo-4.codeur.online/Carte/lienimage.jpg'/>";   
    $mail = $_POST['email'];
    $object = 'Toutes mes Condoléances';
    $to ="nicola.f@codeur.online";  
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    mail($to, $object, $message, $headers);
?>