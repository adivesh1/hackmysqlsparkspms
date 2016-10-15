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
			<form action="" method = 'post'>
				<input class="button" type="submit" name = "register_patient"value='New Patient'disabled></button></form>
			<form action="search_patient.php" method = 'post'>
				<input class="button" type="submit" name = "Release Patient"value='Patient Info'></button></form>
			</div>
			</div>
		<form method = "post" action="admin_patient.php">	
		<div id="content_right">
			   <ul class="tab">
					<li><a href="#" style="background-color:#ccc; color:#101f44;" id="person_detail_tab" class="tablinks" onclick="openCity(event, 'new_patient_form1', 'person_detail_tab')">Personal Detail</a></li>
					<li><a href="#" id="doctor_tab" class="tablinks" onclick="openCity(event, 'new_patient_form2', 'doctor_tab')">Doctor</a></li>
					<li><a href="#" id="room_number_tab" class="tablinks" onclick="openCity(event, 'new_patient_form3', 'room_number_tab')">Room Number</a></li>
					<li><a href="#" id="amount_tab" class="tablinks" onclick="openCity(event, 'new_patient_form4', 'amount_tab')">Amount Colloction</a></li>
			   </ul>
			<div style="display:block;" class="tabcontent" id="new_patient_form1">
						<div class="new_patient_field_div">
							First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="fname" value="" required />
						</div>				
						<div class="new_patient_field_div">
							Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="lname" value="" required />
						</div>
						<div class="new_patient_field_div">
							Phone Number:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="tel" name="phone" value="" required />
						</div>				
						<div class="new_patient_field_div">
							Email Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="email" name="email" value="" required />
						</div>				
						<div class="new_patient_field_div">
							Address Line 1:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="address1" value="" required />
						</div>				
						<div class="new_patient_field_div">
							Address Line 2:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="address2" value="" required />
						</div>
                        <input class = "next_button" type="button" value="Next" onclick="openCity(event, 'new_patient_form2', 'doctor_tab')">						
				</div>
				
				<div class = "tabcontent" id="new_patient_form2">				
						<div class="new_patient_field_div">
							Doctor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="new_patient_field_input" type="text" name="doctor" value="" required list = "doctorlist"/>
							<datalist id="doctorlist">
								<option value="Dr.Sanjay Srivastava">
								<option value="Dr.Sangeeta Bhatia">
								<option value="Dr.D.K. Gupta">
								<option value="Dr.Meera Singh">
								<option value="Shalini Singh">
							</datalist>
						</div>				
						<div class="new_patient_field_div">
							Department:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="new_patient_field_input" type="text" name="department" value="" required list = "departmentlist"/>
							<datalist id="departmentlist">
								<option value="Genral">
								<option value="Cardiology">
								<option value="Critical Care">
								<option value="Gynecology">
								<option value="Nephrology">
								<option value="Neurology">
							</datalist>
						</div>
						 <input class = "next_button" type="button" value="Back" onclick="openCity(event, 'new_patient_form1', 'person_detail_tab')">	
						 <input class = "next_button" type="button" value="Next" onclick="openCity(event, 'new_patient_form3', 'room_number_tab')">	
				</div>
				
				<div class = "tabcontent" id="new_patient_form3">
				    <div class="new_patient_field_div">
							Nursing Station:&nbsp;&nbsp;&nbsp;&nbsp;<input class="new_patient_field_input" type="text" name="nursing_station" value="" required list = "nursing_stat"/>
							<datalist id="nursing_stat">
								<option value="Nursing Station 1">
								<option value="Nursing Station 2">
								<option value="Nursing Station 3">
								<option value="Nursing Station 4">
								<option value="Nursing Station 5">
							</datalist>
					</div>
				    <div class="new_patient_field_div">
							Room Number:&nbsp;&nbsp;<input class="new_patient_field_input" type="number" min="0" name="room_number" id="ROOM_NUMBER" value="" required />
					</div>
					<input class = "next_button" type="button" value="Back" onclick="openCity(event, 'new_patient_form2', 'doctor_tab')">	
                    <input class = "next_button" type="button" value="Next" onclick="openCity(event, 'new_patient_form4', 'amount_tab')">						
				</div>
				
				<div class = "tabcontent" id="new_patient_form4">
				    <div class="new_patient_field_div">
							Amount Collection:&nbsp;&nbsp;<input class="new_patient_field_input" type="number" name="amount_collection" id="ROOM_NUMBER" value="" required />
				    </div>
					<div class="new_patient_field_div">

					</div>
					<input class = "next_button" type="button" value="Back" onclick="openCity(event, 'new_patient_form3', 'room_number_tab')">	
					&nbsp;&nbsp;&nbsp;&nbsp;<input style="margin-top:100px; margin-left:100px;" class="button" type="submit" value="Admit Patient" name="admin_patient" value="" required />		
				</div>
            </div><!-- Complete Div-->
            </form>			
</div><!-- Before Body div-->
		<div id="footer">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &copy;	Copyright SPMS 2016. All rights reserved.
		</div>
</body>