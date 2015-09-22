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
    echo "<input type='text' id='postform' size='15' value='calendarsetupform'>";
    $action = trim($_POST['calendarsetupformaction']);
	
	$calendar_id = $_POST['calendarsetupformcalendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_POST['calendarsetupformcalendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_POST['calendarsetupformcalendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
 
	$calendar_date_holder = $_POST['calendarsetupformcalendardateholder'];
    echo "<input type='text' id='calendardateholder' value='$calendar_date_holder'>";

	$calendar_view = $_POST['calendarsetupformcalendarview'];
    echo "<input type='text' id='calendarview' value='$calendar_view'>";

	$note_view = $_POST['calendarsetupformnoteview'];
    echo "<input type='text' id='noteview' value='$note_view'>";

	$employee_initials = $_POST['calendarsetupformemployeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";

	$calendar_setup_id = $_POST['calendarsetupformid'];
	$name = trim($_POST['calendarsetupformname']);
	date_default_timezone_set('America/Denver');
    $date_entered = date_format(date_create(),'Y-m-d H:i:s');

    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
    if ($action === 'add') {
		$stmt = mysqli_prepare($con, "INSERT INTO calendar (CALENDAR_NAME) VALUES (?)");
        
		mysqli_stmt_bind_param($stmt, 's', $name); 
		
	    mysqli_stmt_execute($stmt);

        echo "1 record added";
 
	    mysqli_close($con);
		
	} else if ($action==='update') {
        $stmt = mysqli_prepare($con, "UPDATE calendar SET CALENDAR_NAME = ? WHERE CALENDAR_ID = $calendar_setup_id");
    
        mysqli_stmt_bind_param($stmt, 's', $name);
	    
		mysqli_stmt_execute($stmt);
		
		echo "1 record updated";
		
		mysqli_close($con);
    }
    echo $action; 	
    ?>
  </body>
</html>