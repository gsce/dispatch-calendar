
     // -kiosk 127.0.0.1/test.php kiosk mode for chrome
    /** This function removes the blue select bar on table */
    function removeSelectBar(selectBar,tableRowElement) {
      
	  /** Checks to see if select bar is odd or even
        * and changes the background color accordingly */
      if ((selectBar %2) != 0) {
           tableRowElement.style.backgroundColor='#ddd';
           tableRowElement.style.color='black';
      } else {
           tableRowElement.style.backgroundColor='white';
           tableRowElement.style.color='black';
      }

    }

	/** This function adds a blue select bar on table */
    function addSelectBar(tableRowElement) {

      tableRowElement.style.backgroundColor='blue';  
      tableRowElement.style.color='white';

    }

    /** This function handles keyup events on the search field */
    function searchFieldInputKeyAction(e) {
      
      /** This variable holds the keycode for the keyup event */ 
	  var keyValue = e.keyCode;                                                      
      
	  /** Check if up down pageup pagedown keys were captured in keyup event.
        * these keys are handled on the keydown event function below. 
		* so we just need to return focus back to the search field */
	  if (keyValue === 40 || keyValue === 38 || keyValue == 33 || keyValue == 34 || keyValue == 35 || keyValue == 36 || keyValue == 27 || keyValue == 116 || keyValue == 13) {
		  return;
	  }
	  
	  /** send letters or numbers that were captured search table function */
	  searchTable();
	  
    } // end function
	
    /** This function determines if table needs to be sorted by account number or 
	  * by account name. If sort is by account name then the variables are converted
      * to uppercase. Then it searches the table and calls the remove select bar and
	  * add select bar functions that handle highlighting the row selected */
    function searchTable () {

	  /** cellContent holds the value of the HTML <table id = 'datatable'><td>
    	* element */
	  var cellContent;
	  
      /** searchCell holds return value of indexof method used to find a match
        * in the HTML <input Id = 'searchfield'> element */
	  var searchCell;                                                                
      
	  /** searchField holds the value of the HTML <input Id = 'searchfield'> 
	    * element */
      var searchField = searchfield.value;
	  	    
        if (document.getElementById('datatable').value === 'arl') {
		    if (Number(searchField) > 0) {
                if (document.getElementById('calledfrom').value === 'invoice') {			
                    tableRowElement = document.getElementById(dataTable+selectBar);                       
                    removeSelectBar(selectBar,tableRowElement)                                  
    				var action = document.getElementById('action').value;
                    document.getElementById('datatable').value = 'arlnu';
        	        document.getElementById('searchfield').style.visibility='visible';
        	        document.getElementById('arlbox').style.visibility='hidden';
        	        document.getElementById('invfbox').style.visibility='hidden';
        	        document.getElementById('tabletitle').value = 'Accounts Receivable List';
        	        document.getElementById('globalaction').value = 'table';
					dataTable = 'arlnu'
					window.name = searchField;
					document.getElementById(dataTable+'sorttableby').value = 1;
					document.getElementById(dataTable+'searchtablecell').value = 0;
                    init();
	            } 
			}
		} else if (document.getElementById('datatable').value === 'arlnu') {
		    
			if (Number(searchField) < 1) {
			    
			    if (document.getElementById('calledfrom').value === 'invoice') {
                    tableRowElement = document.getElementById(dataTable+selectBar);                       
                    removeSelectBar(selectBar,tableRowElement)                                  
	            	var action = document.getElementById('action').value;
                    document.getElementById('datatable').value = 'arl';
                    document.getElementById('searchfield').style.visibility='visible';
	                document.getElementById('arlnubox').style.visibility='hidden';
	                document.getElementById('invfbox').style.visibility='hidden';
  	                document.getElementById('tabletitle').value = 'Accounts Receivable List';
	                document.getElementById('globalaction').value = 'table';
					dataTable = 'arl'
					window.name = searchField;
					document.getElementById(dataTable+'sorttableby').value = 0;
					document.getElementById(dataTable+'searchtablecell').value = 2;
             	    init();
				}
	        }
        }
 	  
	  /** searchFieldElement holds the ID of the html <input Id = 'searchfield'>
	    * element */
	  var searchFieldElement = document.getElementById('searchfield');
	  
	  /** sortTableBy holds the sort value for sorting table by account # or by Name */ 

      var sortTableBy = document.getElementById(dataTable+'sorttableby').value;

      /** tableRowElement holds the Id of the html <table Id = 'datatable'><tr> element */
      var tableRowElement;                                                         
	  
	  /** datatable holds the Id of the HTML <table Id = 'datatable'> element being searched */
      var table = document.getElementById(dataTable); 
      
      var totalTableRows = table.rows.length;
       
	  sortTableBy = Number(sortTableBy);
	  
	  if (sortTableBy === 0) {
	      searchField = searchField.toUpperCase();
	  } else {
	      searchField = Number(searchField);
	  }
	  for (var row = 0; row < totalTableRows; row++) {                               

	    /** get the table row where the select bar is and remove it*/
		tableRowElement = document.getElementById(dataTable+selectBar);                       
		removeSelectBar(selectBar,tableRowElement)                                   
       
	    /** search the  contents of the html <td> element to see if there is a match */
        if (sortTableBy === 0) {
		    
            cellContent = table.rows[row].cells[searchByCell].textContent.toUpperCase();            
            searchCell = cellContent.indexOf(searchField,0); 
            			
        } else {
            cellContent = Number(table.rows[row].cells[searchByCell].textContent);            
        }
        
		tableRowElement = document.getElementById(dataTable+row);                             

		/** checks to see if there was a match and scrolls the table row to the first
          * row of the table view */
	    if (cellContent >= searchField) {                                   
		    tableRowElement.scrollIntoView(true);
            addSelectBar(tableRowElement)                                            
            selectBar = row;
            firstTableRowInWindow = row;
            break;		
	    }   

      } // end for loop
    
	} // end function
	
	/** This function checks the keydown event and handles the
	  * arrow keys, page up and down keys, and the keys assigned
	  * to the buttons at the bottom of the table.
	  * Also this function disables the backspace key, f5 refresh key */
	function searchFieldArrowKeysOrPageKeysPressedDown(e,form,itemField,totalItemFields) {
	  
      alert(globalAction);	        	  
	  keyValue = e;
	  alert(keyValue);
	  if (globalAction === 'table') {
          var table = document.getElementById(dataTable); 
	      var totalTableRows = table.rows.length - 1;
	  }
      
      if (keyValue === 40) {
          if (globalAction === 'table' && selectBar < totalTableRows) {
              downArrowPressedDown(); 		  
		  	  return;
		  } else if (globalAction ==='form') {
		      downArrowPressedDown(); 
			  return;
		  }
		  return;
      } else if (keyValue === 38) {
          if (globalAction === 'table' && selectBar > 0) {
		      upArrowPressedDown();
			  return;
		  } else if (globalAction ==='form') {
		      upArrowPressedDown();
              return;
		  }
		  return;
      } else if (keyValue === 33) {    
          if (globalAction != 'form') {	  
              pageUpPressedDown();
			  return;
		  }
          return;
      } else if (keyValue === 34) {                                                    
          if (globalAction != 'form') {	  
           	  pageDownPressedDown();
			  return;
		  }
		  return;
      } else if (keyValue === 35) {                                                    
          if (globalAction != 'form') {	  
           	  endKeyPressedDown();
			  return;
		  }
		  return;
      } else if (keyValue === 36) {                                                    
          if (globalAction != 'form') {	  
           	  homeKeyPressedDown();
			  return;
		  }
		  return;
      } else if (keyValue === 8) {                                                     
	      /** backspace key */
          return;
	  } else if (keyValue === 9) {                              
	      tabKeyPressed();
          e.preventDefault();  
    	  return false;	  
	  } else if (keyValue === 27) {                              
          e.preventDefault();
   		  window[cancel]();
          return false;
      } else if (keyValue === 45) { 
	      /** insert key to add  */
		  e.preventDefault();
		  if (globalAction != 'form') {
		      if (document.getElementById(dataTable+'tablebuttonadd').value === 'yes') {
        		  window[add]();
				  return;
			  }
		  }
	      return;
	  } else if (keyValue === 46) { 
	      /** delete key   */
		  //e.preventDefault();
		  if (globalAction != 'form') {
 		      if (document.getElementById(dataTable+'tablebuttonremove').value === 'yes') {
        		  window[remove]();
				  return;
			  }
		  }
	      return false;
   	  } else if (keyValue === 112) { 
	      /** f1 key   */
		  e.preventDefault();
		  if (globalAction === 'form') {
              if (form === 'invf') {	  
     		      window[f1Button]();
			  }	  
			  return;
 		  }
	      return;
	  } else if (keyValue === 113) { 
	      /** f2 key   */
		  e.preventDefault();
		  if (globalAction === 'form') {	  
     		  if (form === 'invf') {		  
     		  	  window[f2Button]();
			  }
			  return;
		  }
	      return;
	  } else if (keyValue === 114) { 
	      /** f3 key   */
		  e.preventDefault();
		  if (globalAction === 'form') {	  
     		  if (form === 'invf') {		  
     		  	  window[f3Button]();
			  }
			  return;
		  }
	      return;
	  } else if (keyValue === 115) { 
	      /** f4 key   */
		  e.preventDefault();
		  if (globalAction === 'form') {	  
     		  if (form === 'invf') {		  
     		  	  window[f4Button]();
    		  }
			  return;
		  }
	      return;
     } else if (keyValue == 116) { 	                                        	  
	      /** disable F5 key refresh and change assign to 
		    * view account transactions button */
	  	  e.preventDefault();
		  if (globalAction === 'form') {
              if (form === 'invf') {		  
     		      window[f5Button]();
				  return;
			  }	  
			  return false;
		  } else if (globalAction === 'table') {
 		      if (document.getElementById(dataTable+'tablebuttonview').value === 'yes') {
        		  if (dataTable === 'arl' || dataTable === 'arlnu' || dataTable === 'inv') {
				      window[view]();
				  }
				  return;
			  }	  
			  return;
		  }
          return false;
	  } else if (keyValue === 117) { 
	      /** f6 key   */
		  e.preventDefault();
		  if (globalAction === 'form') {	  
     		  if (form === 'invf') {
			      window[f6Button]();
			  }
			  return;
		  }
	      return false;
	  } else if (keyValue === 118) { 
	      /** f7 key   */
		  e.preventDefault();
		  if (globalAction === 'form') {	  
     		  if (form === 'invf') {
			      window[f7Button]();
			  }
			  return;
          }
	      return false;
	  } else if (keyValue === 121) { 
	      /** f10 key   */
		  e.preventDefault();
   		  window[done]();
	      return false;
	  } else if (keyValue === 122) { 
	      /** f11 key   */
		  e.preventDefault();
	      return false;
	  } else if (keyValue === 123) { 
	      /** f12 key   */
		  e.preventDefault();
	      return false;
	  } 

    } // end function

	/** This function handles the arrow down key and scrolls the select bar 
	  * down by one. It also checks to see if the select bar is on the last
	  * table row and stops if it is. */
	function downArrowPressedDown() {
 	  if (globalAction == 'form') {
 	      if (itemField == 'done') {
		      itemField = startItemField;
          } else if (itemField < totalItemFields) {
              itemField = ++itemField;
	      } else {
	          itemField = 'done';
	      }
          //window[formcalc]();
		  reselectField(form,itemField);
	      return;
	  } else {
          tableRowElement = document.getElementById(dataTable+selectBar);                       
          removeSelectBar(selectBar,tableRowElement)                                  
          selectBar = ++selectBar;
          tableRowElement = document.getElementById(dataTable+selectBar);                       
          addSelectBar(tableRowElement) 
		  
          if ((selectBar - firstTableRowInWindow) > (numberOfRows - 1)) {
              firstTableRowInWindow = ++firstTableRowInWindow;
              tableRowElement = document.getElementById(dataTable+firstTableRowInWindow);
              tableRowElement.scrollIntoView(true);
          }
          return;
	  }
		  
    } // end function

    /** This function handles the arrow up key and scrolls the select bar 
	  * up by one. It also checks to see if the select bar is on the first
	  * table row and stops if it is. */
	function upArrowPressedDown() {
 
      if (globalAction == 'form') {
	      if (itemField == 'done') {
		      itemField = totalItemFields;
          } else if (itemField > startItemField) {
              itemField = --itemField;
		  } else {
	          itemField = totalItemFields;
	      }
          window[formcalc]();
	   	  document.getElementById(form+itemField).focus();
	      return;
	  } else {
          tableRowElement = document.getElementById(dataTable+selectBar);                       
          removeSelectBar(selectBar,tableRowElement)
          selectBar = --selectBar;
          tableRowElement = document.getElementById(dataTable+selectBar);                       
          addSelectBar(tableRowElement) 

          if (selectBar < firstTableRowInWindow) {
              tableRowElement.scrollIntoView(true);
              firstTableRowInWindow = selectBar;
          }
		  return;
      }	
	  
    } // end function

	function endKeyPressedDown() {
      
      var table = document.getElementById(dataTable); 
      var tableRowElement = document.getElementById(dataTable+selectBar);                       
      var totalTableRows = table.rows.length - 1;

      if (totalTableRows < 0) {
          return;
      }
	  
      removeSelectBar(selectBar,tableRowElement)
      selectBar = totalTableRows;
      firstTableRowInWindow = selectBar;      
      tableRowElement = document.getElementById(dataTable+selectBar);                           
      addSelectBar(tableRowElement) 
      tableRowElement.scrollIntoView(true);
      document.getElementById('searchfield').focus();
      return;

    } // end function

	function homeKeyPressedDown() {

      var table = document.getElementById(dataTable); 
      var tableRowElement = document.getElementById(dataTable+selectBar);                       
      var totalTableRows = table.rows.length - 1;

 	  if (totalTableRows < 0) {
          return;
      }

      removeSelectBar(selectBar,tableRowElement)
      selectBar = 0;

      firstTableRowInWindow = selectBar;      
      tableRowElement = document.getElementById(dataTable+selectBar);                           
      addSelectBar(tableRowElement) 
      tableRowElement.scrollIntoView(true);
      document.getElementById('searchfield').focus();
      return;

    } // end function

	
	/** This function handles the page up key and scrolls the select bar 
	  * up by the number of rows in the page. It also checks to see if the
      * select bar is on the first table row and stops if it is. */
	function pageUpPressedDown() {

      var table = document.getElementById(dataTable); 
      var tableRowElement = document.getElementById(dataTable+selectBar);                       
      var totalTableRows = table.rows.length - 1;

 	  if (totalTableRows < 0) {
          return;
      }

      removeSelectBar(selectBar,tableRowElement)
      selectBar = selectBar - numberOfRows;
 
      if (selectBar < 1) {
          selectBar = 0;
      }

      firstTableRowInWindow = selectBar;      
      tableRowElement = document.getElementById(dataTable+selectBar);                           
      addSelectBar(tableRowElement) 
      tableRowElement.scrollIntoView(true);
      document.getElementById('searchfield').focus();
      return;

    } // end function

	/** This function handles the page down key and scrolls the select bar 
	  * down by the number of rows in the page. It also checks to see if the
      * select bar is on the last table row and stops if it is. */
	function pageDownPressedDown() {
      
      var table = document.getElementById(dataTable); 
      var tableRowElement = document.getElementById(dataTable+selectBar);                       
      var totalTableRows = table.rows.length - 1;

      if (totalTableRows < 0) {
          return;
      }
	  
      removeSelectBar(selectBar,tableRowElement)
      selectBar = selectBar + numberOfRows ;

      if (selectBar > totalTableRows) {
          selectBar = totalTableRows;
      }

      firstTableRowInWindow = selectBar;      
      tableRowElement = document.getElementById(dataTable+selectBar);                           
      addSelectBar(tableRowElement) 
      tableRowElement.scrollIntoView(true);
      document.getElementById('searchfield').focus();
      return;

    } // end function

	/** This function checks the keypress event. If the enter key
	  * is pressed it prevents the default enter key event and 
	  * calls the update account function */
    function enterSelection(e) {
      
	  if (e.keyCode != 13) {
	      /** if not enter key return focus back to search field */
	      return;
      }
      e.preventDefault();	  
 	  if (globalAction == 'form') {
 	      if (itemField < totalItemFields) {
              itemField = ++itemField;
	      } else if (itemField === 'done') {
              window[done]();
			  return;
		  } else {
		      itemField = 'done';
	      }
	      window[formcalc]();
	      document.getElementById(form+itemField).focus();
          return false;
      } else {
          if (document.getElementById(dataTable+'tablebuttonselect').value === 'yes') {	
              var table = document.getElementById(dataTable);   
              var totalTableRows = table.rows.length;
              if (totalTableRows > 0) {
                  var tableRowElement = document.getElementById(dataTable+selectBar);                       
                  removeSelectBar(selectBar,tableRowElement)
		      }	  
		      window[select]();
			  return;
		  } 
		  if (document.getElementById(dataTable+'tablebuttonupdate').value === 'yes') {
              var table = document.getElementById(dataTable);   
              var totalTableRows = table.rows.length;
              if (totalTableRows > 0) {
                  var tableRowElement = document.getElementById(dataTable+selectBar);                       
                  removeSelectBar(selectBar,tableRowElement)
		      }	  
    		  window[update]();
			  return;
		  }
          return;
	  }
    } // end function
      
    function tabKeyPressed() {
 	  if (globalAction == 'form') {
          if (itemField === 'done') {
	          itemField = startItemField;
          } else if (itemField < totalItemFields) {
              itemField = ++itemField;
          } else {
              itemField = 'done';
          }
	      window[formcalc]();
   	      document.getElementById(form+itemField).focus();
	  }
      return;
	}
	
	function mouseSelectionForm(e) {
      if (globalAction === 'form') {	
	      var dataFormNameLength = form.length;
	      var mouseSelect = Number(e.target.id.slice(dataFormNameLength));
	      /** Test mouseSelect for Nan return and change to 0 if so */
	      if (mouseSelect !== mouseSelect) {                                    
	          mouseSelect = 0;
	      }
	      if (mouseSelect < 1) {                                                
	          document.getElementById(form+itemField).focus();
	      } else {
	          itemField = mouseSelect;                                          
		      document.getElementById(form+itemField).focus();
          }
  	      window[formcalc]();
          return;
	  } else {
	      reselectField();
		  return;
      }

    }
	
	/** This function calls the account update function when the mouse has 
      * selected a row on the table */	
    function mouseSelection(e) {

      var dataTableNameLength = dataTable.length
      var tableRowElementSelected = e.target.parentNode.id.slice(dataTableNameLength);
      var table = document.getElementById(dataTable);                             
      var tableRowElement = document.getElementById(dataTable+selectBar);                       
      
      removeSelectBar(selectBar,tableRowElement)
      tableRowElement = document.getElementById(dataTable+tableRowElementSelected);             
      addSelectBar(tableRowElement) 
	  
	  selectBar = Number(tableRowElementSelected);

      return;

    } // end function

    /** This function calls the account update function when the mouse has 
      * double clicked a row on the table */	
    function mouseSelectionDblClick(e) {

	  if (globalAction == 'table') {
	      var action = document.getElementById('action').value;
	      var dataTableNameLength = dataTable.length
          var tableRowElementSelected = e.target.parentNode.id.slice(dataTableNameLength);                 	
          var table = document.getElementById(dataTable);                             
          var totalTableRows = table.rows.length;
          if (document.getElementById(dataTable+'tablebuttonselect').value === 'yes') {	
              var table = document.getElementById(dataTable);   
              var totalTableRows = table.rows.length;
              if (totalTableRows > 0) {
                  var tableRowElement = document.getElementById(dataTable+selectBar);                       
                  removeSelectBar(selectBar,tableRowElement)
		      }	  
		      window[select]();
			  return;
		  } 
		  if (document.getElementById(dataTable+'tablebuttonupdate').value === 'yes') {
			  window[update]();
			  return;
		  }
	  }	  
      return;

    } // end function

	/** This function handles the cancel button when the mouse clicks it */

  
   
	
