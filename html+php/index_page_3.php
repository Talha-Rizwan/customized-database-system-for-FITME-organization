<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insertion</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<?php
            $db_sid = 
           "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-FKEI3A1)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XE)
    )
  )";           // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
            
            $db_user = "system";   // Oracle username e.g "scott"
            $db_pass = "IKnow12345";    // Password for user e.g "1234"
            $con = oci_connect($db_user,$db_pass,$db_sid); 

    ?>
    <font color="white">
    <h3>Exercise Chart</h3>
    <a href="exercise.php">
        <button class="qwe">
          Form For Exercise Chart   
        </button>
    </a>
    <h3>Nutritional Intake</h3>
    <a href="nutrition.php">
        <button class="qwe">
            Form For Nutritional Intake/Calory Intake 
        </button>
    </a>
    <h3>Diet Plan</h3>
    <a href="diet_plan.php">
        <button class="qwe">
            Form For Diet Plan 
        </button>
    </a>
    <h3>Workout Plan</h3>
    <a href="workout.php">
        <button class="qwe">
            Form For Workout Plan 
        </button>
    </a>
    <h3>Diet Plan</h3>
    <a href="report_diet.php">
        <button class="qwe">
            Report For Diet Plan 
        </button>
    </a>
    <h3>Exercise Plan</h3>
    <a href="report_exercise.php">
        <button class="qwe">
            Report For Exercise Plan 
        </button>
    </a>
    <h3>Workout Plan</h3>
    <a href="report_workout.php">
        <button class="qwe">
            Report For Workout Plan 
        </button>
    </a>
    <h3>All Information</h3>
    <a href="report_search.php">
        <button class="qwe">
            Getting Information of all your members 
        </button>
    </a>

</body>
</html>