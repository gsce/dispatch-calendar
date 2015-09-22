function refreshPage(calendarObject) {
    var jobNumber = document.getElementById('jobdateformjobnumber').value;
    var jobFormAction = document.getElementById('whereupdated').value;
    var jobAutomaticNumber = ''
	if (jobFormAction != 'popupcalendar') {
	    parent.document.getElementById('jobformsavecancelbutton').style.visibility = 'visible';
    } else {
		document.getElementById('jobformdatetablebox').style.opacity = '0';
    }
	locationAction = 'http://'+defaultIpAddress+'kingjobdatetableform.php?jobformcalendardateholder='+calendarObject.date+'&jobformcalendaremployeeid='+calendarObject.employeeId+'&jobformcalendaremployeename='+calendarObject.employeeName+'&jobformcalendarid='+calendarObject.calendarId+'&jobnumber='+jobNumber+'&jobformaction='+jobFormAction+'&jobautomaticnumber='+jobAutomaticNumber+'&jobformemployeeinitials='+calendarObject.employeeInitials;
    window.location.replace(locationAction);
}


function jobFormDateTableAdd(formTable,calendarObject,e) {
    var str = e.id;
    var jobDate = str.replace(/c/g, 'd');
	jobDate = document.getElementById(jobDate).value;
	formTable.globalAction = 'form';
	formTable.name = 'jobdateform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 17;
	formTable.itemField = 2;
  	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
	document.getElementsByName(formTable.name+'calendarname')[0].value = 'KING';
	document.getElementsByName(formTable.name+'jobdate')[0].value = jobDate;
	var div = document.getElementById(formTable.name+'header');
	div.innerHTML = div.innerHTML + 'Job Date ' + jobDate;
    document.getElementById(formTable.name+'action').value = 'add'; 
	document.getElementById('whereupdated').value = 'popupcalendar'; 
	document.getElementById('popupcalendarbox').style.display = 'none';
	parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	parent.document.getElementById('jobformbottomboxdiv').style.top = '73%';
    parent.document.getElementById('jobformbottomboxdiv').style.height = '27%';
	parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
	parent.document.getElementById('jobformiframe').height = '100%';
	parent.document.getElementById('jobformsavecancelbutton').style.visibility = 'hidden';
	document.getElementById(formTable.name+'container').style.display = 'block';
    document.getElementById(formTable.name+'numberofdays').readOnly = true;
	document.getElementById(formTable.name+'numberofdays').style.opacity = '.3';
	// this setTimeout is on purpose to make the transition work on opacity. there is a transition timing problem and the transition does not fire with out the setTimeout.
	setTimeout(function(){document.getElementById(formTable.name+'container').style.opacity = '1';}, 100); 
   	reselectField(formTable);
	return;
}

