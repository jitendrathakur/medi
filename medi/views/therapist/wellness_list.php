<div class="journal-entries well" >	

	<?php include('alert_tabs.php'); ?>

	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>

		<th>			
		Id	
		</th>

		<th>	
		<?php
		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';

		?>
		 <a class ="" href="<?php echo base_url('therapist/wellness_list/').'/user_id/'.$sort  ?>" >Patient</a>	
			
		</th>

		<th>			
		Feel	
		</th>
		
		<th>
		Wellness	
		</th>
		
		<th>
		Apply
		</th>

		<th>
		Hospitalization
		</th>
		
		<th>
		Crisis
		</th>
		
		<th>
		Pulse
		</th>
		
		<th>	
		<?php		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';
		?>
		<a class ="" href="<?php echo base_url('therapist/wellness_list/').'/cr_timestamp/'.$sort  ?>" >Created</a>
		</th>
	
	</tr>
	</hr>

	<?php if(!empty($results)){ ?>
	<?php foreach($results as $result ){ ?>
	<?php $class = (date('Y-m-d', strtotime($result->cr_timestamp)) == date('Y-m-d')) ? 'success' : ''; 
	
	?>
	<tr class="<?php echo $class; ?>">
		<td>
			<?php echo $result->id; ?>
		</td>
		<td>
			<?php echo $result->firstname.' '.$result->lastname; ?>
		</td>
		<td>
			<?php echo $result->feel; ?>
		</td>

		<td>
			<?php echo $result->wellness; ?>
		</td>

		<td>
			<?php echo $result->apply; ?>
		</td>

		<td>
			<?php echo $result->hospitalization; ?>
		</td>

		<td>
			<?php echo $result->crisis; ?>
		</td>

		<td>
			<?php echo $result->pulse; ?>
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

	<?php echo $links; ?>

</div>
</div>
