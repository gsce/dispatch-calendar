function refreshPage(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingpopupcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarpopupcalledfrom='+calendarObject.calendarPopupCalledFrom;
    window.location.href = locationAction;
}

function pickDate(calendarObject) {
   	window.top.document.getElementById('jobformbottomboxdiv').style.left = '0%';
    window.top.document.getElementById('jobformbottomboxdiv').style.top = '73%';
    window.top.document.getElementById('jobformbottomboxdiv').style.height = '27%';
	window.top.document.getElementById('jobformbottomboxdiv').style.width = '100%';
	window.top.document.getElementById('jobformiframe').height = '100%';
	parent.document.getElementById('popupcalendariframe').style.display = 'none';
	var day = calendarObject.date.slice(8,10);
    var month = calendarObject.date.slice(5,7);
	var year = calendarObject.date.slice(0,4);
	var convertStrDate = month + '/' + day + '/' + year;  
	if (calendarObject.calendarPopupCalledFrom == 'jobform') {
	    window.top.document.getElementById('jobformstartdate').value = convertStrDate;
		window.top.document.getElementById('movefieldrow').style.display = 'block';
	} else if (calendarObject.calendarPopupCalledFrom == 'jobdateform') {
        parent.document.getElementsByName('jobdateformjobdate')[0].value = convertStrDate;
		var div = parent.document.getElementById('jobdateformheader');
		div.innerHTML = 'Job Date ' + convertStrDate;
	}
}

function changeCurrentMonthDay(cellObject,calendarObject) {
 	var day = cellObject.target.textContent;
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
    pickDate(calendarObject);
	return;
}	
	
function changePreviousMonthDay(cellObject,calendarObject) {
    var day = cellObject.target.textContent;
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
    pickDate(calendarObject);
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

function changeNextMonthDay(cellObject,calendarObject) {
	var day = cellObject.target.textContent;
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
    pickDate(calendarObject);
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

function changeToMonth(cellObject,calendarObject) {
    var day = '01';
    var month = cellObject.target.textContent;
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

	/** This initializes the event listeners after the window has loaded */


function init() {
 		
    defaultIpAddress = document.getElementById('defaultipaddress').value;
	
    var e;
	var keyboardKeyCode;
	var keyboardObject;
	var rowObject;
	var cellObject;
	var calendarObject = {
	    calendarId: document.getElementById('calendarid').value,
	    employeeId: document.getElementById('calendaremployeeid').value,
	    employeeName: document.getElementById('calendaremployeename').value,
		month: document.getElementById('calendarmonth').value,
	    year: document.getElementById('calendaryear').value,
		previousMonth: document.getElementById('previouscalendarmonth').value,
	    previousMonthYear: document.getElementById('previouscalendarmonthyear').value,
		nextMonth: document.getElementById('nextcalendarmonth').value,
	    nextMonthYear: document.getElementById('nextcalendarmonthyear').value,
		date: document.getElementById('calendardateholder').value,
		pasteJobNumber: document.getElementById('calendarpastejobnumber').value,
        pasterAutomaticNumber: null, 
        calendarPopupCalledFrom: document.getElementById('calendarpopupcalledfrom').value
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
	
    window.addEventListener('keydown', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;searchFieldArrowKeysOrPageKeysPressedDown(formTable,keyboardObject)}, false);
    window.addEventListener('keypress', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;enterSelection(formTable,keyboardObject)}, false); 

	var mouseClickOnCalendarTable = document.getElementById('calendartable');
    mouseClickOnCalendarTable.addEventListener('click', function(e) {cellObject = e; changeCurrentMonthDay(cellObject,calendarObject)}, false);

    var mouseClickOnPreviousMonthCalendarTable = document.getElementById('previousmonthcalendartable');
    mouseClickOnPreviousMonthCalendarTable.addEventListener('click', function(e) {cellObject = e; changePreviousMonthDay(cellObject,calendarObject)}, false);
	
    var mouseClickOnYearContainerLeftButton = document.getElementById('yearcontainerbuttonleft');
	mouseClickOnYearContainerLeftButton.addEventListener('click', function() {changePreviousMonth(calendarObject)}, false);

	var mouseClickOnNextMonthCalendarTable = document.getElementById('nextmonthcalendartable');
    mouseClickOnNextMonthCalendarTable.addEventListener('click', function(e) {cellObject = e; changeNextMonthDay(cellObject,calendarObject)}, false);

    var mouseClickOnYearContainerRightButton = document.getElementById('yearcontainerbuttonright');
	mouseClickOnYearContainerRightButton.addEventListener('click', function() {changeNextMonth(calendarObject)}, false);

	var mouseClickOnMonthContainerTable = document.getElementById('monthcontainertable');
    mouseClickOnMonthContainerTable.addEventListener('click', function(e) {cellObject = e; changeToMonth(cellObject,calendarObject)}, false);

   	reselectField(formTable);

	return;
};

    
	window.addEventListener('load', init, false);
