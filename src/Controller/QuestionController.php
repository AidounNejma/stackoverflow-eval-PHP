<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\AnswerModel;
use App\Model\QuestionModel;
use App\Model\UserModel;

class QuestionController extends AbstractController
{
    #Afficher toutes les questions
    public function index()
    {

        $questionModel = new QuestionModel();
        $questions = $questionModel->findAll();

        $userModel = new UserModel();
        $users = $userModel->findAll();
        

        $this->render('questions/allQuestions.php', [
            'questions' => $questions,
            'users' => $users
        ]);

    }

    #Afficher une seule question par l'ID
    public function showQuestion()
    {
        $id = $_GET['id'];
        
        $questionModel = new QuestionModel();
        $question = $questionModel->findById($id);
        $question = $question[0];

        $answerModel = new AnswerModel();
        $answers = $answerModel->findByQuestion($id);

        $userModel = new UserModel();
        $users =  $userModel->findAll();

        $this->render('questions/oneQuestion.php', [
            'question' => $question,
            'answers' => $answers,
            "users" => $users,
        ]);

    }

    #Page pour demander une question
    public function pageAskQuestion()
    {
        $this->render('questions/askQuestion.php', [
        
        ]);
    }

    #Soumission du formulaire pour demander une question
    public function askQuestion()
    {
            # Récupération de l'id de l'utilisateur
            $userId = $_SESSION['id'];
            
            #Récupération des POSTS
            $title = $_POST['title'];
            $technology = $_POST['technology'];
            $content = $_POST['content'];

            $questionModel = new QuestionModel();
            $question = $questionModel->create($title, $content, $technology, $userId);
            
            $this->sendJson([
                'question' => $question
            ]);
    }

}