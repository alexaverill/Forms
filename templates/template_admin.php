<?php

?>
<style>
	#main_body{
		width:1000px;
	}
	table{
		width: 1000px;
		}
		#page{
		width: 1000px;
		}
		</style>
<form method="POST" action=""><h1>Pick a Team:</h1>
<select name="teams">
    <?php $display= new Display;
        $display->return_team_options();
        ?>
</select>
<input type="submit" name="go" id="go"/></form>
<h2>Dorm Reservation List</h2>
<table><form method="POST" action="">';
<tr><th>Name</th><th>Gender</th><th>Arrival</th><th>Departure</th><th>Linens</th><th>Disability?</th><th>Type</th><th>Role</th><th>Time Stamp</th><th>Drop</th><th>Paid</th></tr>
<?php

$display->admin_table($_POST['id']);
?>

<table>
	<tr>
	    <td align=left width="400px">
		<h2>Has
                <a href="https://docs.google.com/a/floridascienceolympiad.org/spreadsheet/ccc?key=0AjeHvlEjiYKIdHlEd1d4VWFJeGhIVXdXOTZFTjZmc3c&usp=drive_web#gid=0" target="_blank">check been received</a>
                or payment made through PayPal?
                    <?php /*CHECK PAYMENT STATUS*/?>	
	</td>
	<td align=left>
	<h4>Received? Click Here:
	<form method="POST" action=""><input type="hidden" value="'.$team_id.'" name="id"><input type="submit" name="paid" value="Confirm Payment"/></form>';
</td>
		</tr>
</table>
<hr>