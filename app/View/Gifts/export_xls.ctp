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
			<td class="tableTd">Serial</td>
			<td class="tableTd">Status</td>
			<td class="tableTd">Amount</td>
			<td class="tableTd">Name</td>
			<td class="tableTd">Appeal</td>
			<td class="tableTd">Date</td>
		</tr>		
		<?php foreach($gifts as $gift):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$gift['Gift']['serial'].'</td>';
			echo '<td class="tableTdContent">'.$gift['Gift']['status'].'</td>';
      echo '<td class="tableTdContent">'.$gift['Gift']['amount'].'</td>';
      echo '<td class="tableTdContent">'.$gift['Person']['name'].'</td>';
      echo '<td class="tableTdContent">'.$gift['Appeal']['title'].'</td>';
      echo '<td class="tableTdContent">'.$gift['Gift']['modified'].'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

