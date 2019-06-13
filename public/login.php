<?php 

    require_once("../resources/config.php");
	
	include(TEMPLATE_FRONT.DS.'header.php');
	
	
	
?>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
			
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="login.php" method="post">
			
			<?php login_user(); ?>
                <div class="form-group"><label for="">
                    Username<input type="text" name="username" class="form-control" required></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control" required></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary"  Value = "Log In">&nbsp;&nbsp;&nbsp;&nbsp;<a href="../resources/add_users.php" class="btn btn-primary" pull-right>Add User</a>
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

<?php 

  include(TEMPLATE_FRONT.DS.'footer.php');
  
  ?>