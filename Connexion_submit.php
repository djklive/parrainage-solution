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
        redirectToUrl('formulaireConnexion.php');
    } else {
    
        $email = $postData['email'];  
        $password = $postData['password'];

        $stmt = $mysqlClient->prepare("SELECT * FROM `usersn1` WHERE email = :email");
        
        $stmt->execute(['email' => $email]);
      
        $stmt2 = $mysqlClient->prepare("SELECT * FROM `usersn2` WHERE email = :email");
     
        $stmt2->execute(['email' => $email]);
        
       
        

            if ($stmt->rowCount() >0) {
                $user = $stmt->fetch();
                if($user){
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['LOGGED_USER'] = [
                            'email' => $email,
                            'user_id' => $user['id_user'],
                            'level' => '1',
                        ];
                        redirectToUrl('profil.php?id='.$_SESSION['LOGGED_USER']['user_id']);
                    } else {
                        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Mot de passe incorrect.';
                        redirectToUrl('formulaireConnexion.php');
                    }
                }
            }
            elseif($stmt2->rowCount() >0) {
                $user2 = $stmt2->fetch();
                if($user2){
                    if (password_verify($password, $user2['password'])) {
                        $_SESSION['LOGGED_USER'] = [
                            'email' => $email,
                            'user_id' => $user2['id_user'],
                            'level' => '2',
                        ];
                        if ($user2['email'] == "franckdjk@gmail.com") {
                            redirectToUrl('admin.php');
                        } else {
                            redirectToUrl('profil.php');
                        }
                    } else {
                        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Mot de passe incorrect.';
                        redirectToUrl('formulaireConnexion.php');
                    }
                }
            }else {
                $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Nous ne trouvons pas votre compte.';
                redirectToUrl('formulaireConnexion.php');
            }
        
        
    }
        
    
}