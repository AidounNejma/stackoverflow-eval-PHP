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
            $password = password_hash($password, PASSWORD_DEFAULT);

            #Instanciation de mon objet user
            $user = new UserModel();

            #La date de création
            $created_at = new \DateTime();
            $created_at = $created_at->format('Y-d-m H:i:s');

            #Vérification de l'existence de l'utilisateur en BDD
            $result = $user->verification($email, $nickname);

            #Condition de vérification
            if($result == false)
            {
                #Création de l'utilisateur
                $user->create($nickname, $email, $password, $gender, $created_at);

                #Redirection vers l'index
                header('location:?page=login');
            }
            else{
                echo "The Email or nickname are already used.";
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
            $result = $user->login($email);

            $result = $result[0];

            #S'il y a un resultat, alors on stocke dans $_SESSION
            if($result && password_verify($password, $result->getPassword())){
                
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
    
    #Afficher tous les utilisateurs
    public function allUsersAdmin()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        $this->render('admin/allUsers.php', [
            'users' => $users 
        ]);
    }


    public function deleteuser()
    {
        $id = $_POST['id'];

        $userModel = new userModel();
        $user = $userModel->delete($id);

        $this->sendJson([
            'user' => $user
        ]);
    }

    public function edituser()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        #La date d'édition
        $updated_at = new \DateTime();
        $updated_at = $updated_at->format('Y-d-m H:i:s');

        $userModel = new userModel();
        $user = $userModel->update($id, $status, $updated_at);

        $this->sendJson([
            'user' => $user
        ]);
    }

}