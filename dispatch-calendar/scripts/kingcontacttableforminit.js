function refreshPage(calendarObject) {
    searchField = document.getElementById('contactformsearchfield').value;
    locationAction = 'http://'+defaultIpAddress+'kingcontacttableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.href = locationAction;
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

function searchFieldButton(calendarObject) {
    searchField = document.getElementById('searchfieldinput').value;
	searchField = searchField.toUpperCase();
    locationAction = 'http://'+defaultIpAddress+'kingcontacttableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function contactTableAdd(formTable,calendarObject) {
	formTable.globalAction = 'form';
	formTable.name = 'contactform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 11;
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
    document.getElementById(formTable.name+'calendarview').value = calendarObject.calendarView; 
    document.getElementById(formTable.name+'noteview').value = calendarObject.noteView; 
    document.getElementById(formTable.name+'employeeinitials').value = calendarObject.employeeInitials; 
    document.getElementById(formTable.name+'action').value = 'add'; 
 	document.getElementById(formTable.name+'container').style.display = "block";
   	reselectField(formTable);
}

function contactTableUpdate(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.globalAction = 'form';
	formTable.name = 'contactform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 11;
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
    document.getElementById(formTable.name+'employeeinitials').value = calendarObject.employeeInitials; 
    document.getElementById(formTable.name+'noteview').value =  calendarObject.noteView; 
    document.getElementsByName(formTable.name+'contactid')[0].value = e.target.parentNode.cells[0].textContent.trim();
	document.getElementsByName(formTable.name+'name1')[0].value = e.target.parentNode.cells[1].textContent.trim();
	document.getElementsByName(formTable.name+'name2')[0].value = e.target.parentNode.cells[7].textContent.trim();
	document.getElementsByName(formTable.name+'phone1')[0].value = e.target.parentNode.cells[2].textContent.trim();
	document.getElementsByName(formTable.name+'phone2')[0].value = e.target.parentNode.cells[3].textContent.trim();
	document.getElementsByName(formTable.name+'phone3')[0].value = e.target.parentNode.cells[9].textContent.trim();
	document.getElementsByName(formTable.name+'address1')[0].value = e.target.parentNode.cells[4].textContent.trim();
	document.getElementsByName(formTable.name+'address2')[0].value = e.target.parentNode.cells[8].textContent.trim();
	document.getElementsByName(formTable.name+'email1')[0].value = e.target.parentNode.cells[5].textContent.trim();
	document.getElementsByName(formTable.name+'email2')[0].value = e.target.parentNode.cells[6].textContent.trim();
	document.getElementsByName(formTable.name+'comment')[0].value = e.target.parentNode.cells[11].textContent.trim();
	document.getElementsByName(formTable.name+'socialnetwork')[0].value = e.target.parentNode.cells[10].textContent.trim();
    document.getElementById(formTable.name+'action').value =  'update'; 
 	document.getElementById(formTable.name+'container').style.display = "block";
   	reselectField(formTable);
}

function contactFormCancel(formTable) {
    document.getElementById('cancelfieldrow').style.display = "block";
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function contactFormDone(formTable) {
    if (document.getElementsByName(formTable.name+'name1')[0].value == '') {
	    alert('Please fill out name field');
        reselectField(formTable);
		return;
    }
 	document.forms[formTable.name].submit();
	return;
}

function contactTableDone(calendarObject) { 
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.href = locationAction;
    return;
	
}

function mouseOverContactTable(rowObject,formTable) {
    var e = rowObject;
    e.target.parentNode.style.background = 'black';
	e.target.parentNode.style.color = 'white';
	return;
}

function mouseOutContactTable(rowObject,formTable)  {
    var e = rowObject;
	if ((e.target.parentNode.rowIndex % 2) == 0) {;
	    e.target.parentNode.style.background = 'white';
	} else { 
	    e.target.parentNode.style.background = '#DCDCDC';
	}   
	e.target.parentNode.style.color = 'black';
	document.getElementById('popup').style.display = 'none';
}

	/** This initializes the event listeners after the window has loaded */

function init() {
    defaultIpAddress = document.getElementById('defaultipaddress').value;
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

    var mouseClickOnContactTableAddButton = document.getElementById('contacttableadd');
	mouseClickOnContactTableAddButton.addEventListener('click', function() {contactTableAdd(formTable,calendarObject)}, false);

	var mouseDoubleClickOnContactTable = document.getElementById('contacttable');
    mouseDoubleClickOnContactTable.addEventListener('dblclick', function(e) {var rowObject = e; contactTableUpdate(rowObject,formTable,calendarObject)}, false);

	var mouseClickOnContactTableDoneButton = document.getElementById('contacttabledone');
    mouseClickOnContactTableDoneButton.addEventListener('click', function() {contactTableDone(calendarObject)}, false);

	var mouseOverOnContactTable = document.getElementById('contacttable');
    mouseOverOnContactTable.addEventListener('mouseover', function(e) {rowObject = e; mouseOverContactTable(rowObject,formTable)}, false);

	var mouseOutOnContactTable = document.getElementById('contacttable');
    mouseOutOnContactTable.addEventListener('mouseout', function(e) {rowObject = e; mouseOutContactTable(rowObject,formTable)}, false);

	var mouseClickOnContactFormCancelButton = document.getElementById('contactformcancel');
    mouseClickOnContactFormCancelButton.addEventListener('click', function() {contactFormCancel(formTable)}, false);

	var mouseClickOnContactFormDoneButton = document.getElementById('contactformdone');
    mouseClickOnContactFormDoneButton.addEventListener('click', function() {contactFormDone(formTable)}, false);

	var mouseClickOnYesButton = document.getElementById('yesbutton');
    mouseClickOnYesButton.addEventListener('click', function() {refreshPage(calendarObject)}, false);

    var mouseClickOnSearchViewButton = document.getElementById('searchviewbutton');
	mouseClickOnSearchViewButton.addEventListener('click', function() {searchViewButton(formTable,calendarObject)}, false);
	
    var mouseClickOnSearchFieldButton = document.getElementById('searchfieldbutton');
	mouseClickOnSearchFieldButton.addEventListener('click', function() {searchFieldButton(calendarObject)}, false);

	var mouseClickOnNoButton = document.getElementById('nobutton');
        mouseClickOnNoButton.addEventListener('click', function() {
        document.getElementById('cancelfieldrow').style.display = "none";
	    formTable.globalAction = 'form';
        reselectField(formTable);
	    return;
	}, false);

	var mouseClickOnBody = document.getElementById('contactform');
    mouseClickOnBody.addEventListener('click', function() {mouseSelectionForm(this,formTable)}, false);

   	reselectField(formTable);

	return;
};

	/** This function makes sure the search field always has focus on the table or focus on the form field  */
    
	
	window.addEventListener('load', init, false);
