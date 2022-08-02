<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
<style>
<table>{
  border-style:solid;
  <border-width:2px>;
  <border-color:black>;
}
  </table>
</style>
</head>
<body>
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
?>
<?php
$all="select * from diet_plan";
echo "<table border='1'>
<tr>
<th>Diet Plan ID</th>
<th>Breakfast</th>
<th>Lunch</th>
<th>Dinner</th>
<th>Supper</th>
<th>Fruits</th>
</tr>";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo"<hr>";
echo "<br>";
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
echo "<tr>";
echo "<td>".$row['D_PLAN_ID']."</td>";
echo "<td>".$row['BREAKFAST']."</td>";
echo "<td>".$row['LUNCH']."</td>";
echo "<td>".$row['DINNER']."</td>";
echo "<td>".$row['SUPPER']."</td>";
echo "<td>".$row['FRUITS']."</td>";
}
?>
</body>
</html>