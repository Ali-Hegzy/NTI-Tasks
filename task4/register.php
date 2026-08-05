<?php require_once("includes/header.php")  ?>
<?php require_once("includes/db.php")  ?>

<?php

    if (isset($_SESSION['id'])) {
        header("Location: index.php");
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $error = [];

        if (isset($_POST['email']) && $_POST['email'] === '') {
            $error['email'] = "Fill this email"; 
        }

        if (isset($_POST['username']) && $_POST['username'] === '') {
            $error['username'] = "Fill this name"; 
        }

        if (isset($_POST['password']) && $_POST['password'] === '') {
            $error['password'] = "Fill this pass"; 
        }

        if($error === []){

            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $sql->prepare('INSERT INTO users (email, name, password) values (:email, :name, :password)');
            $stmt->execute([
                'email' => $email,
                'name' => $username,
                'password' => $password
            ]);

            header("Location: login.php");
        }
    }
?>

<div class="container">
    <form method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <?php if(isset($error["email"])):?>
                <p class="text-danger"><?= $error["email"]?></p>
            <?php endif;?>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <?php if(isset($error["username"])):?>
                <p class="text-danger"><?= $error["username"]?></p>
            <?php endif;?>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <?php if(isset($error["password"])):?>
                <p class="text-danger"><?= $error["password"]?></p>
            <?php endif;?>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require_once("includes/footer.php")  ?>