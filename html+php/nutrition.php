<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
<title>Database connection </title>
</head>
<body>
<?php
session_start();
?>
<?php  // creating a database connection 

   $db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-FKEI3A1)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XE)
    )
  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "system";   // Oracle username e.g "scott"
   $db_pass = "IKnow12345";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
    
echo "<br>";
$all="select * from cal_intake";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo"<hr>";
echo "Select nutrition id other than the following : ";
echo "<br>";
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
echo $row['C_PLAN_ID']."<br>";
}
?>
<form method="POST" action="">
NutritionID : <input type="text" name="nutrition-id">
Proteins : <input type="text" name="pro-teins"><br/><br/>
Fats : <input type="text" name="fa-ts"><br/><br/>
Carbo : <input type="text" name="car-bo"><br/><br/>
Vitamins : <input type="text" name="vit-amins"><br/><br/>
Water : <input type="text" name="wa-ter"><br/><br/>
Total Calories : <input type="text" name="t-cal"><br/><br/>
<input type="Submit" name="button">
</form>
<?php
if(isset($_POST["button"]))
{
$nutritionid=$_POST["nutrition-id"];
$proteins=$_POST["pro-teins"];
$fats=$_POST["fa-ts"];
$carbo=$_POST["car-bo"];
$vitamins=$_POST["vit-amins"];
$water=$_POST["wa-ter"];
$totalcalories=$_POST["t-cal"];
$_SESSION["cid"]=$nutritionid;
$inserting="INSERT INTO CAL_INTAKE(C_PLAN_ID,PROTEINS,FATS,CARBO,VITAMINS,WATER,TOTAL_CAL)"."values('$nutritionid', '$proteins', '$fats','$carbo', '$vitamins','$water','$totalcalories')";
$selection1=oci_parse($con,$inserting);
$r1=oci_execute($selection1);
echo "Your nutritional intake has been recorded";
}
?>
<a href="index_page_3.php">
<button>Return to Main Menu</button>
</a>
</body>
</html>