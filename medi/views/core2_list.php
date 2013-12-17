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
	              <a  class ="" href="<?php echo base_url('forms/core_journal_form2_edit/').'/'.$result->id  ?>" ><i class='glyphicon glyphicon-edit'></i></a>
	             
	              <?php
	            }
            ?>	
		<!-- Button trigger modal -->			
			<a class="" data-toggle="modal" data-target="#comment_<?php echo $result->id; ?>">
			  <i class="glyphicon glyphicon-comment"></i>			  
			</a>			
			
			<!-- Modal -->
			<div class="modal fade" id="comment_<?php echo $result->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
				 <div class="modal-header">
				   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				   <h4 class="modal-title" id="myModalLabel">Comments</h4>
				 </div>
				 <div class="modal-body">
				   
					<?php
						if(!empty($result->comments)){
							foreach($result->comments as $comment){ ?>								
								<div class="alert alert-info">
									<p><?php echo $result->firstname. ' '.$result->lastname; ?> : <?php echo $comment->comment; ?></p>
									<small><?php echo $comment->created; ?></small>
								</div>																						
							<?php }
						}else{
							echo "No Comments";
						}
					?>					
			
				 </div>
				 <div class="modal-footer">
				   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				 </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			
			
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