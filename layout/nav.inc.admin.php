<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="adminPage.php">MessageWall</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
        <?php if (isset($_SESSION['logged_in'])): ?>
              <li class="nav-item">
              <a class="nav-link" href="adminPage.php">Posts control</a>
            </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['logged_in'])): ?>
              <li class="nav-item">
              <a class="nav-link" href="allPostAdmin.php">All Posts</a>
            </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['logged_in'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>