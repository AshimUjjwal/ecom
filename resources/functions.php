<?php

// helper functions

$uploads_directory = "images";

function last_id()
{
	global $connect;
	
	return mysqli_insert_id($connect);
}

function set_message($msg)
{
	if(!empty($msg))
	{
		$_SESSION['message'] = $msg;
	}
	else
	{
		$msg = " ";
	}
}

function display_message()
{
	if(isset($_SESSION['message']))
	{
		echo $_SESSION['message'];
		
		unset($_SESSION['message']);
		
	}
}

function redirect($location)
{
	header("Location:$location");
}


function query($sql)
{
	global $connect; 
	return mysqli_query($connect,$sql);
}

function confirm($result)

{
	global $connect;
	
	if(!$result)
	{
		die("Failed".mysqli_error($connect));
	}
	
}

function escape_string($string)
{
	global $connect;
	
	return mysqli_real_escape_string($connect,$string);
}

function fetch_array($result)

{
	return mysqli_fetch_array($result);
}


// get product , get_product_cat_page, get_product_shop_page


function get_products()

{
	$query = query("SELECT * FROM products");
	
	confirm($query);
	
	/***$rows = mysqli_num_rows($query);


     if(isset($_GET['page']))
	 { 

        $page = preg_replace('#[^0-9]#', '', $_GET['page']);
     
	 } 
   else
    {

    $page = 1;
    
	}


$perPage = 6; 

$lastPage = ceil($rows / $perPage); 




if($page < 1) 
{ 

    $page = 1; 

}
elseif($page > $lastPage)
{ 

    $page = $lastPage; 

}



$middleNumbers = ''; 




$sub1 = $page - 1;
$sub2 = $page - 2;
$add1 = $page + 1;
$add2 = $page + 2;



if($page == 1)
{

      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

} elseif ($page == $lastPage) {
    
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

}elseif ($page > 2 && $page < ($lastPage -1)) {

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

         $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';

     


} 
elseif($page > 1 && $page < $lastPage)
{

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub1.'">' .$sub1. '</a></li>';

     $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
 
     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';


     


}


$limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;


$query2 = query(" SELECT * FROM products $limit");
confirm($query2);


$outputPagination = ""; 


// if($lastPage != 1){

//    echo "Page $page of $lastPage";


// }


  // If we are not on page one we place the back link

if($page != 1){


    $prev  = $page - 1;

    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
}


$outputPagination .= $middleNumbers;



if($page != $lastPage)
{


    $next = $page + 1;

    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';

}
while($row = fetch_array($query2)) 
{

$product_image = display_image($row['product_image']);

$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"><img style="height:90px" src="../resources/{$product_image}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>See more items on online store.</p>
             <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
        </div>


       
    </div>
</div>

DELIMETER;

echo $product;


		}


       echo "<div class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";


}  ***/
	

	
	
	while($row = fetch_array($query))
	{
		$picture = display_image($row['product_image']);
		
		$product= <<<eod
		<div class="col-sm-4 col-lg-4 col-md-4">
              <div class="thumbnail">
			     <a href="item.php?id={$row['product_id']}"><img style ="height:90px" src="../resources/{$picture}" alt="Not loaded"></a>
			     <div class="caption">
				     <h4 class="pull-right">&#36;{$row['product_price']}</h4>
				      <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
				      <h4>{$row['short_desc']}</h4>
				       
				      <p>See more items on online store</p>
				
				        <a class="btn btn-primary" target="_self" href="../resources/cart.php?add={$row['product_id']}">Add To Cart</a>
			       </div>
	
       </div>
               </div>

eod;
echo $product;
	}
}

function get_product_cat_page()

{   
    $id = isset($_GET['id']) ? $_GET['id'] : '';
	$query = query("select * FROM products where product_category_id=" .escape_string("$id"). " ");
	
	
	confirm($query);
	
while($row = fetch_array($query))
	{
    $picture = display_image($row['product_image']);
   $pro = <<<cod
		        <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
	            <a href= "item.php?id={$row['product_id']}"><img src="../resources/{$picture}" alt="Not loaded"></a>
                    <div class="caption">
					    <h3 class="pull-right">&#36;{$row['product_price']}</h3>
                        <h3><a href = "item.php?id={$row['product_id']}">{$row['product_title']}</a></h3>
						<p>{$row['short_desc']}</p>
                        
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> 
	                        <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
cod;

      echo $pro;
	}
}

function get_product_shop_page()

{   
	$query = query("select * FROM products");
	
	
	confirm($query);
	
while($row = fetch_array($query))
	{
    $picture = display_image($row['product_image']);
   $pro = <<<cod
		        <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
	            <a href= "item.php?id={$row['product_id']}"><img width="100" src="../resources/{$picture}" alt="Not loaded"></a>
                    <div class="caption">
					    <h3 class="pull-right">&#36;{$row['product_price']}</h3>
                        <h3><a href = "item.php?id={$row['product_id']}">{$row['product_title']}</a></h3>
						<p>{$row['short_desc']}</p>
                        
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> 
	                        <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
cod;

      echo $pro;
	}
}

