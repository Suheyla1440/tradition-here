<?php

//connect db


  $con= mysqli_connect('localhost','root','','traditionhere');
  // postt value
  $a_name=@$_POST['a_name'];
    $a_pass=@$_POST['a_pass'];
	
	if (isset($_POST['login'])){
		
		if(empty($a_name)|| empty($a_pass) ){
			
			echo '<script> alert("Please Fill All")</script>';	
			
		}
		else{
			//get admin name&&pass
			
			$get_admin="select * from admin where a_name ='$a_name' && a_pass='$a_pass' ";
			
			$run_admin= mysqli_query($con, $get_admin);
			// admin isset
			if(mysqli_num_rows($run_admin)==1){
				$row_admin=mysqli_fetch_array($run_admin);
				
				//admin value isset
				
				$aname=$row_admin['a_name'];
				//cookie hehe
				setcookie("aname",$aname, time()+60*60*24);
				setcookie("adminlogin",1,time()+60*60*24);
				echo '<script> alert("welocm here ")</script>';
			
			
				header("Location:ok.php");
				
				
				
				
			}
			else{	echo '<script> alert("The input information is incorrect ")</script>';
			}
		}
		
	}








?>

<!DOCTYPE html>

<html>

<head>
<title> Admin Login </title>
<meta charset ="utf-8"/>
<link rel ="stylesheet" type= "text/css" href="css/style.css"  />
</head>
<body>

<div class="loginAll" >

<form action ="login.php" method="post">
<input type = "text" name="a_name" placeholder="username" />
<br/>
<input type = "password" name="a_pass" placeholder="password" />
<br/>
<input type = "submit" name="login" value ="login" />









</form>






</div>






</body>



</html>