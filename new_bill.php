<?php
 require_once('auth.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>New Patient Admission</title>
		<script type="text/javascript" src="javascript/script.js">
		</script>
		<link rel="stylesheet" href="css/main.css"/>
		<style>body{background:black url(images/img_bg.jpg) no-repeat center top fixed}</style>
	</head>
<body><div id="main">
	<div id="header">
			<div id="logo">
				<img width="150px" height="150" src="images/logo.jpg"></img>
			</div>
			<div id="middle">
				<div id="title">Smart Patient Monitoring System</div>
			</div>
			<div id="user_div" class="dropdown">
				
				<div id="user_icon_div">
					<img id="user_icon" width="100px" height="100" alt="User" src="images/user_icon.jpg"></img>
				</div>
				
				<div id="username_div">
					Hi Admin
				</div>
				<div class="dropdown-content">
					<a href="/index.php">Logout</a>
				</div>
			</div>
		</div>
				<div id="content">
			<div id="content_left">
			<div id="ADMIN_OPTION">
			<form action="serach_bill.php" method = 'post'>
				<input class="button" type="submit" name = "register_patient"value='Get Bill Info'></button></form>
			<form action="new_bill.php" method = 'post'>
				<input class="button" type="submit" name = "Release Patient"value='Add New Bill' Disable></button></form>
			</div>
			</div>
		<form method = "post" action="update_patient_bill.php">
		<div id="content_right">
			 <h1 style="text-align:center"><font color="#adebeb"> Patient Billing System</font></h1>
			 <div id="myTable">
				<table class="form" border="1">
                    <tr>
						<td>
							<input style="background-color:#002080;text-align:center" type="text" required="required" name="BX_NAME[]" value="Particular Name" size="30" style="text-align: center" READONLY>
						 </td>
						 <td>
							<input style="background-color:#002080;text-align:center" type="text" required="required" class="small"  value="Rate" name="BX_age[]" size="5" style="text-align: center" READONLY>
					     </td>
						 <td>
							<input style="background-color:#002080;text-align:center" type="text" id="BX_gender" name="BX_gender" value="Qty" required="required" size="5" style="text-align: center" READONLY>
						 </td>
						 <td>
							<input style="background-color:#002080;text-align:center" id="BX_birth" name="BX_birth" value="Total" required="required" size="5" style="text-align: center" READONLY>
						 </td>
						 <td><input type="text" name="rnum" size="19" placeholder="EnterRoomNumber" Required ></td>
                    </tr>
                </table>
			   </div>	
			   <div id="myTable1">
               <table  id="dataTable" class="form" border="1">
                    <tr>
						<td>
							<input type="text" required="required" name="paticular[]" size="30">
						 </td>
						 <td>
							<input id="rateid" type="text" required="required" value="" class="small"  name="rate[]" size="5" onkeyup="Calculate()">
					     </td>
						 <td>
							<input id="qtyid" type="text"  value="" name="qty[]" required="required" size="5" onkeyup="Calculate()">
						 </td>
						 <td>
							<input id="totalid" name="total[]"  value=""  size="5">
						 </td>
						 <TD><input type="button" value="Remove Row" onClick="deleteRow('dataTable')"/></TD>
						 <TD><input type="button" value="Add Row" onClick="addRow('dataTable')" /></TD>
                    </tr>
                </table>
				<p></p>
				</div>
				<input id="button" class="button" type="submit" value="Generate Bill" />
            </div><!-- Complete Div-->	
			</form>
</div><!-- Before Body div>-->
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
</body>