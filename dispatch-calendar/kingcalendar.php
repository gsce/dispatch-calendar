<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kingcalendar.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
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
	if (isset($_GET['searchfield'])) {
	    $search_field = trim($_GET['searchfield']);
	} else {
	    $search_field = '';
	}
	$note_view = $_GET['noteview'];
	$employee_initials = $_GET['employeeinitials'];
    echo "<input type='button' id='employeeinitials' value='$employee_initials'>"; // this stores the php calendar id variable to pass to javascript 
    $calendar_view = $_GET['calendarview']; // this variable holds the view of the calendar eg. day view / future view etc
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
    <div id='popupheader'>
	</div>
    <div id='popup'>
	</div>
    <div class='header'>
	   Appointment Calendar for King Transfer and Storage 
	</div>
    <div class='leftandrightmenucontainer'><!--
   --><div class='topleftmenu'>
	    <button class='menubutton' id = 'calendarsetuptablebutton'>
	      Calendar Setup
	    </button>
	    <button class='menubutton' id = 'contacttablebutton'>
	      Contacts
	    </button>
	    <button class='menubutton' id = 'employeetablebutton'>
	      Employees
	    </button>
	    <button class='menubutton'>
	      Intra
	    </button>
	    <button class='menubutton'>
	      Local
	    </button>
  	  </div><!--
   --><div class='toprightmenu'>
		<button class='menubutton' id='dayviewbutton'>
		  Day View
        </button>
		<button class='menubutton' id='localviewbutton'>
		  Local View
        </button>
	    <button class='menubutton' id='futureviewbutton'>
	      Future View
        </button>
	    <button class='menubutton' id='packviewbutton'>
	      Pack View
	    </button>
	    <button class='menubutton' id='crateviewbutton'>
	      Crate View
	    </button>
	    <button class='menubutton' id='searchviewbutton'>
	      Search
	    </button>
		<button class='menubutton' id='calendarprintbutton'>
		  <img src='print.png' alt='add' height='15' width='20'>
		  Print
		</button>
		<span id='defaultcalendarid'> 
		  Calendar Id 
		</span>
	    <select type='text' id='defaultcalendarname'>
 		  <?php 
            include "databaseconnect.php";
            if (mysqli_connect_errno($con))
            {
                echo "Failed to connect to MySQL: " . die();
            }
            $result = mysqli_query($con, "SELECT * FROM calendar WHERE 1 ORDER BY CALENDAR_NAME ASC");
	        $number_of_rows = mysqli_num_rows($result) ;
            mysqli_close($con); 
	        $alt_row=0;
            $i = 0 ;
			while ($i < $number_of_rows) {
			    $row = mysqli_fetch_array($result);
				if ($row['CALENDAR_ID'] == $calendar_id) {
				    echo "<option selected value='"; echo $row['CALENDAR_ID']; echo "'>"; echo $row['CALENDAR_NAME']; echo "</option>";
				} else {
				    echo "<option value='"; echo $row['CALENDAR_ID']; echo "'>"; echo $row['CALENDAR_NAME']; echo "</option>";
                }				
				$i += 1;
			}
		  ?>
		</select>
	  </div><!--
 --></div><!--
 --><div id='columncontainer'><!--
   --><div id='leftcolumncontainer'>
        <div id='calendarcontainer'>
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
	    <div id='notecontainer'>
		  <div id='notetitlecontainer'>
		    <div id='notetitlecontainerleft'>
		  	  ▲
			</div>
		    <div id='notetitlecontainercenter'>
			  NOTES
            </div>
		    <div id='notetitlecontainerright'>
			  ▲
			</div>  
  		  </div>
		  <div id='notebuttoncontainer'>
			<button id='notetablereceivedmessagesviewbutton'>
			  Received Messages View
			</button>
			<button id='notetablesentmessagesviewbutton'>
			  Sent Messages View
			</button>
			<button class='menubutton' id='notetablesearchbutton'>
		      Search
			</button>
			<button id='notetabletextmessage'>
			  Send Text Message
			</button>
		    <button id='notetableadd'>
			  Send Message
			</button>
		  </div>
		  <div id='notetablecontainer'>
		    <table id='notetable'>
		      <tbody id='notetablebody'>
		      <?php
    	        include "databaseconnect.php";
                if (mysqli_connect_errno($con)) {
                    echo "Failed to connect to MySQL: " . die();
                }
				if ($note_view == 'sentmessages') {
                    $result = mysqli_query($con, "SELECT * FROM note WHERE note.`NOTE_SENT_BY_ID` = '$calendar_employee_id' ORDER BY note.NOTE_ID DESC"); 
				} elseif ($note_view == 'notetablesearchviewsent') {
                    $result = mysqli_query($con, "SELECT * FROM note WHERE UPPER(note.`NOTE`) LIKE '%{$search_field}%' AND note.`NOTE_SENT_BY_ID` = '$calendar_employee_id' ORDER BY note.NOTE_ID DESC"); 
				} elseif ($note_view == 'notetablesearchviewreceived') {
                    $result = mysqli_query($con, "SELECT * FROM note WHERE UPPER(note.`NOTE`) LIKE '%{$search_field}%' AND note.`EMPLOYEE_ID` = '$calendar_employee_id' ORDER BY note.NOTE_ID DESC"); 
				} elseif ($note_view == 'notetablesearchviewdatereceived') {
					$search_date = date_create($search_field);
					$query_date = date_format($search_date,'Y-m-d');
                    $result = mysqli_query($con, "SELECT * FROM note WHERE note.`DATE_TIME` >= '$query_date' AND note.`EMPLOYEE_ID` = '$calendar_employee_id' ORDER BY note.NOTE_ID DESC"); 
				} elseif ($note_view == 'notetablesearchviewdatesent') {
					$search_date = date_create($search_field);
					$query_date = date_format($search_date,'Y-m-d');
                    $result = mysqli_query($con, "SELECT * FROM note WHERE note.`DATE_TIME` >= '$query_date' AND AND note.`NOTE_SENT_BY_ID` = '$calendar_employee_id' ORDER BY note.NOTE_ID DESC"); 
				} else {
                    $result = mysqli_query($con, "SELECT * FROM note WHERE note.`EMPLOYEE_ID` = '$calendar_employee_id' ORDER BY note.NOTE_ID DESC"); 
				}
	            $numberOfRows = mysqli_num_rows($result);
                mysqli_close($con); 
                $i = 0 ;
                while ($i < $numberOfRows) {
                    $row = mysqli_fetch_array($result);
				    if ($row['VIEWED'] == 0) {
				        echo "<tr class='notetablerownotviewed'>" ;
			        } else {
				        echo "<tr class='notetablerow'>" ;
				    }
		                  echo "<td class='notetabledatecell'>" ;
					        echo date_format(date_create($row['DATE_TIME']),'m/d/Y') ;
		                  echo "</td>" ;
		                  echo "<td class='notetabletimecell'>" ;
					        echo date_format(date_create($row['DATE_TIME']),'h:i a') ;
		                  echo "</td>" ;
		                  echo "<td class='"; echo "notetablenotecell'"; echo ">" ;
						  echo "&nbsp";
				            echo $row['NOTE'] ;
		                  echo "</td>" ;
					      echo "<td class='notetablesentbycell'>";
					        echo $row['NOTE_SENT_BY_NAME'] ;
					      echo "</td>";  
						  echo "<td class='notetableid'>";
					        echo $row['NOTE_ID'] ;
					      echo "</td>";  
					      echo "<td class='notetablesenttocell'>";
					        echo $row['NOTE_SENT_TO_NAME'] ;
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
   --><div id='centercolumncontainer'><!--
     --><div id='centercolumncontainertop'>
		  ◄
		</div><!--  
   --></div><!--
   --><div id='rightcolumncontainer'>
        <div id='jobcontainer'>
	      <div id='jobbuttoncontainer'>
    		<button class='menubutton' id='jobtableadd'>
		      Add Job
		    </button>
		    <button class='menubutton' id='previousdaybutton'>
		      Previous Day
		    </button>
		    <button class='menubutton' id='nextdaybutton'>
		      Next Day
		    </button>
		  </div>
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
			        $sql = "SELECT test.*, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`ORIGIN_CITY_STATE_ZIP`, job.`DESTINATION_CITY_STATE_ZIP`, job.`DELIVERY_SPREAD`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`ORDER_NUMBER`, job.`LOCATION_TYPE`, job.`WEIGHT`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job, test WHERE (job.`JOB_NUMBER` = test.`JOB_NUMBER`) AND (job.`HAULING` = 'King' || job.`HAULING` = 'Pending') AND (job.`JOB_TYPE` = 'Interstate' OR job.`JOB_TYPE` = 'Intrastate') GROUP BY test.`JOB_NUMBER` ORDER BY test.`DATE_TIME`";
              		$result = mysqli_query($con, $sql);
				} elseif ($calendar_view == 'packview')	{
				    $query_date = date_format($calendar_date,'Y-m-d');
				    $sql = "CREATE TEMPORARY TABLE test (INDEX JOB_NUMBER (JOB_NUMBER, DATE_TIME)) AS SELECT * FROM job_date WHERE (job_date.`DATE` >= '$query_date') AND (job_date.`CALENDAR_ID` = $calendar_id) AND (job_date.`JOB_DAY_TYPE` = 'Pack' OR job_date.`JOB_DAY_TYPE` = 'Pack/Load') ORDER BY job_date.`DATE`";
                    mysqli_query($con, $sql);
                    $sql = "SELECT test.*, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`ORIGIN_ADDRESS1`, job.`DESTINATION_INFO1`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`ORDER_NUMBER`, job.`LOCATION_TYPE`, job.`WEIGHT`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job, test WHERE (job.`JOB_NUMBER` = test.`JOB_NUMBER`) GROUP BY test.`JOB_NUMBER` ORDER BY test.`DATE_TIME`";
                    $result = mysqli_query($con, $sql);
				} elseif ($calendar_view == 'crateview') {
				    $query_date = date_format($calendar_date,'Y-m-d');
				    $sql = "CREATE TEMPORARY TABLE test (INDEX JOB_NUMBER (JOB_NUMBER, DATE_TIME)) AS SELECT * FROM job_date WHERE (job_date.`DATE` >= '$query_date') AND (job_date.`CALENDAR_ID` = $calendar_id) AND (job_date.`JOB_DAY_TYPE` = 'Crating') ORDER BY job_date.`DATE`";
                    mysqli_query($con, $sql);
                    $sql = "SELECT test.*, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`ORIGIN_ADDRESS1`, job.`DESTINATION_INFO1`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`ORDER_NUMBER`, job.`LOCATION_TYPE`, job.`WEIGHT`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job, test WHERE (job.`JOB_NUMBER` = test.`JOB_NUMBER`) GROUP BY test.`JOB_NUMBER` ORDER BY test.`DATE_TIME`";
                    $result = mysqli_query($con, $sql);
				} elseif ($calendar_view == 'searchviewname') {
				    $query_date = date_format($calendar_date,'Y-m-d');
					if ($search_field == '') {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job LEFT JOIN job_date ON job_date.`JOB_NUMBER` = job.`JOB_NUMBER` WHERE 1 AND job.`CALENDAR_ID` = '$calendar_id' ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    } else {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job LEFT JOIN job_date ON job_date.`JOB_NUMBER` = job.`JOB_NUMBER` WHERE (UPPER(job.`NAME1`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') OR (UPPER(job.`COMPANY_NAME`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    }
				} elseif ($calendar_view == 'searchviewdate') {
					$search_date = date_create($search_field);
					$query_date = date_format($search_date,'Y-m-d');
					if ($search_field == '') {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job_date, job WHERE (job_date.`DATE` >= '$query_date' AND job_date.`CALENDAR_ID` = '$calendar_id') AND job.`JOB_NUMBER` = job_date.`JOB_NUMBER` ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    } else {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job_date, job WHERE (job_date.`DATE` >= '$query_date' AND job_date.`CALENDAR_ID` = '$calendar_id') AND job.`JOB_NUMBER` = job_date.`JOB_NUMBER` ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    }
				} elseif ($calendar_view == 'searchviewaddress') {
				    $query_date = date_format($calendar_date,'Y-m-d');
					if ($search_field == '') {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`ORIGIN_CITY_STATE_ZIP`, job.`DESTINATION_INFO1`, job.`DESTINATION_CITY_STATE_ZIP`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job LEFT JOIN job_date ON job_date.`JOB_NUMBER` = job.`JOB_NUMBER` WHERE 1 AND job.`CALENDAR_ID` = '$calendar_id' ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    } else {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`ORIGIN_CITY_STATE_ZIP`, job.`DESTINATION_INFO1`, job.`DESTINATION_CITY_STATE_ZIP`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job LEFT JOIN job_date ON job_date.`JOB_NUMBER` = job.`JOB_NUMBER` WHERE (UPPER(job.`ORIGIN_ADDRESS1`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') OR (UPPER(job.`ORIGIN_CITY_STATE_ZIP`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') OR (UPPER(job.`DESTINATION_INFO1`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') OR (UPPER(job.`DESTINATION_CITY_STATE_ZIP`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    }	
				} elseif ($calendar_view == 'searchviewjobcoordinatornote') {
				    $query_date = date_format($calendar_date,'Y-m-d');
					if ($search_field == '') {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job LEFT JOIN job_date ON job_date.`JOB_NUMBER` = job.`JOB_NUMBER` WHERE 1 AND job.`CALENDAR_ID` = '$calendar_id' ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    } else {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job LEFT JOIN job_date ON job_date.`JOB_NUMBER` = job.`JOB_NUMBER` WHERE (UPPER(job.`COORDINATOR_NOTE`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') OR (UPPER(job.`NOTE`) LIKE '%{$search_field}%' AND job.`CALENDAR_ID` = '$calendar_id') ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    }	
				} elseif ($calendar_view == 'searchviewdaynote') {
				    $query_date = date_format($calendar_date,'Y-m-d');
					if ($search_field == '') {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job_date, job WHERE 1 AND job_date.`CALENDAR_ID` = '$calendar_id' AND job.`JOB_NUMBER` = job_date.`JOB_NUMBER` ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    } else {
				        $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job_date, job WHERE (UPPER(job_date.`DAY_NOTE`) LIKE '%{$search_field}%' AND job_date.`CALENDAR_ID` = '$calendar_id') AND job.`JOB_NUMBER` = job_date.`JOB_NUMBER` ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                    }	
				} else {
				    $query_date = date_format($calendar_date,'Y-m-d');
				    $result = mysqli_query($con, "SELECT job_date.`JOB_NUMBER`, job_date.`CALENDAR_ID`, job_date.`NUMBER_OF_DAYS`, job_date.`DATE`, job_date.`DATE_TIME`, job_date.`JOB_DAY_TYPE`, job_date.`AUTOMATIC_NUMBER`, job_date.`DAY_NOTE`, job_date.`DAY_WEIGHT`, job_date.`NUMBER_OF_MEN`, job_date.`DRIVER`, job_date.`NAMES_OF_MEN`, job.`ORIGIN_ADDRESS1`, job.`WEIGHT`, job.`LOCATION_TYPE`, job.`JOB_TYPE`, job.`NAME1`, job.`COMPANY_NAME`, job.`PHONE1`, job.`PHONE2`, job.`PHONE3`, job.`NOTE`, job.`DO_NOT_PRINT`, job.`TENTITIVE`, job.`CANCELLED`, job.`HAULING` FROM job_date, job WHERE (job_date.`DATE` = '$query_date' AND job_date.`CALENDAR_ID` = '$calendar_id') AND job.`JOB_NUMBER` = job_date.`JOB_NUMBER` ORDER BY job_date.`DATE_TIME`, job_date.`JOB_NUMBER`");
                }
				$numberOfRows = mysqli_num_rows($result) ;
                mysqli_close($con); 
				if ($calendar_view == 'futureview') {
                    $i = 0 ;
                    while ($i < $numberOfRows) {
                        $row = mysqli_fetch_array($result);
				        echo "<tr class='jobtablerow'>";
				    	  echo "<td class='"; echo "jobtablefutureviewordernumbercell'"; echo ">";
		                    echo "&nbsp";
				    	    echo $row['ORDER_NUMBER'];
				            echo "&nbsp";
		                  echo "</td>";
		                  echo "<td class='"; echo "jobtablespacecell'"; echo ">";
				            echo "&nbsp";
		                  echo "</td>";
		                  echo "<td class='"; echo "jobtablefutureviewnamecell'"; echo ">";
			                echo $row['NAME1'];
				            echo "&nbsp";
		                  echo "</td>";
		                  echo "<td class='"; echo "jobtablespacecell'"; echo ">";
				            echo "&nbsp";
		                  echo "</td>";
		                  echo "<td class='"; echo "jobtablefutureviewvannumbercell'"; echo ">";
				            echo "&nbsp";
				            echo $row['TRAILER_NUMBER'];
		                  echo "</td>";
		                  echo "<td class='"; echo "jobtablefutureviewdrivercell'"; echo ">";
				            echo "&nbsp";
				            echo $row['DRIVER'];
		                  echo "</td>";
		                  echo "<td class='"; echo "jobtablefuturevieworigincell'"; echo ">";
				            echo "&nbsp";
				            echo $row['ORIGIN_CITY_STATE_ZIP'];
				            echo "&nbsp";
		                  echo "</td>";
				          echo "<td class='"; echo "jobtablefutureviewdestinationcell'"; echo ">";
				            echo "&nbsp";
				    	    echo $row['DESTINATION_CITY_STATE_ZIP'];
	                      echo "</td>";
					      echo "<td class='"; echo "jobtablefutureviewtimecell'"; echo ">";
				              echo "&nbsp";
					          echo date('m/d/Y', strtotime($row['DATE_TIME']));
				              echo "&nbsp";
		                  echo "</td>" ;
					      echo "<td class='"; echo "jobtablefutureviewdeliverycell'"; echo ">";
				              echo "&nbsp";
					          echo $row['DELIVERY_SPREAD'];
				              echo "&nbsp";
		                  echo "</td>" ;
					      echo "<td class='"; echo "jobtablefutureviewweightcell'"; echo ">";
				              echo "&nbsp";
					          echo $row['WEIGHT'];
				              echo "&nbsp";
		                  echo "</td>" ;
  				          echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				            echo $row['JOB_NUMBER'];
		                  echo "</td>" ;
  				    	  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				            echo $row['AUTOMATIC_NUMBER'];
		                  echo "</td>" ;
				    	echo "</tr>";
				        echo "<tr class='jobtablerow'>" ;
				    	  echo "<td class='"; echo "jobtablefutureviewnotecell'"; echo " colspan='11'>";
				      	    if ($row['CANCELLED'] == 'yes') {
				    	        echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
				    			echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
				    			echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
				    			echo "Cancelled Cancelled Cancelled";
                                echo "<img src='cancel.png' alt='yes' height='15' width='20'>";	
                                echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
                                echo "<img src='cancel.png' alt='yes' height='15' width='20'>";							
				                echo "&nbsp";
				    	  	} elseif ($row['TENTITIVE'] == 'yes') {
				    		    echo "***Tentitive Tentitive Tentitive ***"; 
				    	        echo "&nbsp";
				    		}
				            echo "&nbsp";
				            echo $row['PHONE1'];
				    	    echo "&nbsp";
				            echo $row['PHONE2'];
				    	    echo "&nbsp";
				            echo $row['DAY_NOTE'];
				    	    echo "&nbsp";
				    		echo $row['NOTE'];
		                  echo "</td>";
						echo "</tr>";

				        $i++;
                    }// endwhile loop
				} else {
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
							if ($calendar_view == 'searchviewaddress') {
				                echo "&nbsp";
  				                echo $row['ORIGIN_CITY_STATE_ZIP'];
							}
		                  echo "</td>";
		                  echo "<td class='"; echo "jobtablespacecell22'"; echo ">";
				            echo "&nbsp";
		                  echo "</td>";
				    	  if ($calendar_view == 'searchviewaddress') {
				    	      echo "<td class='"; echo "jobtablephonecell2'"; echo ">";
				    		    echo $row['DESTINATION_INFO1'];
				                echo "&nbsp";
  				                echo $row['DESTINATION_CITY_STATE_ZIP'];
		                      echo "</td>";
                          } else {
		                    echo "<td class='"; echo "jobtablephonecell'"; echo ">";
				    		  echo $row['PHONE1'];
		                    echo "</td>";
				    	  }
		                  echo "<td class='"; echo "jobtablespacecell33'"; echo ">";
				            echo "&nbsp";
		                  echo "</td>";
				    	  if ($calendar_view == 'searchviewaddress') {
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
				    	        echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
				    			echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
				    			echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
				    			echo "Cancelled Cancelled Cancelled";
                                echo "<img src='cancel.png' alt='yes' height='15' width='20'>";	
                                echo "<img src='cancel.png' alt='yes' height='15' width='20'>";
                                echo "<img src='cancel.png' alt='yes' height='15' width='20'>";							
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
     			    	  echo "<td class='jobtabletimecell3'>" ;
				    	    if ($row['CANCELLED'] == 'yes') {
				    	        echo "<img src='cancel.png' alt='yes' height='15' width='20'>"; echo "Cancelled"; 
				    	    } elseif ($row['TENTITIVE'] == 'yes') {
				    	        echo "Tentitive";
				    	    } elseif ($row['NAME1'] == 'NO MORE WORK!!!') {
				    	        echo "<img src='stop.png' alt='yes' height='15' width='20'>";
				    	        echo "<img src='stop.png' alt='yes' height='15' width='20'>";
				    	        echo "<img src='stop.png' alt='yes' height='15' width='20'>";
				    	        echo "<img src='stop.png' alt='yes' height='15' width='20'>";
				    	    } 
                            echo "&nbsp";
		                  echo "</td>" ;
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
  				    	  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				            echo $row['JOB_NUMBER'];
		                  echo "</td>" ;
  				    	  echo "<td class='"; echo "jobtablecolhidden'"; echo ">";
				            echo $row['AUTOMATIC_NUMBER'];
		                  echo "</td>";
                        echo "</tr>";
				        $i++;
                    }// endwhile loop
				}
		      ?>
              </tbody>			
    	    </table>	   
		  </div>
	    </div> 
	  </div><!--
 --></div>	
    <div id='noteformcontainer'>
	  <?php
        $form_table = "noteform";
      ?>	
      <form id='noteform' action='kingnoteformpost.php' autocomplete='off' method='post'>
        <div class='variables'>
		  <input type='text' id='<?php echo $form_table; ?>calendarid' name='<?php echo $form_table; ?>calendarid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value=''>
          <input type='text' id='<?php echo $form_table; ?>noteid' name='<?php echo $form_table; ?>noteid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>sentbyemployeeid' name='<?php echo $form_table; ?>sentbyemployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>employeeidnoteisfor' name='<?php echo $form_table; ?>employeeidnoteisfor' value=''>
		  <input type='text' id='<?php echo $form_table; ?>employeenamenoteisfor' name='<?php echo $form_table; ?>employeenamenoteisfor' value=''>
		  <input type='text' id='<?php echo $form_table; ?>action' name='<?php echo $form_table; ?>action' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendarview' name='<?php echo $form_table; ?>calendarview' value='<?php echo $calendar_view; ?>'>
  		  <input type='text' id='<?php echo $form_table; ?>noteview' name='<?php echo $form_table; ?>noteview' value='<?php echo $note_view; ?>'>
 		  <input type='text' id='<?php echo $form_table; ?>employeeinitials' name='<?php echo $form_table; ?>employeeinitials' value='<?php echo $employee_initials; ?>'>
	    </div>
      
	    <div class='mainboxdiv'>
	      <div id='<?php echo $form_table; ?>boxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
		      <div class='<?php echo $form_table; ?>header'>
		        Note 
              </div>
		    </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
                Time Stamp
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='text' id ='<?php echo $form_table; ?>datetime' name='<?php echo $form_table; ?>datetime' size='20' maxlength='20' value=''>
	          </div>
		    </div>
 	        <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Note Written By
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '1' class='<?php echo $form_table; ?>' id='<?php echo $form_table; ?>1' name='<?php echo $form_table; ?>sentbyemployeename' size='50' maxlength='100' value=''>
              </div>
      	    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='noteformfieldnamecol1'>
                Note
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		        <textarea tabindex = '2' class='<?php echo $form_table; ?>' id='<?php echo $form_table; ?>2' name='<?php echo $form_table; ?>note' cols=100 rows=10></textarea>
		      </div>
		    </div>
    	    <div class='<?php echo $form_table; ?>fieldrow'>
              <div id='<?php echo $form_table; ?>employeebuttons'>
                <?php			  
	    		  include "databaseconnect.php";
                  if (mysqli_connect_errno($con)) {
                      echo "Failed to connect to MySQL: " . die();
                  }
                  $result = mysqli_query($con, "SELECT * FROM employee_names WHERE employee_names.CALENDAR_USER = 'Y' ORDER BY employee_names.CALENDAR_USER ASC");
	              $numberOfRows = mysqli_num_rows($result) ;
                  mysqli_close($con); 
                  $i = 0 ;
		
                  while ($i < $numberOfRows) {
                      $row = mysqli_fetch_array($result);
		              $employee_id = $row['EMPLOYEE_ID'];
		              echo "<button type='button' class='$form_table"; echo "employee' value='$employee_id'>" ;
		              echo $row['EMPLOYEE_NAME'];
		              echo "</button>";
					  echo "<input type='hidden' name='"; echo $form_table; echo "checkbox"; echo $employee_id; echo "' value='0'>";
					  echo "<input type='checkbox' id='"; echo $form_table; echo "checkbox"; echo $employee_id; echo "' name='"; echo $form_table; echo "checkbox"; echo $employee_id; echo "' value='1'>";
                      echo "   ";
					  $i++;
                  } // endwhile loop
                ?>
 		      </div>
              <?php			  
                $form_table_button_add = 'no';
                $form_table_button_view = 'no';
                $form_table_button_select = 'no';
                $form_table_button_remove = 'no';
                $form_table_button_done = 'yes'; // must keep this yes for updating note
                $form_table_button_cancel = 'yes';
                $form_table_button_print = 'yes';
                $form_table_button_sum_total = 'no';
                $form_table_button_continue = 'no';
			  ?>
              <div class='<?php echo $form_table; ?>savecancelbutton'>
			    <br>
                <?php include "kingbutton.php"; ?>
	          </div>
 	        </div>
          </div> <!-- end boxdiv -->
        </div> <!-- end mainboxdiv -->
      </form>
    </div>
	<div id='jobaddformcontainer'>
	  <?php
        $form_table = "jobaddform";
      ?>	
      <form id='jobaddform' action='kingjobtableform.php' autocomplete='off' method='post'>
        <div class='variables'>
		  <input type='text' id='<?php echo $form_table; ?>calendarid' name='<?php echo $form_table; ?>calendarid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value=''>
          <input type='text' id='<?php echo $form_table; ?>automaticnumber' name='<?php echo $form_table; ?>automaticnumber' value=''>-->
		  <input type='text' id='<?php echo $form_table; ?>enteredbyemployeeid' name='<?php echo $form_table; ?>enteredbyemployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>enteredbyemployeename' name='<?php echo $form_table; ?>enteredbyemployeename' value=''>
		  <input type='text' id='<?php echo $form_table; ?>jobnumber' name='<?php echo $form_table; ?>jobnumber' value=''>
		  <input type='text' id='<?php echo $form_table; ?>action' name='<?php echo $form_table; ?>action' value = ''>
		  <input type='text' id='<?php echo $form_table; ?>calendarview' name='<?php echo $form_table; ?>calendarview' value='<?php echo $calendar_view; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>noteview' name='<?php echo $form_table; ?>noteview' value='<?php echo $note_view; ?>'>
		  <input type='text' id='<?php echo $form_table; ?>searchfield' name='<?php echo $form_table; ?>searchfield' value='<?php echo $search_field; ?>'>
 		  <input type='text' id='<?php echo $form_table; ?>employeeinitials' name='<?php echo $form_table; ?>employeeinitials' value='<?php echo $employee_initials; ?>'>
	    </div>
	    <div class='mainboxdiv'>
	      <div id='<?php echo $form_table; ?>boxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
		      <div class='<?php echo $form_table; ?>header'>
    	        Job Type   
              </div>
		    </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
 			    <label for='Driver' class='<?php echo $form_table; ?>jobtypelabel'>Driver</label>              		      
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>driver' name='<?php echo $form_table; ?>jobtype' value='Driver'>
	          </div>
		    </div>
 	        <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
			    <label for='Local' class='<?php echo $form_table; ?>jobtypelabel'>Local</label>
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>local' name='<?php echo $form_table; ?>jobtype' value='Local'>
              </div>
      	    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
			    <label for='Interstate' class='<?php echo $form_table; ?>jobtypelabel'>Interstate</label>
    	      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>interstate' name='<?php echo $form_table; ?>jobtype' value='Interstate'>
                ( Moving out of Montana )
			  </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
 			    <label for='International' class='<?php echo $form_table; ?>jobtypelabel'>International</label>              		      
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>international' name='<?php echo $form_table; ?>jobtype' value='International'>
				( Moving out of USA )
              </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
 			    <label for='Intrastate' class='<?php echo $form_table; ?>jobtypelabel'>Intrastate</label>              		      
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>intrastate' name='<?php echo $form_table; ?>jobtype' value='Intrastate'>
				( Moving in Montana )
              </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
 			    <label for='Non Income' class='<?php echo $form_table; ?>jobtypelabel'>Non Income</label>              		      
            </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>nonincome' name='<?php echo $form_table; ?>jobtype' value='Non Income'>
              </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
 			    <label for='Other' class='<?php echo $form_table; ?>jobtypelabel'>Other</label>              		      
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>other' name='<?php echo $form_table; ?>jobtype' value='Other'>
              </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
 			    <label for='Third Party' class='<?php echo $form_table; ?>jobtypelabel'>Third Party</label>              		      
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>thirdparty' name='<?php echo $form_table; ?>jobtype' value='Third Party'>
				( Crating, Debris Pickup etc )
              </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
 			    <label for='Warehouse' class='<?php echo $form_table; ?>jobtypelabel'>Warehouse</label>              		      
            </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>warehouse' name='<?php echo $form_table; ?>jobtype' value='Warehouse'>
              </div>
		    </div>
			<?php
              $form_table_button_add = 'no';
              $form_table_button_view = 'no';
              $form_table_button_select = 'no';
              $form_table_button_remove = 'no';
              $form_table_button_done = 'no';
              $form_table_button_cancel = 'yes';
              $form_table_button_print = 'no';
              $form_table_button_sum_total = 'no';
			  $form_table_button_continue = 'no';
            ?>
    	    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>savecancelbutton'>
                <?php include "kingbutton.php"; ?>
		      </div>
		    </div>
          </div> <!-- end boxdiv -->
		  <?php
		    $form_table = "jobaddformbooking";
		  ?>
		  <div id='<?php echo $form_table; ?>container'>
			<br>
            <div class='<?php echo $form_table; ?>fieldrow'>
		      <div class='<?php echo $form_table; ?>header'>
		        Booking and Hauling Info    
              </div>
		    </div>
			<br>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
			    <label for='<?php echo $form_table; ?>kingbooking' class='<?php echo $form_table; ?>jobtypelabel'>King Booking</label>  
 		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>kingbooking' name='<?php echo $form_table; ?>booking' value='King' checked='checked'>
	          </div>
		    </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
			    <label for='<?php echo $form_table; ?>otheragentbooking' class='<?php echo $form_table; ?>jobtypelabel'>Other Agent Booking</label>  
 	          </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		        <input type='radio' id ='<?php echo $form_table; ?>otheragentbooking' name='<?php echo $form_table; ?>booking' value='Other'>
	          </div>
		    </div>
			<br>
			<hr size='7'>
			<br>
 	        <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
			    <label for='<?php echo $form_table; ?>kinghauling' class='<?php echo $form_table; ?>jobtypelabel'>King Hauling</label>  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>kinghauling' name='<?php echo $form_table; ?>hauling' value='King'  checked='checked'>
              </div>
      	    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
			    <label for='<?php echo $form_table; ?>otheragenthauling' class='<?php echo $form_table; ?>jobtypelabel'>Other Agent Hauling</label>  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>otheragenthauling' name='<?php echo $form_table; ?>hauling' value='Other'>
			  </div>
		    </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
			    <label for='<?php echo $form_table; ?>notassigned' class='<?php echo $form_table; ?>jobtypelabel'>Pending</label>  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		  	    <input type='radio' id ='<?php echo $form_table; ?>notassigned' name='<?php echo $form_table; ?>hauling' value='Pending'>
              </div>
		    </div>
			<br>
			<?php
              $form_table_button_add = 'no';
              $form_table_button_view = 'no';
              $form_table_button_select = 'no';
              $form_table_button_remove = 'no';
              $form_table_button_done = 'no';
              $form_table_button_cancel = 'yes';
              $form_table_button_print = 'no';
              $form_table_button_sum_total = 'no';
			  $form_table_button_continue = 'yes';
            ?>
    	    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>savecancelbutton'>
                <?php include "kingbutton.php"; ?>
		      </div>
		    </div>
          </div> <!-- end bookingcontainer -->
        </div> <!-- end mainboxdiv -->
      </form>
    </div>
  </div> <!-- end of container div -->
  <div id='rightclickfieldrow'>
    <div id='rightclickmenu'>
      <div class='rightclickcol' id='jobprintbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='jobprintbutton'><img src='print.png' alt='print' height='20' width='20'> Print Face Page</button>
	  </div>
      <div class='rightclickcol' id='localjobprintbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='localjobprintbutton'><img src='print.png' alt='print' height='20' width='20'> Print Local Ticket</button>
	  </div>
      <div class='rightclickcol' id='calendarbuttonmenu'>
         &nbsp <button class='rightclickbutton' id='calendarbutton'><img src='calendar.png' alt='calendar' height='20' width='20'> Calendar View</button>
	  </div>
      <div class='rightclickcol' id='noworkbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='noworkbutton'><img src='canceljob.png' alt='no more work' height='20' width='20'> No More Work!</button>
	  </div>
      <div class='rightclickcol' id='canceljobbuttonmenu'>
         &nbsp <button class='rightclickbutton' id='canceljobbutton'><img src='cancel.png' alt='cancel' height='20' width='20'> Cancel Job</button>
	  </div>
      <div class='rightclickcol' id='copybuttonmenu'>
        &nbsp <button class='rightclickbutton' id='copybutton'><img src='copy.png' alt='copy' height='20' width='20'> Copy</button>
	  </div>
      <div class='rightclickcol' id='cutbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='cutbutton'><img src='cut.png' alt='cut' height='20' width='20'> Cut</button>
	  </div>
      <div class='rightclickcol' id='deletedayjobbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='deletedayjobbutton'><img src='delete.png' alt='delete' height='20' width='20'> Delete Job Day</button>
	  </div>
      <div class='rightclickcol' id='deletetotaljobbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='deletetotaljobbutton'><img src='delete.png' alt='delete' height='20' width='20'> Delete Total Job</button>
	  </div>
      <div class='rightclickcol' id='pasteasnewbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='pasteasnewbutton'><img src='paste.png' alt='paste as new' height='20' width='20'> Paste as New</button>
	  </div>
      <div class='rightclickcol' id='pasteasupdatebuttonmenu'>
        &nbsp <button class='rightclickbutton' id='pasteasupdatebutton'><img src='paste.png' alt='paste as update' height='20' width='20'> Paste as Update</button>
	  </div>
      <div class='rightclickcol' id='undeletedayjobbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='undeletedayjobbutton'><img src='delete.png' alt='delete' height='20' width='20'> Undelete Job Day</button>
	  </div>
      <div class='rightclickcol' id='undeletetotaljobbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='undeletetotaljobbutton'><img src='delete.png' alt='delete' height='20' width='20'> Undelete Total Job</button>
	  </div>
      <div class='rightclickcol' id='backbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='backbutton'><img src='back.png' alt='back' height='20' width='20'> Back</button>
	  </div>
    </div>
  </div>
  <div id='searchfieldrow'>
    <div id='searchbuttonwindow'>
      <form id='searchform' action='kingcalendar.php' autocomplete='off' method='post'>
        <div class='searchfieldrow'>
          <input tabindex='1' type='text' id='searchfieldinput' name='searchformfield1' size='25' value=''>
        </div>
        <div class='searchfieldrow'>
          <input type='button' class='menubutton' id='searchfieldnamebutton' value='Search Name/Company Name '> 		
          <input type='button' class='menubutton' id='searchfielddatebutton' value='Search Date 00/00/0000'> 		
          <input type='button' class='menubutton' id='searchfieldaddressbutton' value='Search Addresses'> 		
          <input type='button' class='menubutton' id='searchfieldjobcoordinatornotebutton' value='Search Job Notes/Coordinator Notes'> 		
          <input type='button' class='menubutton' id='searchfielddaynotebutton' value='Search Day Notes'> 		
        </div>
	  </form>
    </div>
  </div>
  <div id='notetablesearchfieldrow'>
    <div id='notetablesearchbuttonwindow'>
      <form id='notetablesearchform' action='kingcalendar.php' autocomplete='off' method='post'>
        <div class='notetablesearchfieldrow'>
          <input tabindex='1' type='text' id='notetablesearchfieldinput' name='notetablesearchformfield1' size='25' value=''>
        </div>
        <div class='notetablesearchfieldrow'>
          <input type='button' class='menubutton' id='notetablesearchfieldreceivedbutton' value='Search Received Notes '> 		
          <input type='button' class='menubutton' id='notetablesearchfieldsentbutton' value='Search Sent Notes'> 		
          <input type='button' class='menubutton' id='notetablesearchfielddatereceivedbutton' value='Search By Received Date'> 		
          <input type='button' class='menubutton' id='notetablesearchfielddatesentbutton' value='Search By Sent Date'> 		
        </div>
	  </form>
    </div>
  </div>
  
</body>  
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>
  <script src="./scripts/kingcalendarinit.js" type="text/javascript"></script>
</html>



