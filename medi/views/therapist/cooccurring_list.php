<div class="journal-entries well" >
	<?php if ($done == false) : ?>
	<a class="btn btn-danger" href="<?php echo base_url('forms/cooccurring_form') ?>" >Add Cooccurring</a>
	<?php endif; ?>
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>

		<th>			
		Id	
		</th>

		<th>			
		Is drug	
		</th>

		<th>			
		Is drug_week
		</th>

		<th>			
		Is alcohol	
		</th>

		<th>			
		Is alcohol week
		</th>

		<th>			
		Is alcohol friend	
		</th>

		<th>			
		Is alcohol family	
		</th>

		<th>			
		Is cravings	
		</th>

		<th>			
		Is drug	
		</th>

		<th>			
		Is triggers	
		</th>
		
		<th>
		Is plans	
		</th>
		
		<th>
		Last alcohol
		</th>

		<th>
		Last drugs
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
			<?php echo $result->is_drug; ?>
		</td>

		<td>
			<?php echo $result->is_drug_week; ?>
		</td>

		<td>
			<?php echo $result->is_alcohol; ?>
		</td>

		<td>
			<?php echo $result->is_alcohol_week; ?>
		</td>

		<td>
			<?php echo $result->is_alcohol_friend; ?>
		</td>

		<td>
			<?php echo $result->is_cravings; ?>
		</td>

		<td>
			<?php echo $result->is_dreams; ?>
		</td>

		<td>
			<?php echo $result->is_triggers; ?>
		</td>

		<td>
			<?php echo $result->is_plans; ?>
		</td>

		<td>
			<?php echo $result->last_alcohol; ?>
		</td>

		<td>
			<?php echo $result->last_drugs; ?>
		</td>

		<td>
			<?php echo $result->pulse; ?>
		</td>

		<td>
			<?php echo $result->cr_timestamp; ?>
		</td>

		<td>
			<a  class ="edit_btn btn" href="<?php echo base_url('patient/cooccurring_edit/').'/'.$result->id  ?>" >Edit</a>	       
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
