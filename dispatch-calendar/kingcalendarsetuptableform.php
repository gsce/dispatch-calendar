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
  <link rel="stylesheet" type="text/css" href="./css/kingcalendarsetuptableform.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
</head>

<?php 
  //var_dump($_GET);

  $form_table = "calendarsetuptable";                                               // init name variable for formtable object in javascript
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
	echo "<input type='text' id='calendarid' name='calendarid' value='$calendar_id'>";
	echo "<input type='text' id='calendaremployeeid' name='calendaremployeeid' value='$calendar_employee_id'>";
    echo "<input type='text' id='calendaremployeename' name='calendaremployeename' value='$calendar_employee_name'>";
	echo "<input type='text' id='calendardateholder' name='calendardateholder' value='$calendar_date_holder'>";
	echo "<input type='text' id='calendarview' name='calendarview' value='$calendar_view'>";
	echo "<input type='text' id='noteview' name='noteview' value='$note_view'>";
	echo "<input type='text' id='employeeinitials' name='employeeinitials' value='$employee_initials'>";
    $form_table_button_add = 'yes';
    $form_table_button_view = 'no';
    $form_table_button_select = 'no';
    $form_table_button_remove = 'no';
    $form_table_button_done = 'yes';
    $form_table_button_cancel = 'no';
    $form_table_button_print = 'no';
    $form_table_button_sum_total = 'no';
	$form_table_button_continue = 'no';
    // sorttableby holds 0 for alpha sort 1 for numeric sort
    echo "<input type='button' id='"; echo $form_table; echo "sorttableby' value='0'>";
    echo "<input type='button' id='"; echo $form_table; echo "searchtablecell' value='1'>";
  echo "</div>";

?>
<body id='body'>
  <div class='container'>
    <div id='<?php echo $form_table; ?>pagebox'>
	  <br>
	  <br>
	  <br>
	  <br>
	  <div id='<?php echo $form_table; ?>headerbox'>
        Calendar List
      </div>		
      <?php
        include "databaseconnect.php";
        if (mysqli_connect_errno($con))
        {
            echo "Failed to connect to MySQL: " . die();
        }
        $result = mysqli_query($con, "SELECT calendar.* FROM calendar WHERE 1 ORDER BY calendar.CALENDAR_NAME ASC");
        //
	    $number_of_rows = mysqli_num_rows($result) ;
        mysqli_close($con); 
	    $alt_row=0;
        $i = 0 ;
	  ?>
        <div id='<?php echo $form_table; ?>box'>
          <table id='<?php echo $form_table; ?>'>
		    <tr>
	          <th class='<?php echo $form_table; ?>col1'>
			    Calendar Id
			  </th>
	          <th class='<?php echo $form_table; ?>col2'>
                Calender Name
			  </th>
		    </tr>

            <tbody>
			<?php
    	      while ($i < $number_of_rows)
              {
                  $row = mysqli_fetch_array($result);
			?>	  
				  <tr>
                    <td class='<?php echo $form_table; ?>col1'>
                      <?php echo $row['CALENDAR_ID'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>col2'>
	                  <?php echo $row['CALENDAR_NAME'] ; ?>
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
          <?php include "kingbutton.php"; ?>
        </div>
    </div>
	<div id='calendarsetupformcontainer'>
	  <?php
        $form_table = "calendarsetupform";
      ?>	
      <form id='<?php echo $form_table; ?>' action='kingcalendarsetuptableformpost.php' autocomplete='off' method='post'>
        <div class='variables'>
		  <input type='text' id='<?php echo $form_table; ?>calendarid' name='<?php echo $form_table; ?>calendarid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value=''>
		  <input type='text' id='<?php echo $form_table; ?>action' name='<?php echo $form_table; ?>action' value = ''>
          <input type='text' id='<?php echo $form_table; ?>id' name='<?php echo $form_table; ?>id' value=''>
	      <input type='text' id='<?php echo $form_table; ?>calendarview' name='<?php echo $form_table; ?>calendarview' value=''>
	      <input type='text' id='<?php echo $form_table; ?>noteview' name='<?php echo $form_table; ?>noteview' value=''>
	      <input type='text' id='<?php echo $form_table; ?>employeeinitials' name='<?php echo $form_table; ?>employeeinitials' value=''>
	    </div>
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
		<br>
		<br>
		<br>
	      <div id='<?php echo $form_table; ?>boxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
		      <div class='<?php echo $form_table; ?>header'>
		        Calendar Setup 
              </div>
		    </div>
            <br>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldcol1'>
	            Calendar Name 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '1' id='<?php echo $form_table; ?>1' name='<?php echo $form_table; ?>name'  value='' size='50' maxlength='50'>
              </div>
            </div>
			<br>
			<br>
    	    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>savecancelbutton'>
                <?php include "kingbutton.php"; ?>
		      </div>
		    </div>
          </div> <!-- end boxdiv -->
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
</body>  
  <script src="./scripts/kingtableform.js" type="text/javascript"></script>
  <script src="./scripts/kingcalendarsetuptableforminit.js" type="text/javascript"></script>
</html>