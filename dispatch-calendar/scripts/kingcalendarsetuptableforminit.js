function refreshPage(calendarObject) {
	alert(calendarObject.employeeInitials);
    locationAction = 'http://'+defaultIpAddress+'kingcalendarsetuptableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.href = locationAction;
}

function calendarSetupTableAdd(formTable,calendarObject) {
	formTable.globalAction = 'form';
	formTable.name = 'calendarsetupform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
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
    var convertStrTime = month + '/' + day + '/' + year;
  	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    document.getElementById(formTable.name+'calendarview').value =  calendarObject.calendarView; 
    document.getElementById(formTable.name+'noteview').value =  calendarObject.noteView; 
    document.getElementById(formTable.name+'employeeinitials').value =  calendarObject.employeeInitials;
    document.getElementById(formTable.name+'action').value =  'add'; 
 	document.getElementById(formTable.name+'container').style.display = "block";
   	reselectField(formTable);
}

function calendarSetupTableUpdate(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.globalAction = 'form';
	formTable.name = 'calendarsetupform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth()+1;
	var year = date.getFullYear();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+ minutes : minutes;
    var convertStrTime = month + '/' + day + '/' + year;
  	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    document.getElementById(formTable.name+'calendarview').value =  calendarObject.calendarView; 
    document.getElementById(formTable.name+'noteview').value =  calendarObject.noteView;
    document.getElementById(formTable.name+'employeeinitials').value =  calendarObject.employeeInitials;
   	document.getElementsByName(formTable.name+'id')[0].value = e.target.parentNode.cells[0].textContent.trim();
	document.getElementsByName(formTable.name+'name')[0].value = e.target.parentNode.cells[1].textContent.trim();
    document.getElementById(formTable.name+'action').value =  'update'; 
 	document.getElementById(formTable.name+'container').style.display = "block";
   	reselectField(formTable);
}

function calendarSetupFormCancel(formTable) {
    document.getElementById('cancelfieldrow').style.display = "block";
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function calendarSetupFormDone(formTable) {
    if (document.getElementsByName(formTable.name+'name')[0].value == '') {
	    alert('Please fill out name field');
        reselectField(formTable);
		return;
    }
 	document.forms[formTable.name].submit();
	return;
}

function calendarSetupTableDone(calendarObject) { 
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.href = locationAction;
    return;
	
}

function mouseOverCalendarSetupTable(rowObject,formTable) {
    var e = rowObject;
    e.target.parentNode.style.background = "black";
	e.target.parentNode.style.color = "white";
	return;
}

function mouseOutCalendarSetupTable(rowObject,formTable)  {
    var e = rowObject;
	if ((e.target.parentNode.rowIndex % 2) == 0) {;
	    e.target.parentNode.style.background = "#DCDCDC";
	} else { 
	    e.target.parentNode.style.background = "white";
	}   
	e.target.parentNode.style.color = "black";
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
		date: document.getElementById('calendardateholder').value,
		employeeInitials: document.getElementById('employeeinitials').value, 
		noteView: document.getElementById('noteview').value
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

    var mouseClickOnCalendarSetupTableAddButton = document.getElementById('calendarsetuptableadd');
	mouseClickOnCalendarSetupTableAddButton.addEventListener('click', function() {calendarSetupTableAdd(formTable,calendarObject)}, false);

	var mouseDoubleClickOnCalendarSetupTable = document.getElementById('calendarsetuptable');
    mouseDoubleClickOnCalendarSetupTable.addEventListener('dblclick', function(e) {var rowObject = e; calendarSetupTableUpdate(rowObject,formTable,calendarObject)}, false);

	var mouseClickOnCalendarSetupTableDoneButton = document.getElementById('calendarsetuptabledone');
    mouseClickOnCalendarSetupTableDoneButton.addEventListener('click', function() {calendarSetupTableDone(calendarObject)}, false);
	
	var mouseOverOnCalendarSetupTable = document.getElementById('calendarsetuptable');
    mouseOverOnCalendarSetupTable.addEventListener('mouseover', function(e) {rowObject = e; mouseOverCalendarSetupTable(rowObject,formTable)}, false);

	var mouseOutOnCalendarSetupTable = document.getElementById('calendarsetuptable');
    mouseOutOnCalendarSetupTable.addEventListener('mouseout', function(e) {rowObject = e; mouseOutCalendarSetupTable(rowObject,formTable)}, false);

	var mouseClickOnCalendarSetupFormCancelButton = document.getElementById('calendarsetupformcancel');
    mouseClickOnCalendarSetupFormCancelButton.addEventListener('click', function() {calendarSetupFormCancel(formTable)}, false);

	var mouseClickOnCalendarSetupFormDoneButton = document.getElementById('calendarsetupformdone');
    mouseClickOnCalendarSetupFormDoneButton.addEventListener('click', function() {calendarSetupFormDone(formTable)}, false);

	var mouseClickOnYesButton = document.getElementById('yesbutton');
    mouseClickOnYesButton.addEventListener('click', function() {refreshPage(calendarObject)}, false);

	var mouseClickOnNoButton = document.getElementById('nobutton');
        mouseClickOnNoButton.addEventListener('click', function() {
        document.getElementById('cancelfieldrow').style.display = "none";
	    formTable.globalAction = 'form';
        reselectField(formTable);
	    return;
	}, false);

	
	var mouseClickOnBody = document.getElementById('calendarsetupform');
    mouseClickOnBody.addEventListener('click', function() {mouseSelectionForm(this,formTable)}, false);

   	reselectField(formTable);

	return;
};

	/** This function makes sure the search field always has focus on the table or focus on the form field  */
    
	
	window.addEventListener('load', init, false);
