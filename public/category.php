<?php 

    require_once("../resources/config.php");
	
	include(TEMPLATE_FRONT.DS.'header.php');
	
	?>



    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            
         
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Product</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

               <?php get_product_cat_page(); ?>
           
            

            

        </div>
        <!-- /.row -->
		
		</div>
		
		<!-- container -->
		
		<?php 
		
		include(TEMPLATE_FRONT.DS.'footer.php');
		
		?>

        
   