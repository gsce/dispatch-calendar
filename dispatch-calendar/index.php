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
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
  <script src="./scripts/index.js" type="text/javascript"></script>
</head>
<body id='body'>
  <div id='indexcontainer'>
    <div id='indexheader'>
	  <br>
	  <br>
      King Transfer and Storage 
	  <br>
	  Login Screen
	</div>
    <div id='indexbuttoncontainer'>
	<div class='variable'>
      <?php
        include "defaultdatabaseconnect.php";
        echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
        date_default_timezone_set('America/Denver');
	    $date = date_create();
        $day = date_format($date,'d');
        echo "<input type='button' id='calendarday' value='$day'>";
        $month = date_format($date,'m');
        echo "<input type='button' id='calendarmonth' value='$month'>";
        $year = date_format($date,'Y');
        echo "<input type='button' id='calendaryear' value='$year'>";
        $previous_month = date_format($date,'n') - 1;
        if ($previous_month < 0) {
            $previous_month = 1;
        }
        $previous_month_stamp = date_create("$year-$previous_month-$day");
        $previous_month_name = date_format($previous_month_stamp, 'M');
	    echo $previous_month_name;
	    echo date_format($date,'M');
	  ?>
	</div>
	<?php	
		include "databaseconnect.php";
        if (mysqli_connect_errno($con)) {
            echo "Failed to connect to MySQL: " . die();
        }
        $result = mysqli_query($con, "SELECT * FROM employee_names WHERE employee_names.CALENDAR_USER = 'Y' ORDER BY employee_names.EMPLOYEE_NAME ASC");
	    $numberOfRows = mysqli_num_rows($result) ;
        mysqli_close($con); 
        $i = 0 ;
        while ($i < $numberOfRows)
        {
          $row = mysqli_fetch_array($result);
		  $employee_id = $row['EMPLOYEE_ID'];
		  echo "<button class='employee' value='$i'>" ;
		  echo $row['EMPLOYEE_NAME'] ;
		  echo "</button>" ;
          echo "<input type='text' class='employeeid' id='employeeid"; echo "$i' value='$employee_id'>";
		  $default_calendar_id = $row['DEFAULT_CALENDAR'];
          echo "<input type='text' class='defaultcalendarid' id='defaultcalendarid"; echo "$i' value='$default_calendar_id'>";
		  echo $default_calendar_id;
		  $employee_initials = trim($row['EMPLOYEE_INITIALS']);
          echo "<input type='text' class='employeeinitials' id='employeeinitials"; echo "$i' value='$employee_initials'>";
          $i++;
        } // endwhile loop
	  ?>
	  <!--<div>
	    <input type='file' id = 'george' value='george.txt'>
	  </div>-->
    </div>
  </div> <!-- end of container div -->
</body> 
<script>
var a = document.getElementsByClassName('employee');
var b = document.getElementsByClassName('employee').length;
for (var i = 0; i < b; i++) {
    //alert(a[i]);
	a[i].addEventListener('click', function() {myFunction(this)});
}

function myFunction(e) {
	var i = e.value;
    var employeeId = document.getElementsByClassName('employeeid')[i].value;
	var employeeName = e.innerHTML;
	var calendarId = document.getElementsByClassName('defaultcalendarid')[i].value;
	var day = document.getElementById('calendarday').value;
	var month = document.getElementById('calendarmonth').value;
	var year = document.getElementById('calendaryear').value;
	var today = year + '/' + month + '/' + day ; 
	var employeeInitials = document.getElementsByClassName('employeeinitials')[i].value;
    // alert(today);
	var defaultIpAddress = document.getElementById('defaultipaddress').value;
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+today+'&calendaremployeeid='+employeeId+'&calendaremployeename='+employeeName+'&calendarid='+calendarId+'&calendarpastejobnumber=null&calendarview=dayview&calendarcopycut=null&noteview=receivedmessages&employeeinitials='+employeeInitials;

    window.location.replace(locationAction, "toolbar=no, menubar=no");
}
</script>
 
</html>