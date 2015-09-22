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
    echo "<input type='text' id='postform' size='15' value='employeeform'>";
    $action = trim($_POST['employeeformaction']);
	
	$calendar_id = $_POST['employeeformcalendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_POST['employeeformcalendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_POST['employeeformcalendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
	
	$calendar_view = $_POST['employeeformcalendarview'];
    echo "<input type='text' id='calendarview' value='$calendar_view'>";

	$note_view = $_POST['employeeformnoteview'];
    echo "<input type='text' id='noteview' value='$note_view'>";

	$employee_initials = $_POST['employeeformemployeeinitialshold'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";
	
	if (isset($_POST['employeeformsearchfield'])) {
	    $search_field = trim($_POST['employeeformsearchfield']);
	} else {
	    $search_field = '';
	}
    echo "<input type='text' id='searchfield' value='$search_field'>";
 
	$calendar_date_holder = $_POST['employeeformcalendardateholder'];
    echo "<input type='text' id='calendardateholder' value='$calendar_date_holder'>";
	
	$employee_id = $_POST['employeeformemployeeid'];
	$employee_name = trim($_POST['employeeformemployeename']);
	$employee_social_security = trim($_POST['employeeformemployeesocialsecurity']);
	$employee_address = trim($_POST['employeeformemployeeaddress']);
	$employee_phone1 = trim($_POST['employeeformemployeephone1']);
	$employee_phone2 = trim($_POST['employeeformemployeephone2']);
	$employee_phone3 = trim($_POST['employeeformemployeephone3']);
	$employee_email1 = trim($_POST['employeeformemployeeemail1']);
	$employee_email2 = trim($_POST['employeeformemployeeemail2']);
	$employee_email3 = trim($_POST['employeeformemployeeemail3']);
	$comment = trim($_POST['employeeformcomment']);
	date_default_timezone_set('America/Denver');
    $date_entered = date_format(date_create(),'Y-m-d H:i:s');
	$default_calendar = trim($_POST['employeeformdefaultcalendar']);
	$calendar_user = trim($_POST['employeeformcalendaruser']);
    $calendar_user = strtoupper($calendar_user);
	$employee_initials = trim($_POST['employeeformemployeeinitials']);
    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
    if ($action === 'add') {
		$stmt = mysqli_prepare($con, "INSERT INTO employee_names (CALENDAR_USER, EMPLOYEE_NAME, EMPLOYEE_SOCIAL_SECURITY, EMPLOYEE_ADDRESS, EMPLOYEE_PHONE1, EMPLOYEE_PHONE2, EMPLOYEE_PHONE3, EMPLOYEE_EMAIL1, EMPLOYEE_EMAIL2, EMPLOYEE_EMAIL3, COMMENT, DATE_ENTERED, DEFAULT_CALENDAR, EMPLOYEE_INITIALS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
		mysqli_stmt_bind_param($stmt, 'ssssssssssssis', $calendar_user, $employee_name, $employee_social_security, $employee_address, $employee_phone1, $employee_phone2, $employee_phone3, $employee_email1, $employee_email2, $employee_email3, $comment, $date_entered, $default_calendar, $employee_initials); 
		
	    mysqli_stmt_execute($stmt);

        echo "1 record added";
 
	    mysqli_close($con);
		
	} else if ($action==='update') {
	
        $stmt = mysqli_prepare($con, "UPDATE employee_names SET EMPLOYEE_NAME = ?, EMPLOYEE_SOCIAL_SECURITY = ?, EMPLOYEE_ADDRESS = ?, EMPLOYEE_PHONE1 = ?, EMPLOYEE_PHONE2 = ?, EMPLOYEE_PHONE3 = ?, EMPLOYEE_EMAIL1 = ?, EMPLOYEE_EMAIL2 = ?, EMPLOYEE_EMAIL3 = ?, COMMENT = ?, DEFAULT_CALENDAR = ?, CALENDAR_USER = ?, EMPLOYEE_INITIALS = ? WHERE EMPLOYEE_ID = $employee_id");
    
        mysqli_stmt_bind_param($stmt, 'ssssssssssiss', $employee_name, $employee_social_security, $employee_address, $employee_phone1, $employee_phone2, $employee_phone3, $employee_email1, $employee_email2, $employee_email3, $comment, $default_calendar, $calendar_user, $employee_initials);
	    
		mysqli_stmt_execute($stmt);
		
		echo "1 record updated";
		
		mysqli_close($con);
    }
    echo $action; 	
    ?>
  </body>
</html>