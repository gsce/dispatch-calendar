
	/** This function checks the keydown event and handles the
	  * arrow keys, page up and down keys, and the keys assigned
	  * to the buttons at the bottom of the table.
	  * Also this function disables the backspace key, f5 refresh key */
	function searchFieldArrowKeysOrPageKeysPressedDown(formTable,keyboardObject) {
	//  alert(keyValue);
	  if (formTable.globalAction === 'table') {
         // var table = document.getElementById(dataTable); 
	     // var totalTableRows = table.rows.length - 1;
	  }
      
      if (formTable.keyValue === 40) { // Arrow Down
	      if (formTable.globalAction ==='form') {
              if (document.activeElement.tagName === 'SELECT') {
        	      return;
			  }
		      downArrowPressedDown(formTable); 
			  return formTable;
		  }
 		  return;
      } else if (formTable.keyValue === 38) {   // Arrow Up
		  if (formTable.globalAction ==='form') {
              if (document.activeElement.tagName === 'SELECT') {
        	      return;
			  }
		      upArrowPressedDown(formTable);
			  return;
		  }
		  return;
      } else if (formTable.keyValue === 33) {    // Page Up 
		  return;
      } else if (formTable.keyValue === 34) {    // Page Down                                                 
		  return;
      } else if (formTable.keyValue === 35) {    // End Key                                                
		  return;
      } else if (formTable.keyValue === 36) {    // Home Key                                             
		  return;
      } else if (formTable.keyValue === 8) {     // Back Space  
          if (formTable.globalAction != 'form') {
         	  keyboardObject.preventDefault();  
		  }	  
		  return;
      } else if (formTable.keyValue === 9) {     // Tab Key                         
	      tabKeyPressed(formTable);
		  reselectField(formTable);
          keyboardObject.preventDefault();  
    	  return;	  
	  } else if (formTable.keyValue === 27) {    // Esc KEY                              
          keyboardObject.preventDefault();  
   		  // window[cancel]();
          return false;
      } else if (formTable.keyValue === 45) {    // Insert Key
	      /** insert key to add  */
       	  keyboardObject.preventDefault();  
	      return;
	  } else if (formTable.keyValue === 46) {    // Delete Key
	      /** delete key   */
	      return false;
   	  } else if (formTable.keyValue === 112) {   // F1 Key
    	  keyboardObject.preventDefault();  
 	      if (formTable.globalAction == 'form') {
			  employeeInitials = document.getElementById(formTable.name+'employeeinitials').value;
     	      if (document.activeElement.tagName === 'TEXTAREA' || document.activeElement.type === 'text' ) {
			      if (document.activeElement.selectionStart || document.activeElement.selectionStart == '0') {
                      var startPos = document.activeElement.selectionStart;
                      var endPos = document.activeElement.selectionEnd;
					  var dateObject = new Date();
                      var dateStamp = dateObject.getMonth() + 1 + '/' + dateObject.getDate();
					  var timeStamp = dateObject.getHours().toString() + dateObject.getMinutes().toString(); 
					  var myValue = dateStamp + ' ' + timeStamp + ' ' + employeeInitials;
                      document.activeElement.value = document.activeElement.value.substring(0, startPos) + myValue + document.activeElement.value.substring(endPos, document.activeElement.value.length);
                      document.activeElement.selectionStart = startPos + myValue.length;
                      document.activeElement.selectionEnd = startPos + myValue.length;
                  } else {
                      document.activeElement.value += myValue;
                  }
			  }
			  return;
          } 
	      return;
	  } else if (formTable.keyValue === 113) {   // F2 Key
		  keyboardObject.preventDefault();
	      return;
	  } else if (formTable.keyValue === 114) {   // F3 Key
		  keyboardObject.preventDefault();
	      return;
	  } else if (formTable.keyValue === 115) {   // F4 Key
		  keyboardObject.preventDefault();
	      return;
     } else if (formTable.keyValue == 116) { 	   // F5 Key                                	  
	      /** disable F5 key refresh and change assign to 
		    * view account transactions button */
	  	  keyboardObject.preventDefault();
          return false;		  
	  } else if (formTable.keyValue === 117) {   // F6 Key 
		  keyboardObject.preventDefault();
	      return false;
	  } else if (formTable.keyValue === 118) {   // F7 Key
		  keyboardObject.preventDefault();
	      return false;
	  } else if (formTable.keyValue === 121) { 
	      /** f10 key   */
		  keyboardObject.preventDefault();
	      return false;
	  } else if (formTable.keyValue === 122) { 
	      /** f11 key   */
		  keyboardObject.preventDefault();
	      return false;
	  } else if (formTable.keyValue === 123) { 
	      /** f12 key   */
		  keyboardObject.preventDefault();
	      return false;
	  } 

    } // end function

	/** This function handles the arrow down key */
	function downArrowPressedDown(formTable) {
   	  if (document.activeElement.tagName === 'TEXTAREA' && document.activeElement.selectionStart < document.activeElement.value.length) {
		  return;
      }		  
 	  if (formTable.globalAction == 'form') {
          if (formTable.itemField < formTable.totalItemFields) {
              formTable.itemField = ++formTable.itemField;
	      } else {
	          formTable.itemField = formTable.startItemField;
	      }
          //window[formcalc]();
	      return;
	  }
      return;	  
    } // end function

    /** This function handles the arrow up key  */
	function upArrowPressedDown(formTable) {
   	  if (document.activeElement.tagName === 'TEXTAREA' && document.activeElement.selectionStart > 0) {
		  return;
      }		  
 
      if (formTable.globalAction == 'form') {
          if (formTable.itemField > formTable.startItemField) {
              formTable.itemField = --formTable.itemField;
		  } else {
	          formTable.itemField = formTable.totalItemFields;
	      }
	      return;
      }	
      return;	  
    } // end function

	/** This function checks the keypress event. If the enter key
	  * is pressed it prevents the default enter key event and moves the cursor like the
      * tab key through the form */
    function enterSelection(formTable,keyboardObject) {
	  if (formTable.keyValue != 13) {
	      /** if not enter key return focus back to search field */
		  reselectField(formTable);
	      return;
      }
      if (document.activeElement.tagName === 'TEXTAREA') {
   		  reselectField(formTable);
		  return;
	  } else {	  
	      keyboardObject.preventDefault();
      }		  
 	  if (formTable.globalAction == 'form') {
 	      if (formTable.itemField < formTable.totalItemFields) {
              formTable.itemField = ++formTable.itemField;
    		  reselectField(formTable);
			  return;
		  } else {
		      formTable.itemField = formTable.startItemField;
			  reselectField(formTable);
			  return;
          }
	      return;
	  }
    } // end function
      
    function tabKeyPressed(formTable) {
 	  if (formTable.globalAction == 'form') {
          if (formTable.itemField < formTable.totalItemFields) {
              formTable.itemField = ++formTable.itemField;
          } else {
              formTable.itemField = formTable.startItemField;
          }
		  return;
	  }
      return;
	}

	function mouseSelectionForm(e,formTable) {
      if (formTable.globalAction === 'form') {	
	      /** Test mouseSelect for Nan return and change to 0 if so */
	      if (document.activeElement.tabIndex > 0) {                                                
	          formTable.itemField = document.activeElement.tabIndex;
	      } else {
	      reselectField(formTable);
          }
          return;
	  } else {
	      reselectField(formTable);
		  return;
      }

    }
	
   	/** This function makes sure the search field always has focus on the table or focus on the form field  */
    function reselectField(formTable) {
      if (formTable.globalAction === 'table') {
           document.getElementById('searchfield').focus();
      } else {
       	var elementsInForm = document.getElementById(formTable.name).elements.length;
    	var formElement = document.getElementById(formTable.name);
        for (var i = 0; i < (elementsInForm); i++) {
            if (formElement.elements[i].hidden == false) {
    	        if (formElement.elements[i].tabIndex == formTable.itemField) {
    		        formElement.elements[i].focus();
 	         	    if (document.activeElement.tagName === 'SELECT' & formTable.keyValue != '9') {
					    if (formTable.keyValue == '40') {
                            if (formTable.itemField < formTable.totalItemFields) {
                                formTable.itemField = ++formTable.itemField;
	                        } else {
	                            formTable.itemField = formTable.startItemField;
	                        }
					        reselectField(formTable);
        			        return;
					    } else if (formTable.keyValue == '38'){
                            if (formTable.itemField > formTable.startItemField) {
                                formTable.itemField = --formTable.itemField;
		                    } else {
	                            formTable.itemField = formTable.totalItemFields;
	                        }
					        reselectField(formTable);
        			        return;
						}
						return;
			        }    
    			    return;
    		    }	
    		}
        }
      }
      return;
    } // end function
    //defaultIpAddress = document.getElementById('defaultipaddress').value;