function changeCurrentMonthDay(e) {
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
	var day = e.innerHTML;
	var month = document.getElementById('calendarmonth').value;
	var year = document.getElementById('calendaryear').value;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}
	
function changePreviousMonthDay(e) {
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
    var day = e.innerHTML;
	var month = document.getElementById('previouscalendarmonth').value;
	var year = document.getElementById('previouscalendarmonthyear').value;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}

function changePreviousMonth() {
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
    var day = '01';
	var month = document.getElementById('previouscalendarmonth').value;
	var year = document.getElementById('previouscalendarmonthyear').value;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}

function changePreviousYear() {
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
    var day = '01';
	var month = document.getElementById('calendarmonth').value;
	var year = document.getElementById('calendaryear').value;
	year = Number(year) - 1;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}

function changeNextMonthDay(e) {
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
    var day = e.innerHTML;
	var month = document.getElementById('nextcalendarmonth').value;
	var year = document.getElementById('nextcalendarmonthyear').value;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}

function changeNextMonth(){
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
    var day = '01';
	var month = document.getElementById('nextcalendarmonth').value;
	var year = document.getElementById('nextcalendarmonthyear').value;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}

function changeNextYear() {
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
    var day = '01';
	var month = document.getElementById('calendarmonth').value;
	var year = document.getElementById('calendaryear').value;
	year = Number(year) + 1;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}