function get_categories()
{
	$query = query("SELECT * FROM categories");
	
	confirm($query);
	
	while($row =fetch_array($query))
	{
		
	 $categories = <<<dod
	 <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
	
	
dod;
 
    echo $categories;

	}
	
}



function send_message()
{
	if(isset($_POST['submit']))
		
	
	{
		
		
		$to         = "someemailaddress@gmail.com";
		
		$from_name  = $_POST['name'];
		
		$contact    = $_POST['contact'];
		
		$email      = $_POST['email'];
		
		$message    = $_POST['message'];
		
		$headers    = "From:{$from_name}{$contact}{$email}{$message}";
		
		$result = mail($to, $contact , $message ,$headers);
		
		if(!$result)
		{
			echo "Failed";
			
		}
		else
		{
			echo "SENT.";
		}
	}
}
	
	/*************BACK END FUNCTION****************/
	
	
function display_orders()

{
	$query = query("select * from orders");
	confirm($query);
	
	while($row = fetch_array($query))
	{
		$orders = <<<deli
		<tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>

            <td>{$row['order_transaction']}</td>
            <td>{$row['order_status']}</td>
			<td>{$row['order_currency']}</td>
			<td><a class = "btn btn-danger" href= "../../resources/templates/back/delete_order.php?id={$row['order_id']}"><span class = "glyphicon glyphicon-remove"></span></a></td>
            
          
        </tr>
		
deli;

echo $orders;
	}
}
	
/************Admin Products********///

function display_image($image)
{
	global $uploads_directory;
	
	return $uploads_directory . DS . $image;
}

function get_products_in_admin()
{
	
	$query = query("SELECT * FROM products");
	
	confirm($query);
	
	
	
	while($row = fetch_array($query))
	{
		$cat = show_category_title($row['product_category_id']);
		
		$picture = display_image($row['product_image']);
		
		$product= <<<eod
		<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}<br>
            <a href="index.php?edit_product&id={$row['product_id']}"><img  width="100" src ="../../resources/{$picture}" alt="Not loaded"></a>
            </td>
            <td>{$cat}</td>
            <td>{$row['product_price']}</td>
			<td>{$row['product_quantity']}</td>
			<td><a class = "btn btn-primary" href="index.php?edit_product&id={$row['product_id']}">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class = "btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class = "glyphicon glyphicon-remove"></span></a></td>

			
        </tr>

eod;
echo $product;
	}
	
}

function show_category_title($product_category_id)
{
	$category_query = query("select *from categories where cat_id ='{$product_category_id}'");
	confirm($category_query);
	
	while($category_row = fetch_array($category_query))
	{
		return $category_row['cat_title'];
	}
}
/*******Add Products in Admin***/
function add_product()
{
	
	if(isset($_POST['publish']))
	{
		$product_title       = escape_string($_POST['product_title']);
		$product_category_id = escape_string($_POST['product_category_id']);
		$product_price       = escape_string($_POST['product_price']);
		$product_quantity    = escape_string($_POST['product_quantity']);
		$product_description = escape_string($_POST['product_description']);
		$short_desc          = escape_string($_POST['short_desc']);
		$product_image       = $_FILES['image']['name'];
		$tmp_image           = $_FILES['image']['tmp_name'];
	
	    
		
		$query = query("insert into products(product_title,product_category_id,product_price,product_quantity,product_description,short_desc,product_image) values('{$product_title}','{$product_category_id}','{$product_price }','{$product_quantity }','{$product_description}','{$short_desc }','{$product_image}')");
		move_uploaded_file($tmp_image,UPLOAD_DIRECTORY.DS.$product_image);
		$last_id = last_id();
		confirm($query);
		set_message("New Product with id {$last_id} was added.");
		redirect("index.php?products");
	
	
	
	}
}
	
function get_categories_add_product()
{
	$query = query("SELECT * FROM categories");
	
	confirm($query);
	
	while($row =fetch_array($query))
	{
		
	 $add_categories = <<<deli
	 <option value="{$row['cat_id']}">{$row['cat_title']}</option>
	
	
deli;
 
    echo $add_categories;

	}
	
}

