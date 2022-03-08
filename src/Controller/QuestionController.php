<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\QuestionModel;

class QuestionController extends AbstractController
{
    
    public function index()
    {

        $questionModel = new QuestionModel();
        
        $questions = $questionModel->findAll();

        $this->render('questions/allQuestions.php', [
            'questions' => $questions
        ]);

    }

    public function showQuestion()
    {
        $id = $_GET['id'];

        var_dump($id);
        
        $questionModel = new QuestionModel();
        
        $question = $questionModel->findById($id);

        $this->render('questions/oneQuestion.php', [
            'question' => $question
        ]);

    }

}