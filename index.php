<?php
session_start();
require 'model/autoloader.php';
Auto::register();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StreetFight</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
  <?= include "view/header.php" ?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php
        //Si home existe dans l'url alors affiche moi la vue Home
        if (isset($_GET['home'])) {
          include 'view/home.php';
        } else if (isset($_GET['create'])) {
          include 'controller/create.php';
          include 'view/create.php';
        } else if (isset($_GET['fightest'])) {
          include 'controller/fighTest.php';
          include 'view/fighTest.php';
        } else if (isset($_GET['list'])) {
          include 'controller/list.php';
          include 'view/list.php';
        } else if (isset($_GET['id']) || isset($_GET['modify'])) {
          include 'controller/personnage.php';
          include 'view/personnage.php';
        }
        //Sinon affiche ma vue Home
        else {
          include 'view/home.php';
        }
        ?>
      </div>
    </div>
  </div>
  <footer>
  </footer>
</body>

</html>