<?php
include('templates/header_template.php');
?>
<h2><A HREF="javascript:window.print()"><img src="source/printer.png"/> Print this Page</A></h2>
<hr>
<h2>Current Dorm Reservations and Assignments:</h2>';
<h4>If this list is correct, you can either request an invoice to be sent or make payment using Paypal.  Please note that all payments must be received before or at Registration Check-In at the National Tournament.  Dorm reservations are not held if invoice is not requested or payment is not made.</h4>
<table><tr><th>Name</th><th>Gender</th><th>Arrival</th><th>Departure</th><th>Linens</th><th>Disability?</th><th>Type</th><th>Role</th><th>Status</th><th>Price</th></tr>
	<?php 
		$display= new Display;
		echo $id;
		$display->display_table($id);
	?>
	</table>
<h2>Need to edit this dorm list?  <a href="index.php">Return to editing page.</a></H2>
<hr>
<h2>Grand Total:$'.$max_cost.'</h2>
<h1>Total Amount Still Due: $'.$price.'</h1>
<!--<h1>Max Price:$'.$max_cost.'</h1>-->
<hr>
<h2> Payment Options:</h2>

<table width="400" border="0">
        <tr>
          <td>
				<h3> Pay With Paypal</h3>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<!-- Identify your business so that you can collect the payments. -->
					<input type="hidden" name="business" value="mckeem1@gmail.com">

					<!-- Specify a Buy Now button. -->
					<input type="hidden" name="cmd" value="_xclick">

					<!-- Specify details about the item that buyers will purchase. -->
					<input type="hidden" name="item_name" value="Dorm Rooms">
					<input type="hidden" name="amount" value="'.$price.'">
					<input type="hidden" name="currency_code" value="USD">

					<!-- Display the payment button. -->
					<input type="image" name="submit" border="0"
					src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
					alt="PayPal - The safer, easier way to pay online">
					<img alt="" border="0" width="1" height="1"
					src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >	
				</form>
			</td>
			<td>
				<h3>Request an Invoice</h3>
				<form method="POST" action="">
				<input type="hidden" value="'.$price.'" name="cost"/>
				<input type="hidden" value="'.$id.'" name="id"/>
				<input type="hidden" value="'.$team_name.'" name="team"/>
				<input type="submit" value="Request Invoice" name="request"></form>
			</td>
        </tr>
      </table>

<hr>   
<h3>If you have any problems or questions please contact Rick at 
<a href="mailto:rick@scienceolympiad2014.com">rick@scienceolympiad2014.com</a>
</h3>     
