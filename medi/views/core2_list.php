<?php include('header.php'); ?>

<div class="journal-entries well" >	
	<a class='btn btn-success' href="<?php echo base_url('forms/core_journal_form2') ?>" >Add Core Journal</a>	

	<div style="" id="" >
		
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>

		<th>	
		<?php
		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';

		?>
		 <a class ="" href="<?php echo base_url('forms/core2_list/').'/patient_id/'.$sort  ?>" >Patient</a>	
			
		</th>
		
		<th>
		coredate	
		</th>
		
		<th>
		renewal
		</th>

		<th>
		plan
		</th>

		<th>
		goal
		</th>
		
		<th>
		step1
		</th>
		
		<th>
		step2		
		</th>
		
		<th>
		step3
		</th>

		<th>
		target
		</th>	

		<th>	
		<?php		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';
		?>
		<a class ="" href="<?php echo base_url('forms/core2_list/').'/cr_timestamp/'.$sort  ?>" >Created</a>
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
				<?php echo $result->renewal ; ?>
		</td>

		<td>
				<?php echo $result->plan ; ?>
		</td>

		<td>
				<?php echo $result->goal ; ?>
		</td>

		<td>
				<?php echo $result->step1 ; ?>
		</td>

		<td>
				<?php echo $result->step2 ; ?>
		</td>

		<td>
				<?php echo $result->step3 ; ?>
		</td>		

		<td>
				<?php echo $result->target ; ?>
		</td>
		<td>
				<?php echo $result->cr_timestamp ; ?>
		</td>
		<td>
			
			<?php if ($result->close) {
                echo "closed";
	            } else {

	              ?>
	              <a  class ="edit_btn" href="<?php echo base_url('forms/core_journal_form2_edit/').'/'.$result->id  ?>" >Edit</a>
	             
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


</div>
</div>






<?php include('footer.php');