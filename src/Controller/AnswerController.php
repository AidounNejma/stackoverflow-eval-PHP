<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\AnswerModel;
use App\Model\UserModel;
use DateTime;

class AnswerController extends AbstractController
{

#Créer une réponse
    public function create()
    {   
        // Je récupère mes info soumisent en javascript
        $userId = $_SESSION['id'];
        $answerContent = $_POST['answerContent'];
        $questionId = $_POST['questionId'];
        
        // Je récupère les données de mon utilisateur via l'id de la session utilisateur
        $userModel = new UserModel();
        $user = $userModel->findById($userId);
        $user = $user[0];
        $created_at = $user->created_at;
        $nickname = $user->getNickname();

        // Je crée une réponse
        $answerModel = new AnswerModel();
        $newContent = $answerModel->create($answerContent, $userId, $questionId);

        // Je renvoie les données en json
        $this->sendJson([
            'newContent' => $newContent,
            'created_at' => $created_at,
            'nickname' => $nickname
        ]);
    }

    public function allAnswersAdmin()
    {
        $this->render('admin/allAnswers.php', [
        
        ]);
    }

}