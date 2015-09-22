function refreshPage(calendarObject) {
    locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&noteview='+calendarObject.noteView+'&searchfield='+calendarObject.searchField+'&employeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}

function jobFormFixDayOf(formTable,calendarObject) {
	var iframeId = document.getElementById('jobformiframe');
	var iframeWindow = iframeId.contentWindow;
	var count = iframeWindow.document.getElementById('jobformdatetable').rows.length ;
	if (count < 2) {
		alert('There are no Job Days to Fix Day Of!');
        reselectField(formTable);
		return;
	}
	var iframeId = document.getElementById('jobformiframe');
    var iframeWindow = iframeId.contentWindow;
	document.getElementById('jobformbottomboxdiv').style.left = '0%';
	document.getElementById('jobformbottomboxdiv').style.top = '73%';
 	document.getElementById('jobformbottomboxdiv').style.width = '100%';
    document.getElementById('jobformbottomboxdiv').style.height = '27%';
    document.getElementById('jobformiframe').height = '100%';
    document.getElementById('movefieldrow').style.display = 'none';
	document.getElementById('jobformsavecancelbutton').style.visibility = "visible";
  	iframeWindow.document.getElementById('jobdateformcalendarid').value = calendarObject.calendarId;
	iframeWindow.document.getElementById('jobdateformcalendaremployeeid').value = calendarObject.employeeId;
    iframeWindow.document.getElementById('jobdateformcalendaremployeename').value = calendarObject.employeeName;
   	iframeWindow.document.getElementById('jobdateformcalendardateholder').value = calendarObject.date;
    iframeWindow.document.getElementById('jobdateformaction').value =  'fixdayof'; 
    iframeWindow.document.getElementById('whereupdated').value = 'table'; 
  	iframeWindow.document.getElementsByName('jobdateformdaytype')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformjobdate')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformjobtime')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformweight')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformjobhours')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformnumberofmen')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformdriver')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformnamesofmen')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformdrivernumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformtrucknumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformtrailernumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformcalendarnumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformcalendarname')[0].value = '';
   	iframeWindow.document.getElementsByName('jobdateformautomaticnumber')[0].value = '';
    iframeWindow.document.getElementsByName('jobdateformdaynote')[0].value = '';	
	iframeWindow.document.getElementsByName('jobdateformnumberofdays')[0].value = '';
	iframeWindow.document.getElementById('jobdateformjobnumber').value = document.getElementById('jobformjobnumber').value;
	iframeWindow.document.getElementById('jobdateformstartdate').value = document.getElementById('jobformstartdate').value;
	if (document.getElementById('jobformsat').checked == true) {
        iframeWindow.document.getElementById('jobdateformsaturday').value = 'Sat';
	} else {
   	    iframeWindow.document.getElementById('jobdateformsaturday').value = 'no';
    }
	if (document.getElementById('jobformsun').checked == true) {
	    iframeWindow.document.getElementById('jobdateformsunday').value = 'Sun';
	} else {
	    iframeWindow.document.getElementById('jobdateformsunday').value = 'no';
    }	
	document.getElementById('jobformsat').checked = false;	
	document.getElementById('jobformsun').checked = false;	
	document.getElementById('jobformstartdate').value = '';
	iframeWindow.document.forms['jobdateform'].submit();
	return;
}

