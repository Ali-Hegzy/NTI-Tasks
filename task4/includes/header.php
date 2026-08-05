<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>NTI-Task4</title>
</head>
<body>

<nav class="navbar mb-4 bg-body-tertiary">
  
  <div class="container d-flex">
    <a class="navbar-brand" href="/NTI-task4">NTI-task4</a>
    <?php if(!isset($_SESSION['id'])):?>
      <ul class="navbar-nav d-flex flex-row gap-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Regitser</a>
        </li>
      </ul>
    <?php else: ?>
        <ul class="navbar-nav d-flex flex-row gap-3">
        <li class="nav-item">
          <p class="nav-link active m-0" aria-current="page">Hello <?= $_SESSION['name'] ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">logout</a>
        </li>
      </ul>
    <?php endif; ?>
    
  </div>
</nav>