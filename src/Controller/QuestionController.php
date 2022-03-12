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
        #Pagination
        if(isset($_GET['p']))
        {
            $page = $_GET['p'];

        }else{
            $page = 1;
        }

        #Recherche
        if(isset($_GET['search']))
        {
            $search = $_GET['search'];

        }else{
            $search = "";
        }

        #Recherche par tag
        if(isset($_GET['tag']))
        {
            $tag = $_GET['tag'];

        }else{
            $tag = "";
        }

        if(isset($_POST['search']))
        {
            $search = $_POST['search'];
        }

        $questionModel = new QuestionModel();
        $questions = $questionModel->findByPage($page, $search, $tag);

        $userModel = new UserModel();
        $users = $userModel->findAll();
        
        $this->render('questions/allQuestions.php', [
            'questions' => $questions,
            'users' => $users,
            'page' => $page,
            'search' => $search,
            'tag' => $tag
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
    
    public function allQuestionsAdmin()
    {
        $questionModel = new QuestionModel();
        
        $questions = $questionModel->findAll();

        $this->render('admin/allQuestions.php', [
            "questions" => $questions
        ]);
    }

    public function deleteQuestion()
    {
        $id = $_POST['id'];

        $questionModel = new QuestionModel();
        $question = $questionModel->delete($id);

        $this->sendJson([
            'question' => $question
        ]);
    }

    public function editQuestion()
    {
        $id = $_POST['id'];
        $status = $_POST['status'];

        #La date d'édition
        $updated_at = new \DateTime();
        $updated_at = $updated_at->format('Y-d-m H:i:s');

        $questionModel = new QuestionModel();
        $question = $questionModel->update($id, $status, $updated_at);

        $this->sendJson([
            'question' => $question
        ]);
    }
}