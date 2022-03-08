<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\QuestionModel;

class QuestionController extends AbstractController
{
    #Afficher toutes les questions
    public function index()
    {

        $questionModel = new QuestionModel();
        
        $questions = $questionModel->findAll();

        $this->render('questions/allQuestions.php', [
            'questions' => $questions
        ]);

    }

    #Afficher une seule question par l'ID
    public function showQuestion()
    {
        $id = $_GET['id'];
        
        $questionModel = new QuestionModel();
        
        $question = $questionModel->findById($id);

        $question = $question[0];

        $this->render('questions/oneQuestion.php', [
            'question' => $question
        ]);

    }

}