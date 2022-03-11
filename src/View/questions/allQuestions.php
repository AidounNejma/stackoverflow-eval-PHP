<?php

require_once './src/View/includes/header.inc.php';

?>

<h1 class="text-center pt-4">Top Questions</h1>
<form class="form-inline justify-content-end py-4">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
<div class="d-flex justify-content-end">
    <a href="?page=ask" class="btn btn-primary askQuestion">Ask Question</a>
</div>
<div class="line my-4"></div>
<?php foreach ($questions as $question) : ?>
    <div class="containerQuestion">

        <div class="left">
            <p><?= $question->getId() ?> .</p>
            <p><?= $question->getCreatedAt() ?></p>
        </div>

        <div class="right">
            <a href="?page=question&id=<?= $question->getId() ?>"><?= $question->getTitle() ?></a>

            <div class="infoFlex">
                <a href="" class="btn btn-primary tag"><?= $question->getTechnology() ?></a>
                <?php foreach ($users as $user) : ?>
                    <?php if ($question->user_id == $user->getId()) : ?>
                        <a href="#"><?= $user->getNickname() ?></a>
                    <?php endif ?>
                <?php endforeach ?>
            </div>

        </div>

    </div>
    <div class="line"></div>

<?php endforeach ?>

<?php

require_once './src/View/includes/footer.inc.php';

?>