<!-- Navbar -->
        <div class="row">
          <div class="col-xs-12">

            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbar_main">
                  
                  <a href="#" class="btn btn-default navbar-btn navbar-left" id="sidebar__toggle">
                    <i class="fa fa-bars"></i>
                  </a>
                  <h3>hi <?php echo $_SESSION['admin']; ?></h3>
                  <a href="logout.php" class="btn btn-primary navbar-btn navbar-right">
                    Sign Out
                  </a>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            
          </div>
        </div> <!-- / .row -->