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
$memberid=$_SESSION["mid"];
$dietid=$_SESSION["did"];
$nutritionid=$_SESSION["cid"];
$exerciseid=$_SESSION["eid"];
?>
<?php
echo "<br>";
$all="select * from workout_plan";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo"<hr>";
echo "Select workout id other than the following : ";
echo "<br>";
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
echo $row['W_PLAN_ID']."<br>";
}
?>
<form method="POST" action="">
WorkoutID : <input type="text" name="workout-id"><br/><br/>
Musclegroup : <input type="text" name="muscle-group"><br/><br/>
Bmi : <input type="text" name="b-mi"><br/><br/>
Age : <input type="text" name="a-ge"><br/><br/>
Workouttime : <input type="text" name="workout-time"><br/><br/>
<input type="Submit" name="button">
</form>
<?php
if(isset($_POST["button"]))
{
$workoutid=$_POST["workout-id"];
$musclegroup=$_POST["muscle-group"];
$bmi=$_POST["b-mi"];
$age=$_POST["a-ge"];
$workouttime=$_POST["workout-time"];
$inserting="INSERT INTO WORKOUT_PLAN(W_PLAN_ID,MUSCLE_GROUP,BMI,AGE,WORKOUT_TIME,D_PLAN_ID,C_PLAN_ID,EX_CHART_ID,MEM_ID)"."values('$workoutid', '$musclegroup', '$bmi','$age', '$workouttime','$dietid','$nutritionid','$exerciseid','$memberid')";
$selection1=oci_parse($con,$inserting);
$r1=oci_execute($selection1);
echo "Your workout intake has been recorded";
}
?>





</body>
</html>