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


}