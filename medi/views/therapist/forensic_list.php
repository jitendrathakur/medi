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
		 <a class ="" href="<?php echo base_url('therapist/forensic_list/').'/'.$page.'/user_id/'.$sort  ?>" >Patient</a>				
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
		<?php		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';
		?>
		<a class ="" href="<?php echo base_url('therapist/forensic_list/').'/'.$page.'/cr_timestamp/'.$sort  ?>" >Created</a>
		</th>		

	</tr>
	</hr>

	<?php if(!empty($results)){ ?>
	<?php foreach($results as $result ){ ?>
	<?php $class = (date('Y-m-d', strtotime($result->cr_timestamp)) == date('Y-m-d')) ? 'success' : ''; ?>
	<tr class="<?php echo $class; ?>">	
		<td>
			<?php echo $result->id; ?>
		</td>
		<td>
			<?php echo $result->firstname.' '.$result->lastname; ?>
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
