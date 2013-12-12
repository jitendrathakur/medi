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
		 <a class ="" href="<?php echo base_url('therapist/tmed_list/').'/user_id/'.$sort  ?>" >Patient</a>	
			
		</th>

		<th>			
		Is medicine	
		</th>
		
		<th>
		Is psychiatric	
		</th>
		
		<th>
		Category
		</th>

		<th>
		Is question medicine
		</th>
		
		<th>
		Is question psychiatric
		</th>
		
		<th>
		Pulse
		</th>
		
		<th>
		Created
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
			<?php echo $result->is_medicine; ?>
		</td>

		<td>
			<?php echo $result->is_psychiatric; ?>
		</td>

		<td>
			<?php echo $result->category; ?>
		</td>

		<td>
			<?php echo $result->is_question_medicine; ?>
		</td>

		<td>
			<?php echo $result->is_question_psychiatric; ?>
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

</div>
</div>
