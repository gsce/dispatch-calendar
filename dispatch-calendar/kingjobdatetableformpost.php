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
    echo "<input type='text' id='postform' size='15' value='jobdateform'>";
    $action = trim($_POST['jobdateformaction']);
	
	$calendar_id = $_POST['jobdateformcalendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_POST['jobdateformcalendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_POST['jobdateformcalendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
 
	$calendar_date_holder = $_POST['jobdateformcalendardateholder'];
    echo "<input type='text' id='calendardateholder' value='$calendar_date_holder'>";
    echo "<input type='text' id='calendarview' value=''>"; // this needs to be here for the calendarObject.calendarView in kingpost.js file.
    echo "<input type='text' id='noteview' value=''>"; // this needs to be here for the calendarObject.noteView in kingpost.js file.

    $automatic_number = trim($_POST['jobdateformautomaticnumber']);
	$job_number = trim($_POST['jobdateformjobnumber']);
    echo "<input type='text' id='jobnumber' value='$job_number'>";

	$employee_initials = $_POST['jobdateformemployeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";

	$job_calendar_name = trim($_POST['jobdateformcalendarname']);
	$where_updated = trim($_POST['whereupdated']);
	echo "<input type='text' id='whereupdated' value='$where_updated'>";
  	include "databaseconnect.php";
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
    $result = mysqli_query($con, "SELECT * FROM calendar WHERE CALENDAR_NAME = '$job_calendar_name'");
	$numberOfRows = mysqli_num_rows($result) ;
    mysqli_close($con); 
    $i = 0 ;
    while ($i < $numberOfRows) {
        $row = mysqli_fetch_array($result);
		$job_calendar_id = $row['CALENDAR_ID'];
	    $i++;
	}
	$job_day_type = trim($_POST['jobdateformdaytype']);
	$job_number_of_days = trim($_POST['jobdateformnumberofdays']);
	$job_date = trim($_POST['jobdateformjobdate']);
	$job_date = date('Y-m-d', strtotime($job_date));
	$job_time = trim($_POST['jobdateformjobtime']);
	$job_date_time = $job_date.' '.$job_time;
	$job_date_time = date('Y-m-d H:i:s', strtotime($job_date_time));
	$weight = trim($_POST['jobdateformweight']);
	$job_hours = trim($_POST['jobdateformjobhours']);
	$rate = trim($_POST['jobdateformrate']);
	$cost = trim($_POST['jobdateformcost']);
	$number_of_men = trim($_POST['jobdateformnumberofmen']);
	$driver = trim($_POST['jobdateformdriver']);
	$driver_number = trim($_POST['jobdateformdrivernumber']);
	$names_of_men = trim($_POST['jobdateformnamesofmen']);
	$truck_number = trim($_POST['jobdateformtrucknumber']);
	$trailer_number = trim($_POST['jobdateformtrailernumber']);
	$day_note = trim($_POST['jobdateformdaynote']);
    if (isset($_POST['jobdateformrepeatdays'])) {
    	$repeat_days = trim($_POST['jobdateformrepeatdays']);
	} else {
	    $repdat_days = 1;
	}
	if (isset($_POST['jobdateformsat'])) {
	    $sat = trim($_POST['jobdateformsat']);
	} else {
    	$sat = 'no';	
	}
	if (isset($_POST['jobdateformsun'])) {
	    $sun = trim($_POST['jobdateformsun']);
	} else {
	    $sun = 'no';
	}
	$saturday = trim($_POST['jobdateformsaturday']);
	$sunday = trim($_POST['jobdateformsunday']);
//	$calendar_user = trim($_POST['jobdateformcalendaruser']);
    include "databaseconnect.php";	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
	
    if ($action === 'add') {
	    if ($repeat_days < 1) {
		    $repeat_days = 1;
		}
	    $i = 0;
		$d = date_create($job_date);
	    while ($i < $repeat_days) {
            $job_number_of_days = $i + 1;
			$job_number_of_days = $job_number_of_days.'/'.$repeat_days;
	        $stmt = mysqli_prepare($con, "INSERT INTO job_date (JOB_NUMBER, DATE, DATE_TIME, CALENDAR_ID, CALENDAR_NAME, ENTERED_BY, ENTERED_BY_ID, JOB_DAY_TYPE, JOB_HOURS, DAY_WEIGHT, RATE, COST, NUMBER_OF_MEN, NAMES_OF_MEN, DRIVER, DRIVER_NUMBER, TRUCK_NUMBER, TRAILER_NUMBER, DAY_NOTE, NUMBER_OF_DAYS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
            mysqli_stmt_bind_param($stmt, 'issississsssssssssss', $job_number, $job_date, $job_date_time, $job_calendar_id, $job_calendar_name, $calendar_employee_name, $calendar_employee_id, $job_day_type, $job_hours, $weight, $rate, $cost, $number_of_men, $names_of_men, $driver, $driver_number, $truck_number, $trailer_number, $day_note, $job_number_of_days); 
		
	        mysqli_stmt_execute($stmt);
            $d = date_add($d, date_interval_create_from_date_string('1 days'));
            $day_of_week_date_on = date_format($d,'w'); // this tells us what week day the day starts on
			if ($day_of_week_date_on == 6 && $sat == 'no') {
                $d = date_add($d, date_interval_create_from_date_string('1 days'));
		    } 
            $day_of_week_date_on = date_format($d,'w'); // this tells us what week day the day starts on
			if ($day_of_week_date_on == 0 && $sun =='no') {
                $d = date_add($d, date_interval_create_from_date_string('1 days'));
			} 
			$job_date = date_format($d,'Y-m-d');
			$job_date_time = $job_date.' '.$job_time;
        	$job_date_time = date('Y-m-d H:i:s', strtotime($job_date_time));
			$i += 1;
        }
        echo "1 record added";
	    echo $repeat_days;
 
	    mysqli_close($con);
		
	} elseif ($action==='update') {
	    
		if ($job_calendar_name == 'XDELETED') {
			$job_calendar_id = 3;
        }			
        $stmt = mysqli_prepare($con, "UPDATE job_date SET JOB_NUMBER = ?, DATE = ?, DATE_TIME = ?, CALENDAR_ID = ?, CALENDAR_NAME = ?,ENTERED_BY = ?, ENTERED_BY_ID = ?, JOB_DAY_TYPE = ?, JOB_HOURS = ?, DAY_WEIGHT = ?, RATE = ?, COST = ?, NUMBER_OF_MEN = ?, NAMES_OF_MEN = ?, DRIVER = ?, DRIVER_NUMBER = ?, TRUCK_NUMBER = ?, TRAILER_NUMBER = ?, DAY_NOTE = ?, NUMBER_OF_DAYS = ? WHERE AUTOMATIC_NUMBER = $automatic_number ORDER BY AUTOMATIC_NUMBER ASC");
    
		mysqli_stmt_bind_param($stmt, 'issississsssssssssss', $job_number, $job_date, $job_date_time, $job_calendar_id, $job_calendar_name, $calendar_employee_name, $calendar_employee_id, $job_day_type, $job_hours, $weight, $rate, $cost, $number_of_men, $names_of_men, $driver, $driver_number, $truck_number, $trailer_number, $day_note, $job_number_of_days); 
	    
		mysqli_stmt_execute($stmt);
		
		echo "1 record updated";
		
		mysqli_close($con);
    } elseif ($action==='move') {
	    $action = 'update';
	    $result = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.`JOB_NUMBER` = $job_number ORDER BY job_date.`DATE_TIME`");
        $number_of_rows = mysqli_num_rows($result) ;
		$i = 0;
		while ($i < 1) {
		    $row = mysqli_fetch_array($result);
			$job_number = $row['JOB_NUMBER'];
			$automatic_number = $row['AUTOMATIC_NUMBER'];
            $job_date = trim($_POST['jobdateformstartdate']);
	        $job_date = date('Y-m-d', strtotime($job_date));
			$job_time = date('H:i:s', strtotime($row['DATE_TIME']));
        	$job_date_time = $job_date.' '.$job_time;
	        $job_date_time = date('Y-m-d H:i:s', strtotime($job_date_time));
		    $d = date_create($job_date);
			$previous_record_date = date_create($row['DATE']);
            $stmt = mysqli_prepare($con, "UPDATE job_date SET DATE = ?, DATE_TIME = ? WHERE AUTOMATIC_NUMBER = $automatic_number ORDER BY AUTOMATIC_NUMBER ASC");
        	mysqli_stmt_bind_param($stmt, 'ss', $job_date, $job_date_time); 
		    mysqli_stmt_execute($stmt);
			$i += 1;
		}
		$i = 1;
		while ($i < $number_of_rows) {
		    $row = mysqli_fetch_array($result);
			$job_number = $row['JOB_NUMBER'];
			$automatic_number = $row['AUTOMATIC_NUMBER'];
            $current_record_date = date_create($row['DATE']);
			if ($current_record_date <> $previous_record_date) {
                $d = date_add($d, date_interval_create_from_date_string('1 days'));
                $day_of_week_date_on = date_format($d,'w'); // this tells us what week day the day starts on
			    if ($day_of_week_date_on == 6 && $saturday == 'no') {
                    $d = date_add($d, date_interval_create_from_date_string('1 days'));
		        } 
                $day_of_week_date_on = date_format($d,'w'); // this tells us what week day the day starts on
			    if ($day_of_week_date_on == 0 && $sunday =='no') {
                    $d = date_add($d, date_interval_create_from_date_string('1 days'));
			    }
            }				
			$job_time = date('H:i:s', strtotime($row['DATE_TIME']));
			$job_date = date_format($d,'Y-m-d');
			$job_date_time = $job_date.' '.$job_time;
        	$job_date_time = date('Y-m-d H:i:s', strtotime($job_date_time));
            $stmt = mysqli_prepare($con, "UPDATE job_date SET DATE = ?, DATE_TIME = ? WHERE AUTOMATIC_NUMBER = $automatic_number ORDER BY AUTOMATIC_NUMBER ASC");
        	mysqli_stmt_bind_param($stmt, 'ss', $job_date, $job_date_time); 
		    mysqli_stmt_execute($stmt);
			$previous_record_date = date_create($row['DATE']);
			$i += 1;
		}
		mysqli_close($con);
	} elseif ($action==='fixdayof') {
	    $action = 'update';
		$job_day_type = '';
	    $result = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.`JOB_NUMBER` = $job_number && job_date.`CALENDAR_ID` = $calendar_id ORDER BY job_date.`DATE_TIME`");
        $number_of_rows = mysqli_num_rows($result);
		$i = 0;
		while ($i < $number_of_rows) {
	        $row =  mysqli_fetch_array($result);
            if ($row['JOB_DAY_TYPE'] == $job_day_type) {
			    $job_day_type = $row['JOB_DAY_TYPE'];
			    $i += 1;
                continue;
            } else {
			    $job_day_type = $row['JOB_DAY_TYPE'];
 			    $result1 = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.`JOB_NUMBER` = $job_number && job_date.`JOB_DAY_TYPE` = '$job_day_type' && job_date.`CALENDAR_ID` = $calendar_id ORDER BY job_date.`DATE_TIME`");
                $number_of_rows1 = mysqli_num_rows($result1);
		        $ii = 0;
		        while ($ii < $number_of_rows1){
                    $job_number_of_days = $ii + 1;
		        	$job_number_of_days = $job_number_of_days.'/'.$number_of_rows1;
		        	$row1 = mysqli_fetch_array($result1);
		        	$automatic_number = $row1['AUTOMATIC_NUMBER'];
                    $stmt = mysqli_prepare($con, "UPDATE job_date SET NUMBER_OF_DAYS = ? WHERE AUTOMATIC_NUMBER = $automatic_number ORDER BY AUTOMATIC_NUMBER ASC");
                	mysqli_stmt_bind_param($stmt, 's', $job_number_of_days); 
		            mysqli_stmt_execute($stmt);
		            $ii += 1;
		        }
			}
			$i += 1;
		}
	}
    echo $action; 	
    ?>
  </body>
</html>