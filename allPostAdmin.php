<?php session_start(); ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>

<style>

.container1 {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

h1 {
  text-align: center;
}
</style>


<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.admin.php'; ?>


<h1>ALL POSTS</h1>

<div class="container1">
      <div class="row">
      <div class="card text-center">
      <div id="posts-container">
      <br><br>
      <div>
    </div>
  </div>
</div>



<script src="js/common.js"></script>
<script src="js/allPostAdmin.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>