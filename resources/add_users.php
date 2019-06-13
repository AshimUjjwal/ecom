<?php

include("fun.php");

$con = mysqli_connect("localhost","root","","ecom");

if(isset($_POST['add_user']))
	{
		
		$username  = mysqli_real_escape_string($con,$_POST['username']);
		
		$email     = mysqli_real_escape_string($con,$_POST['email']);
		
		$password  = mysqli_real_escape_string($con,$_POST['password']);
		
		$image     = $_FILES['image'] ['name'];
		
		$tmp_image = $_FILES['image'] ['tmp_name'];
		
		
	    if(strlen($username) < 3)
		{
			echo "<script>alert('Username is too short')</script>";
		}
		
		if(email_exists($email,$con))
		{
			echo "<script>alert('Already registered with this email address')</script>";
		}
		else
		{
		      move_uploaded_file($tmp_image,"images/$image");
		
		      $query = "INSERT INTO users(username,email,password,image)values('{$username}','{$email}','{$password}',
		      '{$image}')";
		      if(mysqli_query($con,$query))
		        
			      {
				    echo "<script>alert('Successfully registered')</script>";
			      }
		
		
		}
	}	
?>
 <!DOCTYPE html>  

 <html lang="en-us">

 <head>

<link rel = "stylesheet"  type = "text/css" href = "css/bootstrap.css">

 <title>Add User</title>
 
 </head>
 
 <body>
 <script src = "js/bootstrap.js" type = "text/javascript"></script>
 
<div class="form-group">

<a href="../public/index.php"><center><img src ="pic/online-store.jpg" alt="Store" title="Home"></center><a/>
 
 <ul align="center">
 <a href ="../public/index.php">Home</a>
&nbsp;&nbsp;&nbsp; 
 <a href= "../public/login.php">Log In</a>
 </ul>

</div>
 
<center><form method="post" action="add_users.php" enctype="multipart/form-data" autocomplete= "on">
 
 <div class="form-group">

 <label for="first">Username:</label>
    
    <input type="text" class="form-control" name="username" required placeholder = "Enter Username">

</div>          


<div class="form-group">
<label for="email">Email:</label>
    
    <input type="text" class="form-control" name="email" required placeholder = "Enter email">

</div>

<div class="form-group">

<label for="pwd">Password:</label>
    
    <input type="password" class="form-control" name="password" required placeholder = "Enter password">

</div>
<div class="form-group">

<input type="file" name="image">

</div>



<input type = "submit" name = "add_user" value = "Add" class = "btn btn-success">
 
</form></center>
 
</body>
 
 </html>


