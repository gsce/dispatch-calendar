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
    date_default_timezone_set('America/Denver'); // this sets the date and time to mountain standard time on the server in php.
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    echo "<input type='text' id='postform' size='15' value='jobform'>";
    $action = trim($_POST['action']);
	
	$calendar_id = $_POST['jobformcalendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_POST['jobformcalendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_POST['jobformcalendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
 
	$calendar_date_holder = $_POST['jobformcalendardateholder'];
    echo "<input type='text' id='calendardateholder' value='$calendar_date_holder'>";
	
	$calendar_view = $_POST['jobformcalendarview'];
    echo "<input type='text' id='calendarview' value='$calendar_view'>";

	$note_view = $_POST['jobformnoteview'];
    echo "<input type='text' id='noteview' value='$note_view'>";

	$search_field = $_POST['jobformsearchfield'];
    echo "<input type='text' id='searchfield' value='$search_field'>";
	
	$employee_initials = $_POST['jobformemployeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";
	

	$job_number = trim($_POST['jobformjobnumber']);
    echo "<input type='text' id='jobnumber' size='10' value='$job_number'>";
	$job_type = trim($_POST['jobformjobtype']);
	$name1 = trim($_POST['jobformname1']);
	$company_name = trim($_POST['jobformcompanyname']);
	$name2 = trim($_POST['jobformname2']);
	$job_type = trim($_POST['jobformjobtype']);
	$location_type = trim($_POST['jobformlocationtype']);
    $booking_agent = trim($_POST['jobformbookingagent']);
    $origin_agent = trim($_POST['jobformoriginagent']);
    $destination_agent = trim($_POST['jobformdestinationagent']);
    $origin_address1 = trim($_POST['jobformoriginaddress1']);
	$origin_city_state_zip = trim($_POST['jobformorigincitystatezip']);
    $origin_address2 = trim($_POST['jobformoriginaddress2']);
    $destination_info1 = trim($_POST['jobformdestinationinfo1']);
    $destination_city_state_zip = trim($_POST['jobformdestinationcitystatezip']);
    $destination_info2 = trim($_POST['jobformdestinationinfo2']);
	$phone1 = trim($_POST['jobformphone1']);
	$phone2 = trim($_POST['jobformphone2']);
	$phone3 = trim($_POST['jobformphone3']);
	$email1 = trim($_POST['jobformemail1']);
	$email2 = trim($_POST['jobformemail2']);
	$do_not_print = trim($_POST['jobformdonotprint']);
    $tentitive = trim($_POST['jobformtentitivehold']);
    $cancelled = trim($_POST['jobformcancelledhold']);
	//$out_of_area = trim($_POST['jobformoutofarea']);
	//$permanent_storage = trim($_POST['jobformpermanentstorage']);
	//$trailer_storage = trim($_POST['jobformtrailerstorage']);
	$tarrif = ' '; //trim($_POST['jobformtarrif']);
	$cube = 0; //trim($_POST['jobformcube']);
	$valuation = 0; //trim($_POST['jobformvaluation']);
	$hauling = trim($_POST['jobformhauling']);
	$booking = trim($_POST['jobformbooking']);
	$order_number = trim($_POST['jobformordernumber']);
	$weight = trim($_POST['jobformweight']);
	$delivery_spread = trim($_POST['jobformdeliveryspread']);
	$job_note = trim($_POST['jobformjobnote']);
	$coordinator_note = trim($_POST['jobformcoordinatornote']);
	//$warehouse_information = trim($_POST['jobformwarehouseinformation']);
	echo "xxxxxxxxxxx".$action;

    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
    if ($action === 'add' || $action === 'copynew') {
		$stmt = mysqli_prepare($con, "INSERT INTO job (JOB_NUMBER, JOB_TYPE, LOCATION_TYPE, BOOKING_AGENT, ORIGIN_AGENT, DESTINATION_AGENT, NAME1, COMPANY_NAME, NAME2, ORIGIN_ADDRESS1, ORIGIN_CITY_STATE_ZIP, ORIGIN_ADDRESS2, DESTINATION_INFO1, DESTINATION_CITY_STATE_ZIP, DESTINATION_INFO2, PHONE1, PHONE2, PHONE3, EMAIL1, EMAIL2, TARRIF, CUBE, VALUATION, DELIVERY_SPREAD, ORDER_NUMBER, WEIGHT, HAULING, BOOKING, NOTE, DO_NOT_PRINT, TENTITIVE, CANCELLED, COORDINATOR_NOTE, ENTERED_BY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
		mysqli_stmt_bind_param($stmt, 'issssssssssssssssssssiisssssssssss', $job_number, $job_type, $location_type, $booking_agent, $origin_agent, $destination_agent, $name1, $company_name, $name2, $origin_address1, $origin_city_state_zip, $origin_address2, $destination_info1, $destination_city_state_zip, $destination_info2, $phone1, $phone2, $phone3, $email1, $email2, $tarrif, $cube, $valuation, $delivery_spread, $order_number, $weight, $hauling, $booking, $job_note, $do_not_print, $tentitive, $cancelled, $coordinator_note, $calendar_employee_name); 
		
	    mysqli_stmt_execute($stmt);

        echo "1 record added";
 
	    mysqli_close($con);
		
	} else if ($action==='update' || $action === 'copy') {
	
		$stmt = mysqli_prepare($con, "UPDATE job SET JOB_TYPE = ?, LOCATION_TYPE = ?, BOOKING_AGENT = ?, ORIGIN_AGENT = ?, DESTINATION_AGENT = ?, NAME1 = ?, COMPANY_NAME = ?, NAME2 = ?, ORIGIN_ADDRESS1 = ?, ORIGIN_CITY_STATE_ZIP = ?, ORIGIN_ADDRESS2 = ?, DESTINATION_INFO1 = ?, DESTINATION_CITY_STATE_ZIP = ?, DESTINATION_INFO2 = ?, PHONE1 = ?, PHONE2 = ?, PHONE3 = ?, EMAIL1 = ?, EMAIL2 = ?, TARRIF = ?, CUBE = ?, VALUATION = ?, DELIVERY_SPREAD = ?, ORDER_NUMBER = ?, WEIGHT = ?, HAULING = ?, BOOKING = ?, NOTE = ?, DO_NOT_PRINT = ?, TENTITIVE = ?, CANCELLED = ?, COORDINATOR_NOTE = ? WHERE JOB_NUMBER = $job_number ORDER BY JOB_NUMBER ASC");
    
		mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssiissssssssss', $job_type, $location_type, $booking_agent, $origin_agent, $destination_agent, $name1, $company_name, $name2, $origin_address1, $origin_city_state_zip, $origin_address2, $destination_info1, $destination_city_state_zip, $destination_info2, $phone1, $phone2, $phone3, $email1, $email2, $tarrif, $cube, $valuation, $delivery_spread, $order_number, $weight, $hauling, $booking, $job_note, $do_not_print, $tentitive, $cancelled, $coordinator_note); 
	    
		mysqli_stmt_execute($stmt);
		
		echo "1 record updated";
		
		mysqli_close($con);
    }
    echo $action; 	
    ?>
  </body>
</html>