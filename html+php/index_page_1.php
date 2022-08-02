<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
?>

<div class="loginbox">
    
    <h1>Login Here</h1>
    <form action="" method="POST">
        <p>Member Name</p>
        <input type="text" name="member-name" placeholder="Enter Member Name">
        <p>Member ID</p>
        <input type="text" name="member-id" placeholder="Enter Member id">
        <input type="submit" name="member-button">
    </form>    
    <a href="member_registeration.php">
            <button>Don't Have an Account?</button>
            </a>
    
</div> 
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
if(isset($_POST["member-button"]))
{
$id=$_POST["member-id"];
$name=$_POST["member-name"];
$all="select * from member";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo "<br>";
$_SESSION["mid"]=$id;
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
if($row['MEM_ID']==$id and $row['NAME']==$name)
{
//echo "Successfully Login";
header("Location: index_page_3.php");
}
} 
}       
?>

</body>
</html>