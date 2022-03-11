<?php

require_once './src/View/includes/header.inc.php';

?>

<div class="col-md-8 m-auto" id="question">

    <h1 class="text-center pt-4"><?= $question->getTitle() ?></h1>

    <div class="d-flex justify-content-around">
        <p>Asked today <?= $question->getCreatedAt() ?></p>
        <p>Answers </p>
    </div>

    <div class="line"></div>

    <div class="col-md-10 m-auto">
        <h5><?= $question->getContent() ?></h5>
    </div>
    <!-- Formulaire pour poster une réponse -->
    <?php if (isset($_SESSION['id'])) : ?>
        <form action="" method="POST" class="formAjax" data-id="<?= $question->getId() ?>">
            
            <div class="md-form amber-textarea active-amber-textarea">
                <label for="form22">Your Answer</label>
                <textarea id="form22" class="md-textarea form-control" rows="3"></textarea>
            </div>

            <div class="d-flex py-4">
                <button type="submit" class="btn btn-primary btnSubmit">Post Your Answer</button>
                <a href="" class="btn btn-danger mx-2 discard">Discard</a>
            </div>

        </form>

    <?php else : ?>

        <h5 class="py-4 text-center notificationLoginIn">To respond to the question you have to be logged in. You can log in <a href="?page=login">here.</a></h5>
    
    <?php endif ?>

</div>

<div class="line"></div>

<!-- Les réponses de la question -->
<?php foreach ($answers as $answer) : ?>

    <div class="col-md-8 m-auto ">

        <p class="paragraphQuestion"><?= $answer->getContent() ?></p>

        <?php foreach ($users as $user) : ?>
            <?php if ($answer->getUserId() == $user->getId()) : ?>
                <div class="d-flex justify-content-end">
                    <p><?= $user->getNickname() ?> </p>
                </div>
            <?php endif ?>
            <div class="line"></div>
        <?php endforeach ?>

    </div>

<?php endforeach ?>



<?php

require_once './src/View/includes/footer.inc.php';

?>