function jobFormDateTableUpdate(rowObject,formTable,calendarObject) {
    var e = rowObject;
	formTable.globalAction = 'form';
	formTable.name = 'jobdateform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 17;
	formTable.itemField = 1;
  	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
	if (e.target.parentNode.cells[0].className === 'jobformdatetabledaynoterow'){
		var rowNumber = e.target.parentNode.rowIndex - 1;
	   	document.getElementsByName(formTable.name+'daytype')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[0].textContent.trim();
	   	document.getElementsByName(formTable.name+'jobdate')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[2].textContent.trim();
		var div = document.getElementById(formTable.name+'header');
        div.innerHTML = div.innerHTML + 'Job Date ' + document.getElementById('jobformdatetable').rows[rowNumber].cells[2].textContent.trim();
	   	document.getElementsByName(formTable.name+'jobtime')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[3].textContent.trim();
	   	document.getElementsByName(formTable.name+'weight')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[4].textContent.trim();
	   	document.getElementsByName(formTable.name+'jobhours')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[5].textContent.trim();
	   	document.getElementsByName(formTable.name+'numberofmen')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[6].textContent.trim();
	   	document.getElementsByName(formTable.name+'driver')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[7].textContent.trim();
	   	document.getElementsByName(formTable.name+'namesofmen')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[8].textContent.trim();
	   	document.getElementsByName(formTable.name+'drivernumber')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[9].textContent.trim();
	   	document.getElementsByName(formTable.name+'trucknumber')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[10].textContent.trim();
	   	document.getElementsByName(formTable.name+'trailernumber')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[11].textContent.trim();
	   	document.getElementsByName(formTable.name+'calendarnumber')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[12].textContent.trim();
	   	document.getElementsByName(formTable.name+'calendarname')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[13].textContent.trim();
	   	document.getElementsByName(formTable.name+'jobnumber')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[14].textContent.trim();
	   	document.getElementsByName(formTable.name+'automaticnumber')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[15].textContent.trim();
	   	document.getElementsByName(formTable.name+'numberofdays')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[17].textContent.trim();
		rowNumber += 1;
	   	document.getElementsByName(formTable.name+'daynote')[0].value = document.getElementById('jobformdatetable').rows[rowNumber].cells[1].textContent.trim();
	} else {
  	    document.getElementsByName(formTable.name+'daytype')[0].value = e.target.parentNode.cells[0].textContent.trim();
	    document.getElementsByName(formTable.name+'jobdate')[0].value = e.target.parentNode.cells[2].textContent.trim();
		var div = document.getElementById(formTable.name+'header');
        div.innerHTML = div.innerHTML + 'Job Date ' + e.target.parentNode.cells[2].textContent.trim();
	    document.getElementsByName(formTable.name+'jobtime')[0].value = e.target.parentNode.cells[3].textContent.trim();
	    document.getElementsByName(formTable.name+'weight')[0].value = e.target.parentNode.cells[4].textContent.trim();
	    document.getElementsByName(formTable.name+'jobhours')[0].value = e.target.parentNode.cells[5].textContent.trim();
	    document.getElementsByName(formTable.name+'numberofmen')[0].value = e.target.parentNode.cells[6].textContent.trim();
	    document.getElementsByName(formTable.name+'driver')[0].value = e.target.parentNode.cells[7].textContent.trim();
	    document.getElementsByName(formTable.name+'namesofmen')[0].value = e.target.parentNode.cells[8].textContent.trim();
	    document.getElementsByName(formTable.name+'drivernumber')[0].value = e.target.parentNode.cells[9].textContent.trim();
	    document.getElementsByName(formTable.name+'trucknumber')[0].value = e.target.parentNode.cells[10].textContent.trim();
	    document.getElementsByName(formTable.name+'trailernumber')[0].value = e.target.parentNode.cells[11].textContent.trim();
	    document.getElementsByName(formTable.name+'calendarnumber')[0].value = e.target.parentNode.cells[12].textContent.trim();
	    document.getElementsByName(formTable.name+'calendarname')[0].value = e.target.parentNode.cells[13].textContent.trim();
   	    document.getElementsByName(formTable.name+'jobnumber')[0].value = e.target.parentNode.cells[14].textContent.trim();
   	    document.getElementsByName(formTable.name+'automaticnumber')[0].value = e.target.parentNode.cells[15].textContent.trim();
        document.getElementsByName(formTable.name+'daynote')[0].value = e.target.parentNode.cells[16].textContent.trim();	
	   	document.getElementsByName(formTable.name+'numberofdays')[0].value = e.target.parentNode.cells[17].textContent.trim();
	}
	//alert(document.getElementsByName(formTable.name+'automaticnumber')[0].value);
    document.getElementById(formTable.name+'action').value =  'update'; 
    document.getElementById('whereupdated').value = 'table'; 
	document.getElementById(formTable.name+'container').style.opacity = '0';
	document.getElementById('popupcalendarbox').style.opacity = '0';
	document.getElementById('popupcalendarbox').style.display = 'none';
	document.getElementById('jobformdatetablebox').style.display = 'none';
	parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	parent.document.getElementById('jobformbottomboxdiv').style.top = '73%';
    parent.document.getElementById('jobformbottomboxdiv').style.height = '27%';
	parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
	parent.document.getElementById('jobformiframe').height = '100%';
	parent.document.getElementById('jobformsavecancelbutton').style.visibility = 'hidden';
	document.getElementById(formTable.name+'container').style.display = 'block';
    document.getElementById(formTable.name+'repeatdays').readOnly = true;
	document.getElementById(formTable.name+'repeatdays').style.opacity = '.3';
	// this setTimeout is on purpose to make the transition work on opacity. there is a transition timing problem and the transition does not fire with out the setTimeout.
	setTimeout(function(){document.getElementById(formTable.name+'container').style.opacity = '1';}, 100); 
	reselectField(formTable);
}

