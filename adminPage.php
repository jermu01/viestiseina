<?php session_start(); ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.admin.php'; ?>



<div class="jumbotron">
    <h1 class="display-3">Welcome Admin</h1>
    <?php if (isset($_SESSION['logged_in'])): ?>
    <?php endif; ?>
</div>

<div class="container">
    <div id="msg" class="alert alert-dismissible alert-warning d-none">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading"></h4>
        <p class="mb-0"></a></p>
    </div>


<h3>YOUR POSTS</h3>

<div class="container1">
      <div class="row">
      <div class="card text-center">
      <div id="posts-container">
      <br><br>
      <div>
    </div>
  </div>
</div>

<script src="js/systemAdmin.js"></script>
<script src="js/allPostAdmin.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>