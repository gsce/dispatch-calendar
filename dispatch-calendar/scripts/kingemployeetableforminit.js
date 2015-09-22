function refreshPage(calendarObject) {
    searchField = document.getElementById('employeeformsearchfield').value;
    locationAction = 'http://'+defaultIpAddress+'kingemployeetableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
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

function searchFieldButton(calendarObject) {
    searchField = document.getElementById('searchfieldinput').value;
	searchField = searchField.toUpperCase();
    locationAction = 'http://'+defaultIpAddress+'kingemployeetableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}


function employeeTableAdd(formTable,calendarObject) {
	formTable.globalAction = 'form';
	formTable.name = 'employeeform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 13;
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
    document.getElementById(formTable.name+'employeeinitialshold').value = calendarObject.employeeInitials;
    document.getElementById(formTable.name+'action').value =  'add'; 
 	document.getElementById(formTable.name+'container').style.display = "block";
   	reselectField(formTable);
}

function employeeTableUpdate(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.globalAction = 'form';
	formTable.name = 'employeeform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 13;
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
    document.getElementById(formTable.name+'calendarview').value = calendarObject.calendarView; 
    document.getElementById(formTable.name+'noteview').value = calendarObject.noteView;
    document.getElementById(formTable.name+'employeeinitialshold').value = calendarObject.employeeInitials;
   	document.getElementsByName(formTable.name+'employeeid')[0].value = e.target.parentNode.cells[0].textContent.trim();
	document.getElementsByName(formTable.name+'employeename')[0].value = e.target.parentNode.cells[1].textContent.trim();
	document.getElementsByName(formTable.name+'employeephone1')[0].value = e.target.parentNode.cells[2].textContent.trim();
	document.getElementsByName(formTable.name+'employeephone2')[0].value = e.target.parentNode.cells[3].textContent.trim();
	document.getElementsByName(formTable.name+'comment')[0].value = e.target.parentNode.cells[4].textContent.trim();
	document.getElementsByName(formTable.name+'employeeaddress')[0].value = e.target.parentNode.cells[5].textContent.trim();
	document.getElementsByName(formTable.name+'employeephone3')[0].value = e.target.parentNode.cells[6].textContent.trim();
	document.getElementsByName(formTable.name+'employeeemail1')[0].value = e.target.parentNode.cells[7].textContent.trim();
	document.getElementsByName(formTable.name+'employeeemail2')[0].value = e.target.parentNode.cells[8].textContent.trim();
	document.getElementsByName(formTable.name+'employeeemail3')[0].value = e.target.parentNode.cells[9].textContent.trim();
	document.getElementsByName(formTable.name+'employeesocialsecurity')[0].value = e.target.parentNode.cells[10].textContent.trim();
	var optionVal = e.target.parentNode.cells[11].textContent.trim();
	for (var i=0; i < document.getElementsByName(formTable.name+'defaultcalendar')[0].options.length; i++) {
        if (document.getElementsByName(formTable.name+'defaultcalendar')[0].options[i].value === optionVal) {
		    document.getElementsByName(formTable.name+'defaultcalendar')[0].options[i].selected = true;
			break;
        }
    }
	document.getElementsByName(formTable.name+'calendaruser')[0].value = e.target.parentNode.cells[12].textContent.trim();
	document.getElementsByName(formTable.name+'employeeinitials')[0].value = e.target.parentNode.cells[13].textContent.trim();
    document.getElementById(formTable.name+'action').value =  'update'; 
 	document.getElementById(formTable.name+'container').style.display = "block";
   	reselectField(formTable);
}

function rightMouseSelectionMenuOnEmployeeTable(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.name = 'employeeform';
	formTable.globalAction = 'table';
	formTable.startItemField = 1;
	formTable.totalItemFields = 1;
	formTable.itemField = 1;
	if (e.target.id == 'employeetablebox'){
	    var x = rowObject.clientX+'px';
	    var y = rowObject.clientY+'px';
	    document.getElementById('rightclickmenu').style.top = y;
	    document.getElementById('rightclickmenu').style.left = x;
        document.getElementById('rightclickfieldrow').style.display = 'block';
        document.getElementById('jobprintbuttonmenu').style.display = 'none';
        document.getElementById('noworkbuttonmenu').style.display = 'block';
        document.getElementById('canceljobbuttonmenu').style.display = 'none';
        document.getElementById('calendarbuttonmenu').style.display = 'none';
        document.getElementById('copybuttonmenu').style.display = 'none';
        document.getElementById('cutbuttonmenu').style.display = 'none';
        document.getElementById('deletebuttonmenu').style.display = 'none';
        document.getElementById('backbuttonmenu').style.display = 'block';
	    document.getElementById('pasteasnewbuttonmenu').style.display = 'none';
	    document.getElementById('pasteasupdatebuttonmenu').style.display = 'none';
        reselectField(formTable);
	    return;
	}
    var rowNumber = e.target.parentNode.rowIndex;
    calendarObject.pasteEmployeeId = document.getElementById('employeetable').rows[rowNumber].cells[0].textContent.trim();
	var x = rowObject.clientX+'px';
	var y = rowObject.clientY+'px';
	document.getElementById('rightclickmenu').style.top = y;
	document.getElementById('rightclickmenu').style.left = x;
    document.getElementById('rightclickfieldrow').style.display = 'block';
    document.getElementById('jobprintbuttonmenu').style.display = 'none';
    document.getElementById('noworkbuttonmenu').style.display = 'none';
    document.getElementById('canceljobbuttonmenu').style.display = 'none';
    document.getElementById('calendarbuttonmenu').style.display = 'none';
    document.getElementById('copybuttonmenu').style.display = 'none';
    document.getElementById('cutbuttonmenu').style.display = 'none';
    document.getElementById('deletebuttonmenu').style.display = 'block';
    document.getElementById('backbuttonmenu').style.display = 'block';
	document.getElementById('pasteasnewbuttonmenu').style.display = 'none';
	document.getElementById('pasteasupdatebuttonmenu').style.display = 'none';
    reselectField(formTable);
	return;
}
function mouseSelectionOnContextMenu(rowObject,formTable,calendarObject) {
    var e = rowObject;
	if (e.target.id == 'deletebutton' || e.target.id == 'deletebuttonmenu'){
        document.getElementById('rightclickfieldrow').style.display = 'none';
        deleteEmployee(rowObject,formTable,calendarObject);
		return;
	}
    calendarObject.copyCut = e.target.id;
    document.getElementById('rightclickfieldrow').style.display = 'none';
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function deleteEmployee(rowObject,formTable,calendarObject) {
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    locationAction = 'http://'+defaultIpAddress+'kingdeleteemployeepost.php?calendardate='+calendarObject.date+'&calendardateholder='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpasteemployeeid='+calendarObject.pasteEmployeeId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut='+calendarObject.copyCut+'&calendarnoteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

// This clears the Context Menu when someone clicks outside of the right click menu
function rightClickOnRightClickFieldRow(formTable,calendarObject) {
        document.getElementById('rightclickfieldrow').style.display = 'none';
        return;
}

function employeeFormCancel(formTable) {
    document.getElementById('cancelfieldrow').style.display = "block";
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function employeeFormDone(formTable) {
    if (document.getElementById(formTable.name+'name').value == '') {
	    alert('Please fill out name field');
        reselectField(formTable);
		return;
    }
	if (document.getElementsByName(formTable.name+'defaultcalendar')[0].value == '-- Select --') {
	    alert('Please Select a Default Calendar');
        reselectField(formTable);
		return;
	}

 	document.forms[formTable.name].submit();
	return;
}

function employeeTableDone(calendarObject) { 
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
    return;
}

function mouseOverEmployeeTable(rowObject,formTable) {
    var e = rowObject;
    e.target.parentNode.style.background = 'black';
	e.target.parentNode.style.color = 'white';
	return;
}

function mouseOutEmployeeTable(rowObject,formTable)  {
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
		noteView: document.getElementById('noteview').value,
		employeeInitials: document.getElementById('employeeinitials').value, 
		calendarPasteEmployeeId: null
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

    var mouseClickOnEmployeeTableAddButton = document.getElementById('employeetableadd');
	mouseClickOnEmployeeTableAddButton.addEventListener('click', function() {employeeTableAdd(formTable,calendarObject)}, false);

	var mouseDoubleClickOnEmployeeTable = document.getElementById('employeetable');
    mouseDoubleClickOnEmployeeTable.addEventListener('dblclick', function(e) {var rowObject = e; employeeTableUpdate(rowObject,formTable,calendarObject)}, false);

	var mouseClickOnEmployeeTableDoneButton = document.getElementById('employeetabledone');
    mouseClickOnEmployeeTableDoneButton.addEventListener('click', function() {employeeTableDone(calendarObject)}, false);

	var mouseOverOnEmployeeTable = document.getElementById('employeetable');
    mouseOverOnEmployeeTable.addEventListener('mouseover', function(e) {rowObject = e; mouseOverEmployeeTable(rowObject,formTable)}, false);

	var mouseOutOnEmployeeTable = document.getElementById('employeetable');
    mouseOutOnEmployeeTable.addEventListener('mouseout', function(e) {rowObject = e; mouseOutEmployeeTable(rowObject,formTable)}, false);

	var mouseClickOnEmployeeFormCancelButton = document.getElementById('employeeformcancel');
    mouseClickOnEmployeeFormCancelButton.addEventListener('click', function() {employeeFormCancel(formTable)}, false);

	var mouseClickOnEmployeeFormDoneButton = document.getElementById('employeeformdone');
    mouseClickOnEmployeeFormDoneButton.addEventListener('click', function() {employeeFormDone(formTable)}, false);

	var mouseClickOnYesButton = document.getElementById('yesbutton');
    mouseClickOnYesButton.addEventListener('click', function() {refreshPage(calendarObject)}, false);

	var mouseClickOnNoButton = document.getElementById('nobutton');
        mouseClickOnNoButton.addEventListener('click', function() {
        document.getElementById('cancelfieldrow').style.display = "none";
	    formTable.globalAction = 'form';
        reselectField(formTable);
	    return;
	}, false);
	
    // Event listener for search button *******************************************************************************************************************************
    var mouseClickOnSearchViewButton = document.getElementById('searchviewbutton');
	mouseClickOnSearchViewButton.addEventListener('click', function() {searchViewButton(formTable,calendarObject)}, false);
	
    var mouseClickOnSearchFieldButton = document.getElementById('searchfieldbutton');
	mouseClickOnSearchFieldButton.addEventListener('click', function() {searchFieldButton(calendarObject)}, false);

	
	//Event listeners for menu items on context menu ******************************************************************************************************************
	var rightMouseClickOnEmployeeTable = document.getElementById('employeetable');
    rightMouseClickOnEmployeeTable.addEventListener('contextmenu', function(e) {e.preventDefault(); rowObject = e; rightMouseSelectionMenuOnEmployeeTable(rowObject,formTable,calendarObject)},false);

	var rightMouseClickOnEmployeeTableContainer = document.getElementById('employeetablebox');
    rightMouseClickOnEmployeeTableContainer.addEventListener('contextmenu', function(e) {e.preventDefault(); rowObject = e; rightMouseSelectionMenuOnEmployeeTable(rowObject,formTable,calendarObject)},false) ;

	var leftMouseClickOnDeleteOnContextMenu = document.getElementById('deletebuttonmenu');
    leftMouseClickOnDeleteOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);

	var leftMouseClickOnBackOnContextMenu = document.getElementById('backbuttonmenu');
    leftMouseClickOnBackOnContextMenu.addEventListener('click', function(e) {rowObject = e; mouseSelectionOnContextMenu(rowObject,formTable,calendarObject)},false);
    
	var leftMouseClickOnRightClickFieldRow = document.getElementById('rightclickfieldrow');
    leftMouseClickOnRightClickFieldRow.addEventListener('click', function(e) {rowObject = e; rightClickOnRightClickFieldRow(rowObject,formTable,calendarObject)},false);

	var rightMouseClickOnRightClickFieldRow = document.getElementById('rightclickfieldrow');
    rightMouseClickOnRightClickFieldRow.addEventListener('contextmenu', function(e) {e.preventDefault(); rowObject = e; rightClickOnRightClickFieldRow(rowObject,formTable,calendarObject)},false);

	var rightMouseClickOnRightClickEmployeeTablePageBox = document.getElementById('employeetablepagebox');
    rightMouseClickOnRightClickEmployeeTablePageBox.addEventListener('contextmenu', function(e) {e.preventDefault(); return;},false);

    var mouseClickOnBody = document.getElementById('employeeform');
    mouseClickOnBody.addEventListener('click', function() {mouseSelectionForm(this,formTable)}, false);

   	reselectField(formTable);

	return;
};
	window.addEventListener('load', init, false);