<?php include('header.php'); ?>

<div class="journal-entries well" >		

	<div style="" id="" >
		
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>

		<th>	
		<?php
		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';

		?>
		 <a class ="" href="<?php echo base_url('forms/core1_list/').'/patient_id/'.$sort  ?>" >Patient</a>	
			
		</th>
		
		<th>
		coredate	
		</th>
		
		<th>
		starttime
		</th>

		<th>
		endtime
		</th>
		
		<th>
		goal
		</th>
		
		<th>
		fif
		</th>
		
		<th>
		visit
		</th>
		
		<th>
		followup
		</th>	

		<th>	
		<?php		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';
		?>
		<a class ="" href="<?php echo base_url('forms/core1_list/').'/cr_timestamp/'.$sort  ?>" >Created</a>
		</th>

		<th>Action</th>

	</tr>
	</hr>

	<?php if(!empty($results)){ ?>
	<?php foreach($results as $result ){ ?>
	<tr>
		<td>
				<?php echo $result->firstname. ' '.$result->lastname; ?>
		</td>
		<td>
				<?php echo $result->coredate ; ?>
		</td>

<td>
				<?php echo $result->starttime ; ?>
		</td>

		<td>
				<?php echo $result->endtime ; ?>
		</td>

		<td>
				<?php echo $result->goal ; ?>
		</td>

		<td>
				<?php echo $result->fif ; ?>
		</td>

		<td>
				<?php echo $result->visit ; ?>
		</td>

		<td>
				<?php echo $result->followup ; ?>
		</td>

		<td>
				<?php echo $result->cr_timestamp ; ?>
		</td>
		
		<td>
			<?php if ($result->close) {
                echo "closed";
	            } else {

	              ?>
	              <a  class ="edit_btn" href="<?php echo base_url('forms/core_journal_form_edit/').'/'.$result->id  ?>" >Edit</a>
	             
	              <?php

	            }
            ?>
			
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

<a href="<?php echo base_url('forms/core_journal_form') ?>" >Add Core Journal</a>
</div>
</div>






<?php include('footer.php');