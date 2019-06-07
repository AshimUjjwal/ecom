<?php 

if(isset($_GET['id']))

{
	
	$query = query("SELECT * FROM products WHERE product_id = " .escape_string($_GET['id']). " ");
	confirm($query);
	
    while($row = fetch_array($query))
	{
		
		$product_title       = escape_string($row['product_title']);
		$product_category_id = escape_string($row['product_category_id']);
		$product_price       = escape_string($row['product_price']);
		$product_quantity    = escape_string($row['product_quantity']);
		$product_description = escape_string($row['product_description']);
		$short_desc          = escape_string($row['short_desc']);
		$product_image       = $row['product_image'];
		$picture             = display_image($row['product_image']);
		
	}

update_product();	
    
	
}


?>

<div class="row">

<h1 class="page-header">Update Product</h1>

</div>
               
<form action="" method="post" enctype="multipart/form-data">

<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
    <input type="text" name="product_title" class="form-control" value="<?php if(isset($product_title)) echo $product_title;?>">
       
    </div>


    <div class="form-group">
    <label for="product-title">Product Description</label>
    <textarea name="product_description" id="" cols="30" rows="10" class="form-control" ><?php if(isset($product_description)) echo $product_description;?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
      <label for="product-price">Product Price</label>
      <input type="number" name="product_price" class="form-control" size="60" value ="<?php if(isset($product_price)) echo $product_price;?>" >
      </div>
    </div>
	 <div class="form-group">
           <label for="product-title">Product Short Description</label>
   <textarea name="short_desc" id="" cols="30" rows="3" class="form-control" ><?php if(isset($short_desc)) echo $short_desc;?></textarea>
    </div>

</div>

<aside id="admin_sidebar" class="col-md-4">

		 <div class="form-group">
         <label for="product-category">Product Category</label>
        
		 <select name="product_category_id" id="product_category" class="form-control">
		 <option value="select">Select Category--</option>
		 <!--<option value="<?php //if(isset($product_category_id)) echo $product_category_id;?>"><?php //if(isset($product_category_id)) echo($product_category_id);?></option>-->
		 <?php get_categories_add_product();?>
		 
        </select>
        
         </div>

        <div class="form-group">
        <label for="product-title">Product Quantity</label>
        <input type = "number" name="product_quantity" class="form-control" value = "<?php if(isset($product_quantity)) echo $product_quantity;?>">
        </div>


<!-- Product Tags 


    
	<div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div>
	-->

    <div class="form-group">
        <label for="product-image">Product Image</label>
        <input type="file" name="image">
		<img width = "150" src = "../../resources/images/<?php if(isset($product_image)) echo $product_image ; ?>">
	
    </div>
	
	<div class="form-group">
      <!-- <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft"> -->
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>

</aside>
</form>


