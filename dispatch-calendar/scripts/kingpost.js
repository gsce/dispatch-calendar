 
	function init() {
	  var defaultIpAddress = document.getElementById('defaultipaddress').value;
      var postform = document.getElementById('postform').value;
	  var calendarObject = {
	      calendarId: document.getElementById('calendarid').value,
		  calendarView: document.getElementById('calendarview').value,
	      employeeId: document.getElementById('calendaremployeeid').value,
	      employeeName: document.getElementById('calendaremployeename').value,
		  date: document.getElementById('calendardateholder').value,
		  pasteJobNumber: null,
          pasteAutomaticNumber: null, 
		  employeeInitials: document.getElementById('employeeinitials').value,
		  noteView: document.getElementById('noteview').value
	  };
	  //alert(calendarObject.employeeInitials);
	  if (postform === 'noteform') {
          locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  } else if (postform === 'employeeform') {
	      var searchField = document.getElementById('searchfield').value;
	      locationAction = 'http://'+defaultIpAddress+'kingemployeetableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  } else if (postform === 'contactform') {
	      var searchField = document.getElementById('searchfield').value;
	      locationAction = 'http://'+defaultIpAddress+'kingcontacttableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  } else if (postform === 'calendarsetupform') {
	      locationAction = 'http://'+defaultIpAddress+'kingcalendarsetuptableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber=null&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  }	else if (postform === 'jobform') {
	      var searchField = document.getElementById('searchfield').value;
          locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&searchfield='+searchField+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  }	else if (postform === 'jobdateform') {
	      var jobNumber = document.getElementById('jobnumber').value;
		  var jobFormAction = document.getElementById('whereupdated').value;
		  var jobAutomaticNumber = '';
	      locationAction = 'http://'+defaultIpAddress+'kingjobdatetableform.php?jobformcalendardateholder='+calendarObject.date+'&jobformcalendaremployeeid='+calendarObject.employeeId+'&jobformcalendaremployeename='+calendarObject.employeeName+'&jobformcalendarid='+calendarObject.calendarId+'&jobnumber='+jobNumber+'&jobformaction='+jobFormAction+'&jobautomaticnumber='+jobAutomaticNumber+'&jobformemployeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  }	else if (postform === 'nowork') {
          locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  }	else if (postform === 'cancelljob') {
          locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  }	else if (postform === 'deletejob') {
          locationAction = 'http://'+defaultIpAddress+'kingcalendar.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  }	else if (postform === 'deleteemployee') {
          locationAction = 'http://'+defaultIpAddress+'kingemployeetableform.php?calendardate='+calendarObject.date+'&calendaremployeeid='+calendarObject.employeeId+'&calendaremployeename='+calendarObject.employeeName+'&calendarid='+calendarObject.calendarId+'&calendarpastejobnumber='+calendarObject.pasteJobNumber+'&calendarview='+calendarObject.calendarView+'&calendarcopycut=null&noteview='+calendarObject.noteView+'&employeeinitials='+calendarObject.employeeInitials;
          window.location.replace(locationAction);
	  }
	  return;
    }
    window.addEventListener('load', init, false);