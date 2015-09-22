<!DOCTYPE html>
<html moznomarginboxes>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kinglocaljobformprint.css" media="print">
  <!--<link rel="stylesheet" type="text/css" href="./css/kingljobdateformprint.css" media="print">-->  
  <link rel="stylesheet" type="text/css" href="./css/kingprintindex.css" media="print"> 
</head>

<?php
  $form_table = "jobform";
  $action = 'print';
  $calendar_id = $_GET['calendarid'];
  $calendar_employee_id = $_GET['calendaremployeeid'];
  $calendar_employee_name = $_GET['calendaremployeename'];
  $calendar_date_holder = $_GET['calendardateholder'];
  $calendar_view = $_GET['calendarview'];
  $note_view = $_GET['calendarnoteview'];
  $employee_initials = $_GET['employeeinitials'];
  $job_number = $_GET['calendarpastejobnumber'];
  $automatic_number = $_GET['calendarpasteautomaticnumber'];
  date_default_timezone_set('America/Denver'); // this sets the date and time to mountain standard time on the server in php.
  include "databaseconnect.php";
  if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . die();
  }
  $result = mysqli_query($con, "SELECT * FROM job WHERE JOB_NUMBER = $job_number ORDER BY JOB_NUMBER ASC");
  $numberOfRows = mysqli_num_rows($result) ;
  mysqli_close($con);
  $i = 0;
  while ($i < $numberOfRows) {
      $row = mysqli_fetch_array($result);
      $name1 = $row['NAME1'];
      $company_name = $row['COMPANY_NAME'];
      $name2 = $row['NAME2'];
      $job_type = $row['JOB_TYPE'];
      $location_type = $row['LOCATION_TYPE'];
      $booking_agent = $row['BOOKING_AGENT'];
      $origin_agent = $row['ORIGIN_AGENT'];
      $destination_agent = $row['DESTINATION_AGENT'];
      $origin_address1 = $row['ORIGIN_ADDRESS1'];
      $origin_city_state_zip = $row['ORIGIN_CITY_STATE_ZIP'];
      $origin_address2 = $row['ORIGIN_ADDRESS2'];
      $destination_info1 = $row['DESTINATION_INFO1'];
      $destination_city_state_zip = $row['DESTINATION_CITY_STATE_ZIP'];
      $destination_info2 = $row['DESTINATION_INFO2'];
      $phone1 = $row['PHONE1'];
      $phone2 = $row['PHONE2'];
      $phone3 = $row['PHONE3'];
      $email1 = $row['EMAIL1'];
      $email2 = $row['EMAIL2'];
      $do_not_print = $row['DO_NOT_PRINT'];
      $tentitive = $row['TENTITIVE']; 
      $cancelled = $row['CANCELLED']; 
      $out_of_area = $row['OUT_OF_AREA'];
      $permanent_storage = $row['PERMANENT_STORAGE'];
      $trailer_storage = $row['TRAILER_STORAGE'];
      $tarrif = $row['TARRIF'];
      $booking = $row['BOOKING'];
      $hauling = $row['HAULING'];
      $cube = $row['CUBE'];
      $weight = $row['WEIGHT'];
      $valuation = $row['VALUATION'];
      $order_number = $row['ORDER_NUMBER'];
      $job_note = $row['NOTE'];
      $coordinator_note = $row['COORDINATOR_NOTE'];
      $i++;
  }
      include "databaseconnect.php";
      if (mysqli_connect_errno($con)) {
          echo "Failed to connect to MySQL: " . die();
      }
      $result1 = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.`AUTOMATIC_NUMBER` = '$automatic_number' ORDER BY job_date.AUTOMATIC_NUMBER ASC"); 
      mysqli_close($con); 
      $row1 = mysqli_fetch_array($result1);

?>

<body id='body'>
  <div class='container'>
	<div id='<?php echo $form_table; ?>container'>
      <form id='<?php echo $form_table; ?>' action='kingjobtableformpost.php' autocomplete='off' method='post'>
        <div class='variables'>
		  <input type='text' id='searchfield' autofocus autocomplete='off'>
          <input type='button' id='formtable' value='jobform'>
          <input type='button' id='startitemfield' value='1'>";
          <input type='button' id='totalitemfields' value='24'>";
          <input type='button' id='itemfield' value='1'>";
		  <input type='button' id='globalaction' value='form'>
   	      <input type='text' id='calendarid' name='<?php echo $form_table; ?>calendarid' value='<?php echo $calendar_id; ?>'>
	      <input type='text' id='calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value='<?php echo $calendar_employee_id; ?>'>
          <input type='text' id='calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value='<?php echo $calendar_employee_name; ?>'>
	      <input type='text' id='calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value='<?php echo $calendar_date_holder; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>calendarview' name='<?php echo $form_table; ?>calendarview' value='<?php echo $calendar_view; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>noteview' name='<?php echo $form_table; ?>noteview' value='<?php echo $note_view; ?>'>		  
		  <input type='text' id='<?php echo $form_table; ?>employeeinitials' name='<?php echo $form_table; ?>employeeinitials' value='<?php echo $employee_initials; ?>'>		  
		  <input type='text' id='action' name='action' value = '<?php echo $action; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>jobnumber' name='<?php echo $form_table; ?>jobnumber' value = '<?php echo $job_number; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>donotprint' name='<?php echo $form_table; ?>donotprint' value = '<?php echo $do_not_print; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>tentitivehold' name='<?php echo $form_table; ?>tentitivehold' value = '<?php echo $tentitive; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>cancelledhold' name='<?php echo $form_table; ?>cancelledhold' value = '<?php echo $cancelled; ?>'>
        <?php  
		  include "defaultdatabaseconnect.php";
          echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
		?>
	    </div>
	    <div id='<?php echo $form_table; ?>mainboxdiv'>
	      <div id='<?php echo $form_table; ?>leftboxdiv'>
		    <br>
			<br>
			<br>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    &nbsp &nbsp<?php echo trim($name1)." ".trim($company_name);?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    &nbsp &nbsp<?php echo trim($origin_address1) ?>
              </div>
			</div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo trim($origin_city_state_zip) ?>
              </div>
			</div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo trim($destination_info1); ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo trim($destination_city_state_zip); ?>
              </div>
            </div>
			<br>
			<br>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo date('m/d/Y', strtotime($row1['DATE_TIME'])); ?>
              </div>
            </div>
		  </div>
	      <div id='<?php echo $form_table; ?>centerboxdiv'>
		    <br>
			<br>
			<br>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol3'>
			    &nbsp &nbsp<?php echo $phone1;?>
              </div>
            </div>
        </div> <!-- end mainboxdiv -->
      </form>
    </div>
  </div>
</body>  
  <script src="./scripts/kingjobtableformprintinit.js" type="text/javascript"></script> 
</html>