function jobFormDateTableUpdateDateAdd(formTable,calendarObject,e) {
    var str = e.id;
    var automaticNumber = str.replace(/c/g, 'e');
	var automaticNumber = document.getElementById(automaticNumber).value;
	formTable.globalAction = 'form';
	formTable.name = 'jobdateform';
	formTable.startItemField = 1;
	formTable.totalItemFields = 17;
	formTable.itemField = 1;
  	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
    document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
	var count = document.getElementById('jobformdatetable').rows.length ;
	for (var i = 1; i < count; i+=1) {
	    if (document.getElementById('jobformdatetable').rows[i].cells[0].className === 'jobformdatetabledaynoterow') continue;
        if (document.getElementById('jobformdatetable').rows[i].cells[15].textContent.trim() == automaticNumber) break;
	}
  	document.getElementsByName(formTable.name+'daytype')[0].value = document.getElementById('jobformdatetable').rows[i].cells[0].textContent.trim();
	document.getElementsByName(formTable.name+'jobdate')[0].value = document.getElementById('jobformdatetable').rows[i].cells[2].textContent.trim();
	var div = document.getElementById(formTable.name+'header');
    div.innerHTML = div.innerHTML + 'Job Date ' + document.getElementById('jobformdatetable').rows[i].cells[2].textContent.trim();
	document.getElementsByName(formTable.name+'jobtime')[0].value = document.getElementById('jobformdatetable').rows[i].cells[3].textContent.trim();
	document.getElementsByName(formTable.name+'weight')[0].value = document.getElementById('jobformdatetable').rows[i].cells[4].textContent.trim();
	document.getElementsByName(formTable.name+'jobhours')[0].value = document.getElementById('jobformdatetable').rows[i].cells[5].textContent.trim();
	document.getElementsByName(formTable.name+'numberofmen')[0].value = document.getElementById('jobformdatetable').rows[i].cells[6].textContent.trim();
	document.getElementsByName(formTable.name+'driver')[0].value = document.getElementById('jobformdatetable').rows[i].cells[7].textContent.trim();
	document.getElementsByName(formTable.name+'namesofmen')[0].value = document.getElementById('jobformdatetable').rows[i].cells[8].textContent.trim();
	document.getElementsByName(formTable.name+'drivernumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[9].textContent.trim();
	document.getElementsByName(formTable.name+'trucknumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[10].textContent.trim();
	document.getElementsByName(formTable.name+'trailernumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[11].textContent.trim();
	document.getElementsByName(formTable.name+'calendarnumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[12].textContent.trim();
	document.getElementsByName(formTable.name+'calendarname')[0].value = document.getElementById('jobformdatetable').rows[i].cells[13].textContent.trim();
   	document.getElementsByName(formTable.name+'jobnumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[14].textContent.trim();
   	document.getElementsByName(formTable.name+'automaticnumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[15].textContent.trim();
    document.getElementsByName(formTable.name+'daynote')[0].value = document.getElementById('jobformdatetable').rows[i].cells[16].textContent.trim();
   	document.getElementsByName(formTable.name+'numberofdays')[0].value = document.getElementById('jobformdatetable').rows[i].cells[17].textContent.trim();
    document.getElementById(formTable.name+'action').value =  'update'; 
	document.getElementById('whereupdated').value = 'popupcalendar'; 
	document.getElementById(formTable.name+'container').style.opacity = '0';
	document.getElementById('popupcalendarbox').style.opacity = '0';
	document.getElementById('popupcalendarbox').style.display = "none";
	document.getElementById('jobformdatetablebox').style.display = 'none';
	parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	parent.document.getElementById('jobformbottomboxdiv').style.top = '73%';
    parent.document.getElementById('jobformbottomboxdiv').style.height = '27%';
	parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
	parent.document.getElementById('jobformiframe').height = '100%';
 	parent.document.getElementById('jobformsavecancelbutton').style.visibility = "hidden";
	document.getElementById(formTable.name+'container').style.display = "block";
    document.getElementById(formTable.name+'repeatdays').readOnly = true;
	document.getElementById(formTable.name+'repeatdays').style.opacity = '.3';
	// this setTimeout is on purpose to make the transition work on opacity. there is a transition timing problem and the transition does not fire with out the setTimeout.
	setTimeout(function(){document.getElementById(formTable.name+'container').style.opacity = '1';}, 100); 
   	reselectField(formTable);
}

function jobDateFormCancel(formTable,calendarObject) {
    if (document.getElementById('jobformdatetable').rows.length == 1) {
	   document.getElementById('whereupdated').value = 'table';
	}
    refreshPage(calendarObject);
	return;
}

function jobDateFormDone(formTable) {
    formTable.name = 'jobdateform';
	if (document.getElementsByName(formTable.name+'daytype')[0].value == '-- Select --') {
	    alert('Please Select Job Description');
        reselectField(formTable);
		return;
	}
    var jobFormAction = document.getElementById('whereupdated').value;
	if (jobFormAction != 'popupcalendar') {
	    parent.document.getElementById('jobformsavecancelbutton').style.visibility = "visible";
    }
 	document.forms[formTable.name].submit();
	return;
}

function mouseOverJobFormDateTable(rowObject,formTable) {
    var e = rowObject;
	if (e.target.parentNode.rowIndex === 0 || typeof(e.target.parentNode.rowIndex) === 'undefined') {
	    e.target.parentNode.style.background = 'black';
	    e.target.parentNode.style.color = 'white';
	} else if ((e.target.parentNode.rowIndex % 2) == 0) {
        var i = e.target.parentNode;
		i.previousElementSibling.style.background = 'orange';
		i.previousElementSibling.style.color = 'white';
		i = e.target.parentNode.rowIndex;
		var ii = i - 1;
		i = i - 2;
		document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.background = 'orange';
		document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.color = 'white';
		document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.background = 'orange';
		document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.color = 'white';
    } else {
        e.target.parentNode.style.background = 'orange';
        e.target.parentNode.style.color = 'white';
		var i = e.target.parentNode.rowIndex;
		var ii = i - 1;
		document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.background = 'orange';
		document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.color = 'white';
		document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.background = 'orange';
		document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.color = 'white';
        e.target.parentNode.style.color = 'white';
	}
	return;
}

function mouseOutJobFormDateTable(rowObject,formTable)  {
    var e = rowObject;
	if (e.target.parentNode.rowIndex === 0 || typeof(e.target.parentNode.rowIndex) === 'undefined') {
	    e.target.parentNode.style.background = 'black';
	    e.target.parentNode.style.color = "white";
	} else {
        var rowCount = document.getElementById('jobformdatetable').rows.length ;
        for (var i = 1; i < rowCount; i+=2) {
	         var ii = i - 1
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.background = '#D7DBD7';
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.color = 'black';
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.background = '#D7DBD7';
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.color = 'black';
             document.getElementsByClassName('jobformdatetablerow')[ii].style.background = '#D7DBD7';
             document.getElementsByClassName('jobformdatetablerow')[ii].style.color = 'black';
        }
        var rowCount = document.getElementById('jobformdatetable').rows.length ;
        for (var i = 1; i < rowCount; i+=4) {
	         var ii = i - 1
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.background = 'white';
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.color = 'black';
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.background = 'white';
	    	 document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.color = 'black';
             document.getElementsByClassName('jobformdatetablerow')[ii].style.background = 'white';
             document.getElementsByClassName('jobformdatetablerow')[ii].style.color = 'black';
        }
	}
	return;
}

function popUpCalendar(rowObject,formTable) {
    formTable.globalAction = 'table';
	formTable.action = 'view';
	formTable.name = 'popupcalendar';
	formTable.calc = 'Calc';
	formTable.startItemField = 0;
	formTable.totalItemFields = 0;
	formTable.itemField = 0;
	formTable.keyValue = null;
 	document.getElementById('jobdateformcontainer').style.display = "none";
	parent.document.getElementById('jobformsavecancelbutton').style.visibility = "hidden";
	parent.document.getElementById('jobformiframe').height = '900px';
	parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	parent.document.getElementById('jobformbottomboxdiv').style.top = '0%';
 	parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
    parent.document.getElementById('jobformbottomboxdiv').style.height = '100%';
	document.getElementById('popupcalendarbox').style.display = "block";
    document.getElementById('r1').scrollIntoView(true); 
    document.getElementById('popupcalendarbox').style.opacity = '1';
   	reselectField(formTable);
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
	    employeeId: document.getElementById('calendaremployeeid').value,
	    employeeName: document.getElementById('calendaremployeename').value,
		date: document.getElementById('calendardateholder').value,
		employeeInitials: document.getElementById('jobdateformemployeeinitials').value, 
		calendarPopupCalledFrom: 'jobdateform'
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
	// this sets up row stripes on the job days when viewed in a table format 
    var rowCount = document.getElementById('jobformdatetable').rows.length ;
    for (var i = 1; i < rowCount; i+=4) {
	     var ii = i - 1
		 document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.background = 'white';
		 document.getElementsByClassName('jobformdatetabledaynoterow')[i].style.color = 'black';
		 document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.background = 'white';
		 document.getElementsByClassName('jobformdatetabledaynoterow')[ii].style.color = 'black';
         document.getElementsByClassName('jobformdatetablerow')[ii].style.background = 'white';
         document.getElementsByClassName('jobformdatetablerow')[ii].style.color = 'black';
    }
	// this sets up the bottom of the page on adding or updating a job depending if you came from the popup calendar screen or 
    // from the update job screen or when the page first comes up from the front calendar screen
	if (document.getElementById('whereupdated').value === 'popupcalendar') { 
 		parent.document.getElementById('jobformsavecancelbutton').style.visibility = "hidden";
	    parent.document.getElementById('jobformiframe').height = '900px';
	    parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	    parent.document.getElementById('jobformbottomboxdiv').style.top = '0%';
 	    parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
        parent.document.getElementById('jobformbottomboxdiv').style.height = '100%';
	    document.getElementById('popupcalendarbox').style.display = "block";
        document.getElementById('r1').scrollIntoView(true); 
	    document.getElementById('popupcalendarbox').style.opacity = '1';
        document.getElementById('jobdateformcontainer').style.display = "none";
		parent.document.getElementById('jobformbottomboxdiv').style.opacity = '1';	
	} else if (document.getElementById('whereupdated').value === 'update') {
    	formTable.globalAction = 'form';
    	formTable.name = 'jobdateform';
    	formTable.startItemField = 1;
    	formTable.totalItemFields = 17;
    	formTable.itemField = 1;
    	var automaticNumber = document.getElementById(formTable.name+'jobautomaticnumber').value;
      	document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
    	document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
        document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
       	document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
    	var count = document.getElementById('jobformdatetable').rows.length ;
    	for (var i = 1; i < count; i+=1) {
    	    if (document.getElementById('jobformdatetable').rows[i].cells[0].className === 'jobformdatetabledaynoterow') continue;
            if (document.getElementById('jobformdatetable').rows[i].cells[15].textContent.trim() == automaticNumber) break;
    	}
      	document.getElementsByName(formTable.name+'daytype')[0].value = document.getElementById('jobformdatetable').rows[i].cells[0].textContent.trim();
    	document.getElementsByName(formTable.name+'jobdate')[0].value = document.getElementById('jobformdatetable').rows[i].cells[2].textContent.trim();
		var div = document.getElementById(formTable.name+'header');
        div.innerHTML = div.innerHTML + 'Job Date ' + document.getElementById('jobformdatetable').rows[i].cells[2].textContent.trim();
    	document.getElementsByName(formTable.name+'jobtime')[0].value = document.getElementById('jobformdatetable').rows[i].cells[3].textContent.trim();
    	document.getElementsByName(formTable.name+'weight')[0].value = document.getElementById('jobformdatetable').rows[i].cells[4].textContent.trim();
    	document.getElementsByName(formTable.name+'jobhours')[0].value = document.getElementById('jobformdatetable').rows[i].cells[5].textContent.trim();
    	document.getElementsByName(formTable.name+'numberofmen')[0].value = document.getElementById('jobformdatetable').rows[i].cells[6].textContent.trim();
    	document.getElementsByName(formTable.name+'driver')[0].value = document.getElementById('jobformdatetable').rows[i].cells[7].textContent.trim();
    	document.getElementsByName(formTable.name+'namesofmen')[0].value = document.getElementById('jobformdatetable').rows[i].cells[8].textContent.trim();
    	document.getElementsByName(formTable.name+'drivernumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[9].textContent.trim();
    	document.getElementsByName(formTable.name+'trucknumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[10].textContent.trim();
    	document.getElementsByName(formTable.name+'trailernumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[11].textContent.trim();
    	document.getElementsByName(formTable.name+'calendarnumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[12].textContent.trim();
    	document.getElementsByName(formTable.name+'calendarname')[0].value = document.getElementById('jobformdatetable').rows[i].cells[13].textContent.trim();
       	document.getElementsByName(formTable.name+'jobnumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[14].textContent.trim();
       	document.getElementsByName(formTable.name+'automaticnumber')[0].value = document.getElementById('jobformdatetable').rows[i].cells[15].textContent.trim();
        document.getElementsByName(formTable.name+'daynote')[0].value = document.getElementById('jobformdatetable').rows[i].cells[16].textContent.trim();
	   	document.getElementsByName(formTable.name+'numberofdays')[0].value = document.getElementById('jobformdatetable').rows[i].cells[17].textContent.trim();
        document.getElementById(formTable.name+'action').value =  'update'; 
    	document.getElementById('whereupdated').value = 'table'; 
    	document.getElementById('popupcalendarbox').style.display = "none";
		document.getElementById('jobformdatetablebox').style.display = 'none';
		parent.document.getElementById('jobformbottomboxdiv').style.opacity = '1';	
    	parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
    	parent.document.getElementById('jobformbottomboxdiv').style.top = '73%';
        parent.document.getElementById('jobformbottomboxdiv').style.height = '27%';
    	parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
    	parent.document.getElementById('jobformiframe').height = '100%';
     	parent.document.getElementById('jobformsavecancelbutton').style.visibility = "hidden";
    	document.getElementById(formTable.name+'container').style.display = 'block';
        document.getElementById(formTable.name+'repeatdays').readOnly = true;
    	document.getElementById(formTable.name+'repeatdays').style.opacity = '.3';
    	// this setTimeout is on purpose to make the transition work on opacity. there is a transition timing problem and the transition does not fire with out the setTimeout.
		setTimeout(function(){document.getElementById(formTable.name+'container').style.opacity = '1';}, 100); 
    } else if (document.getElementById('whereupdated').value === 'table') {
   		setTimeout(function(){document.getElementById('jobformdatetablebox').style.opacity = '1';}, 100);
   	    setTimeout(function(){document.getElementById('jobdateformcontainer').style.display = "none";}, 100);
		setTimeout(function(){document.getElementById('popupcalendarbox').style.opacity = 0;}, 100);
	    setTimeout(function(){document.getElementById('popupcalendarbox').style.display = "none";}, 100);
 	} else {
	    formTable.globalAction = 'form';
	    formTable.name = 'jobdateform';
	    formTable.startItemField = 1;
	    formTable.totalItemFields = 17;
	    formTable.itemField = 2;
  	    document.getElementById(formTable.name+'calendarid').value = calendarObject.calendarId;
	    document.getElementById(formTable.name+'calendaremployeeid').value = calendarObject.employeeId;
        document.getElementById(formTable.name+'calendaremployeename').value = calendarObject.employeeName;
   	    document.getElementById(formTable.name+'calendardateholder').value = calendarObject.date;
	    document.getElementsByName(formTable.name+'calendarname')[0].value = 'KING';
		var day = calendarObject.date.slice(8,10);
		var month = calendarObject.date.slice(5,7);
		var year = calendarObject.date.slice(0,4);
		var convertStrTime = month + '/' + day + '/' + year;  
	    document.getElementsByName(formTable.name+'jobdate')[0].value = convertStrTime;
		var div = document.getElementById(formTable.name+'header');
		div.innerHTML = div.innerHTML + 'Job Date ' + convertStrTime;
        document.getElementById(formTable.name+'action').value = 'add'; 
	    document.getElementById('whereupdated').value = 'popupcalendar'; 
	    document.getElementById('popupcalendarbox').style.display = 'none';
		parent.document.getElementById('jobformbottomboxdiv').style.opacity = '1';	
	    parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	    parent.document.getElementById('jobformbottomboxdiv').style.top = '73%';
        parent.document.getElementById('jobformbottomboxdiv').style.height = '27%';
	    parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
	    parent.document.getElementById('jobformiframe').height = '100%';
	    parent.document.getElementById('jobformsavecancelbutton').style.visibility = 'hidden';
	    document.getElementById(formTable.name+'container').style.display = "block";
        document.getElementById(formTable.name+'numberofdays').readOnly = true;
	    document.getElementById(formTable.name+'numberofdays').style.opacity = '.3';
	    // this setTimeout is on purpose to make the transition work on opacity. there is a transition timing problem and the transition does not fire with out the setTimeout.
	    setTimeout(function(){document.getElementById(formTable.name+'container').style.opacity = '1';}, 100); 
	}
 
    window.addEventListener('keydown', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;searchFieldArrowKeysOrPageKeysPressedDown(formTable,keyboardObject)}, false);
    window.addEventListener('keypress', function(e) {keyboardObject=e; formTable.keyValue = e.keyCode;enterSelection(formTable,keyboardObject)}, false); 

 	var mouseDoubleClickOnJobFormDateTable = document.getElementById('jobformdatetable');
    mouseDoubleClickOnJobFormDateTable.addEventListener('dblclick', function(e) {var rowObject = e; jobFormDateTableUpdate(rowObject,formTable,calendarObject)}, false);

	var mouseOverOnJobFormDateTable = document.getElementById('jobformdatetable');
    mouseOverOnJobFormDateTable.addEventListener('mouseover', function(e) {rowObject = e; mouseOverJobFormDateTable(rowObject,formTable)}, false);

	var mouseOutOnJobFormDateTable = document.getElementById('jobformdatetable');
    mouseOutOnJobFormDateTable.addEventListener('mouseout', function(e) {rowObject = e; mouseOutJobFormDateTable(rowObject,formTable)}, false);

	var mouseClickOnJobDateFormCancelButton = document.getElementById('jobdateformcancel');
    mouseClickOnJobDateFormCancelButton.addEventListener('click', function() {jobDateFormCancel(formTable,calendarObject)}, false);

	var mouseClickOnJobDateFormDoneButton = document.getElementById('jobdateformdone');
    mouseClickOnJobDateFormDoneButton.addEventListener('click', function() {jobDateFormDone(formTable)}, false);
	
 	var mouseClickOnJobDateFormDateButton = document.getElementById('calendaricon');
    mouseClickOnJobDateFormDateButton.addEventListener('click', function() {
	    parent.document.getElementById('jobformiframe').height = '400px';
	    parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	    parent.document.getElementById('jobformbottomboxdiv').style.top = '45%';
 	    parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
        parent.document.getElementById('jobformbottomboxdiv').style.height = '400px';
        document.getElementById('popupcalendariframe').style.display = 'block';
		var day = document.getElementsByName(formTable.name+'jobdate')[0].value.slice(3,5);
		var month = document.getElementsByName(formTable.name+'jobdate')[0].value.slice(0,2);
		var year = document.getElementsByName(formTable.name+'jobdate')[0].value.slice(6,10);
		var convertStrDate = year + '-' + month + '-' + day;  
        calendarObject.date = convertStrDate;
        locationAction = 'http://'+defaultIpAddress+'kingpopupcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpopupcalledfrom='+calendarObject.calendarPopupCalledFrom;
        document.getElementById('popupcalendariframe').contentWindow.location.replace(locationAction);		
		}, false);
		
    var mouseClickOnJobDateFormDateField = document.getElementById('jobdateformdatefield');
    mouseClickOnJobDateFormDateField.addEventListener('click', function() {
	    parent.document.getElementById('jobformiframe').height = '400px';
	    parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	    parent.document.getElementById('jobformbottomboxdiv').style.top = '45%';
 	    parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
        parent.document.getElementById('jobformbottomboxdiv').style.height = '400px';
        document.getElementById('popupcalendariframe').style.display = 'block';
		var day = document.getElementsByName(formTable.name+'jobdate')[0].value.slice(3,5);
		var month = document.getElementsByName(formTable.name+'jobdate')[0].value.slice(0,2);
		var year = document.getElementsByName(formTable.name+'jobdate')[0].value.slice(6,10);
		var convertStrDate = year + '-' + month + '-' + day;  
        calendarObject.date = convertStrDate;
        locationAction = 'http://'+defaultIpAddress+'kingpopupcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpopupcalledfrom='+calendarObject.calendarPopupCalledFrom;
        document.getElementById('popupcalendariframe').contentWindow.location.replace(locationAction);		
		}, false);
		
    var mouseClickOnPopUpCalendarButton = document.getElementById('jobformdatetableadd');
	mouseClickOnPopUpCalendarButton.addEventListener('click', function() {popUpCalendar(rowObject,formTable)}, false);
    
	for (var dateEvent = 0; dateEvent < 90; dateEvent++) {
		for (var count = 0; count < 6; count++) {
		    var cell = 'c'+dateEvent+'c'+count;
		    var mouseClickOnPopUpCalendarDayCellButton = document.getElementById(cell);
			if (document.getElementById(cell).value == ''){
			    mouseClickOnPopUpCalendarDayCellButton.addEventListener('click', function() {jobFormDateTableAdd(formTable,calendarObject,this)}, false);
			} else {
		        mouseClickOnPopUpCalendarDayCellButton.addEventListener('click', function() {jobFormDateTableUpdateDateAdd(formTable,calendarObject,this)}, false);
			}
		}
	}
	
	var mouseClickOnPopUpCalendarTableContinueButton = document.getElementById('popupcalendartablecontinue');
	mouseClickOnPopUpCalendarTableContinueButton.addEventListener('click', function() {
        document.getElementById('whereupdated').value = 'table'; 
    	parent.document.getElementById('jobformbottomboxdiv').style.left = '0%';
	    parent.document.getElementById('jobformbottomboxdiv').style.top = '73%';
        parent.document.getElementById('jobformbottomboxdiv').style.height = '27%';
	    parent.document.getElementById('jobformbottomboxdiv').style.width = '100%';
	    refreshPage(calendarObject)}, false);

	var mouseClickOnBody = document.getElementById('jobdateform');
    mouseClickOnBody.addEventListener('click', function() {mouseSelectionForm(this,formTable)}, false);

   	reselectField(formTable);
	return;
};
	window.addEventListener('load', init, false);