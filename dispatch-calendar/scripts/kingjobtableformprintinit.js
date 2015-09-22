function refreshPage(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.href = locationAction;
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
		calendarView: document.getElementById('jobformcalendarview').value,
	    employeeId: document.getElementById('calendaremployeeid').value,
	    employeeName: document.getElementById('calendaremployeename').value,
		date: document.getElementById('calendardateholder').value,
		pasteJobNumber: 'null',
        pasterAutomaticNumber: null,
        calendarPopupCalledFrom: 'jobform',
		noteView: document.getElementById('jobformnoteview').value,
		employeeInitials: document.getElementById('jobformemployeeinitials').value 
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
    
	var mouseClickOnBody = document.getElementById('jobform');
    mouseClickOnBody.addEventListener('click', function() {mouseSelectionForm(this,formTable)}, false);

    window.print();
	refreshPage(calendarObject);

	return;
};

    
	
	window.addEventListener('load', init, false);
