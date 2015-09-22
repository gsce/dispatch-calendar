function calendarSetupTableForm(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendarsetuptableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function contactTableForm(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcontacttableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function employeeTableForm(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingemployeetableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function dayViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=dayview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function localViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=localview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}
	
function futureViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=futureview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function futureCalendarViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingfuturecalendarviewtableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId;
    window.location.replace(locationAction);
}

function packViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=packview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function crateViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=createview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function calendarPrintButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendarprint.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function noteTableView(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView;
    window.location.replace(locationAction);
}

function refreshPage(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function previousDayButton(calendarObject) {
    var day = calendarObject.day;
    var month = calendarObject.month;
	var year = calendarObject.year
	day = parseInt(day);
	day -= 1;
	if (day < 1) {
        var previousMonth = calendarObject.previousMonth;
	    var previousMonthYear = calendarObject.previousMonthYear;
        var lastDayInMonth = new Date(previousMonthYear, previousMonth, 0).getDate();
	    day = lastDayInMonth;
	    if (calendarObject.previousMonth < 10) {
	        calendarObject.previousMonth = '0'+ calendarObject.previousMonth;
	    }
	    calendarObject.date = calendarObject.previousMonthYear + '/' + calendarObject.previousMonth + '/' + day;
        refreshPage(calendarObject);
	    return;
	} 
	if (day < 10) {
	    day = '0' + day;
    }		
	calendarObject.date =  calendarObject.year + '/' + calendarObject.month + '/' + day;
    refreshPage(calendarObject);
	return;
}

function nextDayButton(calendarObject) {
    var day = calendarObject.day;
    var month = calendarObject.month;
	var year = calendarObject.year
    var lastDayInMonth = new Date(year, month, 0).getDate();
	day = parseInt(day);
	day += 1;
	if (day > lastDayInMonth) {
	    day = '01';
		if (calendarObject.nextMonth < 10) {
	        calendarObject.nextMonth = '0'+ calendarObject.nextMonth;
	    }
	    calendarObject.date =  calendarObject.nextMonthYear + '/' + calendarObject.nextMonth + '/' + day;
        refreshPage(calendarObject);
	    return;
	} 
	if (day < 10) {
	    day = '0' + day;
    }		
	calendarObject.date =  calendarObject.year + '/' + calendarObject.month + '/' + day;
    refreshPage(calendarObject);
	return;
}

function changeCurrentMonthDay(calendarObject) {
 	var day = calendarObject.cell.target.textContent;
	if (day === ' ') {
	   return;
	}   
	if (calendarObject.month < 10) {
	    calendarObject.month = '0'+ calendarObject.month;
	}
	if (day < 10) {
	    day = '0' + day;
    }		
	calendarObject.date =  calendarObject.year + '/' + calendarObject.month + '/' + day;
    refreshPage(calendarObject);
	return;
}	
	
function changePreviousMonthDay(calendarObject) {
    var day = calendarObject.cell.target.textContent;
	if (day === ' ') {
	   return;
	}   
	if (calendarObject.previousMonth < 10) {
	    calendarObject.previousMonth = '0'+ calendarObject.previousMonth;
	}
	if (day < 10) {
	    day = '0' + day;
    }		
	calendarObject.date =  calendarObject.previousMonthYear + '/' + calendarObject.previousMonth + '/' + day;
    refreshPage(calendarObject);
	return;
}

function changePreviousMonth(calendarObject) {
    var day = '01';
	if (calendarObject.previousMonth < 10) {
	    calendarObject.previousMonth = '0'+ calendarObject.previousMonth;
	}
	calendarObject.date = calendarObject.previousMonthYear + '/' + calendarObject.previousMonth + '/' + day;
    refreshPage(calendarObject);
	return;
}

function changeNextMonthDay(calendarObject) {
	var day = calendarObject.cell.target.textContent;
	if (day === ' ') {
	   return;
	}   
	if (calendarObject.nextMonth < 10) {
	    calendarObject.nextMonth = '0'+ calendarObject.nextMonth;
	}
	if (day < 10) {
	    day = '0' + day;
    }		
	calendarObject.date =  calendarObject.nextMonthYear + '/' + calendarObject.nextMonth + '/' + day;
    refreshPage(calendarObject);
	return;
}

function changeNextMonth(calendarObject){
    var day = '01';
	if (calendarObject.nextMonth < 10) {
	    calendarObject.nextMonth = '0'+ calendarObject.nextMonth;
	}
	calendarObject.date =  calendarObject.nextMonthYear + '/' + calendarObject.nextMonth + '/' + day;
    refreshPage(calendarObject);
	return;
}

function changeToMonth(calendarObject) {
    var day = '01';
    var month = calendarObject.cell.target.textContent;
	var year = calendarObject.year 
	if (month === ' ') {
	   return;
	}   
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
	} else if (Number(month) === Number(year) - 1) {
        year--;
	    month = calendarObject.month;
	} else if (Number(month) === Number(year) + 1) {
        year++;
	    month = calendarObject.month;
    }		
	calendarObject.date =  year + '/' + month + '/' + day;
    refreshPage(calendarObject);
	return;
}

function jobContainerLarger(e) {   
    if (document.getElementById('rightcolumncontainer').style.width == '99%') {
	    document.getElementById('rightcolumncontainer').style.width = '63%';
		document.getElementById('leftcolumncontainer').style.width = '36%';
		document.getElementById('rightcolumncontainer').style.zIndex = 'auto' ;
		document.getElementById('centercolumncontainertop').innerHTML = '◄';
	} else {	
		document.getElementById('leftcolumncontainer').style.width = '0%';
	    document.getElementById('rightcolumncontainer').style.width = '99%';
		document.getElementById('centercolumncontainertop').innerHTML = '►';
 	    document.getElementById('rightcolumncontainer').style.zIndex = '300' ;    
	}	
 }

function jobTableNewJob(formTable,calendarObject) {
	formTable.globalAction = 'form';
	formTable.name = 'jobaddform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 2;
	formTable.itemField = 2;
   	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    document.getElementById(formTable.name+'action').value =  'add'; 
	document.getElementById(formTable.name+'noteview').value = calendarObject.noteView;
    document.getElementById(formTable.name+'enteredbyemployeeid').value = document.getElementById('calendaremployeeid').value;
   	document.getElementById(formTable.name+'enteredbyemployeename').value = document.getElementById('calendaremployeename').value;
  	document.getElementById(formTable.name+'container').style.display = "block";
   	reselectField(formTable);
	return;
}

function jobAddFormRadioButton(e,formTable) {
    var radioButton = e.value;
	if (radioButton == 'Interstate' || radioButton == 'International' || radioButton == 'Intrastate') {
	    jobAddFormBookingRadioButton(formTable);
	} else {
	    jobAddFormBookingContinueButton(formTable);
	}
	return;
}
function jobAddFormRadioButton1(i,e,formTable) {
    document.getElementsByName('jobaddformjobtype')[i].checked = true;
    var radioButton = e.innerHTML;
	alert(radioButton);
	if (radioButton == 'Interstate' || radioButton == 'International' || radioButton == 'Intrastate') {
	    jobAddFormBookingRadioButton(formTable);
	} else {
	    jobAddFormBookingContinueButton(formTable);
	}
	return;
}
function jobAddFormBookingRadioButton(formTable){
  	document.getElementById(formTable.name+'bookingcontainer').style.display = "block";
   	reselectField(formTable);
	return;
}
    
function jobAddFormBookingCancelButton(formTable,calendarObject){
  	document.getElementById(formTable.name+'bookingcontainer').style.display = "none";
	jobTableNewJob(formTable,calendarObject)
	return;
}    

function jobAddFormBookingContinueButton(formTable){
 	document.forms[formTable.name].submit();
	return;
}
    
function jobTableUpdate(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.globalAction = 'form';
	formTable.name = 'jobaddform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
   	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    document.getElementById(formTable.name+'action').value =  'update'; 
	document.getElementById(formTable.name+'noteview').value = calendarObject.noteView;
    document.getElementById(formTable.name+'enteredbyemployeeid').value = document.getElementById('calendaremployeeid').value;
   	document.getElementById(formTable.name+'enteredbyemployeename').value = document.getElementById('calendaremployeename').value;
	if (e.target.parentNode.className == 'jobtablenamesofmencell' || e.target.parentNode.className == 'jobtabletimecell' || e.target.className == 'jobtablejobdaytypecolor') {
	    var ee = e.target.parentNode;
	    var rowNumber = ee.parentNode.rowIndex;
	} else {
	    var rowNumber = e.target.parentNode.rowIndex;
	}
	var cellCount = document.getElementById('jobtable').rows[rowNumber].cells.length;
	cellCount -= 1;
    document.getElementById(formTable.name+'automaticnumber').value = document.getElementById('jobtable').rows[rowNumber].cells[cellCount].textContent.trim();
	cellCount -= 1;
	document.getElementById(formTable.name+'jobnumber').value = document.getElementById('jobtable').rows[rowNumber].cells[cellCount].textContent.trim();
 	document.forms[formTable.name].submit();
	return;
}

function rightMouseSelectionMenuOnJobTable(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.name = 'jobaddform';
	formTable.globalAction = 'table';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
	if (e.target.parentNode.className == 'jobtablenamesofmencell' || e.target.parentNode.className == 'jobtabletimecell' || e.target.className == 'jobtablejobdaytypecolor') {
	    var ee = e.target.parentNode;
	    var rowNumber = ee.parentNode.rowIndex;
	} else {
	    var rowNumber = e.target.parentNode.rowIndex;
	}
	var cellCount = document.getElementById('jobtable').rows[rowNumber].cells.length;
	cellCount -= 1;
    calendarObject.pasteAutomaticNumber = document.getElementById('jobtable').rows[rowNumber].cells[cellCount].textContent.trim();
	cellCount -= 1;
	calendarObject.pasteJobNumber = document.getElementById('jobtable').rows[rowNumber].cells[cellCount].textContent.trim();
	//alert(calendarObject.pasteJobNumber+' '+calendarObject.pasteAutomaticNumber);
	var x = rowObject.clientX+'px';
	var y = rowObject.clientY+'px';
	document.getElementById('rightclickmenu').style.top = y;
	document.getElementById('rightclickmenu').style.left = x;
    document.getElementById('rightclickfieldrow').style.display = 'block';
    document.getElementById('copybuttonmenu').style.display = 'block';
    document.getElementById('cutbuttonmenu').style.display = 'none';
    document.getElementById('backbuttonmenu').style.display = 'block';
	document.getElementById('pastebuttonmenu').style.display = 'none';
    reselectField(formTable);
	return;
}
function mouseSelectionOnContextMenu(rowObject,formTable,calendarObject) {
    var e = rowObject;
	if (e.target.id == 'pastebutton' || e.target.id ==  'pastebuttonmenu') {
        document.getElementById('rightclickfieldrow').style.display = 'none';
	    pasteOnCalendar(formTable,calendarObject); 
		return;
	}
    calendarObject.copyCut = e.target.id;
    document.getElementById('rightclickfieldrow').style.display = 'none';
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}
 
function rightClickOnCalendar(formTable,calendarObject) {
	var x = calendarObject.cell.clientX+'px';
	var y = calendarObject.cell.clientY+'px';
	document.getElementById('rightclickmenu').style.top = y;
	document.getElementById('rightclickmenu').style.left = x;
    document.getElementById('rightclickfieldrow').style.display = 'block';
	document.getElementById('copybuttonmenu').style.display = 'none';
	document.getElementById('cutbuttonmenu').style.display = 'none';
	document.getElementById('pastebuttonmenu').style.display = 'block';
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function pasteOnCalendar(formTable,calendarObject) {
 	var day = calendarObject.cell.target.textContent;
	//alert(calendarObject.pasteJobNumber);
	//alert(calendarObject.copyCut);
	if (day === ' ' || calendarObject.pasteJobNumber === 'null' || calendarObject.copyCut === 'backbuttonmenu' || calendarObject.copyCut === 'backbutton') {
	   return;
	}   
	if (day < 10) {
	    day = '0' + day;
    }		
	if (calendarObject.calendar == 'current') {
	    if (calendarObject.month < 10) {
	        calendarObject.month = '0'+ calendarObject.month;
	    }
	    calendarObject.date =  calendarObject.year + '/' + calendarObject.month + '/' + day;
	} else if (calendarObject.calendar == 'previous') {
	    if (calendarObject.previousMonth < 10) {
	        calendarObject.previousMonth = '0'+ calendarObject.previousMonth;
	    }
	    calendarObject.date =  calendarObject.previousMonthYear + '/' + calendarObject.previousMonth + '/' + day;
	} else if (calendarObject.calendar == 'next') {
	    if (calendarObject.nextMonth < 10) {
	        calendarObject.nextMonth = '0'+ calendarObject.nextMonth;
	    }
	    calendarObject.date =  calendarObject.nextMonthYear + '/' + calendarObject.nextMonth + '/' + day;
	}
	//alert(calendarObject.date);
	formTable.globalAction = 'form';
	formTable.name = 'jobaddform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
   	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
	document.getElementById(formTable.name+'noteview').value = calendarObject.noteView;
	if (calendarObject.copyCut === 'copybutton' || calendarObject.copyCut === 'copybuttonmenu') { 
        document.getElementById(formTable.name+'action').value =  'copy';
    } else if (calendarObject.copyCut === 'cutbutton' || calendarObject.copyCut === 'cutbuttonmenu') { 
        document.getElementById(formTable.name+'action').value =  'cut';
    }		
    document.getElementById(formTable.name+'enteredbyemployeeid').value = document.getElementById('calendaremployeeid').value;
   	document.getElementById(formTable.name+'enteredbyemployeename').value = document.getElementById('calendaremployeename').value;
	document.getElementById(formTable.name+'jobnumber').value = calendarObject.pasteJobNumber;
	document.getElementById('calendarcopycut').value = calendarObject.copyCut;
	//alert(document.getElementById(formTable.name+'jobnumber').value);
	calendarObject.pastejobNumber = 'null';
 	document.forms[formTable.name].submit();
	return;

    //alert(pasteObject.jobNumber+' '+pasteObject.automaticNumber);
}

function noteContainerLarger(e) {
    if (document.getElementById('notecontainer').style.top == '0%') {
	    document.getElementById('notecontainer').style.top = '55%';
	    document.getElementById('notecontainer').style.height = '45%';
	    document.getElementById('notetablecontainer').style.height = '87%';
	    document.getElementById('notecontainer').style.width = '99%';
		document.getElementById('notecontainer').style.backgroundColor = 'grey';
		document.getElementById('notecontainer').style.zIndex = 'auto' ;
	    document.getElementById('notetitlecontainerright').innerHTML = '▲';
	    document.getElementById('notetitlecontainerleft').innerHTML = '▲';
		
	} else {	
        document.getElementById('notecontainer').style.top = '0%';
    	document.getElementById('notecontainer').style.height = '100%';
	    document.getElementById('notetablecontainer').style.height = '94%';
	    document.getElementById('notecontainer').style.width = '100%';
		document.getElementById('notecontainer').style.backgroundColor = 'grey';
	    document.getElementById('notecontainer').style.zIndex = '200';
	    document.getElementById('notetitlecontainerleft').innerHTML = '▼';
	    document.getElementById('notetitlecontainerright').innerHTML = '▼';
		
	}	
 }

function noteTableSendMessage(formTable,calendarObject) {
	formTable.globalAction = 'form';
	formTable.name = 'noteform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 2;
	formTable.itemField = 2;
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth()+1;
	var year = date.getFullYear();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
	hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var strTime = month + '-' + day + '-' + year + ' ' + hours + ':' + minutes + ' ' + ampm;
   	document.getElementById(formTable.name+'datetime').value = strTime;
   	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    document.getElementById(formTable.name+'action').value =  'add'; 
	document.getElementById(formTable.name+'noteview').value = calendarObject.noteView;
   	document.getElementsByName(formTable.name+'sentbyemployeename')[0].value = document.getElementById('calendaremployeename').value;
    document.getElementsByName(formTable.name+'sentbyemployeeid')[0].value = document.getElementById('calendaremployeeid').value;
  	document.getElementById(formTable.name+'container').style.display = "block";
    document.getElementById(formTable.name+'done').style.display = 'none'; // we need to hide the done button for sending a note -- employee buttons will appear instead
   	reselectField(formTable);
}

function noteTableUpdate(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.globalAction = 'form';
	formTable.name = 'noteform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 2;
	formTable.itemField = 2;
   	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
   	document.getElementsByName(formTable.name+'datetime')[0].value = e.target.parentNode.cells[0].textContent.trim();
   	document.getElementsByName(formTable.name+'sentbyemployeename')[0].value = e.target.parentNode.cells[2].textContent.trim();
   	document.getElementsByName(formTable.name+'note')[0].value = e.target.parentNode.cells[1].textContent.trim();
	document.getElementsByName(formTable.name+'noteid')[0].value = e.target.parentNode.cells[3].textContent.trim();
    document.getElementById(formTable.name+'action').value =  'update'; 
	document.getElementById(formTable.name+'noteview').value = calendarObject.noteView;
 	document.getElementById(formTable.name+'container').style.display = 'block';
    document.getElementById(formTable.name+'employeebuttons').style.display = 'none'; // we need to hide the employee buttons when updating note -- done button will appear instead
   	reselectField(formTable);
}

function noteFormSendButton(e,formTable) {
    document.getElementById('noteformemployeeidnoteisfor').value =  e.value;
    document.getElementById('noteformemployeenamenoteisfor').value =  e.innerHTML;
    document.getElementsByName(formTable.name+'checkbox'+e.value)[0].value = '1';
 	document.forms[formTable.name].submit();
	return;
}

function mouseOverNoteTable(rowObject,formTable,calendarObject) {
    var e = rowObject;
//    e.target.parentNode.style.background = "orange";
//	e.target.parentNode.style.color = "white";
	document.getElementById('popupheader').style.display = "block";
	if (calendarObject.noteView == 'sentmessages') {
	    document.getElementById('popupheader').innerHTML = e.target.parentNode.cells[0].textContent + ' ' + e.target.parentNode.cells[1].textContent +'  Sent To : ' + e.target.parentNode.cells[5].textContent;
	} else {
	    document.getElementById('popupheader').innerHTML = e.target.parentNode.cells[0].textContent + ' ' + e.target.parentNode.cells[1].textContent +'  Sent By : ' + e.target.parentNode.cells[3].textContent;
    }
	document.getElementById('popup').style.display = "block";
	document.getElementById('popup').innerHTML =  e.target.parentNode.cells[2].textContent;
	document.getElementById('jobtablecontainer').style.opacity = '.1'; 
	return;
}

function mouseOutNoteTable(rowObject,formTable)  {
    var e = rowObject;
//	if ((e.target.parentNode.rowIndex % 2) == 1) {
//	    e.target.parentNode.style.background = "#DCDCDC";
//	} else { 
//	    e.target.parentNode.style.background = "white";
//	}   
//	e.target.parentNode.style.color = "black";
	document.getElementById('popupheader').style.display = "none";
	document.getElementById('popup').style.display = "none";
	document.getElementById('jobtablecontainer').style.opacity = '1'; 
}

	/** This initializes the event listeners after the window has loaded */


function init() {
 		
    defaultIpAddress = document.getElementById('defaultipaddress').value;
	
 //   alert(globalAction);
    var e;
	var keyboardKeyCode;
	var keyboardObject;
	var rowObject;
	var calendarObject = {
	    calendarId: document.getElementById('calendarid').value,
		calendarView: document.getElementById('calendarview').value,
	    employeeId: document.getElementById('calendaremployeeid').value,
	    employeeName: document.getElementById('calendaremployeename').value,
		day: document.getElementById('calendarday').value,
		month: document.getElementById('calendarmonth').value,
	    year: document.getElementById('calendaryear').value,
		previousMonth: document.getElementById('previouscalendarmonth').value,
	    previousMonthYear: document.getElementById('previouscalendarmonthyear').value,
		nextMonth: document.getElementById('nextcalendarmonth').value,
	    nextMonthYear: document.getElementById('nextcalendarmonthyear').value,
		date: document.getElementById('calendardateholder').value,
		pasteJobNumber: document.getElementById('calendarpastejobnumber').value,
        pasteAutomaticNumber: null,
		copyCut: document.getElementById('calendarcopycut').value,
		calendar: 'current',
		noteView: document.getElementById('noteview').value,
		employeeInitials: document.getElementById('employeeinitials').value,
		cell: null
	};

    var formTable = {
	    globalAction: document.getElementById('globalaction').value,
		action: document.getElementById('action').value,
		name: document.getElementById('formtable').value,
		calc: 'Calc',
		startItemField: document.getElementById('startitemfield').value,
		totalItemFields: document.getElementById('totalitemfields').value,
		itemField: document.getElementById('startitemfield').value,
		keyValue: null
    };
    

	// keyboard event listeners for keyboard control *****************************************************************************************************************************
    window.addEventListener('keydown', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;searchFieldArrowKeysOrPageKeysPressedDown(formTable,keyboardObject)}, false);
    window.addEventListener('keypress', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;enterSelection(formTable,keyboardObject)}, false); 

    window.print();
	refreshPage(calendarObject);

	return;
};

	window.addEventListener('load', init, false);
