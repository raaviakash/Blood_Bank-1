<?php
include("top_nav.php");
?>
<html lang="en">
<head>
	<?php include("head.php");?>
</head>
<body>

<?php

				include("config.php"); 
                $usr=$_POST["utype"];
                $mail=$_POST["email"];
                if($usr=="Donor"){
                
                $sql = "SELECT * FROM blood_donor WHERE EMAIL='$mail'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo "<div class='table-responsive '><table class='table table-striped table-bordered'>
  <tr class='text-primary'><th>NAME</th><th>EMAIL</th><th>BLOOD</th><th>CITY</th><th>AREA</th><th>CONTACT</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["NAME"]."</td><td>".$row["EMAIL"]."</td><td>".$row["BLOOD"]."</td><td>".$row["CITY"]."</td><td>".$row["AREA"]."</td><td>".$row["CONTACT_1"]."</td></tr>";
    if($row["STATUS"]==1){

        echo'<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						<strong>Success!</strong>  You are Activated..
					</div>';
        // echo "<div class='alert alert-success'><i class='fa fa-users'></i> You are Activated..</div>";
        // echo "You are Activated..";
    }
    else{
        echo "<div class='alert alert-danger'><i class='fa fa-users'></i> Not yet Activated..</div>";
    }
  }
  echo "</table></div>";
}
 else {
    echo "<div class='alert alert-danger'><b>Error</b> Incorrect user or email.</div>";
    header("location:CheckStatus.php");
}
}

else{
                
    $sql = "SELECT * FROM request_blood WHERE EMAIL='$mail'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
echo "<div class='table-responsive '><table class='table table-striped table-bordered'>
<tr class='text-primary'><th>NAME</th><th>EMAIL</th><th>BLOOD</th><th>CITY</th><th>PINCODE</th><th>CONTACT</th></tr>";
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row["NAME"]."</td><td>".$row["EMAIL"]."</td><td>".$row["BLOOD"]."</td><td>".$row["CITY"]."</td><td>".$row["PIN"]."</td><td>".$row["CON1"]."</td></tr>";
if($row["STATUS"]==1){
echo '<div class="alert alert-success">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success!</strong> You are Approved.
</div>';
// echo "You are Activated..";
}
else{
echo '<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Sorry!</strong> Your Registration is still pending.
</div>';
}
}
echo "</table></div>";
}
 else {
    echo "<div class='alert alert-danger'><b>Error</b> Incorrect user or email.</div>";
    echo'<script>alert("Incorrect user or email"); </script>';
    header("location:CheckStatus.php");
}
}




$con->close();

			
					
?>
<script src="js/jquery.js"></script>


<script src="js/bootstrap.min.js"></script>
</body>
</html>