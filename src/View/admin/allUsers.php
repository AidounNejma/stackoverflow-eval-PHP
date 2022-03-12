<?php

require_once './src/View/includes/header.inc.php';

?>

<div class="d-flex my-4 px-2">
    <a href="?page=index"><i class="fas fa-home"></i> Home</a>
    <p class="px-2"> > </p>
    <p>Users Dashboard</p>
</div>

<h1 class="text-center py-4">Users Dashboard</h1>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nickname</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) :?>
        <tr>
            <th scope="row"><?= $user->getId() ?></th>
            <td><?= $user->getNickname() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><?= $user->getGender() ?></td>
            <?php if($user->getStatus()==0) :?>
            <td>User</td>
            <?php elseif($user->getStatus()==1) :?>
            <td>Admin</td>
            <?php endif ?>
            <td><?= $user->created_at ?></td>
            <td><?= $user->updated_at ?></td>
            <td><button class="btn btn-primary editUser" data-id="<?= $user->getId()?>"><i class="fas fa-edit"></i></button></td>
            <td><button class="btn btn-danger deleteUser" data-id="<?= $user->getId()?>"><i class="fas fa-eraser"></i></button></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>



<?php

require_once './src/View/includes/footer.inc.php';

?>