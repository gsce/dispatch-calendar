<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kingjobform.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
</head>

<?php
  date_default_timezone_set('America/Denver'); // this sets the date and time to mountain standard time on the server in php.
  $form_table = "jobform";
  $action = trim($_POST['jobaddformaction']);
  $calendar_id = $_POST['jobaddformcalendarid'];
  $calendar_employee_id = $_POST['jobaddformcalendaremployeeid'];
  $calendar_employee_name = $_POST['jobaddformcalendaremployeename'];
  $calendar_date_holder = $_POST['jobaddformcalendardateholder'];
  $calendar_view = $_POST['jobaddformcalendarview'];
  $note_view = $_POST['jobaddformnoteview'];
  $employee_initials = $_POST['jobaddformemployeeinitials'];
  if (isset($_POST['jobaddformsearchfield'])) {
      $search_field = trim($_POST['jobaddformsearchfield']);
  } else {
      $search_field = '';
  }
  if ($action == 'update' || $action == 'copynew' || $action == 'copy' || $action == 'cut' || $action == 'popupcalendar') {
      $job_number = $_POST['jobaddformjobnumber'];
      $automatic_number = $_POST['jobaddformautomaticnumber'];
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
		  $delivery_spread = $row['DELIVERY_SPREAD'];
		  $order_number = $row['ORDER_NUMBER'];
		  $job_note = $row['NOTE'];
	      $coordinator_note = $row['COORDINATOR_NOTE'];
		  $i++;
	  }
      if ($action == 'copynew') {
	      $job_number = time();
          $automatic_number = 0;
	  }
	  
  } else {	  
	  $name1 = '';
	  $company_name = '';
	  $name2 = '';
      $job_type = trim($_POST['jobaddformjobtype']);
      $job_number = time();
      $automatic_number = 0;
      $location_type = '-- Select --';
	  if ($job_type !== 'International' && $job_type !== 'Interstate' && $job_type !== 'Intrastate') {
	      $booking = "King";
	  	  $hauling = "King";
	  } else {
    	  $booking = trim($_POST['jobaddformbookingbooking']);
	      $hauling = trim($_POST['jobaddformbookinghauling']);
	  }
	  $booking_agent = '';
      $origin_agent = '';
      $destination_agent = '';
	  $hauling_agent = '';
      $origin_address1 = '';
	  $origin_city_state_zip = '';
      $origin_address2 = '';
      $destination_info1 = '';
      $destination_city_state_zip =
      $destination_info2 = '';
	  $phone1 = '';
	  $phone2 = '';
	  $phone3 = '';
	  $email1 = '';
	  $email2 = '';
	  $do_not_print = '';
	  $tentitive = '';
	  $cancelled = '';
	  $out_of_area = '';
	  $permanent_storage = '';
	  $trailer_storage = '';
	  $tarrif = '';
	  $cube = '';
	  $valuation = '';
	  $weight = '';
	  $delivery_spread = '';
	  $order_number = '';
	  $job_note = '';
	  $coordinator_note = '';
  }
?>

