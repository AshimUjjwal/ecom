<?php 

if(isset($_GET['id']))

{
	
	$query = query("SELECT * FROM users WHERE user_id = " .escape_string($_GET['id']). " ");
	confirm($query);
	
    while($row = fetch_array($query))
	{
		
		$username            = escape_string($row['username']);
		$email               = escape_string($row['email']);
		$image               = $row['image'];
		$picture             = display_image($row['image']);
		$password            = $row['password'];
		
	}

update_user();	
    
	
}


?>

<h1 class="page-header">
      Edit User
    
  </h1>

<div class="col-md-6 user_image_box">
    
<span id="user_admin" class='fa fa-user fa-4x'></span>

</div>

<form action="" method="post" enctype="multipart/form-data">

<div class="col-md-6">

    


     <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" value ="<?php if(isset($username)) echo $username; ?>" required>
	  <input type="hidden" name="user_id" value="<?=$_GET['id']?>">
         
     </div>


      <div class="form-group">
          <label for="email">Email</label>
      <input type="text" name="email" class="form-control" value = "<?php if(isset($email)) echo $email; ?>">
         
     </div>

<!-- 
      <div class="form-group">
          <label for="first name">First Name</label>
      <input type="text" name="first_name" class="form-control"   >
         
     </div> -->
<!-- 
      <div class="form-group">
          <label for="last name">Last Name</label>
      <input type="text" name="last_name" class="form-control"   >
         
     </div> -->
	 
	 


      <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" value="" >
         
     </div>
	 
	  <div class="form-group">
	  <label for="user-image">User Image</label>
     
      <input type="file" name="image">
	  	<img width = "150" src = "../../resources/images/<?php if(isset($image)) echo $image ; ?>">
         
     </div>

      <div class="form-group">

      <!--<a id="user-id" class="btn btn-danger" href="">Delete</a> -->

      <input type="submit" name="update" class="btn btn-primary pull-right" value="Update" >
         
     </div>


    </div>

</form>





    