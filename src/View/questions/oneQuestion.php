<?php

require_once './src/View/includes/header.inc.php';

?>

<div class="d-flex my-4 px-2">
    <a href="?page=index"><i class="fas fa-home"></i> Home</a>
    <p class="px-2"> > </p>
    <p><?= $question->getTitle() ?></p>
</div>

<div class="col-md-8 m-auto" id="question">
    <h1 class="text-center py-4"><?= $question->getTitle() ?></h1>
    <div class="d-flex justify-content-around py-4">
        <p class="tagsOfOneQuestion">Asked: <?= $question->created_at ?></p>
        <?php foreach ($users as $user) : ?>
            <?php if ($question->user_id == $user->getId()) : ?>
                <p class="tagsOfOneQuestion">By <?= $user->getNickname() ?> </p>
            <?php endif ?>
        <?php endforeach ?>
        <p class="tagsOfOneQuestion">Technology : <?= $question->getTechnology() ?> </p>
        <p class="tagsOfOneQuestion">Answers <?= count($answers) ?></p>
    </div>

    <div class="line"></div>

    <div class="col-md-12 m-auto py-4">
        <h5 class="contentOfQuestion"><?= $question->getContent() ?></h5>
    </div>

    <!-- Formulaire pour poster une réponse -->
    <?php if (isset($_SESSION['id']) && $question->getStatus() == "published") : ?>
        <form action="" method="POST" class="formAjax" class="py-4" data-id="<?= $question->getId() ?>">

            <div class="md-form amber-textarea active-amber-textarea">
                <label for="form22">Your Answer</label>
                <textarea id="form22" class="md-textarea form-control" rows="3"></textarea>
            </div>

            <div class="d-flex py-4">
                <button type="submit" class="btn btn-primary btnSubmit">Post Your Answer</button>
                <a href="" class="btn btn-danger mx-2 discard">Discard</a>
            </div>

        </form>
    <?php elseif(isset($_SESSION['id']) && $question->getStatus() == "closed") : ?>

        <h5 class="py-4 text-center notificationLoginIn">The thread is closed. You can no longer respond to it.</h5>

    <?php elseif (!isset($_SESSION['id'])) : ?>

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
                <div class="d-flex justify-content-between">
                    <p><?= $answer->created_at ?></p>
                    <p><?= $user->getNickname() ?> </p>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        <div class="line"></div>
        
    </div>

<?php endforeach ?>



<?php

require_once './src/View/includes/footer.inc.php';

?>