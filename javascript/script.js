function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 20){							// limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}else{
		 alert("Maximum Passenger per ticket is 5.");
			   
	}
}

function deleteRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
        {
			if(rowCount <= 1) { 						// limit the user from removing all the fields
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		}
	}
}
/*Calculate total*/
function Calculate()
  {
       var txt1 = document.getElementByid("rateid").value;
       var txt2 = document.getElementByname("qtyid").value;
       var txt3 = document.getElementByname("totalid").value;
       if ((txt1.value != "") && (txt2.value != ""))
       {
            txt3.value = parseInt(txt1.value) * parseInt(txt2.value); 
       }

  }