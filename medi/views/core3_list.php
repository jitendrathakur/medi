<?php include('header.php'); ?>

<div class="journal-entries well" >	
	<a class="btn btn-success" href="<?php echo base_url('forms/core_journal_form3') ?>" >Add Core Journal</a>	

	<div style="" id="" >
		
	<table class="table table-bordered table-condensed table-hover table-striped">
	<tr>

		<th>	
		<?php
		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';

		?>
		 <a class ="" href="<?php echo base_url('forms/core3_list/').'/patient_id/'.$sort  ?>" >Patient</a>	
			
		</th>

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

		<th>	
		<?php		
        $sort = ($order == 'ASC') ? 'DESC' : 'ASC';
		?>
		<a class ="" href="<?php echo base_url('forms/core3_list/').'/cr_timestamp/'.$sort  ?>" >Created</a>
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
				<?php echo $result->cr_timestamp; ?>
		</td>


		<td>

		<?php if ($result->close) {
            echo "closed";
            } else {
              ?>
              <a  class ="" href="<?php echo base_url('forms/core_journal_form3_edit/').'/'.$result->id  ?>" ><i class='glyphicon glyphicon-edit'></i></a>             
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