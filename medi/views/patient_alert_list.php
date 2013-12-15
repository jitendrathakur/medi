<?php include('header.php'); ?>

<div id="alert_list" class="journal-entries well" >	

    <h3>Core 1 Journal</h3>
	<div>
		
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>
		<th>Therapist</th>		
		<th>coredate</th>		
		<th>starttime</th>
		<th>endtime</th>		
		<th>goal</th>		
		<th>fif</th>		
		<th>visit</th>		
		<th>followup</th>	
		<th>Action</th>
	</tr>
	</hr>

	<?php if(!empty($results['core1'])){ ?>
	<?php foreach($results['core1'] as $result ){ ?>
	<tr>
		<td><?php echo $result->firstname. ' '.$result->lastname; ?></td>
		<td><?php echo $result->coredate ; ?></td>
		<td><?php echo $result->starttime ; ?></td>
		<td><?php echo $result->endtime ; ?></td>
		<td><?php echo $result->goal ; ?></td>
		<td><?php echo $result->fif ; ?></td>
		<td><?php echo $result->visit ; ?></td>
		<td><?php echo $result->followup ; ?></td>
		<td><a  class ="btn btn-sm btn-primary reply" data-toggle="modal" data-target="#myModal" href="javascript:;" url="<?php echo base_url('patient/core1_reply/').'/'.$result->id  ?>" >Reply</a></td>		
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


<div class="journal-entries well" >		

    <h3>Core 2 Journal</h3>
	<div>
		
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>
		<th>Therapist</th>		
		<th>coredate</th>		
		<th>renewal</th>
		<th>plan</th>		
		<th>goal</th>		
		<th>step1</th>		
		<th>step2</th>		
		<th>step3</th>			
		<th>target</th>
		<th>Action</th>		
	</tr>
	</hr>

	<?php if(!empty($results['core2'])){ ?>
	<?php foreach($results['core2'] as $result ){ ?>
	<tr>
		<td><?php echo $result->firstname. ' '.$result->lastname; ?></td>
		<td><?php echo $result->coredate ; ?></td>
		<td><?php echo $result->renewal ; ?></td>
		<td><?php echo $result->plan ; ?></td>
		<td><?php echo $result->goal ; ?></td>
		<td><?php echo $result->step1 ; ?></td>
		<td><?php echo $result->step2 ; ?></td>
		<td><?php echo $result->step3 ; ?></td>
		<td><?php echo $result->target ; ?></td>
		<td><a class ="btn btn-sm btn-primary reply" data-toggle="modal" data-target="#myModal" href="javascript:;" url="<?php echo base_url('patient/core2_reply/').'/'.$result->id  ?>" >Reply</a></td>
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

<div class="journal-entries well" >		

<h3>Core 3 Journal</h3>
	<div>
		
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>
		<th>Therapist</th>		
		<th>zip</th>		
		<th>identify</th>
		<th>is_present</th>		
		<th>is_service</th>		
		<th>pulse</th>		
		<th>relatiopnship</th>		
		<th>supporter</th>			
		<th>visits</th>
		<th>medicine</th>
		<th>concentration</th>
		<th>pulse2</th>
		<th>Action</th>		
	</tr>
	</hr>

	<?php if(!empty($results['core3'])){ ?>
	<?php foreach($results['core3'] as $result ){ ?>
	<tr>
		<td><?php echo $result->firstname. ' '.$result->lastname; ?></td>
		<td><?php echo $result->zip ; ?></td>
		<td><?php echo $result->identify ; ?></td>
		<td><?php echo $result->is_present ; ?></td>
		<td><?php echo $result->is_service ; ?></td>
		<td><?php echo $result->pulse ; ?></td>
		<td><?php echo $result->relatiopnship ; ?></td>
		<td><?php echo $result->supporter ; ?></td>
		<td><?php echo $result->visits ; ?></td>
		<td><?php echo $result->medicine ; ?></td>
		<td><?php echo $result->concentration ; ?></td>
		<td><?php echo $result->pulse2 ; ?></td>
		<td><a  class ="btn btn-sm btn-primary reply" data-toggle="modal" data-target="#myModal" href="javascript:;" url="<?php echo base_url('patient/core2_reply/').'/'.$result->id  ?>" >Reply</a></td>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Make reply</h4>
      </div>
      <div class="modal-body">

     	<form id="comment" method="post" action="">
        <?php
      	$data	= array('name'=>'comment', 'id' => 'journal_comment', 'class' => 'form-control', 'rows' => '3');
		echo form_textarea($data);
		?>

		</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="submit_reply" type="button" class="btn btn-primary">Submit</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include('footer.php');