// This opens up job move window to allow user to select a date to move job to.
function jobFormMove(formTable,calendarObject) {
	var iframeId = document.getElementById('jobformiframe');
	var iframeWindow = iframeId.contentWindow;
	var count = iframeWindow.document.getElementById('jobformdatetable').rows.length ;
	if (count < 2) {
		alert('There are no Job Days to move!');
        reselectField(formTable);
		return;
	}
    document.getElementById('movefieldrow').style.display = "block";
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function moveJobDates(formTable,calendarObject) {
    if (document.getElementById('jobformstartdate').value == '') {
	   formTable.globalAction = 'table';
       reselectField(formTable);
	   return;
	}
	var iframeId = document.getElementById('jobformiframe');
    var iframeWindow = iframeId.contentWindow;
	document.getElementById('jobformbottomboxdiv').style.left = '0%';
	document.getElementById('jobformbottomboxdiv').style.top = '73%';
 	document.getElementById('jobformbottomboxdiv').style.width = '100%';
    document.getElementById('jobformbottomboxdiv').style.height = '27%';
    document.getElementById('jobformiframe').height = '100%';
    document.getElementById('movefieldrow').style.display = 'none';
	document.getElementById('jobformsavecancelbutton').style.visibility = "visible";
  	iframeWindow.document.getElementById('jobdateformcalendarid').value = calendarObject.calendarId;
	iframeWindow.document.getElementById('jobdateformcalendaremployeeid').value = calendarObject.employeeId;
    iframeWindow.document.getElementById('jobdateformcalendaremployeename').value = calendarObject.employeeName;
   	iframeWindow.document.getElementById('jobdateformcalendardateholder').value = calendarObject.date;
    iframeWindow.document.getElementById('jobdateformaction').value =  'move'; 
    iframeWindow.document.getElementById('whereupdated').value = 'popupcalendar'; 
  	iframeWindow.document.getElementsByName('jobdateformdaytype')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformjobdate')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformjobtime')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformweight')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformjobhours')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformnumberofmen')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformdriver')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformnamesofmen')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformdrivernumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformtrucknumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformtrailernumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformcalendarnumber')[0].value = '';
	iframeWindow.document.getElementsByName('jobdateformcalendarname')[0].value = '';
   	iframeWindow.document.getElementsByName('jobdateformautomaticnumber')[0].value = '';
    iframeWindow.document.getElementsByName('jobdateformdaynote')[0].value = '';	
	iframeWindow.document.getElementsByName('jobdateformnumberofdays')[0].value = '';
	iframeWindow.document.getElementById('jobdateformjobnumber').value = document.getElementById('jobformjobnumber').value;
	iframeWindow.document.getElementById('jobdateformstartdate').value = document.getElementById('jobformstartdate').value;
	if (document.getElementById('jobformsat').checked == true) {
        iframeWindow.document.getElementById('jobdateformsaturday').value = 'Sat';
	} else {
   	    iframeWindow.document.getElementById('jobdateformsaturday').value = 'no';
    }
	if (document.getElementById('jobformsun').checked == true) {
	    iframeWindow.document.getElementById('jobdateformsunday').value = 'Sun';
	} else {
	    iframeWindow.document.getElementById('jobdateformsunday').value = 'no';
    }	
	document.getElementById('jobformsat').checked = false;	
	document.getElementById('jobformsun').checked = false;	
	document.getElementById('jobformstartdate').value = '';
	iframeWindow.document.forms['jobdateform'].submit();
}

function popUpCalendar(formTable,calendarObject) {
	var iframeId = document.getElementById('jobformiframe');
    var iframeWindow = iframeId.contentWindow;
    document.getElementById('jobformiframe').height = '400px';
	document.getElementById('jobformbottomboxdiv').style.left = '0%';
	document.getElementById('jobformbottomboxdiv').style.top = '45%';
 	document.getElementById('jobformbottomboxdiv').style.width = '100%';
    document.getElementById('jobformbottomboxdiv').style.height = '400px';
    iframeWindow.document.getElementById('popupcalendariframe').style.display = 'block';
    document.getElementById('movefieldrow').style.display = 'none';
    locationAction = 'http://'+defaultIpAddress+'kingpopupcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpopupcalledfrom='+calendarObject.calendarPopupCalledFrom;
    iframeWindow.document.getElementById('popupcalendariframe').contentWindow.location.replace(locationAction);	
	return;
}

function jobFormCancel(formTable) {
    document.getElementById('cancelfieldrow').style.display = "block";
	formTable.globalAction = 'table';
    reselectField(formTable);
	return;
}

