<?php 
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/function.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

// Debugging: Check what is being received
// var_dump($postData);

// Vérification du formulaire soumis
if (isset($postData['submit'])) {

    if(empty($postData['prenom']) || empty($postData['nom']) || empty($postData['email']) || empty($postData['tel']) || empty($postData['password']) || empty($postData['category'])) {
        $_SESSION['REGISTER_ERROR_MESSAGE'] = 'Veuillez remplir tous les champs';
    } else {
        $prenom = trim(strip_tags($postData['prenom']));
        $nom = trim(strip_tags($postData['nom']));
        $email = trim(strip_tags($postData['email']));
        $tel = trim(strip_tags($postData['tel']));
        $password = password_hash(trim($postData['password']), PASSWORD_DEFAULT);
        $category = trim(strip_tags($postData['category']));
        
        $stmt = $mysqlClient->prepare("SELECT * FROM `usersn1` WHERE email = :email");
        $stmt->execute(['email' => $email]);
        

        if($stmt->rowCount() > 0){
                $_SESSION['REGISTER_ERROR_MESSAGE'] = 'Votre compte existe deja! ';
                redirectToUrl('formulaireEtudiant.php');
         }else{
           
                // Faire l'insertion en base
                $insertUsers = $mysqlClient->prepare('INSERT INTO usersn1(nom, prenom, tel, email, password, filière) VALUES (?,?,?,?,?,?)');
                $insertUsers->execute(array($nom, $prenom, $tel, $email, $password, $category));
                $_SESSION['REGISTER_SUCCESS_MESSAGE'] = 'Votre compte a bien ete créer <a href="formulaireConnexion.php">connectez-vous</a>';
                redirectToUrl('formulaireEtudiant.php');
            
         }
    }

}



