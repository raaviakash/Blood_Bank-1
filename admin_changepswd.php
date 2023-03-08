
<?php
session_start();
include("config.php");
include("admin_function.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include("admin_head.php");?>
	</head>
	<body>

<?php include("admin_topnav.php"); ?>



   

    <!-- Page Content -->
    <div class="container" style="margin-top:70px;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-primary"><i></i> Change Password
                  
                </h1>
              
            </div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<?php
				$sql="SELECT username,password FROM user where usertype='admin'";
				$result = $con->query($sql);
				$row = $result -> fetch_array(MYSQLI_ASSOC);
				
                
				if(isset($_POST["submit"]))
					{
                        $pas=$_POST["new"];
						if($_POST["curr"]==$row['password']&&$pas==$_POST["conf"])
						{
                            $sql="UPDATE user SET password=$pas where username='admin'";
				            $res = $con->query($sql);
							echo "<div class='alert alert-success'><b>Success</b> password changed.</div>";

							 $_SESSION['usertype'] ='admin';
							 $_SESSION['username']='admin';
							
							header("location:admin_inbox.php");
						}
						else
						{
							echo "<div class='alert alert-danger'><b>Error</b> Incorrect Details.</div>";
							
						}
					}
				?>
					<form role="form" action="admin_changepswd.php" method="post">
			    	  	<div class="form-group">
							 <label for="user_name" class="text-primary">Current Password</label>
			    		    <input class="form-control" name="curr"  id="user" type="text" required>
			    		</div>
			    		<div class="form-group">
							<label for="pass" class="text-primary">New Password</label>
			    			<input class="form-control" id="pass" name="new" type="password" value="" required>
			    		</div>
                        <div class="form-group">
							 <label for="user_name" class="text-primary">Confirm password</label>
			    		    <input class="form-control" name="conf"  id="user" type="password" required>
			    		</div>
						
						
			    		<button class="btn btn-primary pull-right" name="submit" type="submit"><i class="fa fa-sign-in"></i> SUBMIT </button>
			      	</form>
				</div>
				<div class="col-md-3"></div>
			</div>
        </div>
	</div>
	</body>
</html>