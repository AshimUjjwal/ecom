<?php add_category(); ?>

<h1 class="page-header">Product Categories</h1>
<p class="bg-success"><?php display_message();?></p>


<div class="col-md-4">


    
    <form action="" method="post">
    
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name = "cat_title" class="form-control" required>
        </div>

        <div class="form-group">
            
            <input type="submit" name = "add_category" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
			
        </tr>
            </thead>


    <tbody>
       <?php show_category_in_admin(); ?>
    </tbody>

        </table>

</div>

   