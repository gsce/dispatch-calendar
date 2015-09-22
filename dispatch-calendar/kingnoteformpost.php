<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> Lame Deer Courtesy </title>
  <script src="./scripts/kingpost.js" type="text/javascript"></script> 
  <link rel="stylesheet" type="text/css" href="./css/kingcalendar.css" media="all">
</head>
<body id='body'>
  <?php
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    echo "<input type='text' id='postform' size='15' value='noteform'>";
    $action = trim($_POST['noteformaction']);
	
	$calendar_id = $_POST['noteformcalendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_POST['noteformcalendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_POST['noteformcalendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
 
	$calendar_date_holder = $_POST['noteformcalendardateholder'];
    echo "<input type='text' id='calendardateholder' size='10' value='$calendar_date_holder'>";
	
	$calendar_view = $_POST['noteformcalendarview'];
    echo "<input type='text' id='calendarview' size='10' value='$calendar_view'>";

	$note_view = $_POST['noteformnoteview'];
    echo "<input type='text' id='noteview' size='10' value='$note_view'>";
	
	$employee_initials = $_POST['noteformemployeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";
	
	date_default_timezone_set('America/Denver');
    $note_date_time = date_format(date_create(),'Y-m-d H:i:s');
	
	$note_sent_by_employee_id = $_POST['noteformsentbyemployeeid'];
    echo "<input type='text' id='noteformsentbyemployeeid' size='5' value='$note_sent_by_employee_id'>";

	$note_sent_by_employee_name = $_POST['noteformsentbyemployeename'];
    echo "<input type='text' id='noteformsentbyemployeename' size='100' value='$note_sent_by_employee_name'>";

	$employee_id_note_is_for = $_POST['noteformemployeeidnoteisfor'];
	$employee_name_note_is_for = $_POST['noteformemployeenamenoteisfor'];
	$note = $_POST['noteformnote'];
	$note_id = $_POST['noteformnoteid'];
    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
    if ($action === 'add') {
        $result = mysqli_query($con, "SELECT * FROM employee_names WHERE employee_names.CALENDAR_USER = 'Y' ORDER BY employee_names.CALENDAR_USER ASC");
        $numberOfRows = mysqli_num_rows($result) ;
	    if (strtoupper($employee_name_note_is_for) == 'EVERYBODY') {
            $i = 0 ;
		    while ($i < $numberOfRows) {
                $row = mysqli_fetch_array($result);
		        $employee_id_note_is_for = $row['EMPLOYEE_ID'];
				$employee_name_note_is_for = $row['EMPLOYEE_NAME'];
				$stmt = mysqli_prepare($con, "INSERT INTO note (DATE_TIME, NOTE_SENT_BY_ID, NOTE_SENT_BY_NAME, NOTE, EMPLOYEE_ID, NOTE_SENT_TO_NAME) VALUES (?, ?, ?, ?, ?, ?)");
        		mysqli_stmt_bind_param($stmt, 'sissis', $note_date_time, $note_sent_by_employee_id, $note_sent_by_employee_name, $note, $employee_id_note_is_for, $employee_name_note_is_for); 
			    mysqli_stmt_execute($stmt);
                $i++;
            } 
	        mysqli_close($con);
			
        } else {  
            $i = 0 ;
		    while ($i < $numberOfRows) {
                $row = mysqli_fetch_array($result);
		        $employee_id_note_is_for = $row['EMPLOYEE_ID'];
				$employee_name_note_is_for = $row['EMPLOYEE_NAME'];
				$note_form_check_box = 'noteformcheckbox'.$employee_id_note_is_for;
				$note_employee_check_box = $_POST[$note_form_check_box];
				if ($note_employee_check_box == 1) {
				    $stmt = mysqli_prepare($con, "INSERT INTO note (DATE_TIME, NOTE_SENT_BY_ID, NOTE_SENT_BY_NAME, NOTE, EMPLOYEE_ID, NOTE_SENT_TO_NAME) VALUES (?, ?, ?, ?, ?, ?)");
        		    mysqli_stmt_bind_param($stmt, 'sissis', $note_date_time, $note_sent_by_employee_id, $note_sent_by_employee_name, $note, $employee_id_note_is_for, $employee_name_note_is_for); 
			        mysqli_stmt_execute($stmt);
				}
                $i++;
            } 
	        mysqli_close($con);
		}
	} else if ($action==='update') {
	
        $stmt = mysqli_prepare($con, "UPDATE note SET NOTE = ? WHERE NOTE_ID = $note_id");
    
        mysqli_stmt_bind_param($stmt, 's', $note);
	    
		mysqli_stmt_execute($stmt);
		
		echo "1 record updated";
		
		mysqli_close($con);
    }
    echo $action; 	
    ?>
  </body>
</html>