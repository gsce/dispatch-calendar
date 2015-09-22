<!DOCTYPE HTML>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Transfer </title>
  <script src="./scripts/kingpost.js" type="text/javascript"></script> 
</head>
<body id='body'>
  <?php
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    echo "<input type='text' id='postform' value='deletejob'>";
	
	$calendar_id = $_GET['calendarid'];
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	
	$calendar_employee_id = $_GET['calendaremployeeid'];
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";

	$calendar_employee_name = $_GET['calendaremployeename'];
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
 
	$calendar_date_holder = $_GET['calendardateholder'];
    echo "<input type='text' id='calendardateholder' value='$calendar_date_holder'>";
	
	$calendar_view = $_GET['calendarview'];
    echo "<input type='text' id='calendarview' value='$calendar_view'>";

	$note_view = $_GET['calendarnoteview'];
    echo "<input type='text' id='noteview' value='$note_view'>";

	$job_number = $_GET['calendarpastejobnumber'];
    echo "<input type='text' id='jobnumber' value='$job_number'>";

	$employee_initials = $_GET['employeeinitials'];
    echo "<input type='text' id='employeeinitials' value='$employee_initials'>";
	

    $automatic_number = trim($_GET['calendarpasteautomaticnumber']);
	
    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }
    $calendar_name = 'XDELETED';
	$calendar_id = 3;

    include "databaseconnect.php";	
	
	if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . die();
    }

	$stmt = mysqli_prepare($con, "UPDATE job_date SET CALENDAR_NAME = ?, CALENDAR_ID = ? WHERE AUTOMATIC_NUMBER = $automatic_number ORDER BY AUTOMATIC_NUMBER ASC");
    
	mysqli_stmt_bind_param($stmt, 'si', $calendar_name, $calendar_id); 
   
	mysqli_stmt_execute($stmt);

	$job_day_type = '';
	$result = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.`JOB_NUMBER` = $job_number && job_date.`CALENDAR_ID` = $calendar_id ORDER BY job_date.`DATE_TIME`");
    $number_of_rows = mysqli_num_rows($result);
	$calendar_id = 2;
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
	
	mysqli_close($con);
	$calendar_id = 3;
?>
</body>
</html>