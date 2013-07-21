<STYLE type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid; 
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bolder;
	}
   
</STYLE>
<table>
	<tr>
		<td><b>Sponsorship Details Export<b></td>
	</tr>
	<tr>
		<td><b>Date:</b></td>
		<td><?php echo date("F j, Y, g:i a"); ?></td>
	</tr>
	<tr>
		<td><b>Number of Rows:</b></td>
		<td style="text-align:left"><?php echo count($gifts);?></td>
	</tr>
	<tr>
		<td></td>
	</tr>
		<tr id="titles">
			<td class="tableTd">Date</td>
            <td class="tableTd">Appeal</td>
			<td class="tableTd">Name</td>
			<td class="tableTd">Address</td>
			<td class="tableTd">City</td>
			<td class="tableTd">Pin code</td>
			<td class="tableTd">Age range</td>
			<td class="tableTd">Email</td>
			<td class="tableTd">Phone</td>
			<td class="tableTd">Requested for email confirmation</td>
			<td class="tableTd">Source</td>
			<td class="tableTd">Status</td>
			<td class="tableTd">Amount</td>
			
			<td class="tableTd">Serial</td>			
		</tr>		
		<?php foreach($gifts as $gift):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$gift['Gift']['modified'].'</td>';
            echo '<td class="tableTdContent">'.$gift['Appeal']['title'].'</td>';
			echo '<td class="tableTdContent">'.$gift['Person']['name'].'</td>';
			echo '<td class="tableTdContent">'.$gift['Person']['address1'].'</td>';
			echo '<td class="tableTdContent">'.$gift['Person']['city'].'</td>';
			echo '<td class="tableTdContent">'.$gift['Person']['pincode'].'</td>';
			 echo '<td class="tableTdContent">'.$gift['Person']['agerange'].'</td>';
			 echo '<td class="tableTdContent">'.$gift['Person']['email'].'</td>';
			 echo '<td class="tableTdContent">'.$gift['Person']['phone'].'</td>';
			 echo '<td class="tableTdContent">'.$gift['Gift']['emailconfirmation'].'</td>';
       echo '<td class="tableTdContent">'.$gift['Gift']['source'].'</td>';
			 echo '<td class="tableTdContent">'.$gift['Gift']['status'].'</td>';
			 echo '<td class="tableTdContent">'.$gift['Gift']['amount'].'</td>';
			 echo '<td class="tableTdContent">'.$gift['Gift']['serial'].'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

