<!DOCTYPE html>
<html moznomarginboxes>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kingjobformprint.css" media="print">
  <link rel="stylesheet" type="text/css" href="./css/kingjobdateformprint.css" media="print">  
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
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Job Date
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo date('m/d/Y', strtotime($row1['DATE_TIME'])); ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Job Time
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo date('h:i:a', strtotime($row1['DATE_TIME'])); ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            First/Last Name
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $name1; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Company Name
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $company_name; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Origin Address
 			  </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $origin_address1 ?>
              </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $origin_city_state_zip ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Primary Phone 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $phone1; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Secondary Phone  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $phone2; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Phones 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $phone3; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Destination Address
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $destination_info1; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
			    City/St/Zip
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $destination_city_state_zip; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Primary Email  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $email1; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Location Type  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $location_type; ?>
              </div>
            </div>
			<hr size='7'>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
              <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
                Booking 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
	  		    <?php echo $booking; ?>
		      </div>
		    </div>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
              <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
                Hauling 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
	  		    <?php echo $hauling; ?>
		      </div>
		    </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Order Number 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $order_number; ?>
              </div>
            </div>
			<div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Total Weight  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $weight; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Job Type   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $job_type; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Job Description   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['JOB_DAY_TYPE']; ?>
              </div>
            </div>
           <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            No of Days   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['NUMBER_OF_DAYS']; ?>
              </div>
            </div>
			<div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Day Weight  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php if ($row1['DAY_WEIGHT'] > 0) {echo $row1['DAY_WEIGHT']; } else { echo $weight; }?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Job Hours   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['JOB_HOURS']; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            No. of Men   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['NUMBER_OF_MEN']; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
              <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Rate   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['RATE']; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Estimated Cost   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['COST']; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Names of Men   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo trim($row1['DRIVER']); echo "&nbsp"; echo trim($row1['NAMES_OF_MEN']); ?>
              </div>
            </div>
		  </div> <!-- end leftboxdiv -->
	      <div id='<?php echo $form_table; ?>centerboxdiv'>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Contacts
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $name2; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Origin Addresses
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $origin_address2; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Destination Addresses
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $destination_info2; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Emails  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $email2; ?>
              </div>
            </div>
     	  </div> <!-- end centerboxdiv -->
	      <div id='<?php echo $form_table; ?>centerhorizontalboxdiv'>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol4'>
                Job Notes  
			  </div>
   		    </div>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol4'>
		        <?php echo trim($row1['DAY_NOTE']); echo "&#10"; echo $job_note;?>
		      </div>
		    </div>
		  </div><!-- end centerhorizontalbox -->
  	      <div id='<?php echo $form_table; ?>centerbottomboxdiv'>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Truck Number  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['TRUCK_NUMBER']; ?>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Trailer Number  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <?php echo $row1['TRAILER_NUMBER']; ?>
              </div>
            </div>
		  </div><!-- end centerbottombox -->

        </div> <!-- end mainboxdiv -->
      </form>
    </div>
  </div>
</body>  
  <script src="./scripts/kingjobtableformprintinit.js" type="text/javascript"></script> 
</html>