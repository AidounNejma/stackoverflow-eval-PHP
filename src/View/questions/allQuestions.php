<?php

require_once './src/View/includes/header.inc.php';

?>

<h1 class="text-center">Top Questions</h1>

<?php foreach ($questions as $question) : ?>
    <div class="containerQuestion">
        <div class="left">
            <p>0 answers</p>
        </div>

        <div class="right">
            <a href="?page="><?= $question->getTitle()?></a>
            <div class="infoFlex">

                <button class="btn btn-primary"><?= $question->getTechnology()?></button>

                <div>
                    <a href="">Nejma Aidoun</a>
                    <p><?= $question->getCreatedAt() ?></p>
                </div>

            </div>
        </div>
    </div>
    <hr>
<?php endforeach ?>

<?php

require_once './src/View/includes/footer.inc.php';

?>