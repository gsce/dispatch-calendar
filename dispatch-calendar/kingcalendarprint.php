<!DOCTYPE html>
<html moznomarginboxes>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kingcalendarprint.css" media="print"> 
  <link rel="stylesheet" type="text/css" href="./css/kingprintindex.css" media="print"> 
</head>

<?php
  function calendar_day($i,$day_date,$calendar_date_choosen,$month,$year,$number_of_days_in_month){
    $today = date_format(date_create(),'j');
    $today_month = date_format(date_create(),'n');
    $today_year = date_format(date_create(),'Y');
    if ($day_date == $calendar_date_choosen) {
	    if ($day_date == $today and $month == $today_month and $year == $today_year) {
	        echo "<td class='calendartodaycell'>" ;
        } else {
			echo "<td class='calendarchosendaycell'>" ;
		}
	} else if ($day_date == $today and $month == $today_month and $year == $today_year) {
	    echo "<td class='calendartodaycell'>" ;
	} else if ($i == 0 || $i == 6 || $i == 7 || $i == 13 || $i == 14 || $i == 20 || $i == 21 || $i == 27 || $i == 28 || $i == 34 || $i == 35 || $i == 41) {
	    if ($day_date < 1 || $day_date > $number_of_days_in_month) {
		    echo "<td class='calendarblankcell'>" ;
        } else { 
	        echo "<td class='calendarsundaysaturdaycell' >" ;
		}	
	} else {
	    if ($day_date < 1 || $day_date > $number_of_days_in_month) {
		    echo "<td class='"; echo "calendarblankcell'"; echo ">" ;
        } else { 
   	      echo "<td class='calendarweekdaycell'>" ;
        }
    }
  }

  function previous_month_calendar_day($i,$day_date,$calendar_date_choosen,$previous_month,$previous_month_year,$previous_month_number_of_days_in_month){
    $today = date_format(date_create(),'j');
    $today_month = date_format(date_create(),'n');
    $today_year = date_format(date_create(),'Y');
	if ($day_date == $today and $previous_month == $today_month and $previous_month_year == $today_year) {
	    echo "<td class='previousmonthcalendartodaycell'>" ;
    } else if ($i == 0 || $i == 6 || $i == 7 || $i == 13 || $i == 14 || $i == 20 || $i == 21 || $i == 27 || $i == 28 || $i == 34 || $i == 35 || $i == 41) {
	    if ($day_date < 1 || $day_date > $previous_month_number_of_days_in_month) {
		    echo "<td class='previousmonthcalendarblankcell'>" ;
        } else { 
        	echo "<td class='previousmonthcalendarsundaysaturdaycell'>" ;
		}
	} else {
	    if ($day_date < 1 || $day_date > $previous_month_number_of_days_in_month) {
		    echo "<td class='previousmonthcalendarblankcell'>" ;
        } else { 
        	echo "<td class='previousmonthcalendarweekdaycell'>" ;
		}
    }
  }

  function next_month_calendar_day($i,$day_date,$calendar_date_choosen,$next_month,$next_month_year,$next_month_number_of_days_in_month){
    $today = date_format(date_create(),'j');
    $today_month = date_format(date_create(),'n');
    $today_year = date_format(date_create(),'Y');
	if ($day_date == $today and $next_month == $today_month and $next_month_year == $today_year) {
	    echo "<td class='nextmonthcalendartodaycell'>" ;
    } else if ($i == 0 || $i == 6 || $i == 7 || $i == 13 || $i == 14 || $i == 20 || $i == 21 || $i == 27 || $i == 28 || $i == 34 || $i == 35 || $i == 41) {
	    if ($day_date < 1 || $day_date > $next_month_number_of_days_in_month) {
		    echo "<td class='nextmonthcalendarblankcell'>" ;
        } else { 
        	echo "<td class='nextmonthcalendarsundaysaturdaycell'>" ;
		}
	} else {
   	    if ($day_date < 1 || $day_date > $next_month_number_of_days_in_month) {
		    echo "<td class='nextmonthcalendarblankcell'>" ;
        } else { 
      	    echo "<td class='nextmonthcalendarweekdaycell'>" ;
		}
    }
  }
  echo "<div class='variables'>";
    echo "<input type='button' id='globalaction' value='table'>"; // this stores the variable to pass to javascript if we are working with tables or a form   
    echo "<input type='button' id='action' value='view'>"; // this stores the variable to pass to javascript if we are working with tables or a form   
    echo "<input type='text' id='searchfield' autofocus autocomplete='off'>";
    echo "<input type='button' id='formtable' value='calendar'>";
    echo "<input type='button' id='startitemfield' value='0'>";
    echo "<input type='button' id='totalitemfields' value='0'>";
    echo "<input type='button' id='itemfield' value='0'>";
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    date_default_timezone_set('America/Denver'); // this sets the date and time to mountain standard time on the server in php.
	$note_view = $_GET['noteview'];
    echo "<input type='button' id='noteview' value='$note_view'>"; // this stores the php calendar id variable to pass to javascript 
	$employee_initials = $_GET['employeeinitials'];
    echo "<input type='button' id='employeeinitials' value='$employee_initials'>"; // this stores the php calendar id variable to pass to javascript 
    $calendar_view = $_GET['calendarview']; // this variable holds the view of the calendar eg. day view / future view etc
    echo "<input type='button' id='calendarview' value='$calendar_view'>"; // this stores the php calendar id variable to pass to javascript 
    $calendar_date_holder = $_GET['calendardate']; // $calendar_date_holder holds the current date the calendar is on when the page refreshes or the current date coming from index.php 
    echo "<input type='button' id='calendardateholder' value='$calendar_date_holder'>"; // this stores the php calendar id variable to pass to javascript 
    $calendar_id = $_GET['calendarid']; // this variable holds the id number of the calendar that the jobs or appointment belong to. 
    echo "<input type='button' id='calendarid' value='$calendar_id'>"; // this stores the php calendar id variable to pass to javascript 
    $calendar_employee_id = $_GET['calendaremployeeid']; // this variable holds the id number of the person logged in to the calendar site
    echo "<input type='button' id='calendaremployeeid' value='$calendar_employee_id'>"; // this stores the php employee id variable to pass to javascript
    $calendar_employee_name = $_GET['calendaremployeename'];
    echo "<input type='button' id='calendaremployeename' value='$calendar_employee_name'>";
	$calendar_paste_job_number = $_GET['calendarpastejobnumber'];
    echo "<input type='button' id='calendarpastejobnumber' value='$calendar_paste_job_number'>"; // this stores the php paste job number variable to pass to javascript
	$calendar_copy_cut = $_GET['calendarcopycut'];
    echo "<input type='button' id='calendarcopycut' value='$calendar_copy_cut'>"; // this stores the php copy cut variable to pass to javascript
    $calendar_date = date_create($calendar_date_holder); //date_create allows us to make a date time variable that we can use with date_format to get day, month, year and other formats from 
    $first_day = "01";
    $day = date_format($calendar_date,'j'); // this store the day name that the current calendar date is pointing to
    $month = date_format($calendar_date,'n'); // this store the month name that the current calendar date is pointing to
    $year = date_format($calendar_date,'Y'); // this store the 4 digit year that the current calendar date is pointing to
   
    // these three input tags hold the day month and year for pass the variable to javascript, these input fields are hidden in css
    echo "<input type='button' id='calendarday' value='$day'>";
    echo "<input type='button' id='calendarmonth' value='$month'>";
    echo "<input type='button' id='calendaryear' value='$year'>";
  
    // these variables set up that current month calendar so we can display it
    $first_day_of_month_stamp = date_create("$year-$month-$first_day");// this creates a date time variable that we can use the date_format() on 
    $day_of_week = date_format($first_day_of_month_stamp,'w'); // this tells us what week day the first of the current month starts on
    $number_of_days_in_month = date_format($calendar_date,'t'); // this tells us how days are in the current month
    $calendar_date_choosen = date_format($calendar_date,'j'); // this gives us the current day of the month number without a leading 0 (eg 8 instead of 08 for the 8th of the month
  
    // these variables setup the previous month calendar and store the variables in input tags to pass to javascript
    $previous_month = $month - 1;
    if ($previous_month < 1) {
        $previous_month = 12;
        $previous_month_year = $year - 1;
    } else {
        $previous_month_year = $year;
    }
    $previous_month_stamp = date_create("$previous_month_year-$previous_month-$first_day");
    $previous_month_name = date_format($previous_month_stamp,'M');
    $previous_month_day_of_week = date_format($previous_month_stamp,'w');
    $previous_month_number_of_days_in_month = date_format($previous_month_stamp,'t');
    echo "<input type='button' id='previouscalendarday' value='$first_day'>";
    echo "<input type='button' id='previouscalendarmonth' value='$previous_month'>";
    echo "<input type='button' id='previouscalendarmonthyear' value='$previous_month_year'>";
  
    // these variables setup the next month calendar and store the variables in input tags to pass to javascript
    $next_month = $month + 1;
    if ($next_month > 12) {
        $next_month = 1;
        $next_month_year = $year + 1;
    } else {
        $next_month_year = $year;
    }
    $next_month_stamp = date_create("$next_month_year-$next_month-$first_day");
    $next_month_name = date_format($next_month_stamp,'M');
    $next_month_day_of_week = date_format($next_month_stamp,'w');
    $next_month_number_of_days_in_month = date_format($next_month_stamp,'t');
    echo "<input type='button' id='nextcalendarday' value='$first_day'>";
    echo "<input type='button' id='nextcalendarmonth' value='$next_month'>";
    echo "<input type='button' id='nextcalendarmonthyear' value='$next_month_year'>";
  echo "</div>";
 
