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
	date_default_timezone_set('America/Denver');
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    echo "<input type='text' id='postform' size='15' value='nowork'>";
	
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

	$employee_initials = $_GET['employeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";

	$name1 = 'NO MORE WORK!!!';
	$company_name = 'NO MORE WORK !!!';
	$name2 = '';
    $job_type = 'No More Work!';
    $job_number = time();
    echo "<input type='text' id='jobnumber' size='10' value='$job_number'>";
    $automatic_number = 0;
    $location_type = 'No More Work!';
    $booking = "King";
    $hauling = "King";
	$booking_agent = '';
    $origin_agent = '';
    $destination_agent = '';
	$hauling_agent = '';
    $origin_address1 = '';
    $origin_address2 = '';
    $destination_info1 = '';
    $destination_info2 = '';
	$phone1 = 'No More Work!!';
	$phone2 = 'No More Work!!';
	$phone3 = '';
	$email1 = '';
	$email2 = '';
	$do_not_print = 'yes';
	$tentitive = '';
	$cancelled = '';
	//$out_of_area = '';
	//$permanent_storage = '';
	//$trailer_storage = '';
	$tarrif = '';
	$cube = '';
	$valuation = '';
	$weight = '';
	$order_number = '';
	$delivery_spread = '';
	$job_note = 'No More Work!!!';
	$coordinator_note = '';

    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
		$stmt = mysqli_prepare($con, "INSERT INTO job (JOB_NUMBER, JOB_TYPE, LOCATION_TYPE, BOOKING_AGENT, ORIGIN_AGENT, DESTINATION_AGENT, NAME1, COMPANY_NAME, NAME2, ORIGIN_ADDRESS1, ORIGIN_ADDRESS2, DESTINATION_INFO1, DESTINATION_INFO2, PHONE1, PHONE2, PHONE3, EMAIL1, EMAIL2, TARRIF, CUBE, VALUATION, ORDER_NUMBER, WEIGHT, HAULING, BOOKING, NOTE, DO_NOT_PRINT, TENTITIVE, CANCELLED, COORDINATOR_NOTE, ENTERED_BY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
		mysqli_stmt_bind_param($stmt, 'issssssssssssssssssiissssssssss', $job_number, $job_type, $location_type, $booking_agent, $origin_agent, $destination_agent, $name1, $company_name, $name2, $origin_address1, $origin_address2, $destination_info1, $destination_info2, $phone1, $phone2, $phone3, $email1, $email2, $tarrif, $cube, $valuation, $order_number, $weight, $hauling, $booking, $job_note, $do_not_print, $tentitive, $cancelled, $coordinator_note, $calendar_employee_name); 
		
	    mysqli_stmt_execute($stmt);

		
	$job_date = $calendar_date_holder;
	$job_date = date('Y-m-d', strtotime($job_date));
	$job_time = '05:00 am';
	$job_date_time = $job_date.' '.$job_time;
	$job_date_time = date('Y-m-d H:i:s', strtotime($job_date_time));
	$job_calendar_id = $calendar_id;
	$job_calendar_name = 'KING';
	$job_day_type = 'No More Work!';
	$weight = '';
	$job_hours = '';
	$rate = '';
	$cost = '';
	$number_of_men = '';
	$names_of_men = 'No More Work !!! No More Work !!!';
	$driver = 'No More Work !!!';
	$driver_number = '';
	$truck_number = '';
	$trailer_number = '';
	$day_note = 'No More Work !!! No More Work!!!';
	$job_number_of_days = '1/1';

	$stmt = mysqli_prepare($con, "INSERT INTO job_date (JOB_NUMBER, DATE, DATE_TIME, CALENDAR_ID, CALENDAR_NAME, ENTERED_BY, ENTERED_BY_ID, JOB_DAY_TYPE, JOB_HOURS, DAY_WEIGHT, RATE, COST, NUMBER_OF_MEN, NAMES_OF_MEN, DRIVER, DRIVER_NUMBER, TRUCK_NUMBER, TRAILER_NUMBER, DAY_NOTE, NUMBER_OF_DAYS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
    mysqli_stmt_bind_param($stmt, 'issississsssssssssss', $job_number, $job_date, $job_date_time, $job_calendar_id, $job_calendar_name, $calendar_employee_name, $calendar_employee_id, $job_day_type, $job_hours, $weight, $rate, $cost, $number_of_men, $names_of_men, $driver, $driver_number, $truck_number, $trailer_number, $day_note, $job_number_of_days); 
		
	mysqli_stmt_execute($stmt);
 
	mysqli_close($con);

  ?>
</body>
</html>