<body id='body'>
  <div class='container'>
    <div id='popup'>
	</div>
	<div id='<?php echo $form_table; ?>container'>
      <form id='<?php echo $form_table; ?>' action='kingjobtableformpost.php' autocomplete='off' method='post'>
        <div class='variables'>
		  <?php
            include "defaultdatabaseconnect.php";
            echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
		  ?>
		  <input type='text' id='searchfield' autofocus autocomplete='off'>
          <input type='button' id='formtable' value='jobform'>
          <input type='button' id='startitemfield' value='1'>";
          <input type='button' id='totalitemfields' value='26'>";
          <input type='button' id='itemfield' value='1'>";
		  <input type='button' id='globalaction' value='form'>
   	      <input type='text' id='calendarid' name='<?php echo $form_table; ?>calendarid' value='<?php echo $calendar_id; ?>'>
	      <input type='text' id='calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value='<?php echo $calendar_employee_id; ?>'>
          <input type='text' id='calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value='<?php echo $calendar_employee_name; ?>'>
	      <input type='text' id='calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value='<?php echo $calendar_date_holder; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>calendarview' name='<?php echo $form_table; ?>calendarview' value='<?php echo $calendar_view; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>noteview' name='<?php echo $form_table; ?>noteview' value='<?php echo $note_view; ?>'>		  
		  <input type='text' id='<?php echo $form_table; ?>searchfield' name='<?php echo $form_table; ?>searchfield' value='<?php echo $search_field; ?>'>		  
		  <input type='text' id='action' name='action' value = '<?php echo $action; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>jobnumber' name='<?php echo $form_table; ?>jobnumber' value = '<?php echo $job_number; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>donotprint' name='<?php echo $form_table; ?>donotprint' value = '<?php echo $do_not_print; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>tentitivehold' name='<?php echo $form_table; ?>tentitivehold' value = '<?php echo $tentitive; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>cancelledhold' name='<?php echo $form_table; ?>cancelledhold' value = '<?php echo $cancelled; ?>'>
          <input type='text' id='<?php echo $form_table; ?>employeeinitials' name='<?php echo $form_table; ?>employeeinitials' value = '<?php echo $employee_initials; ?>'> 
	    </div>
	    <div id='<?php echo $form_table; ?>mainboxdiv'>
	      <div id='<?php echo $form_table; ?>leftboxdiv'>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	           First/Last Name
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '1' id='<?php echo $form_table; ?>name1' name='<?php echo $form_table; ?>name1' size='40' maxlength='100' value='<?php echo $name1; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Company Name
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '2' id='<?php echo $form_table; ?>companyname' name='<?php echo $form_table; ?>companyname' size='40' maxlength='100' value='<?php echo $company_name; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Origin Address
 			  </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '3' id='<?php echo $form_table; ?>originaddress1' name='<?php echo $form_table; ?>originaddress1' size='40' maxlength='100' value='<?php echo $origin_address1 ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Origin City/St/Zip
 			  </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type= 'text' tabindex = '4' id='<?php echo $form_table; ?>origincitystatezip' name='<?php echo $form_table; ?>origincitystatezip' size='40' maxlength='100' value='<?php echo $origin_city_state_zip ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Primary Phone 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '5' id='<?php echo $form_table; ?>phone1' name='<?php echo $form_table; ?>phone1' size='40' maxlength='100' value='<?php echo $phone1; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Secondary Phone  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '6' id='<?php echo $form_table; ?>phone2' name='<?php echo $form_table; ?>phone2' size='40' maxlength='100' value='<?php echo $phone2; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Phones 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <textarea tabindex ='7' id='<?php echo $form_table; ?>phone3' name='<?php echo $form_table; ?>phone3' cols='40' rows='1' maxlength='300'><?php echo $phone3; ?></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Dest Address
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '8' id='<?php echo $form_table; ?>destinationinfo1' name='<?php echo $form_table; ?>destinationinfo1' size='40' maxlength='100' value='<?php echo $destination_info1; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Dest City/St/Zip
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '9' id='<?php echo $form_table; ?>destinationcitystatezip' name='<?php echo $form_table; ?>destinationcitystatezip' size='40' maxlength='100' value='<?php echo $destination_city_state_zip; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Primary Email  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='email' tabindex = '10' id='<?php echo $form_table; ?>email1' name='<?php echo $form_table; ?>email1' size='40' maxlength='100' value='<?php echo $email1; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Location Type  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <select tabindex='11' name='<?php echo $form_table; ?>locationtype'>
		  	      <option <?php if ($location_type == '-- Select --') echo "selected"; ?> value='-- Select --'> -- Select -- </option>
		  	      <option <?php if ($location_type == '1 Bedroom Apt') echo "selected"; ?> value='1 Bedroom Apt'> 1 Bedroom Apt </option>
		  	      <option <?php if ($location_type == '2 Bedroom Apt') echo "selected"; ?> value='2 Bedroom Apt'> 2 Bedroom Apt </option>
		  	      <option <?php if ($location_type == '3 Bedroom Apt plus') echo "selected"; ?> value='3 Bedroom Apt plus'> 3 Bedroom Apt plus </option>
		  	      <option <?php if ($location_type == '1 Bedroom House') echo "selected"; ?> value='1 Bedroom House'> 1 Bedroom House </option>
		  	      <option <?php if ($location_type == '2 Bedroom House') echo "selected"; ?> value='2 Bedroom House'> 2 Bedroom House </option>
		  	      <option <?php if ($location_type == '3 Bedroom House') echo "selected"; ?> value='3 Bedroom House'> 3 Bedroom House </option>
		  	      <option <?php if ($location_type == '4 Bedroom House') echo "selected"; ?> value='4 Bedroom House'> 4 Bedroom House </option>
		  	      <option <?php if ($location_type == '5 Bedroom House') echo "selected"; ?> value='5 Bedroom House'> 5 Bedroom House </option>
		  	      <option <?php if ($location_type == '6 Bedroom House') echo "selected"; ?> value='6 Bedroom House'> 6 Bedroom House </option>
		  	      <option <?php if ($location_type == 'Mini Storage') echo "selected"; ?> value='Mini Storage'> Mini Storage </option>
		  	      <option <?php if ($location_type == 'Office') echo "selected"; ?> value='Office'> Office </option>
		  	      <option <?php if ($location_type == 'Warehouse') echo "selected"; ?> value='Warehouse'> Warehouse </option>
		  	      <option <?php if ($location_type == 'No More Work!') echo "selected"; ?> value='No More Work!'> No More Work! </option>
			    </select>	
              </div>
            </div>
			<hr size='7'>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
              <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
                Booking 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
	  		    <select tabindex='12' name='<?php echo $form_table; ?>booking'>
		  	      <option <?php if ($booking == 'King') echo "selected"; ?> value='King'> King </option>
		  	      <option <?php if ($booking == 'Other') echo "selected"; ?> value='Other'> Other </option>
			    </select>	
		      </div>
		    </div>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
              <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
                Hauling 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
	  		    <select tabindex='13' name='<?php echo $form_table; ?>hauling'>
		  	      <option <?php if ($hauling == 'King') echo "selected"; ?> value='King'> King </option>
		  	      <option <?php if ($hauling == 'Other') echo "selected"; ?> value='Other'> Other </option>
		  	      <option <?php if ($hauling == 'Pending') echo "selected"; ?> value='Pending'> Pending </option>
			    </select>	
		      </div>
		    </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Order Number 
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '14' id='<?php echo $form_table; ?>ordernumber' name='<?php echo $form_table; ?>ordernumber' size='25' maxlength='25' value='<?php echo $order_number; ?>'>
              </div>
            </div>
			<div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Weight  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '15' id='<?php echo $form_table; ?>weight' name='<?php echo $form_table; ?>weight' size='8' maxlength='8' value='<?php echo $weight; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Delivery Spread  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '16' id='<?php echo $form_table; ?>deliveryspread' name='<?php echo $form_table; ?>deliveryspread' size='25' maxlength='25' value='<?php echo $delivery_spread; ?>'>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Job Type   
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <select tabindex='17' name='<?php echo $form_table; ?>jobtype'>
		  	      <option <?php if ($job_type == 'Driver') echo "selected"; ?> value='Driver'> Driver </option>
				  <option <?php if ($job_type == 'Local') echo "selected"; ?> value='Local'> Local </option>
				  <option <?php if ($job_type == 'Interstate')  echo "selected" ; ?> value='Interstate'> Interstate </option>
				  <option <?php if ($job_type == 'International') echo "selected";  ?> value='International'> International </option>
				  <option <?php if ($job_type == 'Intrastate') echo "selected";  ?> value='Intrastate'> Intrastate </option>
				  <option <?php if ($job_type == 'Non Income') echo "selected";  ?> value='Non Income'> Non Income </option>
				  <option <?php if ($job_type == 'Other') echo "selected";  ?> value='Other'> Other </option>
				  <option <?php if ($job_type == 'Third Party') echo "selected";  ?> value='Third Party'> Third Party </option>
				  <option <?php if ($job_type == 'Warehouse') echo "selected";  ?> value='Warehouse'> Warehouse </option>
				  <option <?php if ($job_type == 'No More Work!') echo "selected";  ?> value='No More Work!'> No More Work! </option>
			    </select>	
              </div>
            </div>
			<!--</div>-->
		  </div> <!-- end leftboxdiv -->
	      <div id='<?php echo $form_table; ?>centerboxdiv'>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Contacts
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <textarea tabindex='18' id='<?php echo $form_table; ?>name2' name='<?php echo $form_table; ?>name2' cols='40' rows='2' maxlength='300'><?php echo $name2; ?></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Origin Addresses
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <textarea tabindex='19' id='<?php echo $form_table; ?>originaddress2' name='<?php echo $form_table; ?>originaddress2' cols='40' rows='2' maxlength='300'><?php echo $origin_address2; ?></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Destination Addresses
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <textarea tabindex='20' id='<?php echo $form_table; ?>destinationinfo2' name='<?php echo $form_table; ?>destinationinfo2' cols='40' rows='1' maxlength='300'><?php echo $destination_info2; ?></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Other Emails  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <textarea tabindex='21' id='<?php echo $form_table; ?>email2' name='<?php echo $form_table; ?>email2' cols='40' rows='1' maxlength='300'><?php echo $email2; ?></textarea>
              </div>
            </div>
     	  </div> <!-- end centerboxdiv -->
	      <div id='<?php echo $form_table; ?>rightboxdiv'>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Booking Agent  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
		  	  <textarea tabindex='22' id='<?php echo $form_table; ?>bookingagent' name='<?php echo $form_table; ?>bookingagent' cols='45' row='3' maxlength='300'><?php echo $booking_agent; ?></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Origin Agent  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
		  	  <textarea tabindex='23' id='<?php echo $form_table; ?>originagent' name='<?php echo $form_table; ?>originagent' cols='45' row='3' maxlength='300'><?php echo $origin_agent; ?></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	            Destination Agent  
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
		  	  <textarea tabindex='24' id='<?php echo $form_table; ?>destinationagent' name='<?php echo $form_table; ?>destinationagent' cols='45' row='3' maxlength='300'><?php echo $destination_agent ?></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldnamecol1'>
	           Job Entered By
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol2'>
			    <input type='text' tabindex = '1' id='<?php echo $form_table; ?>enteredby' size='40' value='<?php echo $calendar_employee_name; ?>' readonly>
              </div>
            </div>
          </div> <!-- end rightboxdiv -->
	      <div id='<?php echo $form_table; ?>centerhorizontalboxdiv'>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol4'>
                Job Notes  <button type='button' id='<?php echo $form_table; ?>import' value='<?php echo $form_table;?>Import'> Import</button>
 
			  </div>
   			  <div class='<?php echo $form_table; ?>leftfieldcol4'>
				Coordinator Notes
			  </div>
   		    </div>
		    <div class='<?php echo $form_table; ?>leftfieldrow'>
	          <div class='<?php echo $form_table; ?>leftfieldcol4'>
		        <textarea class='test' tabindex='25' id='<?php echo $form_table; ?>jobnote' name='<?php echo $form_table; ?>jobnote' cols='60' rows='12' maxlength='1200'><?php echo $job_note ?></textarea>
		      </div>
	          <div class='<?php echo $form_table; ?>leftfieldcol4'>
		        <textarea  tabindex='26' id='<?php echo $form_table; ?>coordinatornote' name='<?php echo $form_table; ?>coordinatornote' cols='60' rows='12' maxlength='2000'><?php echo $coordinator_note ?></textarea>
		      </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
		      <?php
                $form_table_button_add = 'no';
                $form_table_button_view = 'no';
                $form_table_button_select = 'no';
                $form_table_button_remove = 'no';
                $form_table_button_done = 'yes';
                $form_table_button_cancel = 'yes';
                $form_table_button_print = 'no';
                $form_table_button_sum_total = 'no';
				$form_table_button_continue = 'no';
              ?>
              <div class='<?php echo $form_table; ?>fieldrow'>
                <div id='jobformsavecancelbutton' class='<?php echo $form_table; ?>savecancelbutton'>
                  <?php include "kingbutton.php"; ?>
				  <button type='button' id='<?php echo $form_table; ?>move' value='<?php echo $form_table;?>Move All Job Days'> Move All Job Days</button>
				  <button type='button' id='<?php echo $form_table; ?>fixdayof' value='<?php echo $form_table;?>Fix Day Of'> Fix Day Of</button>
				  <span id='<?php echo $form_table; ?>donotprintcheckbox'>
				    &nbsp Do not show in Local Job View
				    <?php 
				      if ($do_not_print === 'yes') {
    	  		          echo "<input type='checkbox' id='"; echo $form_table; echo "printshow' value='yes' checked>";
					  } else {
    	  		          echo "<input type='checkbox' id='"; echo $form_table; echo "printshow' value=''>";
					  }	
				    ?>
				  </span>
				  <span id='<?php echo $form_table; ?>tentitivecheckbox'>
				    &nbsp Tentitive
				    <?php 
				      if ($tentitive === 'yes') {
    	  		          echo "<input type='checkbox' id='"; echo $form_table; echo "tentitive' value='yes' checked>";
					  } else {
    	  		          echo "<input type='checkbox' id='"; echo $form_table; echo "tentitive' value=''>";
					  }	
				    ?>
				  </span>
				  <span id='<?php echo $form_table; ?>cancelledcheckbox'>
				    &nbsp Cancelled
				    <?php 
				      if ($cancelled === 'yes') {
    	  		          echo "<input type='checkbox' id='"; echo $form_table; echo "cancelled' value='yes' checked>";
					  } else {
    	  		          echo "<input type='checkbox' id='"; echo $form_table; echo "cancelled' value=''>";
					  }	
				    ?>
				  </span>
  	    	    </div>
		      </div>
			</div>
          </div>
 	      <div id='<?php echo $form_table; ?>bottomboxdiv'>
		    <iframe id='<?php echo $form_table; ?>iframe' src='http://<?php echo $default_ip_address; ?>kingjobdatetableform.php?jobnumber=<?php echo $job_number; ?>&jobformcalendarid=<?php echo $calendar_id; ?>&jobformcalendaremployeeid=<?php echo $calendar_employee_id; ?>&jobformcalendaremployeename=<?php echo $calendar_employee_name; ?>&jobformcalendardateholder=<?php echo $calendar_date_holder; ?>&jobautomaticnumber=<?php echo $automatic_number; ?>&jobformaction=<?php echo $action; ?>&jobformemployeeinitials=<?php echo $employee_initials; ?>'>
            </iframe>			
          </div> <!-- end bottomboxdiv -->
        </div> <!-- end mainboxdiv -->
      </form>
    </div>
    <div id='cancelfieldrow'>
	  <div id='confirmcancel'>
	    <br>
        <div class='cancelcol'>
	      Are you sure you want to Cancel?
	    </div>
        <div class='cancelcol'>
          <br>
	    </div>
        <div class='cancelcol'>
	      <button id='yesbutton' value='Yes'><img src='check.png' alt='yes' height='15' width='20'> Yes</button>
	      <button id='nobutton' value='No'><img src='cancel.png' alt='no' height='15' width='20'> No</button>
	    </div>
        <br>
	  </div>
    </div>
    <div id='movefieldrow'>
	  <div id='confirmmove'>
	    <br>
        <div class='movecol'>
	      Enter Start Date for Job
	    </div>
        <div class='movecol'>
          <br>
  	      <input type='text' id='jobformstartdate' size='10' maxlength='10' value='' readonly>
		  <span id='jobformcalendaricon'><img src='calendar.png' alt='calendar' height='24' width='24'></span>
		    Sat
		  <input type='checkbox' id='jobformsat' value='Sat'>
			Sun
          <input type='checkbox' id='jobformsun' value='Sun'> 
          <br>
	    </div>
        <div class='movecol'>
          <br>
	    </div>
        <div class='movecol'>
	      <button id='movecontinuebutton' value='No'><img src='check.png' alt='no' height='15' width='20'> Continue</button>
	      <button id='movecancelbutton' value='Yes'><img src='cancel.png' alt='yes' height='15' width='20'> Cancel</button>
	    </div>
        <br>
	  </div>
    </div>

  </div>
</body>  
  <script src="./scripts/kingjobtableforminit.js" type="text/javascript"></script> -->
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>
</html>