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
  <link rel="stylesheet" type="text/css" href="./css/kingemployeetableform.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
</head>

<?php 
  //var_dump($_GET);

  $form_table = "employeetable";                                               // init name variable for formtable object in javascript
  echo "<div class='variables'>";
    include "defaultdatabaseconnect.php";
    echo "<input type='text' id='defaultipaddress' size='15' value='$default_ip_address'>";
    echo "<input type='button' id='globalaction' value='table'>";
    echo "<input type='button' id='action' value='view'>";
    echo "<input type='text' id='searchfield' autofocus autocomplete='off'>";
    echo "<input type='button' id='formtable' value='$form_table'>";
    echo "<input type='button' id='startitemfield' value='0'>";
    echo "<input type='button' id='totalitemfields' value='0'>";
    echo "<input type='button' id='itemfield' value='0'>";
	$calendar_id = $_GET['calendarid'];
	$calendar_employee_id = $_GET['calendaremployeeid'];
	$calendar_employee_name = $_GET['calendaremployeename'];
	$calendar_date_holder = $_GET['calendardate'];
    $calendar_view = $_GET['calendarview'];
	$note_view = $_GET['noteview'];
    $employee_initials = $_GET['employeeinitials'];
	if (isset($_GET['searchfield'])) {
	    $search_field = trim($_GET['searchfield']);
	} else {
	    $search_field = '';
	}
 	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
	echo "<input type='text' id='calendardateholder' name='calendardateholder' value='$calendar_date_holder'>";
	echo "<input type='text' id='calendarview' name='calendarview' value='$calendar_view'>";
    echo "<input type='text' id='noteview' name='noteview' value='$note_view'>";
	echo "<input type='text' id='employeeinitials' name='employeeinitials' value='$employee_initials'>";
    // sorttableby holds 0 for alpha sort 1 for numeric sort
    echo "<input type='button' id='"; echo $form_table; echo "sorttableby' value='0'>";
    echo "<input type='button' id='"; echo $form_table; echo "searchtablecell' value='1'>";
  echo "</div>";

