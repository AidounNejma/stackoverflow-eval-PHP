<?php

require_once './src/View/includes/header.inc.php';

?>

<h1 class="text-center">Top Questions</h1>

<?php foreach ($questions as $question) : ?>
    <div class="containerQuestion">
        <div class="left">
            <p>0 answers</p>
            <p><?= $question->getCreatedAt() ?></p>
        </div>

        <div class="right">
            
            <a href="?page=question/id=<?= $question->getId() ?>"><?= $question->getTitle()?></a>
            
            <div class="infoFlex">
                <a href="" class="btn btn-primary tag"><?= $question->getTechnology()?></a>
                <a href="">Nejma Aidoun</a>
            </div>

        </div>

    </div>
    <div class="line"></div>
    
<?php endforeach ?>

<?php

require_once './src/View/includes/footer.inc.php';

?>