?>  
<body id='body'>
   <div class='container'>
     <div id='rightcolumncontainer'>
        <div id='jobcontainer'>
		  <div id='jobtablecontainer'>
		    <table id='jobtable'>
		      <tbody id='jobtablebody'>
		      <?php
    	        include "databaseconnect.php";
                if (mysqli_connect_errno($con)) {
                    echo "Failed to connect to MySQL: " . die();
                }
				if ($calendar_view == 'futureview') {
				    $query_date = date_format($calendar_date,'Y-m-d');
				    $sql = "CREATE TEMPORARY TABLE test (INDEX JOB_NUMBER (JOB_NUMBER, DATE_TIME)) AS SELECT * FROM job_date WHERE (job_date.`DATE` >= '$query_date') AND (job_date.`CALENDAR_ID` = $calendar_id) AND job_date.`JOB_DAY_TYPE` = 'Load' ORDER BY job_date.`DATE`";
                    mysqli_query($con, $sql);
			        $sql = "SELECT test.*, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`ORIGIN_ADDRESS1`, job.`DESTINATION_INFO1`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`ORDER_NUMBER`, job.`LOCATION_TYPE`, job.`WEIGHT`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`DO_NOT_PRINT` FROM job, test WHERE (job.`JOB_NUMBER` = test.`JOB_NUMBER` AND job.`HAULING` = 'King') AND (job.`JOB_TYPE` = 'Interstate' OR job.`JOB_TYPE` = 'Intrastate') GROUP BY test.`JOB_NUMBER` ORDER BY test.`DATE_TIME`";
              		$result = mysqli_query($con, $sql);
				} elseif ($calendar_view == 'packview')	{
				    $query_date = date_format($calendar_date,'Y-m-d');
				    $sql = "CREATE TEMPORARY TABLE test (INDEX JOB_NUMBER (JOB_NUMBER, DATE_TIME)) AS SELECT * FROM job_date WHERE (job_date.`DATE` >= '$query_date') AND (job_date.`CALENDAR_ID` = $calendar_id) AND (job_date.`JOB_DAY_TYPE` = 'Pack' OR job_date.`JOB_DAY_TYPE` = 'Pack/Load') ORDER BY job_date.`DATE`";
                    mysqli_query($con, $sql);
                    $sql = "SELECT test.*, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`ORIGIN_ADDRESS1`, job.`DESTINATION_INFO1`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`ORDER_NUMBER`, job.`LOCATION_TYPE`, job.`WEIGHT`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`DO_NOT_PRINT` FROM job, test WHERE (job.`JOB_NUMBER` = test.`JOB_NUMBER`) GROUP BY test.`JOB_NUMBER` ORDER BY test.`DATE_TIME`";
                    $result = mysqli_query($con, $sql);
				} elseif ($calendar_view == 'crateview')	{
				    $query_date = date_format($calendar_date,'Y-m-d');
				    $sql = "CREATE TEMPORARY TABLE test (INDEX JOB_NUMBER (JOB_NUMBER, DATE_TIME)) AS SELECT * FROM job_date WHERE (job_date.`DATE` >= '$query_date') AND (job_date.`CALENDAR_ID` = $calendar_id) AND (job_date.`JOB_DAY_TYPE` = 'Crating') ORDER BY job_date.`DATE`";
                    mysqli_query($con, $sql);
                    $sql = "SELECT test.*, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`ORIGIN_ADDRESS1`, job.`DESTINATION_INFO1`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`ORDER_NUMBER`, job.`LOCATION_TYPE`, job.`WEIGHT`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`DO_NOT_PRINT` FROM job, test WHERE (job.`JOB_NUMBER` = test.`JOB_NUMBER`) GROUP BY test.`JOB_NUMBER` ORDER BY test.`DATE_TIME`";
                    $result = mysqli_query($con, $sql);
				} else {
				    $query_date = date_format($calendar_date,'Y-m-d');
				    $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`DO_NOT_PRINT` FROM job_date, job WHERE (job_date.`DATE` = '$query_date' AND job_date.`CALENDAR_ID` = '$calendar_id') AND job.`JOB_NUMBER` = job_date.`JOB_NUMBER` ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                }
				$numberOfRows = mysqli_num_rows($result) ;
                mysqli_close($con); 
                $i = 0 ;
                while ($i < $numberOfRows) {
                    $row = mysqli_fetch_array($result);
					if ($calendar_view == 'localview' && $row['DO_NOT_PRINT'] == 'yes') {
					    $i += 1;
						continue;
					}
				    echo "<tr class='jobtablerow'>";
					  echo "<td class='"; echo "jobtabletimecell'"; echo ">";
					    //if ($calendar_view != 'dayview') {
  					        echo "<span class='jobtablefutureviewdate'>";
				              echo "&nbsp";
					          echo date('m/d/Y', strtotime($row['DATE_TIME']));
				              echo "&nbsp";
					          echo "<br>";
						    echo "</span>";
                        //}
				        echo "&nbsp";
					    echo date('h:i:a', strtotime($row['DATE_TIME']));
				        echo "&nbsp";
		              echo "</td>" ;
					  echo "<td class='"; echo "jobtablejobdaytypecell'"; echo ">";
						echo $row['JOB_TYPE'];
				        echo "&nbsp";
				        echo "<br>";
						echo "<span class='jobtablejobdaytypecolor'>";
						  echo $row['JOB_DAY_TYPE'];
				          echo "&nbsp";
						  echo $row['NUMBER_OF_DAYS'];
				          echo "&nbsp";
                        echo "</span>";
				        echo "<br>";
		              echo "</td>" ;
		              echo "<td class='"; echo "jobtablespacecell'"; echo ">";
				        echo "&nbsp";
		              echo "</td>";
		              echo "<td class='"; echo "jobtablenamecell'"; echo ">";
  					    if ($row['NAME1'] == '') {
						    echo $row['COMPANY_NAME'];
						} else {
				            echo $row['NAME1'];
						}
				        echo "&nbsp";
		              echo "</td>";
		              echo "<td class='"; echo "jobtablespacecell'"; echo ">";
				        echo "&nbsp";
		              echo "</td>";
		              echo "<td class='"; echo "jobtablenamecell'"; echo ">";
  					    if ($row['NAME1'] != '') {
 					 	    echo $row['COMPANY_NAME'];
						}
		              echo "</td>";
		              echo "<td class='"; echo "jobtablespacecell1'"; echo ">";
				        echo "&nbsp";
		              echo "</td>";
		              echo "<td class='"; echo "jobtableorigincell'"; echo ">";
				        echo $row['ORIGIN_ADDRESS1'];
		              echo "</td>";
		              echo "<td class='"; echo "jobtablespacecell22'"; echo ">";
				        echo "&nbsp";
		              echo "</td>";
					  if ($calendar_view == 'futureview') {
					      echo "<td class='"; echo "jobtablephonecell2'"; echo ">";
						    echo $row['DESTINATION_INFO1'];
		                  echo "</td>";
                      } else {
		                echo "<td class='"; echo "jobtablephonecell'"; echo ">";
						  echo $row['PHONE1'];
		                echo "</td>";
					  }
		              echo "<td class='"; echo "jobtablespacecell33'"; echo ">";
				        echo "&nbsp";
		              echo "</td>";
					  if ($calendar_view == 'futureview') {
 		                  echo "<td class='"; echo "jobtablephonecell3'"; echo ">";
					        echo $row['PHONE1'];
		                  echo "</td>";
                      } else {
		                  echo "<td class='"; echo "jobtablephonecell3'"; echo ">";
					        echo $row['PHONE2'];
		                  echo "</td>";
					  }
  				      echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				        echo $row['JOB_NUMBER'];
		              echo "</td>" ;
  					  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				        echo $row['AUTOMATIC_NUMBER'];
		              echo "</td>" ;
					echo "</tr>";
				    echo "<tr class='jobtablerow'>" ;
					  echo "<td class='jobtabletimecell2' colspan='2'>";
					    if (trim($row['LOCATION_TYPE']) != "-- Select --") {
					        echo $row['LOCATION_TYPE'];
						    echo "&nbsp";
						} else { 
						    echo "&nbsp";
						}
		              echo "</td>" ;
		              echo "<td class='"; echo "jobtablespacecell2'"; echo ">";
				        echo "&nbsp";
		              echo "</td>";
					  echo "<td class='"; echo "jobtablenotecell'"; echo " colspan='9'>";
				  	    if ($row['CANCELLED'] == 'yes') {
					        echo "***Cancelled Cancelled Cancelled ***"; 
				            echo "&nbsp";
					  	} elseif ($row['TENTITIVE'] == 'yes') {
						    echo "***Tentitive Tentitive Tentitive ***"; 
					        echo "&nbsp";
						}
				        echo $row['DAY_NOTE'];
					    echo "&nbsp";
						echo $row['NOTE'];
		              echo "</td>";
  					  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				        echo $row['JOB_NUMBER'];
		              echo "</td>" ;
  					  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				        echo $row['AUTOMATIC_NUMBER'];
		              echo "</td>" ;
                    echo "</tr>";
		    		echo "<tr class='jobtablerow'>" ;
					  if ($calendar_view == 'futureview') {
      				      echo "<td class='jobtabletimecell3'>" ;
 				  	      if ($row['CANCELLED'] == 'yes') {
						      echo "Cancelled"; 
						  } elseif ($row['TENTITIVE'] == 'yes') {
						      echo "Tentitive"; 
						  } else {
					          echo $row['ORDER_NUMBER'];
						  }
						    echo "&nbsp";
		                  echo "</td>" ;
				  	  } else {
     				      echo "<td class='jobtabletimecell3'>" ;
						  if ($row['CANCELLED'] == 'yes') {
					          echo "Cancelled"; 
					      } elseif ($row['TENTITIVE'] == 'yes') {
						      echo "Tentitive";
						  }
                            echo "&nbsp";
		                echo "</td>" ;
					  }
					  echo "<td class='"; echo "jobtablejobdaytypecell3'"; echo ">";
					    if ($row['DAY_WEIGHT'] > 0) {
                            echo $row['DAY_WEIGHT'];
                        } else {							
       					    echo $row['WEIGHT'];
						}
						echo "lbs";
    					echo "&nbsp";
		              echo "</td>" ;
		              echo "<td class='"; echo "jobtablespacecell3'"; echo ">";
				        echo "&nbsp";
		              echo "</td>";
					  if ($calendar_view == 'futureview') {
                          echo "<td class='"; echo "jobtablenamesofmencell'"; echo " colspan='9'>";
					        echo "<span class='jobtablevannumbercell'>";
						      echo "Van Number";
					          echo "&nbsp";
					          echo "&nbsp";
                            echo $row['TRAILER_NUMBER'];						
					          echo "&nbsp";
						    echo "</span>";
					        echo "<span class='jobtabledrivercell'>";
					          echo "&nbsp";
						      echo "Driver";
					          echo "&nbsp";
						      echo $row['DRIVER_NUMBER'];
					          echo "&nbsp";
						      echo $row['DRIVER'];
						      echo "&nbsp";
						    echo "</span>";
		                  echo "</td>";
					  } else {
                          echo "<td class='"; echo "jobtablenamesofmencell'"; echo " colspan='9'>";
					        echo "<span class='jobtablenumberofmencell'>";
						      echo "No Men";
					          echo "&nbsp";
							  if ($row['NUMBER_OF_MEN'] == 0) {
					              echo "&nbsp";
							  } else {
 				                  echo $row['NUMBER_OF_MEN'];
							  }
					          echo "&nbsp";
						    echo "</span>";
					  	    if ($row['CANCELLED'] == 'yes') {
						        echo "***Cancelled Cancelled Cancelled ***"; 
					            echo "&nbsp";
						    } elseif ($row['TENTITIVE'] == 'yes') {
						        echo "***Tentitive Tentitive Tentitive ***"; 
					            echo "&nbsp";
						    }
					        echo "&nbsp";
						    echo $row['DRIVER'];
						    echo "&nbsp";
						    echo $row['NAMES_OF_MEN'];
		                  echo "</td>";
					  }
  					  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				        echo $row['JOB_NUMBER'];
		              echo "</td>" ;
  					  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				        echo $row['AUTOMATIC_NUMBER'];
		              echo "</td>";
                    echo "</tr>";
					echo "<tr>";
					  echo "<td class='jobtableemptyrow1' colspan='13'>";
					    echo "&nbsp";
					  echo "</td>";
					echo "</tr>";
					echo "<tr>";
					  echo "<td class='jobtableemptyrow1' colspan='13'>";
					    echo "&nbsp";
					  echo "</td>";
					echo "</tr>";
					echo "<tr>";
					  echo "<td class='jobtableemptyrow1' colspan='13'>";
					    echo "&nbsp";
					  echo "</td>";
					echo "</tr>";
					echo "<tr>";
					  echo "<td class='jobtableemptyrow' colspan='13'>";
					    echo "&nbsp";
					  echo "</td>";
					echo "</tr>";
				    $i++;
                }// endwhile loop
		      ?>
              </tbody>			
    	    </table>	   
		  </div>
	    </div> 
	  </div><!--
 --></div>	
  </div> <!-- end of container div -->
</body>  
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>
  <script src="./scripts/kingcalendarprintinit.js" type="text/javascript"></script>

</html>



