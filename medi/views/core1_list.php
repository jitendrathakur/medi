<?php include('header.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		
		
	});
</script>



<div class="journal-entries well" >
	<a class="btn btn-success" href="<?php echo base_url('forms/core_journal_form') ?>" >Add Core Journal</a>
	<div style="" id="" >
		
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>
		<th>
			<?php $sort = ($order == 'ASC') ? 'DESC' : 'ASC'; ?>
			<a class ="" href="<?php echo base_url('forms/core1_list/').'/patient_id/'.$sort  ?>" >
				Patient
			</a>	
		</th>
		<th>coredate</th>
		<th>starttime</th>
		<th>endtime</th>
		<th>goal</th>
		<th>fif</th>
		<th>visit</th>
		<th>followup</th>	
		<th>	
			<?php $sort = ($order == 'ASC') ? 'DESC' : 'ASC'; ?>
			<a class ="" href="<?php echo base_url('forms/core1_list/').'/cr_timestamp/'.$sort  ?>" >
				Created
			</a>
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
			<?php if ($result->close) { ?>
				closed
			<?php } else { ?>
			  <a  class ="edit_btn" href="<?php echo base_url('forms/core_journal_form_edit/').'/'.$result->id  ?>" >Edit</a>
			<?php } ?>
			
			<!-- Button trigger modal -->			
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#comment_<?php echo $result->id; ?>">
			  
			  Comments
			</button>
			
			<!-- Modal -->
			<div class="modal fade" id="comment_<?php echo $result->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
				 <div class="modal-header">
				   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				   <h4 class="modal-title" id="myModalLabel">Comments</h4>
				 </div>
				 <div class="modal-body">
				   
					<ul>
						<?php
							if(!empty($result->comments)){
								foreach($result->comments as $comment){ ?>
									<li> <?php echo $comment->created; ?>  | <?php echo $comment->comment; ?> </li>	
								<?php }
							}else{
								echo "No Comments";
							}
						?>
					</ul>
			
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