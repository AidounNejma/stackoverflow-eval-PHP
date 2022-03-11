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
        $answerContent = $_POST['answerContent'];
        $questionId = $_POST['questionId'];
        $userId = $_SESSION['id'];

        // Je récupère les données de mon utilisateur via l'id de la session utilisateur
        $userModel = new UserModel();
        $user = $userModel->findById($userId);

        // Je crée une réponse
        $answerModel = new AnswerModel();
        $newContent = $answerModel->create($answerContent, $userId, $questionId);

        // Je renvoie les données en json
        $this->sendJson([
            'newContent' => $newContent,
            'user' => $user
        ]);
    }

}