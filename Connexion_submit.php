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

// Vérification du formulaire soumis
if (isset($postData['submit'])) {
    if (
        empty($postData['email'])
        || empty($postData['password'])
    ) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Veuillez remplir tous les champs';
    } else {
    
        $email = $postData['email'];  
        $password = $postData['password'];

        $stmt1 = $mysqlClient->prepare("SELECT * FROM `usersn1` WHERE email = :email");
        $stmt1->execute(['email' => $email]);

        $user = $stmt1->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['LOGGED_USER'] = [
                    'email' => $email,
                    'user_id' => $user['id_user'],
                    'niveau' => $user['niveau'],
                ];
                redirectToUrl('profil.php?id='.$_SESSION['LOGGED_USER']['user_id']);
            } else {
                $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Mot de passe incorrect.';
                redirectToUrl('formulaireConnexion.php');
            }
        } else {
            unset($_SESSION['LOGGED_USER']);
            $user = null; // Réinitialisation
            $stmt2 = $mysqlClient->prepare("SELECT * FROM `usersn2` WHERE email = :email");
            $stmt2->execute(['email' => $email]);
            $user = $stmt2->fetch();
            
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['LOGGED_USER'] = [
                        'email' => $email,
                        'user_id' => $user['id_user'],
                        'niveau' => $user['niveau'],
                    ];
                    
                    if ($user['email'] == "franckdjk@gmail.com") {
                        redirectToUrl('admin.php');
                    } else {
                        redirectToUrl('profil.php?id='.$_SESSION['LOGGED_USER']['user_id']);
                    }
                } else {
                    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Mot de passe incorrect.';
                    redirectToUrl('formulaireConnexion.php');
                }
            } else {
                $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Nous ne trouvons pas votre compte.';
                redirectToUrl('formulaireConnexion.php');
            }
        }
    }
}