<div class="journal-entries well" >	

	<?php include('alert_tabs.php'); ?>

	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>

		<th>			
		Id	
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

		<td>
			<a  class ="edit_btn btn" href="<?php echo base_url('patient/wellness_edit/').'/'.$result->id  ?>" >Edit</a>	       
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
