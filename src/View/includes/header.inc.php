<?php

use App\Model\UserModel;

function adminAccess()
{
    if (isset($_SESSION['id'])) {
        $idUser = $_SESSION['id'];
        $userModel = new UserModel();
        $user = $userModel->findById($idUser);

        $user = $user[0]->getStatus();

        return $user;
    }
}

$admin = adminAccess();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/logo" href="https://upload.wikimedia.org/wikipedia/commons/e/ef/Stack_Overflow_icon.svg">

    <title>Stackoverflow</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS perso -->
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">

    <!-- Script pour les logos-->
    <script src="https://kit.fontawesome.com/14fbcf0019.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="?page=index"><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/f/f7/Stack_Overflow_logo.png" alt="stackoverflow image"></a>

        <?php if ($admin == 1) : ?>
            <li class="nav-item dropdown" style="list-style-type: none;">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin Dashboard</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?page=allQuestions">Questions Dashboard</a>
                    <a class="dropdown-item" href="?page=allUsers">Users Dashboard</a>
                    <a class="dropdown-item" href="?page=allAnswers">Answers Dashboard</a>
                </div>
            </li>
        <?php endif ?>
        
        <?php if (isset($_SESSION['id'])) : ?>
            <a href="?page=logout"><i class="fas fa-sign-out-alt"></i></a>
        <?php else : ?>
            <div>
                <a href="?page=register"><i class="fas fa-sign-in-alt"></i> Sign in</a>
                <a href="?page=login"><i class="fas fa-user"></i> Log in</a>
            </div>
        <?php endif ?>
    </nav>