function changeToMonth(e) {
    var calendarId = document.getElementById('calendarid').value;
	var id = document.getElementById('calendaremployeeid').value;
	var employeeName = document.getElementById('calendaremployeename').value;
    var day = '01';
	var month = e.innerHTML;
	if (month === 'Jan') {
	    month = '01';
	} else if (month === 'Feb') {
	    month = '02';
	} else if (month === 'Mar') {
	    month = '03';
	} else if (month === 'Apr') {
	    month = '04';
	} else if (month === 'May') {
	    month = '05';
	} else if (month === 'Jun') {
	    month = '06';
	} else if (month === 'Jul') {
	    month = '07';
	} else if (month === 'Aug') {
	    month = '08';
	} else if (month === 'Sep') {
	    month = '09';
	} else if (month === 'Oct') {
	    month = '10';
	} else if (month === 'Nov') {
	    month = '11';
	} else if (month === 'Dec') {
	    month = '12';
	}	
	var year = document.getElementById('calendaryear').value;
	var date =  year + '/' + month + '/' + day;
    locationAction = 'http://localhost/king/kingcalendar.php?calendardate='+date+'&employeeid='+id+'&employeename='+employeeName+'&calendarid='+calendarId;
    window.location.href = locationAction;
}
	
function addNote() {
    alert('addnote');
  	document.getElementById('noteformcontainer').style.display = "block";
    document.getElementById('noteformcontainer').style.top = '10px';
    document.getElementById('noteformcontainer').style.height = '100%';
	document.getElementById('noteformcontainer').style.height = '100%';
	document.getElementById('noteformcontainer').style.width = '1575px';
	document.getElementById('noteformcontainer').style.backgroundColor = 'grey';
	document.getElementById('noteformcontainer').style.zIndex = '200';
	globalAction = 'form';
    form(globalAction);	

    //document.getElementById('popupheader').innerHTML
}
function updateNote() {
    alert('updatenote');

 	document.getElementById('noteformcontainer').style.display = "block";
        document.getElementById('noteformcontainer').style.top = '10px';
    	document.getElementById('noteformcontainer').style.height = '100%';
	    document.getElementById('noteformcontainer').style.height = '100%';
	    document.getElementById('noteformcontainer').style.width = '1575px';
		document.getElementById('noteformcontainer').style.backgroundColor = 'grey';
	    document.getElementById('noteformcontainer').style.zIndex = '200';

    //document.getElementById('popupheader').innerHTML
}

