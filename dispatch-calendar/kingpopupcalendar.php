<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> 
<![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kingpopupcalendar.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
</head>

<?php
  function calendar_day($i,$day_date,$calendar_date_choosen,$month,$year,$number_of_days_in_month){
    $today = date_format(date_create(),'j');
    $today_month = date_format(date_create(),'n');
    $today_year = date_format(date_create(),'Y');
    if ($day_date == $calendar_date_choosen) {
	    echo "<td class='calendarchosendaycell'>" ;
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
	$calendar_popup_called_from = $_GET['calendarpopupcalledfrom'];
    echo "<input type='button' id='calendarpopupcalledfrom' value='$calendar_popup_called_from'>"; // this stores the location of which window the popup calendar was called from to pass to javascript
    $calendar_date = date_create($calendar_date_holder); //date_create allows us to make a date time variable that we can use with date_format to get day, month, year and other formats from 
    $first_day = "01";
    $day = date_format($calendar_date,'d'); // this store the day name that the current calendar date is pointing to
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
    <div id='columncontainer'><!--
   --><div id='leftcolumncontainer'>
        <div id='calendarcontainer'>
		  <!--<img id='photo' src="http://localhost/king/_MG_2691-2692-2693Panorama-Edit.jpg" height="1000" width="590">-->
	      <div id='yearcontainer'>
            <?php
	          echo "<button id='yearcontainerbuttonleft'>" ;
                echo "&#60";
			  echo "</button>";
            ?>				
			<?php
              echo date_format($calendar_date,'F jS Y');
            ?>				
			<?php
	          echo "<button id='yearcontainerbuttonright'>" ;
                echo "&#62";
			  echo "</button>";
            ?>				
          </div>	
		  <div id='previousmonthcontainer'>
		    <?php
  		      echo $previous_month_name;
			?>
		  </div>	
	      <table id='previousmonthdaycontainer'>
		    <tr>
		      <td class='previousmonthdaycell'>
		        S
              </td>  
		      <td class='previousmonthdaycell'>
                M
			  </td>  
		      <td class='previousmonthdaycell'>
			    T
			  </td>  
		      <td class='previousmonthdaycell'>
			    W
			  </td>  
		      <td class='previousmonthdaycell'>
			    T
			  </td>  
		      <td class='previousmonthdaycell'>
			    F
			  </td>  
		      <td class='previousmonthdaycell'>
			    S
			  </td>
            </tr>			
          </table>	
          <table id='previousmonthcalendartable'>
		    <?php
			  $i = 0;
			  $day_date = 0;
			  while ($i <42) {
			      if ($i == 0 || $i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35) {
                      echo "<tr>";
                  }
                  if ($previous_month_day_of_week == $i) {
                      $day_date = 1;
                      previous_month_calendar_day($i,$day_date,$calendar_date_choosen,$previous_month,$previous_month_year,$previous_month_number_of_days_in_month);
                      echo $day_date;
                  } else if ($day_date > 0 and $day_date < $previous_month_number_of_days_in_month) {
                      $day_date++;
                      previous_month_calendar_day($i,$day_date,$calendar_date_choosen,$previous_month,$previous_month_year,$previous_month_number_of_days_in_month);
                      echo $day_date;
                      if ($day_date == $previous_month_number_of_days_in_month) {
                          $day_date++;
                      }
                  } else {
                      previous_month_calendar_day($i,$day_date,$calendar_date_choosen,$previous_month,$previous_month_year,$previous_month_number_of_days_in_month);
                      echo " ";
				  }
				  echo "</td>";
				  $i++;
			      if ($i == 0 || $i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35) {
                      echo "</tr>";
                  }
			  }
            ?>
		  </table>	
		  <div id='nextmonthcontainer'>
		    <?php
  		      echo $next_month_name;
            ?>			  
		  </div>	
	      <table id='nextmonthdaycontainer'>
		    <tr>
		      <td class='nextmonthdaycell'>
		        S
              </td>  
		      <td class='nextmonthdaycell'>
                M
			  </td>  
		      <td class='nextmonthdaycell'>
			    T
			  </td>  
		      <td class='nextmonthdaycell'>
			    W
			  </td>  
		      <td class='nextmonthdaycell'>
			    T
			  </td>  
		      <td class='nextmonthdaycell'>
			    F
			  </td>  
		      <td class='nextmonthdaycell'>
			    S
			  </td>
            </tr>			
          </table>	
          <table id='nextmonthcalendartable'>
		    <?php
			  $i = 0;
			  $day_date = 0;
			  while ($i <42) {
			      if ($i == 0 || $i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35) {
                      echo "<tr>";
                  }
                  if ($next_month_day_of_week == $i) {
                      $day_date = 1;
                      next_month_calendar_day($i,$day_date,$calendar_date_choosen,$next_month,$next_month_year,$next_month_number_of_days_in_month);
                      echo $day_date;
                  } else if ($day_date > 0 and $day_date < $next_month_number_of_days_in_month) {
                      $day_date++;
                      next_month_calendar_day($i,$day_date,$calendar_date_choosen,$next_month,$next_month_year,$next_month_number_of_days_in_month);
                      echo $day_date;
                      if ($day_date == $next_month_number_of_days_in_month) {
                          $day_date++;
                      }
                  } else {
                      next_month_calendar_day($i,$day_date,$calendar_date_choosen,$next_month,$next_month_year,$next_month_number_of_days_in_month);
                      echo " ";
				  }
				  echo "</td>";
				  $i++;
			      if ($i == 0 || $i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35) {
                      echo "</tr>";
                  }
			  }
            ?>
		  </table>	
	      <table id='daycontainer'>
		    <tr>
		      <td class='daycell'>
		        Sun
              </td>  
		      <td class='daycell'>
                Mon
			  </td>  
		      <td class='daycell'>
			    Tue
			  </td>  
		      <td class='daycell'>
			    Wed
			  </td>  
		      <td class='daycell'>
			    Thu
			  </td>  
		      <td class='daycell'>
			    Fri
			  </td>  
		      <td class='daycell'>
			    Sat
			  </td>
            </tr>			
          </table>	
          <table id='calendartable'>
		    <?php
			  $i = 0;
			  $day_date = 0;
			  while ($i < 42) {
			      if ($i == 0 || $i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35) {
                      echo "<tr>";
                  }
                  if ($day_of_week == $i) {
                      $day_date = 1;
                      calendar_day($i,$day_date,$calendar_date_choosen,$month,$year,$number_of_days_in_month);
                      echo $day_date;
                  } else if ($day_date > 0 and $day_date < $number_of_days_in_month) {
                      $day_date++;
                      calendar_day($i,$day_date,$calendar_date_choosen,$month,$year,$number_of_days_in_month);
                      echo $day_date;
                      if ($day_date == $number_of_days_in_month) {
                          $day_date++;
                      }
                  } else {
                      calendar_day($i,$day_date,$calendar_date_choosen,$month,$year,$number_of_days_in_month);
                      echo " ";
				  }
				  echo "</td>";
				  $i++;
			      if ($i == 0 || $i == 7 || $i == 14 || $i == 21 || $i == 28 || $i == 35) {
                      echo "</tr>";
                  }
			  }
            ?>
          </table>			
		  <table id='monthcontainertable'>
		    <?php
              echo "<td id='monthcontainerpreviousyearcell'>";			
			    echo ($year - 1) ;
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Jan";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Feb";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Mar";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Apr";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "May";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Jun";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Jul";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Aug";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Sep";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Oct";
			  echo "</td>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Nov";
			  echo "</td'>";
			  echo "<td class='monthcontainermonthcell'>";
			    echo "Dec";
			  echo "</td>";
              echo "<td id='monthcontainernextyearcell'>";			
                echo ($year + 1);
			  echo "</td>";
			?>			  
		  </table>
	    </div>
      </div>
    </div>
  </div>
</body>
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>
  <script src="./scripts/kingpopupcalendarinit.js" type="text/javascript"></script>
</html>  