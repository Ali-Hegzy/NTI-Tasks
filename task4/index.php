<?php require_once("includes/header.php")  ?>
<?php require_once("includes/db.php")  ?>

<?php 

    if(!isset($_SESSION['id'])){
        header('Location: login.php');
    }

    $stmt = $sql->prepare('SELECT * FROM users;');
    $stmt->execute();
    $users = $stmt->fetchAll();

?>

<div class="container">

    <table class="table table-striped">
        <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
            <?php  foreach($users as $user):?>
                <tr class='<?= ( $user['id'] === ($_SESSION['id'] ?? null)) ? 'table-success' : '' ?>'>
                    <th scope="row"><?= $user['id']?></th>
                    <td><?=  $user['name']?></td>
                    <td><?=  $user['email']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require_once("includes/footer.php")  ?>