function update_product()
{
	
	if(isset($_POST['update']))
	{
		$product_title       = escape_string($_POST['product_title']);
		$product_category_id = escape_string($_POST['product_category_id']);
		$product_price       = escape_string($_POST['product_price']);
		$product_quantity    = escape_string($_POST['product_quantity']);
		$product_description = escape_string($_POST['product_description']);
		$short_desc          = escape_string($_POST['short_desc']);
		$product_image       = $_FILES['image']['name'];
		$tmp_image           = $_FILES['image']['tmp_name'];
	
	    if(empty($product_image))
		{
			
			$get_pic = query("select product_image from products where product_id = ".escape_string($_GET['id'])." ");
			confirm($get_pic);
			
			while($pic = fetch_array($get_pic))
			{
				$product_image = $pic['product_image'];
			}
			
			
		}
		
		move_uploaded_file($tmp_image, UPLOAD_DIRECTORY.DS.$product_image);
		
		$query = "UPDATE products SET  ";
		
		$query .= "product_title       = '{$product_title}'         , ";
		$query .= "product_category_id = '{$product_category_id}'   , ";
		$query .= "product_price       = '{$product_price}'         , ";
		$query .= "product_quantity    = '{$product_quantity}'      , ";
		$query .= "product_description = '{$product_description}'   , ";
		$query .= "short_desc          = '{$short_desc}'            , ";
		$query .= "product_image       = '{$product_image}'           ";
		$query .= "WHERE product_id    = ".escape_string($_GET['id']);
		
		
		$send_update_query = query($query);
		
		confirm($send_update_query);
		set_message("Product has been updated.");
		redirect("index.php?products");
	
	
	
	}
}

function show_category_in_admin()
{
	
	$query = query("select * from categories");
	
	confirm($query);
	
	while($row = fetch_array($query))
	{
		
		$cat_id = $row['cat_id'];
		
		$cat_title = $row['cat_title'];
		
		$category = <<<deli
		 <tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
			<td><a class = "btn btn-danger" href= "../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><span class = "glyphicon glyphicon-remove"></span></a></td>
        </tr>
deli;
		
echo $category;	
		
		
		
	}
	
}

function add_category()


{
	
	if(isset($_POST['add_category']))
	{
		
		$cat_title = escape_string($_POST['cat_title']);
		
		$query = query("insert into categories (cat_title) values('{$cat_title}') ");
		confirm($query);
		
		set_message("Category Created.");
		

		
		
	}
	
	
}
// Users function in admin ////
function display_users()
{
	
	$query = query("select * from users");
	
	confirm($query);
	
	while($row = fetch_array($query))
	{
		
		$user_id   = $row['user_id'];
		
		$username  = $row['username'];
		
		$email     = $row['email'];
		
		
		
		$picture   = display_image($row['image']);
		
		
		
	 
		
		$use = <<<deli
		 <tr>
            <td>{$user_id}</td>
            
			<td>{$username}<br>
			<a href = "index.php?edit_user&id={$row['user_id']}"><img src = "../../resources/{$picture}" alt = "Not loaded" width= "100"></a>
			</td>
			
			<td>{$email}</td>
			
			
			
			<td><a class = "btn btn-primary" href= "index.php?edit_user&id={$row['user_id']}">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class = "btn btn-danger" href= "../../resources/templates/back/delete_user.php?id={$row['user_id']}"><span class = "glyphicon glyphicon-remove"></span></a></td>
        
			
			
deli;
		
echo $use;	
		
		
		
	}
	
}


function add_user()

