  <?php
    if ($form_table_button_add == 'yes') {
        echo "<button type='button' id='"; echo $form_table; echo "add' value='"; echo $form_table; echo "Add'><img src='add.png' alt='add' height='15' width='20'> Add</button>";
    } 
	if ($form_table_button_view == 'yes') {
        echo "<button type='button' id='"; echo $form_table; echo "view' value='"; echo $form_table; echo "View'> Enter - Update</button>";
    }
	if ($form_table_button_select == 'yes') {
        echo "<button type='button' id='"; echo $form_table; echo "update' value='"; echo $form_table; echo "Update'> Enter - Update</button>";
    }
	if ($form_table_button_remove == 'yes') {
        echo "<button type='button' id='"; echo $form_table; echo "remove' value='"; echo $form_table; echo "Remove'>Delete Key - Delete</button>";
    }
	if ($form_table_button_done == 'yes') {
	    echo "<button type='button' id='"; echo $form_table; echo "done' value='"; echo $form_table; echo "Done'><img src='check.png' alt='done' height='15' width='20'> Done</button>";
    }
	if ($form_table_button_cancel == 'yes') {	  
        echo "<button type='button' id='"; echo $form_table; echo "cancel' value='"; echo $form_table; echo "Cancel'><img src='cancel.png' alt='done' height='15' width='20'> Cancel</button>";
    } 
	if ($form_table_button_print == 'yes') {	  
        echo "<button type='button' id='"; echo $form_table; echo "print' value='"; echo $form_table; echo "Print'><img src='print.png' alt='add' height='15' width='20'> Print</button>";
    }   
    if ($form_table_button_continue == 'yes') {
        echo "<button type='button' id='"; echo $form_table; echo "continue' value='"; echo $form_table; echo "Continue'><img src='check.png' alt='done' height='15' width='20'> Continue</button>";
    } 
	if ($form_table_button_sum_total == 'yes') {	  
        echo "<button type='button' id='"; echo $form_table; echo "sum_total'></button>";
    }
  ?>