<html>
<head>
<title>Database connection </title>
</head>
<body>
<style>
body {
  background-image: url('register.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
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
$all="select * from member";
$selection=oci_parse($con,$all);
$r=oci_execute($selection);
echo"<hr>";
echo "Select member id other than the following : ";
echo "<br>";
while($row=oci_fetch_array($selection,OCI_BOTH+OCI_RETURN_NULLS))
{
echo $row['MEM_ID']."<br>";
}
?>
<form method="POST" action="">
Member ID : <input type="text" name="member-id" placeholder="Enter the member id : " size="50"><br/><br/>
Member Name : <input type="text" name="mem-name" placeholder="Enter the member name : "size="50"><br/><br/><br/><br/><br/>
Register Date : <input type="text" name="register-date" size="50"><br/><br/>
Address : <input type="text" name="address" size="50"><br/><br/>
Phone Number : <input type="text" name="phone-no" size="50"><br/><br/>
NIC : <input type="text" name="nic" size="50"><br/><br/>
<input type="submit" name="button">
</form>
<?php
if(isset($_POST["button"]))
{
$memid=$_POST["member-id"];
$memname=$_POST["mem-name"];
$regdate=$_POST["register-date"];
$add=$_POST["address"];
$phono=$_POST["phone-no"];
$ni=$_POST["nic"];
$inserting="INSERT INTO MEMBER(MEM_ID,NAME,REGISTER_DATE,ADDRESS,PHONE_NO,NIC)"."values('$memid', '$memname', '$regdate','$add', '$phono', '$ni')";
$selection1=oci_parse($con,$inserting);
$r1=oci_execute($selection1);
echo "The member has been registered";
}
?>
<a href="index_page_1.php">
<button>Return to Main Menu</button>
</a>
</body>
</html>





