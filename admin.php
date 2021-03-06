<?php session_start(); ?>
<?php
if (!isset($_SESSION['logged_in'])){
  header('Location: index.php');
  die();
}
?>
<?php include_once 'layout/top.inc.php'; ?>
<?php include_once 'layout/nav.inc.php'; ?>

<style>

div.container1 {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

h3 {
  text-align: center;
}

form {
 width: 550px;
 height: 450px;
 margin: auto;
 position: relative;
}

</style>


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
    <button class="btn btn-info" onclick="postInfo()">Make Post</button>

<br><br>

<div id="post" style="display:none">
  <form action="upload.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>Make post</legend>
        <div class="form-group">
        <strong><label for="name"><?php echo $_SESSION['username']; ?></label></strong>
        <input type="hidden" name="name" value="<?php echo $_SESSION['username']; ?>">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="exampleTextarea">Text</label>
            <textarea class="form-control" name="text" rows="3" placeholder="Text"></textarea>
            <br><br>
            <input type="file" name="file" class="btn btn-primary">
            <br><br>
        <button type="submit" name="insert" class="btn btn-primary">Submit your post</button>
        </fieldset>
      </form>
    </form>
</div>
</div>
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


<script src="js/admin.js"></script>
<script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>