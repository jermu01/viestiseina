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

form {
 width: 550px;
 height: 450px;
 margin: auto;
 position: relative;
}

</style>


  <form name="editPost" enctype="multipart/form-data" method="post">
      <fieldset>
        <legend>Edit Post</legend>
        <div class="form-group">
        <input type="hidden" name="id">
        <strong><label for="name"><?php echo $_SESSION['username']; ?></label></strong>
        <input type="hidden" name="name" value="<?php echo $_SESSION['username']; ?>">
        </div>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" placeholder="Title" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleTextarea">Text</label>
            <textarea class="form-control" name="text" rows="3" placeholder="Text" ></textarea>
            <br><br>
            <input type="file" name="file" class="btn btn-primary">
            <br><br>
        </fieldset>

        <button type="submit" name="editbtn" class="btn btn-primary">Edit Post</button>

    </form>
</div>
</div>

</div>

<script src="js/editPost.js"></script>
<script src="js/common.js"></script>

<?php include_once 'layout/bottom.inc.php'; ?>