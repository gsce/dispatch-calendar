<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Transfer </title>
  <script src="./scripts/kingpost.js" type="text/javascript"></script> 
</head>
<body id='body'>
  <?php
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    echo "<input type='text' id='postform' value='deleteemployee'>";
	
	$calendar_id = $_GET['calendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_GET['calendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_GET['calendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
 
	$calendar_date_holder = $_GET['calendardateholder'];
    echo "<input type='text' id='calendardateholder' value='$calendar_date_holder'>";
	
	$calendar_view = $_GET['calendarview'];
    echo "<input type='text' id='calendarview' value='$calendar_view'>";

	$note_view = $_GET['calendarnoteview'];
    echo "<input type='text' id='noteview' value='$note_view'>";

	$employee_id = $_GET['calendarpasteemployeeid'];
    echo "<input type='text' id='employeeid' value='$employee_id'>";

    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }

    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }

	$sql = "DELETE FROM employee_names WHERE EMPLOYEE_ID = $employee_id ORDER BY EMPLOYEE_ID ASC";
    
	mysqli_query($con,$sql);
	
	mysqli_close($con);

?>
</body>
</html>