function jobFormDone(formTable,calendarObject) {
    formTable.name = 'jobform';
	formTable.globalAction = 'table';
	var iframeId = document.getElementById('jobformiframe');
	var iframeWindow = iframeId.contentWindow;
	var count = iframeWindow.document.getElementById('jobformdatetable').rows.length ;
	if (count < 2) {
		alert('Please add a Job Day to the Job');
		formTable.globalAction = 'form';
        reselectField(formTable);
		return;
	}
	if (document.getElementById(formTable.name+'name1').value == '' && document.getElementById(formTable.name+'companyname').value == '') {
	    alert('Please fill out name field');
		formTable.globalAction = 'form';
        reselectField(formTable);
		return;
	}
	jobFormFixDayOf(formTable,calendarObject);
	if (document.getElementById(formTable.name+'printshow').checked == true) {
        document.getElementById(formTable.name+'donotprint').value = 'yes'
	} else {
        document.getElementById(formTable.name+'donotprint').value = 'no'
	}
	if (document.getElementById(formTable.name+'tentitive').checked == true) {
        document.getElementById(formTable.name+'tentitivehold').value = 'yes'
	} else {
        document.getElementById(formTable.name+'tentitivehold').value = 'no'
	}
	if (document.getElementById(formTable.name+'cancelled').checked == true) {
        document.getElementById(formTable.name+'cancelledhold').value = 'yes'
	} else {
        document.getElementById(formTable.name+'cancelledhold').value = 'no'
	}
	setTimeout(function(){document.forms[formTable.name].submit();}, 500);
	
	return;
}
// This imports a united opportunity into king calendar//
// This slice the fields we need from a copy and paste//
function jobFormImport(formTable) {
    formTable.name = 'jobform';
	formTable.globalAction = 'form';
	var str = document.getElementById('jobformjobnote').value;
	var startPosition = 0;
	var foundPosition = 0;
	var lineBreakPosition = 0;
	var endPositionSearchString = 0;
	var sliceStringLength = 0;
	var slicedString;
	var fieldValue;
	var field;
	var findString;
	var findStringArray = ['Customer Name:','Customer Phone:','Customer Phone Extension:','Customer Alternate Phone:','Customer Alternate Phone Extension:','Customer Email:','Address 1:','City:','State:','Zip:','Address 1:','City:','State:','Zip:'];
	var fieldArray = ['jobformname1','jobformphone1','jobformphone1','jobformphone2','jobformphone2','jobformemail1','jobformoriginaddress1','jobformorigincitystatezip','jobformorigincitystatezip','jobformorigincitystatezip','jobformdestinationinfo1','jobformdestinationcitystatezip','jobformdestinationcitystatezip','jobformdestinationcitystatezip']
	var arrayLength = findStringArray.length;
	for (var i = 0; i < arrayLength; i++) {
	     findString = findStringArray[i];
		 field = fieldArray[i];
	     startPosition = sliceString(str,findString,foundPosition,startPosition,field);
    }
	document.getElementById('jobformjobnote').value = '';
	function sliceString(str,findString,foundPosition,startPosition) {
        foundPosition = str.indexOf(findString,startPosition); 
        if (foundPosition > 0) {
	        lineBreakPosition = str.indexOf('\n',foundPosition);
	        endPositionSearchString = foundPosition + findString.length + 1;
	        sliceStringLength = lineBreakPosition - endPositionSearchString;
	        slicedString = str.substr(endPositionSearchString,sliceStringLength);
			if (findString == 'Customer Phone Extension:' || findString == 'Customer Alternate Phone Extension:') {
			    fieldValue = document.getElementById(field).value;
	            document.getElementById(field).value = fieldValue + ' Ext ' + slicedString;
		    } else if (findString == 'City:') {
			    fieldValue = document.getElementById(field).value;
				if (fieldValue == '') {
				    document.getElementById(field).value = slicedString;
				} else {
	                document.getElementById(field).value = fieldValue + '\r\n' + slicedString;
				}
			} else if (findString == 'State:' || findString == 'Zip:') {	
			    fieldValue = document.getElementById(field).value;
				document.getElementById(field).value = fieldValue + ' ' + slicedString;
            } else {
	            document.getElementById(field).value = slicedString;
            }			
	        startPosition = endPositionSearchString;
	    }
		return startPosition;
	}	
	return;
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
		calendarView: document.getElementById('jobformcalendarview').value,
	    employeeId: document.getElementById('calendaremployeeid').value,
	    employeeName: document.getElementById('calendaremployeename').value,
		date: document.getElementById('calendardateholder').value,
		pasteJobNumber: 'null',
        pasterAutomaticNumber: null,
        calendarPopupCalledFrom: 'jobform',
		noteView: document.getElementById('jobformnoteview').value,
		employeeInitials: document.getElementById('jobformemployeeinitials').value, 
		searchField: document.getElementById('jobformsearchfield').value
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

	var mouseClickOnJobFormCancelButton = document.getElementById('jobformcancel');
    mouseClickOnJobFormCancelButton.addEventListener('click', function() {jobFormCancel(formTable)}, false);

	var mouseClickOnCancelYesButton = document.getElementById('yesbutton');
    mouseClickOnCancelYesButton.addEventListener('click', function() {refreshPage(calendarObject)}, false);

	var mouseClickOnCancelNoButton = document.getElementById('nobutton');
        mouseClickOnCancelNoButton.addEventListener('click', function() {
        document.getElementById('cancelfieldrow').style.display = "none";
	    formTable.globalAction = 'form';
        reselectField(formTable);
	    return;
	}, false);

	var mouseClickOnJobFormImportButton = document.getElementById('jobformimport');
    mouseClickOnJobFormImportButton.addEventListener('click', function() {jobFormImport(formTable)}, false);

	var mouseClickOnJobFormDoneButton = document.getElementById('jobformdone');
    mouseClickOnJobFormDoneButton.addEventListener('click', function() {jobFormDone(formTable,calendarObject)}, false);

	var mouseClickOnJobFormMoveButton = document.getElementById('jobformmove');
    mouseClickOnJobFormMoveButton.addEventListener('click', function() {jobFormMove(formTable,calendarObject)}, false);

	var mouseClickOnJobStartDate = document.getElementById('jobformstartdate');
    mouseClickOnJobStartDate.addEventListener('click', function() {popUpCalendar(formTable,calendarObject)}, false);

	var mouseClickOnJobCalendarIcon = document.getElementById('jobformcalendaricon');
    mouseClickOnJobCalendarIcon.addEventListener('click', function() {popUpCalendar(formTable,calendarObject)}, false);
		
	var mouseClickOnMoveContinueButton = document.getElementById('movecontinuebutton');
    mouseClickOnMoveContinueButton.addEventListener('click', function() {moveJobDates(formTable,calendarObject)}, false);

	var mouseClickOnMoveCancelButton = document.getElementById('movecancelbutton');
        mouseClickOnMoveCancelButton.addEventListener('click', function() {
		document.getElementById('jobformstartdate').value = '';
		document.getElementById('movefieldrow').style.display = "none";
	    formTable.globalAction = 'form';
        reselectField(formTable);
	    return;
	}, false);

	var mouseClickOnJobFormFixDayOfButton = document.getElementById('jobformfixdayof');
    mouseClickOnJobFormFixDayOfButton.addEventListener('click', function() {jobFormFixDayOf(formTable,calendarObject)}, false);

	var mouseClickOnBody = document.getElementById('jobform');
    mouseClickOnBody.addEventListener('click', function() {mouseSelectionForm(this,formTable)}, false);

   	reselectField(formTable);
	return;
};
	window.addEventListener('load', init, false);