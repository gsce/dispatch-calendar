<?php
    if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
        ob_start("ob_gzhandler");
    else
        ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title> King Calendar </title>
  <link rel="stylesheet" type="text/css" href="./css/kingjobdatetableform.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
</head>
<?php
  $job_number = $_GET['jobnumber'];
  $calendar_id = $_GET['jobformcalendarid'];
  $calendar_employee_id = $_GET['jobformcalendaremployeeid'];
  $calendar_employee_name = $_GET['jobformcalendaremployeename'];
  $calendar_date_holder = $_GET['jobformcalendardateholder'];
  $action = trim($_GET['jobformaction']);
  $day_type = '-- Select --';
  $form_table = "jobformdatetable";
  $automatic_number = trim($_GET['jobautomaticnumber']);
  $employee_initials = trim($_GET['jobformemployeeinitials']);
  date_default_timezone_set('America/Denver');
?>
<body id='body'>
  <div class='container'>
    <div id='popup'>
	</div>
    <div class='variables'>
	<?php
      include "defaultdatabaseconnect.php";
      echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
	?>
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
    <div id='<?php echo $form_table; ?>box'>
	  <table id='<?php echo $form_table; ?>'>
		<tr>
	      <th class='<?php echo $form_table; ?>jobdaytypecell1'>
            <button id='<?php echo $form_table; ?>add'>
              Calendar View
            </button>
		  </th>
          <th class='<?php echo $form_table; ?>daynamecell'>
            Day 
		  </th>
          <th class='<?php echo $form_table; ?>datecell'>
            Job Date
	      </th>
	      <th class='<?php echo $form_table; ?>starttimecell'>
		    Start Time
		  </th>
	      <th class='<?php echo $form_table; ?>weightcell'>
		    Weight
		  </th>
	      <th class='<?php echo $form_table; ?>jobhourscell'>
		    Job Hours
		  </th>
	      <th class='<?php echo $form_table; ?>numberofmencell'>
		    # Men
          </th>
	      <th class='<?php echo $form_table; ?>drivercell'>
		    Driver
          </th>
	      <th class='<?php echo $form_table; ?>namesofmencell'>
		    Helpers
          </th>
	      <th class='<?php echo $form_table; ?>drivernumbercell'>
		    Driver ID
          </th>
	      <th class='<?php echo $form_table; ?>trucknumbercell'>
		    Truck #
          </th>
	      <th class='<?php echo $form_table; ?>trailernumbercell'>
		    Trailer #
          </th>
	    </tr>
		<tbody id='<?php echo $form_table; ?>body'>
		<?php
    	  include "databaseconnect.php";
          if (mysqli_connect_errno($con)) {
              echo "Failed to connect to MySQL: " . die();
          }
          $result = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.JOB_NUMBER = '$job_number' AND job_date.`CALENDAR_ID` = '$calendar_id' ORDER BY job_date.DATE_TIME ASC"); 
		  $numberOfRows = mysqli_num_rows($result) ;
          mysqli_close($con); 
          $i = 0 ;
          while ($i < $numberOfRows) {
              $row = mysqli_fetch_array($result);
		      echo "<tr class='"; echo $form_table; echo "row'>" ;
		        echo "<td class='"; echo $form_table; echo "jobdaytypecell'>" ;
		          echo $row['JOB_DAY_TYPE'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "daynamecell'>" ;
		          echo trim(date('D', strtotime($row['DATE_TIME'])));
		        echo "</td>" ;
		  	    echo "<td class='"; echo $form_table; echo "datecell'>" ;
		  		  echo date_format(date_create($row['DATE']),'m/d/Y') ;
		        echo "</td>" ;
		  		echo "<td class='"; echo $form_table; echo "starttimecell'>" ;
		  		  echo date('h:i a', strtotime($row['DATE_TIME'])) ;
		        echo "</td>" ;
		  		echo "<td class='"; echo $form_table; echo "weightcell'>" ;
				  if ($row['DAY_WEIGHT'] != 0) {
		  		      echo $row['DAY_WEIGHT'] ;
				  } else {
				      echo " ";
				  }
		        echo "</td>" ;
		  		echo "<td class='"; echo $form_table; echo "jobhourscell'>" ;
		  		  echo $row['JOB_HOURS'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "numberofmencell'>" ;
				  if ($row['NUMBER_OF_MEN'] != 0) {
		  	          echo $row['NUMBER_OF_MEN'] ;
				  } else {
				      echo " ";
				  }
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "drivercell'>" ;
		  	      echo $row['DRIVER'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "namesofmencell'>" ;
		  	      echo $row['NAMES_OF_MEN'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "drivernumbercell'>" ;
		  	      echo $row['DRIVER_NUMBER'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "trucknumbercell'>" ;
		  	      echo $row['TRUCK_NUMBER'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "trailernumbercell'>" ;
		  	      echo $row['TRAILER_NUMBER'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "colhidden'>" ;
		  	      echo $row['CALENDAR_ID'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "colhidden'>" ;
		  	      echo $row['CALENDAR_NAME'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "colhidden'>" ;
		  	      echo $row['JOB_NUMBER'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "colhidden'>" ;
		  	      echo $row['AUTOMATIC_NUMBER'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "colhidden'>" ;
		  	      echo $row['DAY_NOTE'] ;
		        echo "</td>" ;
		        echo "<td class='"; echo $form_table; echo "colhidden'>" ;
		  	      echo $row['NUMBER_OF_DAYS'] ;
		        echo "</td>" ;
              echo "</tr>";
			  echo "<tr class='"; echo $form_table; echo "row'>";
		        echo "<td class='"; echo $form_table; echo "daynoterow'>" ;
		          echo $row['NUMBER_OF_DAYS'] ;
				  echo "&nbsp"; // This is needed to keep the second note row appearing when there is no note!!!
				echo "</td>";
			    echo "<td class='"; echo $form_table; echo "daynoterow' colspan='11'>" ;
		  	      echo $row['DAY_NOTE'];
		        echo "</td>" ;
              echo "</tr>";
		  	  $i++;
          }// endwhile loop
        ?>
        </tbody>			
      </table>
    </div>
	<div id='jobdateformcontainer'>
	  <?php
        $form_table = "jobdateform";
      ?>	
      <form id='<?php echo $form_table; ?>' action='kingjobdatetableformpost.php' target='_self' autocomplete='off' method='post'>
        <div class='variables'>
		  <input type='text' id='<?php echo $form_table; ?>calendarid' name='<?php echo $form_table; ?>calendarid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value=''>
		  <input type='text' id='<?php echo $form_table; ?>action' name='<?php echo $form_table; ?>action' value = ''>
	  	  <input type='text' id='whereupdated' name='whereupdated' value = '<?php echo $action; ?>'>
	      <input type='text' id='<?php echo $form_table; ?>calendarnumber' name='<?php echo $form_table; ?>calendarnumber' value = ''>
  	      <input type='text' id='<?php echo $form_table; ?>jobnumber' name='<?php echo $form_table; ?>jobnumber' value = '<?php echo $job_number; ?>'>
 	      <input type='text' id='<?php echo $form_table; ?>automaticnumber' name='<?php echo $form_table; ?>automaticnumber' value = ''>
 	      <input type='text' id='<?php echo $form_table; ?>jobautomaticnumber' name='<?php echo $form_table; ?>jobautomaticnumber' value = '<?php echo $automatic_number; ?>'>
 	      <input type='text' id='<?php echo $form_table; ?>employeeinitials' name='<?php echo $form_table; ?>employeeinitials' value = '<?php echo $employee_initials; ?>'>
 	      <input type='text' id='<?php echo $form_table; ?>startdate' name='<?php echo $form_table; ?>startdate' value = ''>
	      <input type='text' id='jobdateformsaturday' name='jobdateformsaturday' value = ''>
	      <input type='text' id='jobdateformsunday' name='jobdateformsunday' value = ''>
	    </div>
	    <div id='mainboxdiv'>
	      <div id='<?php echo $form_table; ?>topboxdiv'>
		    <div class='<?php echo $form_table; ?>header' id='<?php echo $form_table; ?>header'>

			</div>
 		  </div>
	      <div id='<?php echo $form_table; ?>leftboxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Calendar
		      </div>
			  <?php
			  	include "databaseconnect.php";
                if (mysqli_connect_errno($con)) {
                    echo "Failed to connect to MySQL: " . die();
                }
                $result = mysqli_query($con, "SELECT * FROM calendar WHERE 1 ORDER BY CALENDAR_NAME ASC");
	            $numberOfRows = mysqli_num_rows($result) ;
                mysqli_close($con); 
			  ?>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
	  		    <select tabindex='1' name='<?php echo $form_table; ?>calendarname'>
				<?php
                  $i = 0 ;
		          while ($i < $numberOfRows)
                  {
                      $row = mysqli_fetch_array($result);
		              $calendar_name = $row['CALENDAR_NAME'];
				?>	  
		  	          <option value='<?php echo $calendar_name; ?>'> <?php echo $calendar_name ?> </option>
		        <?php
 				      $i++;
                  } // endwhile loop
	            ?>
			    </select>	
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Job Desc
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
	  		    <select tabindex='2' name='<?php echo $form_table; ?>daytype'>
		  	      <option <?php if ($day_type == '-- Select --') echo "selected"; ?> value='-- Select --'> -- Select -- </option>
		  	      <option <?php if ($day_type == 'Pack') echo "selected"; ?> value='Pack'> Pack </option>
		  	      <option <?php if ($day_type == 'Pack/Load') echo "selected"; ?> value='Pack/Load'> Pack/Load </option>
		  	      <option <?php if ($day_type == 'Load') echo "selected"; ?> value='Load'> Load </option>
		  	      <option <?php if ($day_type == 'Load/Unload') echo "selected"; ?> value='Load/Unload'> Load/Unload </option>
		  	      <option <?php if ($day_type == 'Unload') echo "selected"; ?> value='Unload'> Unload </option>
		  	      <option <?php if ($day_type == 'Crating') echo "selected"; ?> value='Crating'> Crating </option>
		  	      <option <?php if ($day_type == 'Stge In') echo "selected"; ?> value='Storage In'> Storage In </option>
		  	      <option <?php if ($day_type == 'Stge Out') echo "selected"; ?> value='Storage Out'> Storage Out </option>
		  	      <option <?php if ($day_type == 'G11') echo "selected"; ?> value='G11'> G11 </option>
		  	      <!-- <option <?php if ($day_type == 'Debris Pickup') echo "selected"; ?> value='Debris Pickup'> Debris Pickup </option>-->
		  	      <option <?php if ($day_type == 'Warehouse') echo "selected"; ?> value='Warehouse'> Warehouse </option>
		  	      <option <?php if ($day_type == 'Other') echo "selected"; ?> value='Other'> Other </option>
		  	      <option <?php if ($day_type == 'No More Work!') echo "selected"; ?> value='No More Work!'> No More Work! </option>
		  	      <option <?php if ($day_type == 'Estimate') echo "selected"; ?> value='Estimate'> Estimate </option>
		  	      <!--<option <?php if ($day_type == 'Deleted') echo "selected"; ?> value='Deleted'> Deleted </option>-->
			    </select>	
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow' id='<?php echo $form_table; ?>numberofdaysrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            No. Days 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '3' id='<?php echo $form_table; ?>numberofdays' name='<?php echo $form_table; ?>numberofdays' size='6' maxlength='6' value=''>
               </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Job Date
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '4' id='<?php echo $form_table; ?>datefield' name='<?php echo $form_table; ?>jobdate' size='10' maxlength='10' value='' readonly>
				<span id='calendaricon'><img src='calendar.png' alt='calendar' height='24' width='24'></span>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Time
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
	  		    <select tabindex='5' name='<?php echo $form_table ?>jobtime'>
				  <?php 
                    $hour_min = "0:00";
					$job_time = "08:00 am";
				    $i = 0;
					$ii = 12;
				    while ($i < $ii) {
					    if ($i == 0) {
					       $hour_min = "12:"."00 am";
					    } elseif ($i < 10) {
					       $hour_min = "0".$i.":"."00 am";
                        } else {
					       $hour_min = $i.":"."00 am";
                        }	
                        ?>						
		  	            <option <?php if ($job_time == $hour_min) echo "selected"; ?> value='<?php echo $hour_min; ?>'> <?php echo $hour_min; ?> </option)>
					    <?php
					    if ($i == 0) {
					       $hour_min = "12:"."30 am";
					    } elseif ($i < 10) {
					       $hour_min = "0".$i.":"."30 am";
                        } else {
					       $hour_min = $i.":"."30 am";
                        }						
                        ?>						
		  	            <option name='<?php echo $form_table ?>datetime' id ='<?php echo $form_table ?>jobtime' <?php if ($job_time == $hour_min) echo "selected"; ?> value='<?php echo $hour_min; ?>'> <?php echo $hour_min; ?> </option)>
					    <?php
                        $i++;
                    }
                    $hour_min = "0:00";
				    $i = 0;
					$ii = 12;
				    while ($i < $ii) {
					    if ($i == 0) {
					       $hour_min = "12:"."00 pm";
					    } elseif ($i < 10) {
					       $hour_min = "0".$i.":"."00 pm";
                        } else {
					       $hour_min = $i.":"."00 pm";
                        }	
                        ?>						
		  	            <option name='<?php echo $form_table ?>jobtime' id ='<?php echo $form_table ?>jobtime' <?php if ($job_time == $hour_min) echo "selected"; ?> value='<?php echo $hour_min; ?>'> <?php echo $hour_min; ?> </option)>
					    <?php
					    if ($i == 0) {
					       $hour_min = "12:"."30 pm";
					    } elseif ($i < 10) {
					       $hour_min = "0".$i.":"."30 pm";
                        } else {
					       $hour_min = $i.":"."30 pm";
                        }						
                        ?>						
		  	            <option name='<?php echo $form_table ?>datetime' id ='<?php echo $form_table ?>jobtime' <?php if ($job_time == $hour_min) echo "selected"; ?> value='<?php echo $hour_min; ?>'> <?php echo $hour_min; ?> </option)>
					    <?php
                        $i++;
                    }
                  ?>					
				</select>	
              </div>
			</div>
            <div class='<?php echo $form_table; ?>fieldrow' id='<?php echo $form_table; ?>repeatrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Repeat
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='number' tabindex = '6' id='<?php echo $form_table; ?>repeatdays' name='<?php echo $form_table; ?>repeatdays' min='1' value='1'>
				Sat
				<input type='checkbox' id='jobdateformsat' name='jobdateformsat' value='Sat'>
				Sun
                <input type='checkbox' id='jobdateformsun' name='jobdateformsun' value='Sun'> 
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
              <div class='<?php echo $form_table; ?>savecancelbutton'>
                <?php include "kingbutton.php"; ?>
		        <!--<button type='button' id='<?php echo $form_table;?>addanotherdate' value='Add Another Date'>Add Another Date</button>-->	
  	          </div>
            </div>
          </div>
   	      <div id='<?php echo $form_table; ?>center1boxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Weight 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '7' id='<?php echo $form_table; ?>7' name='<?php echo $form_table; ?>weight' size='6' maxlength='6' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Hours
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '8' id='<?php echo $form_table; ?>8' name='<?php echo $form_table; ?>jobhours' size='10' maxlength='10' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Rate
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex='9' id='<?php echo $form_table; ?>9' name='<?php echo $form_table; ?>rate' size='10' maxlength='10' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Cost 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex='10' id='<?php echo $form_table; ?>10' name='<?php echo $form_table; ?>cost' size='10' maxlength='10' value=''>
              </div>
            </div>
		  </div>
   	      <div id='<?php echo $form_table; ?>center2boxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Number Of Men  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex='11' id='<?php echo $form_table; ?>11' name='<?php echo $form_table; ?>numberofmen' size='3' maxlength='3' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Driver(s)
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '12' id='<?php echo $form_table; ?>12' name='<?php echo $form_table; ?>driver' size='25' maxlength='50' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Names of Help
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '13' id='<?php echo $form_table; ?>13' name='<?php echo $form_table; ?>namesofmen' size='55' maxlength='150' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Driver Number(s)
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '14' id='<?php echo $form_table; ?>14' name='<?php echo $form_table; ?>drivernumber' size='25' maxlength='25' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Truck Number(s) 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '15' id='<?php echo $form_table; ?>15' name='<?php echo $form_table; ?>trucknumber' size='25' maxlength='25' value=''>
              </div>
            </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
                Trailer Number(s)
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '16' id='<?php echo $form_table; ?>16' name='<?php echo $form_table; ?>trailernumber' size='25' maxlength='25' value=''>
		      </div>
		    </div>
		  </div>
   	      <div id='<?php echo $form_table; ?>rightboxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Day Note
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <textarea tabindex = '17' id='<?php echo $form_table; ?>17' name='<?php echo $form_table; ?>daynote' cols='30' rows='8' maxlength='1000' value=''></textarea>
			  </div>
			</div>  
          </div> <!-- end boxdiv -->
		  <!-- <div id='<?php echo $form_table; ?>bottomboxdiv'>
          </div> -->
        </div> <!-- end mainboxdiv -->
      </form>
    </div>
	<div id='popupcalendarbox'>
	  <?php 
      	include "databaseconnect.php";
        if (mysqli_connect_errno($con)) {
            echo "Failed to connect to MySQL: " . die();
        }
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
		      $day_of_week = 0;
              $day_date = date_create($calendar_date_holder);
              $day_date = date_sub($day_date, date_interval_create_from_date_string("30 days"));
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
                                $day_date = date_sub($day_date, date_interval_create_from_date_string("30 days"));
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
								$date_compare = date_format($day_date,'Y-m-d');
                                $result = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.JOB_NUMBER = '$job_number' and job_date.DATE = '$date_compare' ORDER BY job_date.DATE ASC"); 
		                        $numberOfRows = mysqli_num_rows($result) ;
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
	  	        				        echo "<input type='button' id='e"; echo $day_of_week; echo "e"; echo $count; echo "' class='variables'"; echo "value=''>";
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
		    while ($i < 90) {
		        $day_of_week = 0;
		  	    echo "<div>";
		          while ($day_of_week < 7) {
    	              $day_date = date_add($day_date, date_interval_create_from_date_string('1 days'));
					  $date_compare = date_format($day_date,'Y-m-d');
                      $result = mysqli_query($con, "SELECT * FROM job_date WHERE job_date.JOB_NUMBER = '$job_number' AND job_date.DATE = '$date_compare' AND job_date.`CALENDAR_ID` = $calendar_id ORDER BY job_date.DATE ASC"); 
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
								              echo "<input type='button' id='c"; echo $i; echo "c"; echo $count; echo "' class='"; echo $form_table; echo "daycellbuttonjob"; echo $count; echo "' value='"; echo $row['JOB_DAY_TYPE']; echo "&nbsp;"; echo $row['NUMBER_OF_DAYS']; echo "'>";
                                              echo "<input type='button' id='d"; echo $i; echo "d"; echo $count; echo "' class='variables'"; echo "value='"; echo date_format($day_date,'m/d/Y'); echo "'>";
	  	        				              echo "<input type='button' id='e"; echo $i; echo "e"; echo $count; echo "' class='variables'"; echo "value='"; echo $row['AUTOMATIC_NUMBER']; echo "'>";
											  echo "<br>";
										  } else {
										      echo "<input type='button' id='c"; echo $i; echo "c"; echo $count; echo "' class='"; echo $form_table; echo "daycellbutton'"; echo "value=''>";
								              echo "<input type='button' id='d"; echo $i; echo "d"; echo $count; echo "' class='variables'"; echo "value='"; echo date_format($day_date,'m/d/Y'); echo "'>";
	  	        				              echo "<input type='button' id='e"; echo $i; echo "e"; echo $count; echo "' class='variables'"; echo "value=''>";
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
    <iframe id='popupcalendariframe' src='http://<?php echo $default_ip_address; ?>kingpopupcalendar.php?jobnumber=<?php echo $job_number; ?>&jobformcalendarid=<?php echo $calendar_id; ?>&jobformcalendaremployeeid=<?php echo $calendar_employee_id; ?>&jobformcalendaremployeename=<?php echo $calendar_employee_name; ?>&jobformcalendardateholder=<?php echo $calendar_date_holder; ?>&jobautomaticnumber=<?php echo $automatic_number; ?>&jobformaction=<?php echo $action; ?>' sandbox='allow-same-origin allow-top-navigation allow-forms allow-scripts' >
    </iframe>			
  </div>
</body>
  <script src="./scripts/kingjobdatetableforminit.js" type="text/javascript"></script> 
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>
</html>