{
	
	if(isset($_POST['add_user']))
	{
		
		$username = escape_string($_POST['username']);
		
		$email    = escape_string($_POST['email']);
		
		$password  = $_POST['password'];
		
		$image    = $_FILES['image'] ['name'];
		
		$tmp_image = $_FILES['image'] ['tmp_name'];
		
		
		
		
		
		move_uploaded_file($tmp_image,UPLOAD_DIRECTORY.DS.$image);
		
		$query = query("insert into users (username,email,password,image) values('{$username}','{$email}','{$password}',
		'{$image}')");
		confirm($query);
		
		set_message("USER CREATED");
		
		redirect("index.php?users");
		
	}
	
	
}
function update_user()
{
	
	if(isset($_POST['update']))
	{
		
		$username            = escape_string($_POST['username']);
		$email               = escape_string($_POST['email']);
		$user_id 			 = escape_string($_POST['user_id']);	
		$password            = $_POST['password'];
        $image               = $_FILES['image']['name'];
		$tmp_image           = $_FILES['image']['tmp_name'];
		
	
	    if(empty($image))
		{
		  if(empty($password))
		   {	
		
		      $query = "UPDATE users SET  ";
		      $query .= "username            = '{$username}'         , ";
		      $query .= "email               = '{$email}'              ";
	          $query .= "WHERE user_id       = ".$user_id;
		
		   }
		   else
		  {
			$query = "UPDATE users SET  ";
		    $query .= "username            = '{$username}'         , ";
		    $query .= "email               = '{$email}'            , ";
		    $query .= "password            = '{$password}'          ";
	        $query .= "WHERE user_id       = ".$user_id;
		
		  }
		
		   $send_update_query = query($query);
		
		   confirm($send_update_query);
		   set_message("User has been updated.");
		   redirect("index.php?users");
			
			
		}
		else
		{
			if(empty($password))
		   {
		    move_uploaded_file($tmp_image, UPLOAD_DIRECTORY.DS.$image);
		    $query = "UPDATE users SET  ";
		    $query .= "username            = '{$username}'         , ";
		    $query .= "email               = '{$email}'            , ";
	        $query .= "image               = '{$image}'              ";
		    $query .= "WHERE user_id       = ".$user_id;
		   }
		   else
		   {
			   move_uploaded_file($tmp_image, UPLOAD_DIRECTORY.DS.$image);
		
		      $query = "UPDATE users SET  ";
		
		      $query .= "username            = '{$username}'         , ";
		      $query .= "email               = '{$email}'            , ";
		      $query .= "password            = '{$password}'         , ";
	          $query .= "image               = '{$image}'              ";
		      $query .= "WHERE user_id       = ".$user_id;
		
		   }
		$send_update_query = query($query);
		
		confirm($send_update_query);
		set_message("User has been updated.");
		redirect("index.php?users");
	
		}
	
	}
}
function login_user()
{
	if(isset($_POST['submit']))
	{
		$username = escape_string($_POST['username']);
		
		$password = $_POST['password'];
		
		$query = query("select * from users where username ='{$username}' and password ='{$password}' ");
		
		confirm($query);
		
		if(mysqli_num_rows($query ) == 1)
			
			{
				$_SESSION['username'] = $username;
				
				redirect("admin");
				
				
				
			}
			else
			{
				echo "<p style='color:red'>Wrong Details.</p>";
	
				
			}
	}
}
/// Reports
function get_reports()
{
	
	$query = query("SELECT * FROM reports");
	
	confirm($query);
	
	
	
	while($row = fetch_array($query))
	{
		
		
		$product= <<<eod
		<tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
			<td>{$row['order_id']}</td>
           
            
            <td>{$row['product_price']}</td>
			<td>{$row['product_title']}</td>
			<td>{$row['product_quantity']}</td>
			<td><a class = "btn btn-danger" href= "../../resources/templates/back/delete_report.php?id={$row['report_id']}"><span class = "glyphicon glyphicon-remove"></span></a></td>
			
        </tr>

eod;
echo $product;
	}
	
}
/******************************* Slide Area*******************/
function add_slides() {


if(isset($_POST['add_slide'])) {


$slide_title        = escape_string($_POST['slide_title']);
$slide_image        = $_FILES['image']['name'];
$tmp_image          = $_FILES['image']['tmp_name'];


if(empty($slide_title) || empty($slide_image)) {

echo "<p class='bg-danger'>This field cannot be empty</p>";


} else {



move_uploaded_file($tmp_image, UPLOAD_DIRECTORY . DS . $slide_image);

$query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
confirm($query);
set_message("Slide Added");
redirect("index.php?slides");





                }


        }


}


function get_current_slide_in_admin()
{

	$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
	confirm($query);
    
	while($row = fetch_array($query))
	{ 
	   $slide_image = display_image($row['slide_image']);
	   
   
	   $slide_active_admin = <<<dell
	  
	   <img class="img-responsive" src="../../resources/{$slide_image}" alt="">
dell;
   
echo $slide_active_admin;
	}

}


function get_active_slide()
{

	$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
	confirm($query);
   
	while($row = fetch_array($query))
	{
		$slide_image = display_image($row['slide_image']);
   
	   $slide_active =<<<eod
	   <div class="item active">
	   <img class="slide-image" src="../resources/{$slide_image}" alt="">
       </div>
eod;
   
   echo $slide_active;
	}
   

}

function get_slides()
{
 $query = query("SELECT * FROM slides");
 confirm($query);

 while($row = fetch_array($query))
 {
	 $slide_image = display_image($row['slide_image']);

	$slides =<<<dell
	<div class="item">
	<img class="slide-image" src="../resources/{$slide_image}" alt="">
</div>
dell;

echo $slides;
 } 


}

function get_slide_thumbnails()
{


	$query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
	confirm($query);
    
	while($row = fetch_array($query))
	{ 
	   $slide_image = display_image($row['slide_image']);
   
	   $slide_thumb_admin =<<<dell
	  
	   <div class="col-xs-6 col-md-3 image_container">
        
         <a href="index.php?delete_slide_id={$row['slide_id']}">
      
		 <img class="img-responsive slide_image " src="../../resources/{$slide_image}" alt="">

        </a>
		<div class = "caption">
		<p>{$row['slide_title']}</p>
		</div>
    </div>
  
dell;
   
   echo $slide_thumb_admin;
	}  
}

?>