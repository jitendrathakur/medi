<?php include('header.php'); ?>

<div class="journal-entries" >
		

	<div style="height:100%;margin-left:-90px;border:0px solid; " id="mainForm" >
		
	<table class="table table-striped table-bordered table-hover">
	<tr>

		<th>
		Zip	
		</th>
		
		<th>
		identify	
		</th>
		
		<th>
		pulse
		</th>

		<th>
		relationship
		</th>

		<th>
		supporter
		</th>
		
		<th>
		visits
		</th>
		
		<th>
		medicine		
		</th>
		
		<th>
		concentration
		</th>
		
		<th>
		pulse2
		</th>		
		
		<th>Action</th>

	</tr>
	</hr>

	<?php if(!empty($results)){ ?>
	<?php foreach($results as $result ){ ?>
	<tr>
		<td>
				<?php echo $result->zip; ?>
		</td>
		<td>
				<?php echo $result->identify ; ?>
		</td>

		<td>
				<?php echo $result->pulse ; ?>
		</td>

		<td>
				<?php echo $result->relatiopnship ; ?>
		</td>

		<td>
				<?php echo $result->supporter ; ?>
		</td>

		<td>
				<?php echo $result->visits ; ?>
		</td>

		<td>
				<?php echo $result->medicine ; ?>
		</td>

		<td>
				<?php echo $result->concentration ; ?>
		</td>

		<td>
				<?php echo $result->pulse2 ; ?>
		</td>


		<td>

		<?php if ($result->close) {
            echo "closed";
            } else {

              ?>
              <a  class ="edit_btn" href="<?php echo base_url('forms/core_journal_form3_edit/').'/'.$result->id  ?>" >Edit</a>
             
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

	<a href="<?php echo base_url('forms/core_journal_form3') ?>" >Add Core Journal</a>
	</div>
</div>

<?php include('footer.php');