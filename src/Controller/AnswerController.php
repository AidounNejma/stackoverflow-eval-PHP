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

    #Afficher toutes les réponses sur la vue Admin
    public function allAnswersAdmin()
    {
        $answerModel = new AnswerModel();
        
        $answers = $answerModel->findAll();

        #Appel de la fonction getMeta pour récupérer les noms des colonnes en SQL
        $metas = $answerModel->getMeta();
        
        $this->render('admin/allAnswers.php', [
            "answers" => $answers,
            "metas" => $metas
        ]);
    }

    #Suppression d'une question (Admin)
    public function deleteAnswer()
    {
        $id = $_POST['id'];

        $answerModel = new AnswerModel();
        $answer = $answerModel->delete($id);

        $this->sendJson([
            'answer' => $answer
        ]);
    }

    #Edition d'un réponse (Admin)
    public function editAnswer()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        #La date d'édition
        $updated_at = new \DateTime();
        $updated_at = $updated_at->format('Y-d-m H:i:s');

        $answerModel = new AnswerModel();
        $answer = $answerModel->update($id, $status, $updated_at);

        $this->sendJson([
            'answer' => $answer
        ]);
    }

}