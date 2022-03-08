<?php

require_once './src/View/includes/header.inc.php';

?>

<div class="col-md-8 m-auto">

    <h1 class="text-center pt-4"><?= $question->getTitle() ?></h1>

    <div class="d-flex justify-content-around">
        <p>Asked today <?= $question->getCreatedAt() ?></p>
        <p>Answers </p>
    </div>

    <div class="line"></div>

    <div class="col-md-10 m-auto">
        <h5><?= $question->getContent() ?></h5>
    </div>

    <form action="" method="POST" class="formAjax" data-id="<?= $question->getId() ?>">
        <!--Textarea with icon prefix-->
        <div class="md-form amber-textarea active-amber-textarea">
            <label for="form22">Your Answer</label>
            <textarea id="form22" class="md-textarea form-control" rows="3"></textarea>
        </div>
        <div class="d-flex py-4">
            <button type="submit" class="btn btn-primary btnSubmit">Post Your Answer</button>
            <a href="" class="btn btn-danger mx-2">Discard</a>
        </div>
    </form>
</div>

<?php

require_once './src/View/includes/footer.inc.php';

?>