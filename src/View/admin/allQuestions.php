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
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Technology</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($questions as $question) :?>
        <tr>
            <th scope="row"><?= $question->getId() ?></th>
            <td style="overflow-wrap: ellipsis;"><?= $question->getTitle() ?></td>
            <td><?= $question->getContent() ?></td>
            <td><?= $question->getTechnology() ?></td>
            <td><?= $question->getStatus() ?></td>
            <td><?= $question->created_at ?></td>
            <td><?= $question->updated_at ?></td>
            <td><button class="btn btn-primary editQuestion" data-id="<?= $question->getId() ?>"><i class="fas fa-edit"></i></button></td>
            <td><button class="btn btn-danger deleteQuestion" data-id="<?= $question->getId() ?>"><i class="fas fa-eraser"></i></button></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>



<?php

require_once './src/View/includes/footer.inc.php';

?>