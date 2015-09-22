function calendarSetupTableForm(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendarsetuptableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function contactTableForm(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcontacttableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function employeeTableForm(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingemployeetableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function dayViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=dayview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function localViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=localview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}
	
function futureViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=futureview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function futureCalendarViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingfuturecalendarviewtableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId;
    window.location.replace(locationAction);
}

function packViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=packview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function crateViewButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview=crateview&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function searchViewButton(formTable,calendarObject) {
	formTable.name = 'searchform';
	formTable.globalAction = 'form';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
    document.getElementById('searchfieldrow').style.display = 'block';
    reselectField(formTable);
    return;
}

function searchFieldButton(rowObject, calendarObject) {
    var e = rowObject;
	if (e.target.id == 'searchfieldnamebutton') {
	    calendarObject.calendarView = 'searchviewname';
	} else if (e.target.id == 'searchfielddatebutton') {
		  calendarObject.calendarView = 'searchviewdate';
	} else if (e.target.id == 'searchfieldaddressbutton') {
		  calendarObject.calendarView = 'searchviewaddress';
	} else if (e.target.id == 'searchfieldjobcoordinatornotebutton') {
		  calendarObject.calendarView = 'searchviewjobcoordinatornote';
	} else if (e.target.id == 'searchfielddaynotebutton') {
		  calendarObject.calendarView = 'searchviewdaynote';
	}
    searchField = document.getElementById('searchfieldinput').value;
	searchField = searchField.toUpperCase();
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function calendarPrintButton(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendarprint.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function noteTableView(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
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
	if (e.target.id == 'jobtablecontainer'){
	    var x = rowObject.clientX+'px';
	    var y = rowObject.clientY+'px';
		if (calendarObject.calendarId == '3') {
            reselectField(formTable);
	        return;
	    }
	    document.getElementById('rightclickmenu').style.top = y;
	    document.getElementById('rightclickmenu').style.left = x;
        document.getElementById('rightclickfieldrow').style.display = 'block';
        document.getElementById('jobprintbuttonmenu').style.display = 'none';
        document.getElementById('localjobprintbuttonmenu').style.display = 'none';
        document.getElementById('noworkbuttonmenu').style.display = 'block';
        document.getElementById('canceljobbuttonmenu').style.display = 'none';
        document.getElementById('calendarbuttonmenu').style.display = 'none';
        document.getElementById('copybuttonmenu').style.display = 'none';
        document.getElementById('cutbuttonmenu').style.display = 'none';
        document.getElementById('deletedayjobbuttonmenu').style.display = 'none';
        document.getElementById('deletetotaljobbuttonmenu').style.display = 'none';
        document.getElementById('undeletedayjobbuttonmenu').style.display = 'none';
        document.getElementById('undeletetotaljobbuttonmenu').style.display = 'none';
        document.getElementById('backbuttonmenu').style.display = 'block';
	    document.getElementById('pasteasnewbuttonmenu').style.display = 'none';
	    document.getElementById('pasteasupdatebuttonmenu').style.display = 'none';
        reselectField(formTable);
	    return;
	}
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
	if (rowObject.clientY > 500) {
    	var y = '425'+'px';
	} else {
	    var y = rowObject.clientY+'px';
	}
	if (calendarObject.calendarId == 3) {
	    document.getElementById('rightclickmenu').style.top = y;
	    document.getElementById('rightclickmenu').style.left = x;
        document.getElementById('rightclickfieldrow').style.display = 'block';
        document.getElementById('jobprintbuttonmenu').style.display = 'none';
        document.getElementById('localjobprintbuttonmenu').style.display = 'none';
        document.getElementById('noworkbuttonmenu').style.display = 'none';
        document.getElementById('canceljobbuttonmenu').style.display = 'none';
        document.getElementById('calendarbuttonmenu').style.display = 'none';
        document.getElementById('copybuttonmenu').style.display = 'none';
        document.getElementById('cutbuttonmenu').style.display = 'none';
        document.getElementById('deletedayjobbuttonmenu').style.display = 'none';
        document.getElementById('deletetotaljobbuttonmenu').style.display = 'none';
        document.getElementById('undeletedayjobbuttonmenu').style.display = 'block';
        document.getElementById('undeletetotaljobbuttonmenu').style.display = 'block';
        document.getElementById('backbuttonmenu').style.display = 'block';
	    document.getElementById('pasteasnewbuttonmenu').style.display = 'none';
	    document.getElementById('pasteasupdatebuttonmenu').style.display = 'none';
    } else {
	    document.getElementById('rightclickmenu').style.top = y;
	    document.getElementById('rightclickmenu').style.left = x;
        document.getElementById('rightclickfieldrow').style.display = 'block';
        document.getElementById('jobprintbuttonmenu').style.display = 'block';
        document.getElementById('localjobprintbuttonmenu').style.display = 'block';
        document.getElementById('noworkbuttonmenu').style.display = 'block';
        document.getElementById('canceljobbuttonmenu').style.display = 'block';
        document.getElementById('calendarbuttonmenu').style.display = 'block';
        document.getElementById('copybuttonmenu').style.display = 'block';
        document.getElementById('cutbuttonmenu').style.display = 'none';
        document.getElementById('deletedayjobbuttonmenu').style.display = 'block';
        document.getElementById('deletetotaljobbuttonmenu').style.display = 'block';
        document.getElementById('undeletedayjobbuttonmenu').style.display = 'none';
        document.getElementById('undeletetotaljobbuttonmenu').style.display = 'none';
        document.getElementById('backbuttonmenu').style.display = 'block';
	    document.getElementById('pasteasnewbuttonmenu').style.display = 'none';
	    document.getElementById('pasteasupdatebuttonmenu').style.display = 'none';
	}
    reselectField(formTable);
	return;
}
function mouseSelectionOnContextMenu(rowObject,formTable,calendarObject) {
    var e = rowObject;
	if (e.target.id == 'pasteasupdatebutton' || e.target.id ==  'pasteasupdatebuttonmenu') {
        document.getElementById('rightclickfieldrow').style.display = 'none';
	    pasteAsUpdateOnCalendar(formTable,calendarObject); 
		return;
	}
	if (e.target.id == 'pasteasnewbutton' || e.target.id ==  'pasteasnewbuttonmenu') {
        document.getElementById('rightclickfieldrow').style.display = 'none';
	    pasteAsNewOnCalendar(formTable,calendarObject); 
		return;
	}
	if (e.target.id == 'calendarbutton' || e.target.id == 'calendarbuttonmenu') {
        document.getElementById('rightclickfieldrow').style.display = 'none';
        jobCalendarView(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'jobprintbutton' || e.target.id == 'jobprintbuttonmenu') {
        document.getElementById('rightclickfieldrow').style.display = 'none';
        jobPrint(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'localjobprintbutton' || e.target.id == 'localjobprintbuttonmenu') {
        document.getElementById('rightclickfieldrow').style.display = 'none';
        localJobPrint(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'noworkbutton' || e.target.id == 'noworkbuttonmenu'){
        document.getElementById('rightclickfieldrow').style.display = 'none';
        noWork(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'canceljobbutton' || e.target.id == 'canceljobbuttonmenu'){
        document.getElementById('rightclickfieldrow').style.display = 'none';
        cancelJob(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'deletedayjobbutton' || e.target.id == 'deletedayjobbuttonmenu'){
        document.getElementById('rightclickfieldrow').style.display = 'none';
        deleteDayJob(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'deletetotaljobbutton' || e.target.id == 'deletetotaljobbuttonmenu'){
        document.getElementById('rightclickfieldrow').style.display = 'none';
        deleteTotalJob(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'undeletedayjobbutton' || e.target.id == 'undeletedayjobbuttonmenu'){
    	document.getElementById('rightclickfieldrow').style.display = 'none';
        undeleteDayJob(rowObject,formTable,calendarObject);
		return;
	}
	if (e.target.id == 'undeletetotaljobbutton' || e.target.id == 'undeletetotaljobbuttonmenu'){
        document.getElementById('rightclickfieldrow').style.display = 'none';
        undeleteTotalJob(rowObject,formTable,calendarObject);
		return;
	}
    calendarObject.copyCut = e.target.id;
    document.getElementById('rightclickfieldrow').style.display = 'none';
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

// This clears the Context Menu when someone clicks outside of the right click menu
function rightClickOnRightClickFieldRow(formTable,calendarObject) {
        document.getElementById('rightclickfieldrow').style.display = 'none';
        return;
}
		
function rightClickOnCalendar(formTable,calendarObject) {
	var x = calendarObject.cell.clientX+'px';
	var y = calendarObject.cell.clientY+'px';
	document.getElementById('rightclickmenu').style.top = y;
	document.getElementById('rightclickmenu').style.left = x;
    document.getElementById('rightclickfieldrow').style.display = 'block';
	document.getElementById('jobprintbuttonmenu').style.display = 'none';
	document.getElementById('localjobprintbuttonmenu').style.display = 'none';
	document.getElementById('noworkbuttonmenu').style.display = 'none';
    document.getElementById('canceljobbuttonmenu').style.display = 'none';
    document.getElementById('calendarbuttonmenu').style.display = 'none';
    document.getElementById('deletedayjobbuttonmenu').style.display = 'none';
    document.getElementById('undeletetotaljobbuttonmenu').style.display = 'none';
    document.getElementById('undeletedayjobbuttonmenu').style.display = 'none';
    document.getElementById('deletetotaljobbuttonmenu').style.display = 'none';
	document.getElementById('copybuttonmenu').style.display = 'none';
	document.getElementById('cutbuttonmenu').style.display = 'none';
	document.getElementById('pasteasnewbuttonmenu').style.display = 'block';
	document.getElementById('pasteasupdatebuttonmenu').style.display = 'block';
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function jobPrint(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingjobtableformprint.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function localJobPrint(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kinglocaljobtableformprint.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function noWork(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingnoworkpost.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function cancelJob(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingcanceljobpost.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function deleteDayJob(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingdeletedayjobpost.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function deleteTotalJob(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingdeletetotaljobpost.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function undeleteDayJob(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingundeletedayjobpost.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function undeleteTotalJob(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingundeletetotaljobpost.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&calendarpasteautomaticnumber='+calendarObject.pasteAutomaticNumber+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function jobCalendarView(rowObject,formTable,calendarObject) {
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
    document.getElementById(formTable.name+'action').value =  'popupcalendar';
    document.getElementById(formTable.name+'enteredbyemployeeid').value = document.getElementById('calendaremployeeid').value;
   	document.getElementById(formTable.name+'enteredbyemployeename').value = document.getElementById('calendaremployeename').value;
	document.getElementById(formTable.name+'jobnumber').value = calendarObject.pasteJobNumber;
	document.getElementById('calendarcopycut').value = calendarObject.copyCut;
	calendarObject.pastejobNumber = 'null';
 	document.forms[formTable.name].submit();
	return;
}

function pasteAsNewOnCalendar(formTable,calendarObject) {
 	var day = calendarObject.cell.target.textContent;
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
        document.getElementById(formTable.name+'action').value =  'copynew';
    } else if (calendarObject.copyCut === 'cutbutton' || calendarObject.copyCut === 'cutbuttonmenu') { 
        document.getElementById(formTable.name+'action').value =  'cut';
    }		
    document.getElementById(formTable.name+'enteredbyemployeeid').value = document.getElementById('calendaremployeeid').value;
   	document.getElementById(formTable.name+'enteredbyemployeename').value = document.getElementById('calendaremployeename').value;
	document.getElementById(formTable.name+'jobnumber').value = calendarObject.pasteJobNumber;
	document.getElementById('calendarcopycut').value = calendarObject.copyCut;
	calendarObject.pastejobNumber = 'null';
 	document.forms[formTable.name].submit();
	return;
}


function pasteAsUpdateOnCalendar(formTable,calendarObject) {
 	var day = calendarObject.cell.target.textContent;
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
	calendarObject.pastejobNumber = 'null';
 	document.forms[formTable.name].submit();
	return;
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
	document.getElementById('popupheader').style.display = "none";
	document.getElementById('popup').style.display = "none";
	document.getElementById('jobtablecontainer').style.opacity = '1'; 
	return;
}

function noteTableSearchButton(formTable,calendarObject) {
	formTable.name = 'notetablesearchform';
	formTable.globalAction = 'form';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
    document.getElementById('notetablesearchfieldrow').style.display = 'block';
    reselectField(formTable);
    return;
}

function noteTableSearchFieldButton(rowObject, calendarObject) {
    var e = rowObject;
	if (e.target.id == 'notetablesearchfieldreceivedbutton') {
	    calendarObject.noteView = 'notetablesearchviewreceived';
	} else if (e.target.id == 'notetablesearchfieldsentbutton') {
		  calendarObject.noteView = 'notetablesearchviewsent';
	} else if (e.target.id == 'notetablesearchfielddatereceivedbutton') {
		  calendarObject.noteView = 'notetablesearchviewdatereceived';
	} else if (e.target.id == 'notetablesearchfielddatesentbutton') {
		  calendarObject.noteView = 'notetablesearchviewdatesent';
	}
    searchField = document.getElementById('notetablesearchfieldinput').value;
	searchField = searchField.toUpperCase();
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}


	/** This initializes the event listeners after the window has loaded */
function init() {
    defaultIpAddress = document.getElementById('defaultipaddress').value;
    //alert(document.getElementById('employeeinitials').value);
    var e;
	var keyboardKeyCode;
	var keyboardObject;
	var rowObject;
	var calendarObject = {
	    calendarId: document.getElementById('calendarid').value,
		calendarView: document.getElementById('jobaddformcalendarview').value,
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
		noteView: document.getElementById('noteformnoteview').value,
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

	document.getElementById('jobtableadd').style.background = 'red';
	document.getElementById('jobtableadd').style.color = 'white';
	document.getElementById('jobtableadd').style.border = '1px solid grey';
    document.getElementById('jobtableadd').style.borderRadius = '5px';

	document.getElementById('notetableadd').style.background = 'red';
	document.getElementById('notetableadd').style.color = 'white';
	document.getElementById('notetableadd').style.border = '1px solid grey';
    document.getElementById('notetableadd').style.borderRadius = '5px';

	// Set view buttons above job table to blue to show which view we are in *****************************************************************************************************
	if (calendarObject.calendarView == 'dayview'){
	    document.getElementById('dayviewbutton').style.background = 'blue';
	    document.getElementById('dayviewbutton').style.color= 'white';
	    document.getElementById('dayviewbutton').style.border = '1px solid grey';
        document.getElementById('dayviewbutton').style.borderRadius = '5px';
	} else if (calendarObject.calendarView == 'localview'){
	    document.getElementById('localviewbutton').style.background = 'blue';
	    document.getElementById('localviewbutton').style.color = 'white';
	    document.getElementById('localviewbutton').style.border = '1px solid grey';
        document.getElementById('localviewbutton').style.borderRadius = '5px';
	} else if (calendarObject.calendarView == 'futureview'){
	    document.getElementById('futureviewbutton').style.background = 'blue';
	    document.getElementById('futureviewbutton').style.color = 'white';
	    document.getElementById('futureviewbutton').style.border = '1px solid grey';
        document.getElementById('futureviewbutton').style.borderRadius = '5px';
	} else if (calendarObject.calendarView == 'packview'){
	    document.getElementById('packviewbutton').style.background = 'blue';
	    document.getElementById('packviewbutton').style.color = 'white';
	    document.getElementById('packviewbutton').style.border = '1px solid grey';
        document.getElementById('packviewbutton').style.borderRadius = '5px';
	} else if (calendarObject.calendarView == 'crateview'){
	    document.getElementById('crateviewbutton').style.background = 'blue';
	    document.getElementById('crateviewbutton').style.color = 'white';
	    document.getElementById('crateviewbutton').style.border = '1px solid grey';
        document.getElementById('crateviewbutton').style.borderRadius = '5px';
	} else if (calendarObject.calendarView == 'searchviewname' || calendarObject.calendarView == 'searchviewdate' || calendarObject.calendarView == 'searchviewaddress' || calendarObject.calendarView == 'searchviewjobcoordinatornote' || calendarObject.calendarView == 'searchviewdaynote'){
	    document.getElementById('searchviewbutton').style.background = 'blue';
	    document.getElementById('searchviewbutton').style.color = 'white';
	    document.getElementById('searchviewbutton').style.border = '1px solid grey';
        document.getElementById('searchviewbutton').style.borderRadius = '5px';
    }		
	if (calendarObject.noteView == 'receivedmessages') { 	
	    document.getElementById('notetablereceivedmessagesviewbutton').style.background = 'blue';
	    document.getElementById('notetablereceivedmessagesviewbutton').style.color= 'white';
	    document.getElementById('notetablereceivedmessagesviewbutton').style.border = '1px solid grey';
        document.getElementById('notetablereceivedmessagesviewbutton').style.borderRadius = '5px';
    } else if (calendarObject.noteView == 'sentmessages') { 	
	    document.getElementById('notetablesentmessagesviewbutton').style.background = 'blue';
	    document.getElementById('notetablesentmessagesviewbutton').style.color= 'white';
	    document.getElementById('notetablesentmessagesviewbutton').style.border = '1px solid grey';
        document.getElementById('notetablesentmessagesviewbutton').style.borderRadius = '5px';
    } else if (calendarObject.noteView == 'notetablesearchviewsent') { 	
	    document.getElementById('notetablesearchbutton').style.background = 'blue';
	    document.getElementById('notetablesearchbutton').style.color= 'white';
	    document.getElementById('notetablesearchbutton').style.border = '1px solid grey';
        document.getElementById('notetablesearchbutton').style.borderRadius = '5px';
    } else if (calendarObject.noteView == 'notetablesearchviewreceived') { 	
	    document.getElementById('notetablesearchbutton').style.background = 'blue';
	    document.getElementById('notetablesearchbutton').style.color= 'white';
	    document.getElementById('notetablesearchbutton').style.border = '1px solid grey';
        document.getElementById('notetablesearchbutton').style.borderRadius = '5px';
    } else if (calendarObject.noteView == 'notetablesearchviewdatereceived') { 	
	    document.getElementById('notetablesearchbutton').style.background = 'blue';
	    document.getElementById('notetablesearchbutton').style.color= 'white';
	    document.getElementById('notetablesearchbutton').style.border = '1px solid grey';
        document.getElementById('notetablesearchbutton').style.borderRadius = '5px';
    } else if (calendarObject.noteView == 'notetablesearchviewdatesent') { 	
	    document.getElementById('notetablesearchbutton').style.background = 'blue';
	    document.getElementById('notetablesearchbutton').style.color= 'white';
	    document.getElementById('notetablesearchbutton').style.border = '1px solid grey';
        document.getElementById('notetablesearchbutton').style.borderRadius = '5px';
	}
	
    setInterval(function(){ refreshPage(calendarObject); }, 90000);
	
	// keyboard event listeners for keyboard control *****************************************************************************************************************************
    window.addEventListener('keydown', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;searchFieldArrowKeysOrPageKeysPressedDown(formTable,keyboardObject)}, false);
    window.addEventListener('keypress', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;enterSelection(formTable,keyboardObject)}, false); 

	// Event listeners for top row of menu buttons *******************************************************************************************************************************
	var mouseClickOnCalendarSetupButton = document.getElementById('calendarsetuptablebutton');
    mouseClickOnCalendarSetupButton.addEventListener('click', function() {calendarSetupTableForm(calendarObject)}, false);

	var mouseClickOnCalendarContactButton = document.getElementById('contacttablebutton');
    mouseClickOnCalendarContactButton.addEventListener('click', function() {contactTableForm(calendarObject)}, false);

	var mouseClickOnCalendarEmployeeButton = document.getElementById('employeetablebutton');
    mouseClickOnCalendarEmployeeButton.addEventListener('click', function() {employeeTableForm(calendarObject)}, false);

    var mouseClickOnDayViewButton = document.getElementById('dayviewbutton');
	mouseClickOnDayViewButton.addEventListener('click', function() {dayViewButton(calendarObject)}, false);

    var mouseClickOnLocalViewButton = document.getElementById('localviewbutton');
	mouseClickOnLocalViewButton.addEventListener('click', function() {localViewButton(calendarObject)}, false);

    var mouseClickOnFutureViewButton = document.getElementById('futureviewbutton');
	mouseClickOnFutureViewButton.addEventListener('click', function() {futureViewButton(calendarObject)}, false);

    var mouseClickOnPackViewButton = document.getElementById('packviewbutton');
	mouseClickOnPackViewButton.addEventListener('click', function() {packViewButton(calendarObject)}, false);

    var mouseClickOnCrateViewButton = document.getElementById('crateviewbutton');
	mouseClickOnCrateViewButton.addEventListener('click', function() {crateViewButton(calendarObject)}, false);
	
    var mouseClickOnSearchViewButton = document.getElementById('searchviewbutton');
	mouseClickOnSearchViewButton.addEventListener('click', function() {searchViewButton(formTable,calendarObject)}, false);

    var mouseClickOnCalendarPrintButton = document.getElementById('calendarprintbutton');
	mouseClickOnCalendarPrintButton.addEventListener('click', function() {calendarPrintButton(calendarObject)}, false);

    var mouseClickOnDefaultCalendarSelect = document.getElementById('defaultcalendarname');
	mouseClickOnDefaultCalendarSelect.addEventListener('change', function() {
	    calendarObject.calendarId = document.getElementById('defaultcalendarname').value;
	    refreshPage(calendarObject)}, false);

    //Event Listeners for search view search form ************************************************************************************************************
    var mouseClickOnSearchFieldNameButton = document.getElementById('searchfieldnamebutton');
	mouseClickOnSearchFieldNameButton.addEventListener('click', function(e) {rowObject = e; searchFieldButton(rowObject,calendarObject)}, false);

    var mouseClickOnSearchFieldDateButton = document.getElementById('searchfielddatebutton');
	mouseClickOnSearchFieldDateButton.addEventListener('click', function(e) {rowObject = e; searchFieldButton(rowObject,calendarObject)}, false);

    var mouseClickOnSearchFieldAddressButton = document.getElementById('searchfieldaddressbutton');
	mouseClickOnSearchFieldAddressButton.addEventListener('click', function(e) {rowObject = e; searchFieldButton(rowObject,calendarObject)}, false);

    var mouseClickOnSearchFieldJobCoordinatorNoteButton = document.getElementById('searchfieldjobcoordinatornotebutton');
	mouseClickOnSearchFieldJobCoordinatorNoteButton.addEventListener('click', function(e) {rowObject = e; searchFieldButton(rowObject,calendarObject)}, false);

    var mouseClickOnSearchFieldDayNoteButton = document.getElementById('searchfielddaynotebutton');
	mouseClickOnSearchFieldDayNoteButton.addEventListener('click', function(e) {rowObject = e; searchFieldButton(rowObject,calendarObject)}, false);
	
    // If on Day View Set event listeners of previous and next day buttons **********************************************************************************************************************
	if (calendarObject.calendarView == 'dayview' || calendarObject.calendarView == 'localview' ){    
        var mouseClickOnPreviousDayButton = document.getElementById('previousdaybutton');
	    mouseClickOnPreviousDayButton.addEventListener('click', function() {previousDayButton(calendarObject)}, false);

        var mouseClickOnNextDayButton = document.getElementById('nextdaybutton');
	    mouseClickOnNextDayButton.addEventListener('click', function() {nextDayButton(calendarObject)}, false);
    }
	
	// Event listeners for Calendars in left corner ******************************************************************************************************************************
	var mouseClickOnCalendarTable = document.getElementById('calendartable');
    mouseClickOnCalendarTable.addEventListener('click', function(e) {calendarObject.cell = e; changeCurrentMonthDay(calendarObject)}, false);

	var rightMouseClickOnCalendarTable = document.getElementById('calendartable');
    rightMouseClickOnCalendarTable.addEventListener('contextmenu', function(e) {calendarObject.calendar = 'current'; calendarObject.cell = e; e.preventDefault(); rightClickOnCalendar(formTable,calendarObject)}, false);
	
	var mouseClickOnPreviousMonthCalendarTable = document.getElementById('previousmonthcalendartable');
    mouseClickOnPreviousMonthCalendarTable.addEventListener('click', function(e) {calendarObject.cell = e; changePreviousMonthDay(calendarObject)}, false);
	
	var rightMouseClickOnPreviousMonthCalendarTable = document.getElementById('previousmonthcalendartable');
    rightMouseClickOnPreviousMonthCalendarTable.addEventListener('contextmenu', function(e) {calendarObject.calendar = 'previous'; calendarObject.cell = e; e.preventDefault(); rightClickOnCalendar(formTable,calendarObject)}, false);
		  
	var mouseClickOnNextMonthCalendarTable = document.getElementById('nextmonthcalendartable');
    mouseClickOnNextMonthCalendarTable.addEventListener('click', function(e) {calendarObject.cell = e; changeNextMonthDay(calendarObject)}, false);

	var rightMouseClickOnNextMonthCalendarTable = document.getElementById('nextmonthcalendartable');
    rightMouseClickOnNextMonthCalendarTable.addEventListener('contextmenu', function(e) {calendarObject.calendar = 'next'; calendarObject.cell = e; e.preventDefault(); rightClickOnCalendar(formTable,calendarObject)}, false);
     
	// Event listeners for bottom month and year buttons in calendar container ****************************************************************************************************
    var mouseClickOnYearContainerLeftButton = document.getElementById('yearcontainerbuttonleft');
	mouseClickOnYearContainerLeftButton.addEventListener('click', function() {changePreviousMonth(calendarObject)}, false);

    var mouseClickOnYearContainerRightButton = document.getElementById('yearcontainerbuttonright');
	mouseClickOnYearContainerRightButton.addEventListener('click', function() {changeNextMonth(calendarObject)}, false);

	var mouseClickOnMonthContainerTable = document.getElementById('monthcontainertable');
    mouseClickOnMonthContainerTable.addEventListener('click', function(e) {calendarObject.cell = e; changeToMonth(calendarObject)}, false);

    // Event listeners for Notes bottom left corner container ******************************************************************************************************************************	
	var mouseClickOnNoteTitleContainer = document.getElementById('notetitlecontainer');
    mouseClickOnNoteTitleContainer.addEventListener('click', noteContainerLarger, false);

	var mouseOverOnNoteTable = document.getElementById('notetable');
    mouseOverOnNoteTable.addEventListener('mouseover', function(e) {rowObject = e; mouseOverNoteTable(rowObject,formTable,calendarObject)}, false);

	var mouseOutOnNoteTable = document.getElementById('notetable');
    mouseOutOnNoteTable.addEventListener('mouseout', function(e) {rowObject = e; mouseOutNoteTable(rowObject,formTable)}, false);
	
    var mouseClickOnNoteTableSendMessageButton = document.getElementById('notetableadd');
	mouseClickOnNoteTableSendMessageButton.addEventListener('click', function() {noteTableSendMessage(formTable,calendarObject)}, false);

    var mouseClickOnNoteTableReceivedMessagesViewButton = document.getElementById('notetablereceivedmessagesviewbutton');
	mouseClickOnNoteTableReceivedMessagesViewButton.addEventListener('click', function() {calendarObject.noteView = 'receivedmessages'; noteTableView(calendarObject)}, false);

    var mouseClickOnNoteTableSentMessageViewButton = document.getElementById('notetablesentmessagesviewbutton');
	mouseClickOnNoteTableSentMessageViewButton.addEventListener('click', function() {calendarObject.noteView = 'sentmessages'; noteTableView(calendarObject)}, false);

    var mouseClickOnNoteTableSearchButton = document.getElementById('notetablesearchbutton');
	mouseClickOnNoteTableSearchButton.addEventListener('click', function() {noteTableSearchButton(formTable,calendarObject)}, false);

    var mouseDoubleClickOnNoteTable = document.getElementById('notetable');
    mouseDoubleClickOnNoteTable.addEventListener('dblclick', function(e) {rowObject = e; noteTableUpdate(rowObject,formTable,calendarObject)}, false);

    var mouseRightClickOnNoteTable = document.getElementById('notetable');
    mouseRightClickOnNoteTable.addEventListener('contextmenu', function(e) {e.preventDefault()}, false);

    var mouseRightClickOnNoteTableContainer = document.getElementById('notetablecontainer');
    mouseRightClickOnNoteTableContainer.addEventListener('contextmenu', function(e) {e.preventDefault()}, false);

    //Event Listeners for search view search form ************************************************************************************************************
    var mouseClickOnNoteTableSearchFieldReceivedButton = document.getElementById('notetablesearchfieldreceivedbutton');
	mouseClickOnNoteTableSearchFieldReceivedButton.addEventListener('click', function(e) {rowObject = e; noteTableSearchFieldButton(rowObject,calendarObject)}, false);

    var mouseClickOnNoteTableSearchFieldSentButton = document.getElementById('notetablesearchfieldsentbutton');
	mouseClickOnNoteTableSearchFieldSentButton.addEventListener('click', function(e) {rowObject = e; noteTableSearchFieldButton(rowObject,calendarObject)}, false);

    var mouseClickOnNoteTableSearchFieldDateReceivedButton = document.getElementById('notetablesearchfielddatereceivedbutton');
	mouseClickOnNoteTableSearchFieldDateReceivedButton.addEventListener('click', function(e) {rowObject = e; noteTableSearchFieldButton(rowObject,calendarObject)}, false);

    var mouseClickOnNoteTableSearchFieldDateSentButton = document.getElementById('notetablesearchfielddatesentbutton');
	mouseClickOnNoteTableSearchFieldDateSentButton.addEventListener('click', function(e) {rowObject = e; noteTableSearchFieldButton(rowObject,calendarObject)}, false);

    //Event Listeners for Note form buttons ******************************************************************************************************************
	var mouseClickOnNoteCancelButton = document.getElementById('noteformcancel');
    mouseClickOnNoteCancelButton.addEventListener('click', function() {refreshPage(calendarObject)}, false);

	var mouseClickOnNoteFormDoneButton = document.getElementById('noteformdone');
    mouseClickOnNoteFormDoneButton.addEventListener('click', function() {noteFormSendButton(this,formTable)}, false);

	var mouseClickOnBody = document.getElementById('noteform');
    mouseClickOnBody.addEventListener('click', function() {mouseSelectionForm(this,formTable)}, false);
	
	// Event listeners for employee buttons in send note form ****************************************************************************************************************************** 
	var a = document.getElementsByClassName('noteformemployee');
    var b = document.getElementsByClassName('noteformemployee').length;
    for (var i = 0; i < b; i++) {
         a[i].addEventListener('click', function() {noteFormSendButton(this,formTable)}, false );
    }
	
	// Event listener for Center Vertical Column to enlarge job table **********************************************************************************************************************
	var mouseClickOnCenterColumnContainer = document.getElementById('centercolumncontainer');
    mouseClickOnCenterColumnContainer.addEventListener('click', jobContainerLarger, false);

    // Event listeners for Add Job Button ***************************************************************************************************************************************************
    var mouseClickOnJobTableNewJobButton = document.getElementById('jobtableadd');
	mouseClickOnJobTableNewJobButton.addEventListener('click', function() {jobTableNewJob(formTable,calendarObject)}, false);

    // Event listeners for Radio Buttons Form when Add Job Button is Clicked **************************************************************************************************************** 
    var mouseClickOnJobAddFormRadioButton = document.getElementsByName('jobaddformjobtype')
	var mouseClickOnJobAddFormRadioButton1 = document.getElementById('jobaddformjobtype1')
    var b = document.getElementsByName('jobaddformjobtype').length
	var aa = function(i) {
	    var mouseClickOnJobAddFormRadioButton1 = document.getElementsByClassName('jobaddformjobtypelabel')
    	mouseClickOnJobAddFormRadioButton1[i].addEventListener('click', function() {jobAddFormRadioButton1(i,this,formTable)}, false);
	}
	
    for (var i = 0; i < b; i++) {
         aa(i);
         mouseClickOnJobAddFormRadioButton[i].addEventListener('click', function() {jobAddFormRadioButton(this,formTable)}, false);
    }		 

	var mouseClickOnJobAddFormCancelButton = document.getElementById('jobaddformcancel');
    mouseClickOnJobAddFormCancelButton.addEventListener('click', function() {refreshPage(calendarObject)}, false);
	
	var mouseClickOnJobAddFormBookingCancelButton = document.getElementById('jobaddformbookingcancel');
    mouseClickOnJobAddFormBookingCancelButton.addEventListener('click', function() {jobAddFormBookingCancelButton(formTable,calendarObject)}, false);
	
	var mouseClickOnJobAddFormBookingContinueButton = document.getElementById('jobaddformbookingcontinue');
    mouseClickOnJobAddFormBookingContinueButton.addEventListener('click', function() {jobAddFormBookingContinueButton(formTable,calendarObject)}, false);

	// Event Listeners for Jobs Table in Right hand side Container *************************************************************************************************************************
    var mouseDoubleClickOnJobTable = document.getElementById('jobtable');
    mouseDoubleClickOnJobTable.addEventListener('dblclick', function(e) {rowObject = e; jobTableUpdate(rowObject,formTable,calendarObject)}, false);

	var rightMouseClickOnJobTable = document.getElementById('jobtable');
    rightMouseClickOnJobTable.addEventListener('contextmenu', function(e) {e.preventDefault(); rowObject = e; rightMouseSelectionMenuOnJobTable(rowObject,formTable,calendarObject)},false);

	var rightMouseClickOnJobTableContainer = document.getElementById('jobtablecontainer');
    rightMouseClickOnJobTableContainer.addEventListener('contextmenu', function(e) {e.preventDefault(); rowObject = e; rightMouseSelectionMenuOnJobTable(rowObject,formTable,calendarObject)},false) ;

	//Event listeners for menu items on context menu ******************************************************************************************************************
	var leftMouseClickOnJobPrintOnContextMenu = document.getElementById('jobprintbuttonmenu');
    leftMouseClickOnJobPrintOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnLocalJobPrintOnContextMenu = document.getElementById('localjobprintbuttonmenu');
    leftMouseClickOnLocalJobPrintOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnNoWorkOnContextMenu = document.getElementById('noworkbuttonmenu');
    leftMouseClickOnNoWorkOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnCancelJobOnContextMenu = document.getElementById('canceljobbuttonmenu');
    leftMouseClickOnCancelJobOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnCalendarOnContextMenu = document.getElementById('calendarbuttonmenu');
    leftMouseClickOnCalendarOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnCopyOnContextMenu = document.getElementById('copybuttonmenu');
    leftMouseClickOnCopyOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnCutOnContextMenu = document.getElementById('cutbuttonmenu');
    leftMouseClickOnCutOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnDeleteDayJobOnContextMenu = document.getElementById('deletedayjobbuttonmenu');
    leftMouseClickOnDeleteDayJobOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnDeleteTotalJobOnContextMenu = document.getElementById('deletetotaljobbuttonmenu');
    leftMouseClickOnDeleteTotalJobOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnUndeleteDayJobOnContextMenu = document.getElementById('undeletedayjobbuttonmenu');
    leftMouseClickOnUndeleteDayJobOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnUndeleteTotalJobOnContextMenu = document.getElementById('undeletetotaljobbuttonmenu');
    leftMouseClickOnUndeleteTotalJobOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnPasteAsNewOnContextMenu = document.getElementById('pasteasnewbuttonmenu');
    leftMouseClickOnPasteAsNewOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnPasteAsUpdateOnContextMenu = document.getElementById('pasteasupdatebuttonmenu');
    leftMouseClickOnPasteAsUpdateOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);
	
	var leftMouseClickOnBackOnContextMenu = document.getElementById('backbuttonmenu');
    leftMouseClickOnBackOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);
    
	var leftMouseClickOnRightClickFieldRow = document.getElementById('rightclickfieldrow');
    leftMouseClickOnRightClickFieldRow.addEventListener('click', function(e) {rowObject = e; rightClickOnRightClickFieldRow(rowObject,formTable,calendarObject)},false);

	var rightMouseClickOnRightClickFieldRow = document.getElementById('rightclickfieldrow');
    rightMouseClickOnRightClickFieldRow.addEventListener('contextmenu', function(e) {e.preventDefault(); rowObject = e; rightClickOnRightClickFieldRow(rowObject,formTable,calendarObject)},false);

   	reselectField(formTable);

	return;
};

function table(formTable) {

    //var arrowKeysOrPageKeysPressedDown = document.getElementById('searchfield');
    //arrowKeysOrPageKeysPressedDown.addEventListener('keydown', searchFieldArrowKeysOrPageKeysPressedDown, false);
    //alert('arrowKeysOrPageKeysPressedDown');
	   
   // var enterKeyPressed = document.getElementById('searchfield');
   // enterKeyPressed.addEventListener('keypress', enterSelection, false);

    var keysReleasedUp = document.getElementById('searchfield');
    keysReleasedUp.addEventListener('keyup', searchFieldInputKeyAction, false);
          

}	  
    
	window.addEventListener('load', init, false);
