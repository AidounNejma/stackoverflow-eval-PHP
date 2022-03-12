<?php

require_once './src/View/includes/header.inc.php';

?>

<div class="d-flex my-4 px-2">
    <a href="?page=index"><i class="fas fa-home"></i> Home</a>
    <p class="px-2"> > </p>
    <p>Questions Dashboard</p>
</div>

<h1 class="text-center py-4">Questions Dashboard</h1>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <?php foreach ($metas as $meta) : ?>
                <th scope="col"><?= $meta->COLUMN_NAME ?></th>
            <?php endforeach ?>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($questions as $question) : ?>
            <tr>
                <th scope="row"><?= $question->getId() ?></th>
                <td><?= strlen($question->getTitle()) > 50 ? substr($question->getTitle(), 0, 50) . "..." : $question->getTitle() ?></td>
                <td><?= strlen($question->getContent()) > 50 ? substr($question->getContent(), 0, 50) . "..." : $question->getContent() ?></td>
                <td><?= $question->getStatus() ?></td>
                <td><?= $question->getTechnology() ?></td>
                <td><?= $question->created_at ?></td>
                <td><?= $question->updated_at ?></td>
                <td><?= $question->user_id ?></td>
                <td><button class="btn btn-primary editQuestion" data-id="<?= $question->getId() ?>"><i class="fas fa-edit"></i></button></td>
                <td><button class="btn btn-danger deleteQuestion" data-id="<?= $question->getId() ?>"><i class="fas fa-eraser"></i></button></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>



<?php

require_once './src/View/includes/footer.inc.php';

?>