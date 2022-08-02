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
$all="select * from exercise_chart";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo"<hr>";
echo "Select exercise id other than the following : ";
echo "<br>";
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
echo $row['EX_CHART_ID']."<br>";
}
?>
<form method="POST" action="">
Exercise ID : <input type="text" name="exercise-id"><br/><br/>
Arms : <input type="text" name="ar-ms"><br/><br/>
Chest : <input type="text" name="che-st"><br/><br/>
Thigh : <input type="text" name="thi-gh"><br/><br/>
Any Other Body Exercise : <input type="text" name="other-des"><br/><br/>
<input type="Submit" name="button">
</form>
<?php
if(isset($_POST["button"]))
{
$exid=$_POST["exercise-id"];
$arms=$_POST["ar-ms"];
$chest=$_POST["che-st"];
$thigh=$_POST["thi-gh"];
$anyother=$_POST["other-des"];
$_SESSION["eid"]=$exid;
$inserting="INSERT INTO EXERCISE_CHART(EX_CHART_ID,ARMS,CHEST,THIGH,OTHER_DISCRIPTION)"."values('$exid', '$arms', '$chest','$thigh', '$anyother')";
$selection1=oci_parse($con,$inserting);
$r1=oci_execute($selection1);
echo "Your exercise has been recorded";
}
?>
<a href="index_page_3.php">
<button>Return to Main Menu</button>
</a>
</body>
</html>