function getKeyCode(e) {
    var keyValue = e.keyCode;
    alert(e.keyCode);
	return e;
}	

	/** This initializes the event listeners after the window has loaded */
function init() {
 		
    defaultIpAddress = document.getElementById('defaultipaddress').value;
    //alert(defaultIpAddress);
    globalAction = document.getElementById('globalaction').value;	  
	//alert(globalAction);
	var action = document.getElementById('action').value;
    //alert(action);
    dataTable = document.getElementById('datatable').value;
      
    var mouseClickOnBody = document.getElementById('body');
    mouseClickOnBody.removeEventListener('click', mouseSelectionForm, false);
  	mouseClickOnBody.addEventListener('click', mouseSelectionForm, false);
	
	if (globalAction === 'form') {
        var formTable = {
	        globalAction: document.getElementById('globalaction').value,
		  //  action: document.getElementById('action').value,
		  //  name: document.getElementById('form').value,
		    calc: 'Calc',
		    totalItemFields: document.getElementById(form+'totalitemfields').value,
		    itemField: document.getElementById(form+'startitemfield').value
        };
	    //formInit();
		alert(formTable.name);
		form(formTable);
	} else {
        var formTable = {
	        globalAction: document.getElementById('globalaction').value,
		 //   action: document.getElementById('action').value,
		 //   name: document.getElementById('form').value,
		    calc: 'Calc',
		 //   totalItemFields: document.getElementById(form+'totalitemfields').value,
		 //   itemField: document.getElementById(form+'startitemfield').value
        };

		alert(formTable.calc);
		form(formTable);

	   // tableInit();
    }
};

