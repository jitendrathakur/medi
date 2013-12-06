<div class="journal-entries well" >
	<?php if ($done == false) : ?>
	<a class="btn btn-danger" href="<?php echo base_url('forms/recoveryvitals_form') ?>" >Add Recovery Vitals</a>
	<?php endif; ?>
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>

		<th>			
		Id	
		</th>

		<th>			
		Is sleep	
		</th>
		
		<th>
		Is healthy	
		</th>
		
		<th>
		Is excersise
		</th>

		<th>
		Is meditation
		</th>
		
		<th>
		Is spirituality
		</th>
		
		<th>
		Is groups
		</th>

		<th>
		Is community
		</th>

		<th>
		Is family
		</th>

		<th>
		Is enjoy
		</th>

		<th>
		Is religion
		</th>

		<th>
		Is recovery
		</th>

		<th>
		Is life
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
			<?php echo $result->is_sleep; ?>
		</td>

		<td>
			<?php echo $result->is_healthy; ?>
		</td>

		<td>
			<?php echo $result->is_excersise; ?>
		</td>

		<td>
			<?php echo $result->is_meditation; ?>
		</td>

		<td>
			<?php echo $result->is_spirituality; ?>
		</td>

		<td>
			<?php echo $result->is_groups; ?>
		</td>

		<td>
			<?php echo $result->is_community; ?>
		</td>

		<td>
			<?php echo $result->is_family; ?>
		</td>

		<td>
			<?php echo $result->is_enjoy; ?>
		</td>

		<td>
			<?php echo $result->is_religion; ?>
		</td>

		<td>
			<?php echo $result->is_recovery; ?>
		</td>

		<td>
			<?php echo $result->is_life; ?>
		</td>

		<td>
			<?php echo $result->pulse; ?>
		</td>

		<td>
			<?php echo $result->cr_timestamp; ?>
		</td>

		<td>
			<a  class ="edit_btn btn" href="<?php echo base_url('patient/recoveryvitals_edit/').'/'.$result->id  ?>" >Edit</a>	       
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
