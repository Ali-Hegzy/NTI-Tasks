<?php require_once("includes/db.php")  ?>
<?php require_once("includes/header.php")  ?>

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
            $password = $_POST['password'];

            $stmt = $sql->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute([
                'email' => $email
            ]);

            $res = $stmt->fetch();

            if(!$res || !password_verify($password, $res['password'])){
                $error["notFound"] = "Email or Password are invaild";
            }else{
                $_SESSION['id'] = $res['id'];
                $_SESSION['name'] = $res['name'];
                header("Location: index.php");
            }
        }
    }
?>


<div class="container">
    <form method="POST">
        <?php if(isset($error["notFound"])):?>
                <p class="text-danger"><?= $error["notFound"]?></p>
        <?php endif;?>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <?php if(isset($error["email"])):?>
                <p class="text-danger"><?= $error["email"]?></p>
            <?php endif;?>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
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