function formInit() {
	alert(formTable.name)
	return formTable;
}

function form(formTable) {	
    //var form = document.getElementById('form').value;
    //formEvent = document.getElementById(form+'event').value;
	//formcalc = form + 'Calc';
	//var totalItemFields = document.getElementById(form+'totalitemfields').value;
	//var itemField = document.getElementById(form+'startitemfield').value;
    var arrowKeysOrPageKeysPressedDown = document.getElementById(formTable.name);
    var enterKeyPressed = document.getElementById(formTable.name);
   	//var mouseClickOnDoneButton = document.getElementById(form+'done');
    //done = mouseClickOnDoneButton.value;
    //var mouseClickOnCancelButton = document.getElementById(form+'cancelbutton');
   	//cancel = mouseClickOnCancelButton.value;
	  
	if (Number(formEvent) < 1) {
	    altrow = 0;
       // arrowKeysOrPageKeysPressedDown.addEventListener('keydown', function() {getKeyCode}, false);

       // enterKeyPressed.addEventListener('keypress', enterSelection, false);
   
       // mouseClickOnDoneButton.addEventListener('click', function() {window[done]()}, false);
 
       //	mouseClickOnCancelButton.addEventListener('click', function() {window[cancel]()}, false);
          
    	if (formTable.name === 'invf') {
               
            var mouseClickOnF1Button = document.getElementById(form+'f1');
		    f1Button = mouseClickOnF1Button.value;
    	    mouseClickOnF1Button.addEventListener('click', function() {window[f1Button]()}, false);
	  	  
            var mouseClickOnF2Button = document.getElementById(form+'f2');
     	    f2Button = mouseClickOnF2Button.value;
	        mouseClickOnF2Button.addEventListener('click', function() {window[f2Button]()}, false);

            var mouseClickOnF3Button = document.getElementById(form+'f3');
		    f3Button = mouseClickOnF3Button.value;
    	    mouseClickOnF3Button.addEventListener('click', function() {window[f3Button]()}, false);

    	    var mouseClickOnF4Button = document.getElementById(form+'f4');
    	    f4Button = mouseClickOnF4Button.value;
    	    mouseClickOnF4Button.addEventListener('click', function() {window[f4Button]()}, false);

		    var mouseClickOnF5Button = document.getElementById(form+'f5');
    	    f5Button = mouseClickOnF5Button.value;
	        mouseClickOnF5Button.addEventListener('click', function() {window[f5Button]()}, false);

	        var mouseClickOnF6Button = document.getElementById(form+'f6');
		    f6Button = mouseClickOnF6Button.value;
	        mouseClickOnF6Button.addEventListener('click', function() {window[f6Button]()}, false);

			var mouseClickOnF7Button = document.getElementById(form+'f7');
		    f7Button = mouseClickOnF7Button.value;
	    	mouseClickOnF7Button.addEventListener('click', function() {window[f7Button]()}, false);
		  
        }
 		  
	}			  
     //	  document.getElementById(form+'event').value = 1;
    	reselectField(formTable);
}
		  //		  var action = document.getElementById('action').value;	  

