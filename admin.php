<?php session_start(); ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>



<div class="jumbotron">
    <h1 class="display-3">Welcome to your post page!</h1>
    <?php if (isset($_SESSION['logged_in'])): ?>
        <strong><p>There is yours post view <?php echo $_SESSION['username']; ?></p></strong>
    <?php endif; ?>
</div>

<div class="container">
    <div id="msg" class="alert alert-dismissible alert-warning d-none">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading"></h4>
        <p class="mb-0"></a></p>
    </div>

    <h2>Make New Post</h2>
    <button class="btn btn-info" onclick="myFunction()">Make Post</button>

<br><br>

<div id="post" style="display:none">
<form method="post">
      <fieldset>
        <legend>Make post</legend>
        <div class="form-group">
          <label for="name">Name</label>
          <input name="name" type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" type="text" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="exampleTextarea">Text</label>
            <textarea class="form-control" rows="3" placeholder="Text"></textarea>
            <br>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" class="btn btn-primary">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit your post</button>
      </fieldset>
      </form>
    </form>
  
</div>
</div>

</div>


<script src="js/admin.js"></script>
<script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>