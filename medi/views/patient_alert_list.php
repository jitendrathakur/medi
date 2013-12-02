<?php include('header.php'); ?>

<div id="alert_list" class="journal-entries" >	

    <h3>Core 1 Journal</h3>
	<div style="height:100%;margin-left:-90px;border:0px solid; " id="mainForm" >
		
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


<div class="journal-entries" >		

    <h3>Core 2 Journal</h3>
	<div style="height:100%;margin-left:-90px;border:0px solid; " id="mainForm" >
		
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

<div class="journal-entries" >		

<h3>Core 3 Journal</h3>
	<div style="height:100%;margin-left:-90px;border:0px solid; " id="mainForm" >
		
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