function tableInit() {
}

function table(globalAction) {

    var arrowKeysOrPageKeysPressedDown = document.getElementById('searchfield');
    arrowKeysOrPageKeysPressedDown.addEventListener('keydown', searchFieldArrowKeysOrPageKeysPressedDown, false);
    //alert('arrowKeysOrPageKeysPressedDown');
	   
    var enterKeyPressed = document.getElementById('searchfield');
    enterKeyPressed.addEventListener('keypress', enterSelection, false);

    var keysReleasedUp = document.getElementById('searchfield');
    keysReleasedUp.addEventListener('keyup', searchFieldInputKeyAction, false);
          
	var a = document.getElementsByClassName('calendarsundaysaturdaycell');
    var b = document.getElementsByClassName('calendarsundaysaturdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeCurrentMonthDay(this)} );
    }

	var a = document.getElementsByClassName('calendarsundaysaturdaycell');
    var b = document.getElementsByClassName('calendarsundaysaturdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeCurrentMonthDay(this)} );
    }

	var a = document.getElementsByClassName('calendarweekdaycell');
    var b = document.getElementsByClassName('calendarweekdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeCurrentMonthDay(this)} );
    }

	var a = document.getElementsByClassName('calendartodaycell');
    var b = document.getElementsByClassName('calendartodaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeCurrentMonthDay(this)} );
    }
		  
    var a = document.getElementsByClassName('previousmonthcalendarsundaysaturdaycell');
    var b = document.getElementsByClassName('previousmonthcalendarsundaysaturdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changePreviousMonthDay(this)} );
    }

	var a = document.getElementsByClassName('previousmonthcalendarsundaysaturdaycell');
    var b = document.getElementsByClassName('previousmonthcalendarsundaysaturdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changePreviousMonthDay(this)} );
    }

	var a = document.getElementsByClassName('previousmonthcalendarweekdaycell');
    var b = document.getElementsByClassName('previousmonthcalendarweekdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changePreviousMonthDay(this)} );
    }
		  
	var a = document.getElementsByClassName('previousmonthcalendartodaycell');
    var b = document.getElementsByClassName('previousmonthcalendartodaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changePreviousMonthDay(this)} );
    }
		  
    var a = document.getElementsByClassName('nextmonthcalendarsundaysaturdaycell');
    var b = document.getElementsByClassName('nextmonthcalendarsundaysaturdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeNextMonthDay(this)} );
    }

	var a = document.getElementsByClassName('nextmonthcalendarsundaysaturdaycell');
    var b = document.getElementsByClassName('nextmonthcalendarsundaysaturdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeNextMonthDay(this)} );
    }

	var a = document.getElementsByClassName('nextmonthcalendarweekdaycell');
    var b = document.getElementsByClassName('nextmonthcalendarweekdaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeNextMonthDay(this)} );
    }
		  
	var a = document.getElementsByClassName('nextmonthcalendartodaycell');
    var b = document.getElementsByClassName('nextmonthcalendartodaycell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeNextMonthDay(this)} );
    }

    var mouseClickOnYearContainerLeftButton = document.getElementById('yearcontainerbuttonleft')
	mouseClickOnYearContainerLeftButton.addEventListener('click', function() {changePreviousMonth(this)}, false)

    var mouseClickOnYearContainerRightButton = document.getElementById('yearcontainerbuttonright')
	mouseClickOnYearContainerRightButton.addEventListener('click', function() {changeNextMonth(this)}, false)

	var a = document.getElementsByClassName('monthcontainermonthcell');
    var b = document.getElementsByClassName('monthcontainermonthcell').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {changeToMonth(this)} );
    }
    var mouseClickOnMonthContainerPreviousYear = document.getElementById('monthcontainerpreviousyearcell');
    mouseClickOnMonthContainerPreviousYear.addEventListener('click', function() {changePreviousYear(this)} );
          
    var mouseClickOnMonthContainerNextYear = document.getElementById('monthcontainernextyearcell');
    mouseClickOnMonthContainerNextYear.addEventListener('click', function() {changeNextYear(this)} );

    var mouseClickOnAddNoteButton = document.getElementById('addnote')
	mouseClickOnAddNoteButton.addEventListener('click', function() {addNote(this)}, false)
		  
    var mouseClickOnUpdateNoteButton = document.getElementById('updatenote')
	mouseClickOnUpdateNoteButton.addEventListener('click', function() {updateNote(this)}, false)

    var mouseClickOnAddButton = document.getElementById(dataTable+'add')
    add = mouseClickOnAddButton.value;

	var mouseClickOnUpdateButton = document.getElementById(dataTable+'update');
    update = mouseClickOnUpdateButton.value;

	var mouseClickOnSelectButton = document.getElementById(dataTable+'select');
    select = mouseClickOnSelectButton.value;

	var mouseClickOnDeleteButton = document.getElementById(dataTable+'remove');
    remove = mouseClickOnDeleteButton.value;

	var mouseClickOnCancelButton = document.getElementById(dataTable+'cancel');
    cancel = mouseClickOnCancelButton.value;

	var mouseClickOnPrintButton = document.getElementById(dataTable+'print');
    print = mouseClickOnPrintButton.value;

	var mouseClickOnDoneButton = document.getElementById(dataTable+'done');
    done = mouseClickOnDoneButton.value;

	var pageDownButton = document.getElementById(dataTable+'pagedownbutton');
    var pageUpButton = document.getElementById(dataTable+'pageupbutton');
    var mouseClickOnTable = document.getElementById(dataTable);
    var mouseDblClickOnTable = document.getElementById(dataTable);
              
    if (document.getElementById(dataTable+'tablebuttonadd').value === 'yes') {
	    document.getElementById(dataTable+'add').style.display = 'inline';
	    mouseClickOnAddButton.addEventListener('click', function() {window[add]()}, false);
    }
		  
    if (document.getElementById(dataTable+'tablebuttonupdate').value === 'yes') {
        document.getElementById(dataTable+'update').style.display = 'inline';
        mouseClickOnUpdateButton.addEventListener('click', function() {window[update]()}, false);
    }

	if (document.getElementById(dataTable+'tablebuttonview').value === 'yes') {
	    document.getElementById(dataTable+'view').style.display = 'inline';
        mouseClickOnViewButton.addEventListener('click', function() {window[view]()}, false);
    }
