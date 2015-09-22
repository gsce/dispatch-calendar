<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Transfer </title>
  <script src="./scripts/kingpost.js" type="text/javascript"></script> 
  <link rel="stylesheet" type="text/css" href="./css/kingcalendar.css" media="all">
</head>
<body id='body'>
  <?php
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    echo "<input type='text' id='postform' value='cancelljob'>";
	
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

	$job_number = $_GET['calendarpastejobnumber'];
    echo "<input type='text' id='jobnumber' value='$job_number'>";
	
	$employee_initials = $_GET['employeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";

	$cancelled = 'yes';
    $do_not_print = 'yes';
	
    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
	
	$stmt = mysqli_prepare($con, "UPDATE job SET CANCELLED = ?, DO_NOT_PRINT = ? WHERE JOB_NUMBER = $job_number ORDER BY JOB_NUMBER ASC");
    
	mysqli_stmt_bind_param($stmt, 'ss', $cancelled, $do_not_print); 
	   
	mysqli_stmt_execute($stmt);
	
	mysqli_close($con);

?>
</body>
</html>