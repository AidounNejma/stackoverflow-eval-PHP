<?php

require_once './src/View/includes/header.inc.php';

?>

<?php foreach ($questions as $question) : ?>
    <div class="containerQuestion">
        <div class="left">
            <p>0 votes</p>
            <p>0 answers</p>
            <p>2 views</p>
        </div>

        <div class="right">
            <a href=""><?= $question->getTitle()?></a>
            <div class="infoFlex">

                <button><?= $question->getTechnology()?></button>

                <div>
                    <a href=""></a>
                    <p>13 asked 15 sec ago</p>
                </div>

            </div>
        </div>
    </div>
    <hr>
<?php endforeach ?>

<?php

require_once './src/View/includes/footer.inc.php';

?>