0		  
	if (document.getElementById(dataTable+'tablebuttonselect').value === 'yes') {
	    document.getElementById(dataTable+'select').style.display = 'inline';
        mouseClickOnSelectButton.addEventListener('click', function() {window[select]()}, false);
    }

	if (document.getElementById(dataTable+'tablebuttonremove').value === 'yes') {
        document.getElementById(dataTable+'remove').style.display = 'inline';
        mouseClickOnDeleteButton.addEventListener('click', function() {window[remove]()}, false);
    }

	if (document.getElementById(dataTable+'tablebuttoncancel').value === 'yes') {
	    document.getElementById(dataTable+'cancel').style.display = 'inline';
        mouseClickOnCancelButton.addEventListener('click', function() {window[cancel]()}, false);
    }

	if (document.getElementById(dataTable+'tablebuttonprint').value === 'yes') {
	    document.getElementById(dataTable+'print').style.display = 'inline';
        mouseClickOnPrintButton.addEventListener('click', function() {window[print]()}, false);
    }
		  
	if (document.getElementById(dataTable+'tablebuttondone').value === 'yes') {
	    document.getElementById(dataTable+'done').style.display = 'inline';
        mouseClickOnDoneButton.addEventListener('click', function() {window[done]()}, false);
    }

	if (document.getElementById(dataTable+'tablebuttonsumtotal').value === 'yes') {
	    document.getElementById(dataTable+'sumtotal').style.display = 'inline';
        mouseClickOnDoneButton.addEventListener('click', function() {window[done]()}, false);
    }

	if (document.getElementById(dataTable+'tablebuttonpagedown').value === 'yes') {
	    document.getElementById(dataTable+'pagedownbutton').style.display = 'inline';
	    pageDownButton.addEventListener('click', function() {pageDownPressedDown()}, false);
    }
		  
	if (document.getElementById(dataTable+'tablebuttonpageup').value === 'yes') {
	    document.getElementById(dataTable+'pageupbutton').style.display = 'inline';
	    pageUpButton.addEventListener('click', function() {pageUpPressedDown()}, false);
    }

    mouseClickOnTable.addEventListener('click', mouseSelection, false);
 
	mouseDblClickOnTable.addEventListener('dblclick', mouseSelectionDblClick, false);
 
    if (dataTable === 'tra') {			  
	    traTotal();
    } 
    if (dataTable === 'art') {			  
	    artTotal();
    } 

	reselectField();

}	  
    
	/** This function makes sure the search field always has focus on the table or focus on the form field  */
function reselectField(formTable) {
    if (formTable.globalAction === 'table') {
        document.getElementById('searchfield').focus();
	} else {
	    document.getElementById(formTable.name+formTable.itemField).focus();
	}
    return;
	  
    } // end function
    
	
	window.addEventListener('load', init, false);
    