?>
<body id='body'>
  <div class='container'>
    <div id='popup'>
	</div>
    <div id='<?php echo $form_table; ?>pagebox'>
	  <div id='<?php echo $form_table; ?>headerbox'>
        Employee List
      </div>		
      <div id='<?php echo $form_table; ?>tableheaderbox'>
        <table id='<?php echo $form_table; ?>headertable'>
		  <thead>
		    <tr>
              <th class='<?php echo $form_table; ?>col1'>
                Id
	          </th>
	          <th class='<?php echo $form_table; ?>col2'>
		        Name
		      </th>
	          <th class='<?php echo $form_table; ?>col3'>
                Primary Phone
		      </th>
	          <th class='<?php echo $form_table; ?>col4'>
		        Secondary Phone
              </th>
	          <th class='<?php echo $form_table; ?>col5'>
		        Note
              </th>
  	          <th class='<?php echo $form_table; ?>colscrollbar'>
		        &nbsp
              </th>
	        </tr>
          </thead>
        </table>
	  </div>
      <?php
        include "databaseconnect.php";
        if (mysqli_connect_errno($con))
        {
            echo "Failed to connect to MySQL: " . die();
        }
 		if ($calendar_view == '') {
            $result = mysqli_query($con, "SELECT employee_names.* FROM employee_names WHERE 1 ORDER BY employee_names.`EMPLOYEE_NAME` ASC");
        } else {
	        $result = mysqli_query($con, "SELECT employee_names.* FROM employee_names WHERE (employee_names.`EMPLOYEE_NAME` LIKE '%{$search_field}%') OR (employee_names.`COMMENT` LIKE '%{$search_field}%') ORDER BY employee_names.`EMPLOYEE_NAME` ASC ");
        }
 	    $number_of_rows = mysqli_num_rows($result) ;
        mysqli_close($con); 
	    $alt_row=0;
        $i = 0 ;
	  ?>
        <div id='<?php echo $form_table; ?>box'>
          <table id='<?php echo $form_table; ?>'>
            <tbody>
			<?php
    	      while ($i < $number_of_rows)
              {
                  $row = mysqli_fetch_array($result);
			?>	  
				  <tr>
                    <td class='<?php echo $form_table; ?>col1'>
                      <?php echo $row['EMPLOYEE_ID'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>col2'>
	                  <?php echo $row['EMPLOYEE_NAME'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>col3'>
                      <?php echo $row['EMPLOYEE_PHONE1'] ; ?>
                    </td>
			        <td class='<?php echo $form_table; ?>col4'>
			          <?php echo $row['EMPLOYEE_PHONE2']; ?>
			        </td>
                    <td class='<?php echo $form_table; ?>col5'>
	                  <?php echo $row['COMMENT'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMPLOYEE_ADDRESS'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMPLOYEE_PHONE3'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMPLOYEE_EMAIL1'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMPLOYEE_EMAIL2'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMPLOYEE_EMAIL3'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMPLOYEE_SOCIAL_SECURITY'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['DEFAULT_CALENDAR'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['CALENDAR_USER'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMPLOYEE_INITIALS'] ; ?>
                    </td>
			      </tr>
            <?php				  
 	              $i++;
	          } // endwhile loop
			?>  
            </tbody>
          </table>
        </div>  
        <div id='<?php echo $form_table; ?>footerbox'>
          <?php           
		    $form_table_button_add = 'yes';
            $form_table_button_view = 'no';
            $form_table_button_select = 'no';
            $form_table_button_remove = 'no';
            $form_table_button_done = 'yes';
            $form_table_button_cancel = 'no';
            $form_table_button_print = 'yes';
            $form_table_button_sum_total = 'no';
            $form_table_button_continue = 'no';
            include "kingbutton.php"; 
		  ?>
  	      <button class='menubutton' id='searchviewbutton'>
	        Search
	      </button>

        </div>
    </div>
	<div id='employeeformcontainer'>
	  <?php
        $form_table = "employeeform";
      ?>	
      <form id='<?php echo $form_table; ?>' action='kingemployeetableformpost.php' autocomplete='off' method='post'>
        <div class='variables'>
		  <input type='text' id='<?php echo $form_table; ?>calendarid' name='<?php echo $form_table; ?>calendarid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value=''>
		  <input type='text' id='<?php echo $form_table; ?>action' name='<?php echo $form_table; ?>action' value = ''>
	      <input type='text' id='<?php echo $form_table; ?>calendarview' name='<?php echo $form_table; ?>calendarview' value=''>
	      <input type='text' id='<?php echo $form_table; ?>noteview' name='<?php echo $form_table; ?>noteview' value=''>
	      <input type='text' id='<?php echo $form_table; ?>employeeinitialshold' name='<?php echo $form_table; ?>employeeinitialshold' value=''>
	      <input type='text' id='<?php echo $form_table; ?>searchfield' name='<?php echo $form_table; ?>searchfield' value='<?php echo $search_field; ?>'>
	    </div>
	    <div id='mainboxdiv'>
	      <div id='<?php echo $form_table; ?>boxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
		      <div class='<?php echo $form_table; ?>header'>
		        Employee 
              </div>
		    </div>
            <br>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
                Employee Id
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' id ='<?php echo $form_table; ?>employeeid' name='<?php echo $form_table; ?>employeeid' size='5' maxlength='5' value='' readonly>
	          </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Name
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '1' id='<?php echo $form_table; ?>name' name='<?php echo $form_table; ?>employeename' size='50' maxlength='100' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Address
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <textarea tabindex = '2' id='<?php echo $form_table; ?>2' name='<?php echo $form_table; ?>employeeaddress' value='' cols='50' rows='1'></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Primary Phone 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '3' id='<?php echo $form_table; ?>3' name='<?php echo $form_table; ?>employeephone1' size='50' maxlength='100' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Secondary Phone  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '4' id='<?php echo $form_table; ?>4' name='<?php echo $form_table; ?>employeephone2' size='50' maxlength='100' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Other Phones
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <textarea type='text' tabindex = '5' id='<?php echo $form_table; ?>5' name='<?php echo $form_table; ?>employeephone3' cols='50' rows='1' value=''></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Primary Email  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='email' tabindex = '6' id='<?php echo $form_table; ?>6' name='<?php echo $form_table; ?>employeeemail1' size='50' maxlength='100' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Other Email  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='email' tabindex = '7' id='<?php echo $form_table; ?>7' name='<?php echo $form_table; ?>employeeemail2' size='50' maxlength='100' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Cell Phone Text Message Setup (4066565464@vtext.com)
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='email' tabindex = '8' id='<?php echo $form_table; ?>8' name='<?php echo $form_table; ?>employeeemail3' size='50' maxlength='100' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Social Security Number 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '9' id='<?php echo $form_table; ?>9' name='<?php echo $form_table; ?>employeesocialsecurity' size='15' maxlength='15' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Default Calendar 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <select type='text' tabindex = '10' id='<?php echo $form_table; ?>10' name='<?php echo $form_table; ?>defaultcalendar'>
			      <option value='-- Select --'> -- Select -- </option>
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
						echo "<option value='"; echo $row['CALENDAR_ID']; echo "'>"; echo $row['CALENDAR_NAME']; echo "</option>";
						$i += 1;
					}
				  ?>
				</select>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldnamecol1'>
	            Employee Able to Send and Receive Messages (Y/N) 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '11' id='<?php echo $form_table; ?>11' name='<?php echo $form_table; ?>calendaruser' size='1' maxlength='1' value='N'>
				Employee Initials
			    <input type='text' tabindex = '12' id='<?php echo $form_table; ?>12' name='<?php echo $form_table; ?>employeeinitials' size='6' maxlength='6' value=''>
              </div>
            </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldnamecol1'>
                Note
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		        <textarea tabindex = '13' id='<?php echo $form_table; ?>13' name='<?php echo $form_table; ?>comment' cols=100 rows=6></textarea>
		      </div>
		    </div>
			<br>
    	    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>savecancelbutton'>
		        <?php
                  $form_table_button_add = 'no';
                  $form_table_button_view = 'no';
                  $form_table_button_select = 'no';
                  $form_table_button_remove = 'no';
                  $form_table_button_done = 'yes';
                  $form_table_button_cancel = 'yes';
                  $form_table_button_print = 'yes';
                  $form_table_button_sum_total = 'no';
                  include "kingbutton.php";
                ?>
		      </div>
		    </div>
          </div> <!-- end boxdiv -->
		  <div id='employeeformfieldbackground'>
		  </div>
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
  </div>
  <div id='rightclickfieldrow'>
    <div id='rightclickmenu'>
      <div class='rightclickcol' id='jobprintbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='jobprintbutton'><img src='print.png' alt='print' height='20' width='20'> Print Job</button>
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
      <div class='rightclickcol' id='deletebuttonmenu'>
        &nbsp <button class='rightclickbutton' id='deletebutton'><img src='delete.png' alt='delete' height='20' width='20'> Delete</button>
	  </div>
      <div class='rightclickcol' id='pasteasnewbuttonmenu'>
        &nbsp <button class='rightclickbutton' id='pasteasnewbutton'><img src='paste.png' alt='paste as new' height='20' width='20'> Paste as New</button>
	  </div>
      <div class='rightclickcol' id='pasteasupdatebuttonmenu'>
        &nbsp <button class='rightclickbutton' id='pasteasupdatebutton'><img src='paste.png' alt='paste as update' height='20' width='20'> Paste as Update</button>
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
          <input type='button' class='menubutton' id='searchfieldbutton' value='Search'> 		
        </div>
	  </form>
    </div>
  </div>
</body>  
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>
  <script src="./scripts/kingemployeetableforminit.js" type="text/javascript"></script>
</html>