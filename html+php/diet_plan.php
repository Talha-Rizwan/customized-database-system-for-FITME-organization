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
$all="select * from diet_plan";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo"<hr>";
echo "Select diet id other than the following : ";
echo "<br>";
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
echo $row['D_PLAN_ID']."<br>";
}
?>
<form method="POST" action="">
DietID : <input type="text" name="diet-id"><br/><br/>
Breakfast : <input type="text" name="break-fast"><br/><br/>
Lunch : <input type="text" name="lu-nch"><br/><br/>
Dinner : <input type="text" name="di-nner"><br/><br/>
Supper : <input type="text" name="sup-per"><br/><br/>
Fruits : <input type="text" name="fru-its"><br/><br/>
<input type="Submit" name="button">
</form>
<?php
if(isset($_POST["button"]))
{
$dietid=$_POST["diet-id"];
$breakfast=$_POST["break-fast"];
$lunch=$_POST["lu-nch"];
$dinner=$_POST["di-nner"];
$supper=$_POST["sup-per"];
$fruits=$_POST["fru-its"];
$_SESSION["did"]=$dietid;
$inserting="INSERT INTO DIET_PLAN(D_PLAN_ID,BREAKFAST,LUNCH,DINNER,SUPPER,FRUITS)"."values('$dietid', '$breakfast', '$lunch','$dinner', '$supper','$fruits')";
$selection1=oci_parse($con,$inserting);
$r1=oci_execute($selection1);
echo "Your diet plan has been recorded";
}
?>
<a href="index_page_3.php">
<button>Return to Main Menu</button>
</a>
</body>
</html>