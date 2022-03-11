<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserModel;

class UserController extends AbstractController
{
    #Fonction pour s'inscrire
    public function register()
    {

        if($_POST)
        {
            #Récupération des données du formulaire
            $nickname = $_POST['nickname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            #Instanciation de mon objet user
            $user = new UserModel();

            #Création de la date
            $created_at = new \DateTime();
            $created_at = $created_at->format('Y-d-m H:i:s');

            #Vérification de l'existence de l'utilisateur en BDD
            $result = $user->verification($email, $nickname);

            if($result == false)
            {
                $user->create($nickname, $email, $password, $gender, $created_at);
            }
            else{
                echo "The Email is already used.";
            }

        }
        
        $this->render('login/register.php');
    }

    #Fonction pour se connecter
    public function logIn()
    {

        if($_POST)
        {
            #Récupération des données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];

            #Instanciation de mon objet user
            $user = new UserModel();

            #Vérification de l'existence de l'utilisateur en BDD
            $result = $user->login($email, $password);

            $result = $result[0];

            #S'il y a un resultat, alors on stocke dans $_SESSION
            if($result){
                
                $_SESSION["id"] = $result->getId();
                
                #Redirection vers l'index
                header('location:?page=index');
            }
            else{
                echo "Your password or email is invalid";
            }
        }
        
        $this->render('login/connection.php');
    }

    #Fonction pour se déconnecter
    public function logout()
    {   
        #On supprime la session
        session_destroy();

        #Redirection vers l'index
        header('location:?page=index');
    }

}