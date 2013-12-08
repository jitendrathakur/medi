<div class="journal-entries well" >
	<?php if ($done == false) : ?>
	<a class="btn btn-danger" href="<?php echo base_url('forms/forensic_form') ?>" >Add Forensic</a>
	<?php endif; ?>
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>
		<th>			
		Id	
		</th>

		<th>			
		Is parole	
		</th>
		
		<th>
		Is month	
		</th>
		
		<th>
		Is charge
		</th>

		<th>
		Is fines
		</th>
		
		<th>
		Is week
		</th>
		
		<th>
		Is residence
		</th>
		
		<th>
		Is criminal
		</th>

		<th>
		Is friends
		</th>

		<th>
		Is family
		</th>

		<th>
		Is volunteer
		</th>

		<th>
		Arrest
		</th>

		<th>
		Incarceration
		</th>

		<th>
		pulse
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
			<?php echo $result->is_parole; ?>
		</td>

		<td>
			<?php echo $result->is_month; ?>
		</td>

		<td>
			<?php echo $result->is_charge; ?>
		</td>

		<td>
			<?php echo $result->is_fines; ?>
		</td>

		<td>
			<?php echo $result->is_week; ?>
		</td>

		<td>
			<?php echo $result->is_residence; ?>
		</td>

		<td>
			<?php echo $result->is_criminal; ?>
		</td>

		<td>
			<?php echo $result->is_friends; ?>
		</td>

		<td>
			<?php echo $result->is_family; ?>
		</td>

		<td>
			<?php echo $result->is_volunteer; ?>
		</td>

		<td>
			<?php echo $result->arrest; ?>
		</td>

		<td>
			<?php echo $result->incarceration; ?>
		</td>

		<td>
			<?php echo $result->pulse; ?>
		</td>

		<td>
			<?php echo $result->cr_timestamp; ?>
		</td>

		<td>
			<a  class ="edit_btn btn" href="<?php echo base_url('patient/forensic_edit/').'/'.$result->id  ?>" >Edit</a>	       
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
