<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
<style>

<?php
  session_start();
?>
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
$memberid=$_SESSION["mid"];
$all="select * from member";
echo "<table border='1'>
<tr>
<th>Member ID</th>
<th>Name</th>
<th>Register Date</th>
<th>Address</th>
<th>Phone Number</th>
<th>NIC</th>
</tr>";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo"<hr>";
echo "<br>";
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
echo "<tr>";
echo "<td>".$row['MEM_ID']."</td>";
echo "<td>".$row['NAME']."</td>";
echo "<td>".$row['REGISTER_DATE']."</td>";
echo "<td>".$row['ADDRESS']."</td>";
echo "<td>".$row['PHONE_NO']."</td>";
echo "<td>".$row['NIC']."</td>";
}


?>
</body>
</html>