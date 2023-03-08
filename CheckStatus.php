<?php 
include("config.php"); 


error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("head.php");?>
</head>
<body>

<?php
include("top_nav.php");
?>
<div class="col-lg-12">
                <h2 class="page-header text-primary">
                   Check your Registration Status here
                </h2>
            </div>
            <div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				
					<form role="form" action="CheckStatusResult.php" method="post">
			    	  	<div class="form-group">
							 <label for="user_name" class="text-primary">Choose Donor or Patient</label>
                             <select id="gen" name="utype" required class="form-control input-sm">
									<option value="">Select Type</option>
									<option value="Donor">Donor</option>
									<option value="Patient">Patient</option>
						
								</select>
			    		    <!-- <input class="form-control" name="utype"  id="user" type="text" required> -->
			    		</div>
                        <div class="form-group">
							 <label for="user_name" class="text-primary">Email </label>
			    		    <input class="form-control" name="email"  id="user" type="email" required>
			    		</div>
			    		
						
						
			    		<button class="btn btn-primary pull-right" name="submit" type="submit"><i class="fa fa-sign-in"></i> SUBMIT </button>
			      	</form>
				</div>
				<div class="col-md-3"></div>

			

</body>
</html>