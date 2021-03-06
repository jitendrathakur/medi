<h2> Physical Health List</h2>
<div style="width:700px" >	
	
	<?php //include('alert_tabs.php'); ?>

	
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>
	
		<th>			
		Id	
		</th>

		<th>	
		<?php		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';
		?>
		 <a class ="" href="<?php echo base_url('therapist/physicalhealth_list/').'/user_id/'.$sort  ?>" >Patient</a>				
		</th>

		<th>			
		Treatment	
		</th>
		
		<th>
		Is std	
		</th>
		
		<th>
		Is physical
		</th>

		<th>
		Is hearing
		</th>
		
		<th>
		Is provider
		</th>
		
		<th>
		Is treatment
		</th>
		
		<th>
		Is meds
		</th>

		<th>
		Is counter
		</th>

		<th>
		Is remedies
		</th>

		<th>
		Is weight
		</th>

		<th>
		Is happy
		</th>

		<th>
		Is pain
		</th>

		<th>	
		<?php		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';
		?>
		<a class ="" href="<?php echo base_url('therapist/physicalhealth_list/').'/cr_timestamp/'.$sort  ?>" >Created</a>
		</th>
	
	</tr>
	</hr>

	<?php if(!empty($results)){ ?>
	<?php foreach($results as $result ){ ?>
	<tr>
		<td>
			<?php echo $result->id; ?>
		</td>
		<td>
			<?php echo $result->firstname.' '.$result->lastname; ?>
		</td>
		<td>
			<?php echo $result->treatment; ?>
		</td>

		<td>
			<?php echo $result->is_std; ?>
		</td>

		<td>
			<?php echo $result->is_physical; ?>
		</td>

		<td>
			<?php echo $result->is_hearing; ?>
		</td>

		<td>
			<?php echo $result->is_provider; ?>
		</td>

		<td>
			<?php echo $result->is_treatment; ?>
		</td>

		<td>
			<?php echo $result->is_meds; ?>
		</td>

		<td>
			<?php echo $result->is_counter; ?>
		</td>

		<td>
			<?php echo $result->is_remedies; ?>
		</td>

		<td>
			<?php echo $result->is_weight; ?>
		</td>

		<td>
			<?php echo $result->is_happy; ?>
		</td>

		<td>
			<?php echo $result->is_pain; ?>
		</td>

		<td>
			<?php echo $result->cr_timestamp; ?>
		</td>

	</tr>
	<?php } ?>

	<?php } else { ?>
	<tr>
		<td>
		No Record found
		</td>

	</tr>
	<?php } ?>
	</table>

</div>
</div>
