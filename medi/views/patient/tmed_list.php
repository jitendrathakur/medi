<div class="journal-entries well" >
	<?php if ($done == false) : ?>
	<a class="btn btn-danger" href="<?php echo base_url('forms/tmed_form') ?>" >Add Tmed</a>
	<?php endif; ?>
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>		
		<th>			
		Id	
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
	
		<th>Action</th>

	</tr>
	</hr>

	<?php if(!empty($results)){ ?>
	<?php foreach($results as $result ){ ?>
	<tr>
		<td>
			<?php echo $result->id; ?>
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

		<td>
			<a  class ="edit_btn" href="<?php echo base_url('patient/tmed_edit/').'/'.$result->id  ?>" >Edit</a>	       
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
