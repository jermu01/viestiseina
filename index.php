<?php session_start(); ?>

<?php
if (isset($_SESSION['logged_in'])){
  header('Location: admin.php');
  die();
}
?>

<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>



      <div class="jumbotron">
        <h1 class="display-3">Welcome to MessageWall!</h1>
        <p class="lead">This is the main page</p>
        <hr class="my-4">
        <p class="lead">
        </p>
      </div>

<?php include_once 'layout/bottom.inc.php'; ?>

