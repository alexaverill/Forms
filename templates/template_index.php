<?php
include('templates/header_template.php');
?>
<h2>To add a new bed reservation, enter the Student or Chaperone Name into the Reservation List. Add additional people by clicking on "Add Another Person".  You must enter a first name into the form to reserve a room and calculate prices. Blank fields will not be calculated.</h2>
<p>NOTE: Often there are an odd number of students, but we don't want you to be charged for the single price. If a student is in a room alone because he or she is an odd number in the select "Double". Select "Single" ONLY if you intend the student or chaperone to purposefully be in the room alone, not as a result of having an odd number of male or female students.</p>
	<hr>
 <h2>Current Dorm Reservations and Assignments</h2>
 <h3>Note:  UNTIL YOU PAY OR REQUEST AN INVOICE, DORMS WILL NOT BE HELD.</h2>
 <p>To edit information for a person, click anywhere you want to make the change and an editable field will appear.  Click OK after you make the change.</p>
 	<table><form method="POST" action="">
	<tr><th>Name</th><th>Gender</th><th>Arrival</th><th>Departure</th><th>Linens</th><th>Disability?</th><th>Type</th><th>Role</th><th><input type="submit" value="Delete" name="drop"/></th></tr>
	<?php 
		$display= new Display;
		$display->display_table($id);
	?>
	<h3><a href="process.php">Accept the list above and proceed to payment page.</a></h3>
	<p> If you need to add additional people, don't click Accept. Instead continue to add people below and when completed, click on Save the Additions.  The two lists will be merged so you can pay.</p>
	<hr>
	<br>
	<h2> Reservation List </h2>
	<h3>Do you need to add anyone to your Reservation List?  Add more people below…</h3>
<form method="POST" action="process.php" id="forms">
<table id="beds">

	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Arrival</th>
		<th>Departure</th>
		<th>Linens</th>
		<th>Alone or Double Occupancy</th>
		<th>Disability requiring Special Rooming</th>
		<th>Role</th>
		<th>Number of Nights</th>
	</tr>
	<tr>
		<td><input type="text" name="first1"/></td>
		<td><input type="text" name="last1"/></td>
		<td>
			<select name="gender1">
				<option value="m">Male</option>
				<option value="f">Female</option>
			</select>
		</td>
		<td><select name="arr1">
		<option value="14">May 14th</option>
		<option value="15">May 15th</option>
		<option value="16">May 16th</option>
		<option value="17">May 17th</option>
	</select></td>
		<td><select name="dep1" id="leaving">
		<option value="14">May 14th</option>
		<option value="15">May 15th</option>
		<option value="16">May 16th</option>
		<option value="17">May 17th</option>
			<option value="18">May 18th</option>
			<option value="19">May 19th</option>
			<option value="20">May 20th</option>
	</select></td>
		<td>
			<select name="linens1">
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
		</td>
		<td>
			<select name="occ1">
				<option value="2">Double</option>
				<option value="1">Alone</option>

			</select>		
		</td>
		<td>
			<select name="disab1">
				<option value="no">No</option>
				<option value="yes">Yes</option>
			</select>
		</td>
		<td>
			<select name="role1">
				<option value="competitor">Competitor</option>
				<option value="chaperone">Chaperone</option>
				<option value="noncompetitor">Non Competitor</option>
		</td>
		<td> 
			<div id="day1"></div> 
		</td>
	</tr>

	</table>

	<input type="hidden" id="full_price" name="full_price" value=""/>
	<input type="hidden" id="total_rows" name ="total_rows" value="1"/>
	<br/>
	<button onClick="add_row();" value="New Row"  type="button">Add Another Person</button>
	<br/>
	<br/>
	<input type="submit" name="submit" value="Save the Additions and Go to Payment"/>
	</form>
	
<div id="price">
	<h2>Cost of Additions: $<span id="price_in"></span></h2>
	<h2>Total Bed-Nights: <span id="total_beds"></span></h2>
	<!--<h2>Updated Amount to Pay with Additions/Modifications:$<span id="full_cost"></span></h2>-->
	</div>

</body>
</html>
