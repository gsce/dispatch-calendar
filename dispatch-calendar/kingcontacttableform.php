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
  <link rel="stylesheet" type="text/css" href="./css/kingcontacttableform.css" media="screen"> 
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="screen"> 
</head>

<?php 
  //var_dump($_GET);

  $form_table = "contacttable";                                               // init name variable for formtable object in javascript
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
    $employee_initials = $_GET['employeeinitials'];
	$calendar_id = $_GET['calendarid'];
	$calendar_employee_id = $_GET['calendaremployeeid'];
	$calendar_employee_name = $_GET['calendaremployeename'];
	$calendar_date_holder = $_GET['calendardate'];
    $calendar_view = $_GET['calendarview'];
    $note_view = $_GET['noteview'];
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
        Contact List
      </div>
      <div id='<?php echo $form_table; ?>tableheaderbox'>
        <table id='<?php echo $form_table; ?>headertable'>
		  <thead>
		    <tr>
	          <th class='<?php echo $form_table; ?>col2'>
			    Name
			  </th>
	          <th class='<?php echo $form_table; ?>col3'>
                Primary Phone
			  </th>
	          <th class='<?php echo $form_table; ?>col4'>
		        Secondary Phone
              </th>
	          <th class='<?php echo $form_table; ?>col5'> Address
              </th>
	          <th class='<?php echo $form_table; ?>col6'>
		        Primary Email
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
            $result = mysqli_query($con, "SELECT contacts.* FROM contacts WHERE 1 ORDER BY contacts.`NAME1` ASC");
        } else {
	        $result = mysqli_query($con, "SELECT contacts.* FROM contacts WHERE (contacts.`NAME1` LIKE '%{$search_field}%') OR (contacts.`COMMENT` LIKE '%{$search_field}%') ORDER BY contacts.`NAME1` ASC ");
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
                    <td class='<?php echo $form_table; ?>colhidden'>
                      <?php echo $row['CONTACT_ID'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>col2'>
	                  <?php echo $row['NAME1'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>col3'>
                      <?php echo $row['PHONE1'] ; ?>
                    </td>
			        <td class='<?php echo $form_table; ?>col4'>
			          <?php echo $row['PHONE2']; ?>
			        </td>
                    <td class='<?php echo $form_table; ?>col5'><?php echo $row['ADDRESS1']; ?></td>
                    <td class='<?php echo $form_table; ?>col6'>
	                  <?php echo $row['EMAIL1'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['EMAIL2'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['NAME2'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['ADDRESS2'] ; ?>
                    </td>
				    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['PHONE3'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['SOCIAL_NETWORK'] ; ?>
                    </td>
                    <td class='<?php echo $form_table; ?>colhidden'>
	                  <?php echo $row['COMMENT'] ; ?>
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
	<div id='contactformcontainer'>
	  <?php
        $form_table = "contactform";
      ?>	
      <form id='<?php echo $form_table; ?>' action='kingcontacttableformpost.php' autocomplete='off' method='post'>
        <div class='variables'>
		  <input type='text' id='<?php echo $form_table; ?>calendarid' name='<?php echo $form_table; ?>calendarid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeeid' name='<?php echo $form_table; ?>calendaremployeeid' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendaremployeename' name='<?php echo $form_table; ?>calendaremployeename' value=''>
		  <input type='text' id='<?php echo $form_table; ?>calendardateholder' name='<?php echo $form_table; ?>calendardateholder' value=''>
		  <input type='text' id='<?php echo $form_table; ?>action' name='<?php echo $form_table; ?>action' value = ''>
          <input type='text' id='<?php echo $form_table; ?>contactid' name='<?php echo $form_table; ?>contactid' value=''>
	      <input type='text' id='<?php echo $form_table; ?>calendarview' name='<?php echo $form_table; ?>calendarview' value=''>
	      <input type='text' id='<?php echo $form_table; ?>noteview' name='<?php echo $form_table; ?>noteview' value=''>
	      <input type='text' id='<?php echo $form_table; ?>employeeinitials' name='<?php echo $form_table; ?>employeeinitials' value=''>
	      <input type='text' id='<?php echo $form_table; ?>searchfield' name='<?php echo $form_table; ?>searchfield' value='<?php echo $search_field; ?>'>
	    </div>
		<?php
          $form_table_button_add = 'no';
          $form_table_button_view = 'no';
          $form_table_button_select = 'no';
          $form_table_button_remove = 'no';
          $form_table_button_done = 'yes';
          $form_table_button_cancel = 'yes';
          $form_table_button_print = 'yes';
          $form_table_button_sum_total = 'no';
	      $form_table_button_continue = 'no';
        ?>
	    <div id='mainboxdiv'>
	      <div id='<?php echo $form_table; ?>boxdiv'>
            <div class='<?php echo $form_table; ?>fieldrow'>
		      <div class='<?php echo $form_table; ?>header'>
		        Contacts 
              </div>
		    </div>
            <br>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldcol1'>
	            Primary Name 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '1' id='<?php echo $form_table; ?>1' name='<?php echo $form_table; ?>name1'  value='' size='67' maxlength='100'>
              </div>
 	          <div class='<?php echo $form_table; ?>fieldcol3'>
	            Associated Names  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol4'>
			    <textarea tabindex = '9' id='<?php echo $form_table; ?>9' name='<?php echo $form_table; ?>name2' value='' cols='60' rows='4' maxlength='500' ></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldcol1'>
	            Primary Address
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <textarea tabindex = '2' id='<?php echo $form_table; ?>2' name='<?php echo $form_table; ?>address1' value='' cols='50' rows='1' maxlength='100'></textarea>
              </div>
	          <div class='<?php echo $form_table; ?>fieldcol3'>
	            Other Addresses 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol4'>
			    <textarea tabindex = '10' id='<?php echo $form_table; ?>10' name='<?php echo $form_table; ?>address2' value='' cols='60' rows='4'></textarea>
              </div>
            </div>
			
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldcol1'>
	            Primary Phone 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '3' id='<?php echo $form_table; ?>3' name='<?php echo $form_table; ?>phone1' size='67' maxlength='100' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldcol1'>
	            Secondary Phone 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='text' tabindex = '4' id='<?php echo $form_table; ?>4' name='<?php echo $form_table; ?>phone2' size='67' value=''>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldcol1'>
	            Other Phones  
              </div>
              <div class='<?php echo $form_table; ?>fieldcol2'>
	            <textarea type='text' tabindex = '5' id='<?php echo $form_table; ?>5' name='<?php echo $form_table; ?>phone3' value='' cols='50' rows='2'></textarea>
              </div>
			</div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldcol1'>
	            Primary Email  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <input type='email' tabindex = '6' id='<?php echo $form_table; ?>6' name='<?php echo $form_table; ?>email1' size='75' maxlength='100' value=''>
              </div>
 	          <div class='<?php echo $form_table; ?>fieldcol3'>
	            Other Email  
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol4'>
			    <textarea tabindex = '11' id='<?php echo $form_table; ?>11' name='<?php echo $form_table; ?>email2' value='' cols='60' rows='2'></textarea>
              </div>
            </div>
            <div class='<?php echo $form_table; ?>fieldrow'>
	          <div class='<?php echo $form_table; ?>fieldcol1'>
	            Social Networks (facebook twitter linkedin Websites) 
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
			    <textarea tabindex = '7' id='<?php echo $form_table; ?>7' name='<?php echo $form_table; ?>socialnetwork' value='' cols='70' rows='4'></textarea>
              </div>
            </div>
		    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>fieldcol1'>
                Note
		      </div>
	          <div class='<?php echo $form_table; ?>fieldcol2'>
		        <textarea tabindex = '8' id='<?php echo $form_table; ?>8' name='<?php echo $form_table; ?>comment' cols='100' rows='6'></textarea>
		      </div>
		    </div>
    	    <div class='<?php echo $form_table; ?>fieldrow'>
              <div class='<?php echo $form_table; ?>savecancelbutton'>
                <?php include "kingbutton.php"; ?>
		      </div>
		    </div>
          </div> <!-- end boxdiv -->
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
  <script src="./scripts/kingcontacttableforminit.js" type="text/javascript"></script>
</html>