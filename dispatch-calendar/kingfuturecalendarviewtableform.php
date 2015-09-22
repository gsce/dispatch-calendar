<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kingfuturecalendarviewtableform.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
</head>
<?php
  //$job_number = $_GET['jobnumber'];
  $calendar_id = $_GET['calendarid'];
  $calendar_employee_id = $_GET['calendaremployeeid'];
  $calendar_employee_name = $_GET['calendaremployeename'];
  $calendar_date_holder = $_GET['calendardate'];
  $calendar_date = date_create($calendar_date_holder); //date_create allows us to make a date time variable that we can use with date_format to get day, month, year and other formats from 
  $calendar_view = $_GET['calendarview']; // this variable holds the id number of the person logged in to the calendar site
  //$action = trim($_GET['jobformaction']);
  $day_type = '-- Select --';
  $form_table = "jobformdatetable";
 // $hauling = 'King';
 // $automatic_number = trim($_GET['jobautomaticnumber']);
?>
<body id='body'>
  <div class='container'>
    <div id='popup'>
	</div>
    <div class='variables'>
	  <input type='text' id='searchfield' autofocus autocomplete='off'>
      <input type='button' id='formtable' value='jobformdatetable'>
      <input type='button' id='startitemfield' value='0'>";
      <input type='button' id='totalitemfields' value='0'>";
      <input type='button' id='itemfield' value='0'>";
	  <input type='button' id='globalaction' value='table'>
   	  <input type='text' id='calendarid' name='calendarid' value='<?php echo $calendar_id; ?>'>
  	  <input type='text' id='calendaremployeeid' name='calendaremployeeid' value='<?php echo $calendar_employee_id; ?>'>
      <input type='text' id='calendaremployeename' name='calendaremployeename' value='<?php echo $calendar_employee_name; ?>'>
	  <input type='text' id='calendardateholder' name='calendardateholder' value='<?php echo $calendar_date_holder; ?>'>
	  <input type='text' id='action' name='action' value = 'view'>
	</div>
	<div id='popupcalendarbox'>
	  <?php 
	    $form_table = 'popupcalendartable';
	    $day_of_week = date_format(date_create($calendar_date_holder),'w'); // this tells us what week day the first of the current month starts on<
      ?>  
	  <div id='<?php echo $form_table; ?>headerbox'>
	      <div><!--
            --><div class=' <?php echo $form_table; ?>headersunday'>
	          Sun
	        </div><!--
            --><div class=' <?php echo $form_table; ?>headerweekday'>
	          Mon
	        </div><!--	
            --><div class=' <?php echo $form_table; ?>headerweekday'>
	          Tue
	        </div><!--	
            --><div class=' <?php echo $form_table; ?>headerweekday'>
	          Wed
	        </div><!--	
            --><div class=' <?php echo $form_table; ?>headerweekday'>
	          Thu
	        </div><!--	
            --><div class=' <?php echo $form_table; ?>headerweekday'>
	          Fri
	        </div><!--	
            --><div class=' <?php echo $form_table; ?>headersaturday'>
	          Sat
	        </div>
	      </div>
	  </div>
	  <div id='<?php echo $form_table; ?>box'>
	    <div id='<?php echo $form_table; ?>'>
          <div>
		    <?php
      	      include "databaseconnect.php";
              if (mysqli_connect_errno($con)) {
                  echo "Failed to connect to MySQL: " . die();
              }
		      $day_of_week = 0;
              $day_date = date_create($calendar_date_holder);
              $day_date = date_sub($day_date, date_interval_create_from_date_string("7 days"));
	          $day_of_week_date_on = date_format($day_date,'w'); // this tells us what week day 30 days before starts on
		      while ($day_of_week < 7) {
		  	      if ($day_of_week == 0) {
                        echo "<div class='"; echo $form_table; echo "sunday'>";
				  } else if ($day_of_week == 6) {	
				        echo "<div class='"; echo $form_table; echo "saturday'>";
		  		  } else {
                        echo "<div class='"; echo $form_table; echo "weekday'>";
		  		  }	
    	                        $day_date = date_create($calendar_date_holder);
                                $day_date = date_sub($day_date, date_interval_create_from_date_string("7 days"));
  		  	                    $i = $day_of_week_date_on - $day_of_week;
		  	                    if ($i < 0) {
                                    $i = 0 - $i;
		  	                        $i = "{$i} days";
		  	                        $day_date = date_add($day_date, date_interval_create_from_date_string($i));
		  	                    } else {
		  	                        $i = "{$i} days";
		  	                        $day_date = date_sub($day_date, date_interval_create_from_date_string($i));
		  	                    }
		  	                    $month = date_format($day_date,'M'); // stores the month name that the current calendar date is pointing to
                                $year = date_format($day_date,'Y'); // store the 4 digit year that the current calendar date is pointing to
		  	                    $day_date_number = date_format($day_date,'d'); // stores 2 digit day number that the current calendar date is pointing to
		  	                    echo $month;
		  	                    echo " ";
		  	                    echo $day_date_number;
                                echo " ";
		  	                    echo $year;
		  	                    echo "<br>";
		  	                   //echo "Tentative <input type='checkbox' value='Tentative'>";
	  	                        //echo "<br>";
				                $numberOfRows = 0 ;
    				            $count = 0 ;
                                while ($count < 6) {
                                    if ($count < $numberOfRows) { 
                                        $row = mysqli_fetch_array($result);
								        echo "<input type='button' id='c"; echo $day_of_week; echo "c"; echo $count; echo "' class='"; echo $form_table; echo "daycellbuttonjob"; echo $count; echo "' value='"; echo $row['JOB_DAY_TYPE']; echo "&nbsp;"; echo $row['NUMBER_OF_DAYS']; echo "'>";
								        echo "<input type='button' id='d"; echo $day_of_week; echo "d"; echo $count; echo "' class='variables'"; echo "value='"; echo date_format($day_date,'m/d/Y'); echo "'>";
								        echo "<input type='button' id='e"; echo $day_of_week; echo "e"; echo $count; echo "' class='variables'"; echo "value='"; echo $row['AUTOMATIC_NUMBER']; echo "'>";
								        echo "<br>";
							   	    } else {
								        echo "<input type='button' id='c"; echo $day_of_week; echo "c"; echo $count; echo "' class='"; echo $form_table; echo "daycellbutton'"; echo "value=''>";
								        echo "<input type='button' id='d"; echo $day_of_week; echo "d"; echo $count; echo "' class='variables'"; echo "value='"; echo date_format($day_date,'m/d/Y'); echo "'>";
	  	        				        echo "<input type='button' id='e"; echo $day_of_week; echo "e"; echo $count; echo "' class='variables'"; echo "value='"; echo $row['AUTOMATIC_NUMBER']; echo "'>";
				                        echo "<br>";
								    }
								    $count += 1;
								}
			?>    
			<?php			  		
		                echo "</div>";
		  		  $day_of_week += 1;
		  	}	
            ?>			
	      </div>
		  <?php
            $i = 7;
			$todays_date = date_format(date_create($calendar_date_holder),"ymd");
            $query_date = date_format(date_create($calendar_date_holder),'Y-m-d');
            $sql = "CREATE TEMPORARY TABLE test LIKE job_date";
		    mysqli_query($con, $sql);
		    $sql = "INSERT INTO test SELECT * FROM job_date WHERE (job_date.DATE >= '$query_date') AND (job_date.`CALENDAR_ID` = $calendar_id) AND job_date.`JOB_DAY_TYPE` = 'Load'";
            mysqli_query($con, $sql);
		    while ($i < 120) {
		        $day_of_week = 0;
		  	    echo "<div>";
		          while ($day_of_week < 7) {
    	              $day_date = date_add($day_date, date_interval_create_from_date_string('1 days'));
					  $compare_date = $day_date -> format('Y-m-d');
                      $sql = "SELECT test.*, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`ORIGIN_ADDRESS1`, job.`DESTINATION_INFO1`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`ORDER_NUMBER`, job.`LOCATION_TYPE`, job.`WEIGHT`, job.`NOTE` FROM job, test WHERE test.`DATE` = '$compare_date' AND (job.`JOB_NUMBER` = test.`JOB_NUMBER` AND job.`HAULING` = 'King') AND (job.`JOB_TYPE` = 'Interstate' OR job.`JOB_TYPE` = 'Intrastate')";
                      $result = mysqli_query($con, $sql);
					  $numberOfRows = mysqli_num_rows($result) ;
					  if ($numberOfRows > 0) {
					      $class = 'haswork';
					  } else {
					      $class = '';
					  }
		  	          if ($day_of_week == 0) {
 				          if ($todays_date == date_format($day_date,"ymd")) {
     				          echo "<div id='r1' class='"; echo $form_table; echo "sunday'>";
                          } else {
 					          echo "<div class='"; echo $form_table; echo "sunday'>";
						  }
					  } else if ($day_of_week == 6) {
					      if ($todays_date == date_format($day_date,"ymd")) {
					          echo "<div id='r1' class='"; echo $form_table; echo "saturday'>";
                          } else {
 					          echo "<div class='"; echo $form_table; echo "saturday'>";
						  }
 		  	    	  } else {
				          if ($todays_date == date_format($day_date,"ymd")) {
 					          echo "<div id='r1' class='"; echo $form_table; echo "weekday'>";
                          } else {
                              echo "<div class='"; echo $form_table; echo "weekday'>";
						  }
					  }	
                                      $month = date_format($day_date,'M'); // stores the month name that the current calendar date is pointing to
                                      $year = date_format($day_date,'Y'); // store the 4 digit year that the current calendar date is pointing to
		  	                          $day_date_number = date_format($day_date,'d'); // stores 2 digit day number that the current calendar date is pointing to
		  	                          echo $month;
		  	                          echo " ";
		  	                          echo $day_date_number;
                                      echo " ";
		  	                          echo $year;
		  	                          echo "<br>";
		  	                          //echo "Tentative <input type='checkbox' value='Tentative'>";
		  	                          //echo "<br>";
    				                  $count = 0 ;
                                      while ($count < 6) {
                                          if ($count < $numberOfRows) { 
                                              $row = mysqli_fetch_array($result);
								              echo "<input type='button' id='c"; echo $i; echo "c"; echo $count; echo "' class='"; echo $form_table; echo "daycellbuttonjob"; echo $count; echo "' value='"; echo $row['JOB_TYPE']; echo "&nbsp;"; echo $row['NUMBER_OF_DAYS']; echo "'>";
                                              echo "<input type='button' id='d"; echo $i; echo "d"; echo $count; echo "' class='variables'"; echo "value='"; echo date_format($day_date,'m/d/Y'); echo "'>";
	  	        				              echo "<input type='button' id='e"; echo $i; echo "e"; echo $count; echo "' class='variables'"; echo "value='"; echo $row['AUTOMATIC_NUMBER']; echo "'>";
											  echo "<br>";
										  } else {
										      echo "<input type='button' id='c"; echo $i; echo "c"; echo $count; echo "' class='"; echo $form_table; echo "daycellbutton'"; echo "value=''>";
								              echo "<input type='button' id='d"; echo $i; echo "d"; echo $count; echo "' class='variables'"; echo "value='"; echo date_format($day_date,'m/d/Y'); echo "'>";
	  	        				              echo "<input type='button' id='e"; echo $i; echo "e"; echo $count; echo "' class='variables'"; echo "value='"; echo $row['AUTOMATIC_NUMBER']; echo "'>";
	  	                                      echo "<br>";
										  }
										  $count += 1;
									  }
	  	  ?>
		  <?php
		                      echo "</div>";
		  	    	  $day_of_week += 1;
		  	    	  $i += 1;
		  	      }	
		  	    echo "</div>";
                $day_of_week = 0;
		    }
            mysqli_close($con); 
		  ?>  
	    </div>
	  </div>
	  <div id='<?php echo $form_table; ?>savecancelbox'>
	  	<?php
          $form_table_button_add = 'no';
          $form_table_button_view = 'no';
          $form_table_button_select = 'no';
          $form_table_button_remove = 'no';
          $form_table_button_done = 'no';
          $form_table_button_cancel = 'no';
          $form_table_button_print = 'no';
          $form_table_button_sum_total = 'no';
		  $form_table_button_continue = 'yes';
        ?>
    	<div class='<?php echo $form_table; ?>fieldrow'>
	      <div class='<?php echo $form_table; ?>savecancelbutton'>
            <?php include "kingbutton.php"; ?>
          </div>
	    </div>
      </div>
	</div>
    <iframe id='popupcalendariframe' src='http://localhost/king/kingpopupcalendar.php?jobnumber=<?php echo $job_number; ?>&jobformcalendarid=<?php echo $calendar_id; ?>&jobformcalendaremployeeid=<?php echo $calendar_employee_id; ?>&jobformcalendaremployeename=<?php echo $calendar_employee_name; ?>&jobformcalendardateholder=<?php echo $calendar_date_holder; ?>&jobautomaticnumber=<?php echo $automatic_number; ?>&jobformaction=<?php echo $action; ?>' sandbox='allow-same-origin allow-top-navigation allow-forms allow-scripts' >
    </iframe>			
  </div>
</body>
  <script src="./scripts/kingfuturecalendarviewtableforminit.js" type="text/javascript"></script> 
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>

</html>