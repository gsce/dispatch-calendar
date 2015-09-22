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
    echo "<input type='text' id='postform' size='15' value='contactform'>";
    $action = trim($_POST['contactformaction']);
	
	$calendar_id = $_POST['contactformcalendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_POST['contactformcalendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_POST['contactformcalendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
	
	$calendar_view = $_POST['contactformcalendarview'];
    echo "<input type='text' id='calendarview' value='$calendar_view'>";

	$note_view = $_POST['contactformnoteview'];
    echo "<input type='text' id='noteview' value='$note_view'>";
	
	$employee_initials = $_POST['contactformemployeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";
 
	$calendar_date_holder = $_POST['contactformcalendardateholder'];
    echo "<input type='text' id='calendardateholder' value='$calendar_date_holder'>";

	if (isset($_POST['contactformsearchfield'])) {
	    $search_field = trim($_POST['contactformsearchfield']);
	} else {
	    $search_field = '';
	}
    echo "<input type='text' id='searchfield' value='$search_field'>";

	$contact_id = $_POST['contactformcontactid'];
	$name1 = trim($_POST['contactformname1']);
	$name2 = trim($_POST['contactformname2']);
	$address1 = trim($_POST['contactformaddress1']);
	$address2 = trim($_POST['contactformaddress2']);
	$phone1 = trim($_POST['contactformphone1']);
	$phone2 = trim($_POST['contactformphone2']);
	$phone3 = trim($_POST['contactformphone3']);
	$email1 = trim($_POST['contactformemail1']);
	$email2 = trim($_POST['contactformemail2']);
	$social_network = trim($_POST['contactformsocialnetwork']);
	$comment = trim($_POST['contactformcomment']);
	date_default_timezone_set('America/Denver');
    $date_entered = date_format(date_create(),'Y-m-d H:i:s');

    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
    if ($action === 'add') {
		$stmt = mysqli_prepare($con, "INSERT INTO contacts (NAME1, NAME2, ADDRESS1, ADDRESS2, PHONE1, PHONE2, PHONE3, EMAIL1, EMAIL2, SOCIAL_NETWORK, COMMENT) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
		mysqli_stmt_bind_param($stmt, 'sssssssssss', $name1, $name2, $address1, $address2, $phone1, $phone2, $phone3, $email1, $email2, $social_network, $comment); 
		
	    mysqli_stmt_execute($stmt);

        echo "1 record added";
 
	    mysqli_close($con);
		
	} else if ($action==='update') {
	
        $stmt = mysqli_prepare($con, "UPDATE contacts SET NAME1 = ?, NAME2 = ?, ADDRESS1 = ?, ADDRESS2 = ?, PHONE1 = ?, PHONE2 = ?, PHONE3 = ?, EMAIL1 = ?,EMAIL2 = ?, SOCIAL_NETWORK = ?, COMMENT = ? WHERE CONTACT_ID = $contact_id");
    
        mysqli_stmt_bind_param($stmt, 'sssssssssss', $name1, $name2, $address1, $address2, $phone1, $phone2, $phone3, $email1, $email2, $social_network, $comment);
	    
		mysqli_stmt_execute($stmt);
		
		echo "1 record updated";
		
		mysqli_close($con);
    }
    echo $action; 	
    ?>
  </body>
</html>