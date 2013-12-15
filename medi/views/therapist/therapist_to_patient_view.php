<script type="text/javascript">
	$(document).ready(function(){
		
		var validator = $("#filter_form").validate({
			rules: {
				startdate: {
					required: true,
				}
			},
			messages: {
				   
				startdate: {
					required: "Required"
				}
			},
			// the errorPlacement has to take the table layout into account
			errorPlacement: function(error, element) {
				   if ( element.is(":radio") )
						 error.appendTo( element.parent().next().next() );
				   else if ( element.is(":checkbox") )
						 error.appendTo ( element.next() );
				   else
						 error.appendTo( element.parent() );
			},
			// set this class to error-labels to indicate valid fields
			success: function(label) {
				   // set &nbsp; as text for IE
				   label.html("&nbsp;").addClass("checked");
			}
		});
		//=============================================
			
		$( "#startdate" ).datepicker(
			{
				dateFormat: "yy-mm-dd"
			}
		);
		
		//$('#modal').modal('show');
		
		
	});
</script>

<div class="journal-entries well" >	

	
	
	
	<?php //include('alert_tabs.php'); ?>
	<div >
		<form id="filter_form" name="filter_form" action="" method="post" >
			<input type="text" id="startdate" name="startdate"  value="<?php echo $start_date; ?>" />
			<input type="submit" id="" name="" value="Show"  class="btn btn-primary"/>
		</form>
	</div>
	
	
	<!--<div id="modal"> Vikas </div>-->
	
	<!-- Button trigger modal -->
<!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!--<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Show Details</h4>
      </div>-->
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
	<div style="clear: both;"></div>
	
	<h1> Core1 List </h1>
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>		
		<th> patient_id </th>

		<th>	coredate	 </th>

		<th>	starttime </th>
		
		<th> endtime </th>
		
		<th> goal </th>

		<th> fif </th>
		
		<th> visit </th>
		
		<th> followup </th>
		
		<th>	cr_timestamp </th>
	</tr>
	</hr>
	
	
	<?php if(!empty($core1)){ ?>
		
		<?php foreach($core1 as $cor1){ ?>
			<tr>
				<td>
					<div class="dropdown">
						<button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
							<?php echo $cor1->firstname.' '.$cor1->lastname; ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							
							
							<li role="presentation">
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/wellness_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Wellness
								</a>
								
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/forensic_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/forensic_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Forensic
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/cooccurring_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/cooccurring_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Cooccuring
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/physicalhealth_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/physicalhealth_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Physical Health
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/recoveryvitals_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/recoveryvitals_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Recovery vitals
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/tmed_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/tmed_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Tmed
								</a>
							</li>
							
						</ul>
					</div>
					
				</td>
				<td> <?php echo $cor1->coredate; ?> </td>
				<td> <?php echo $cor1->starttime; ?> </td>
				<td> <?php echo $cor1->endtime; ?> </td>
				<td> <?php echo $cor1->goal; ?> </td>
				<td> <?php echo $cor1->fif; ?> </td>
				<td> <?php echo $cor1->visit; ?> </td>
				<td> <?php echo $cor1->followup; ?> </td>
				<td> <?php echo $cor1->cr_timestamp; ?> </td>
			</tr>
		<?php } ?>
	<?php } ?>
	</table>


<div style="clear: both;"></div>
	
	<h1> Core2 List </h1>
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>		
		<th> patient_id </th>

		<th>	coredate	 </th>

		<th>	renewal </th>
		
		<th> plan </th>
		
		<th> goal </th>

		<th> step1 </th>
		
		<th> step2 </th>
		
		<th> step3 </th>
		
		<th> target </th>
		
		<th>	cr_timestamp </th>
	</tr>
	</hr>
	
	<?php if(!empty($core2)){ ?>
		
		<?php foreach($core2 as $cor2){ ?>
			<tr>
				<td>
					<?php //echo $cor2->firstname.' '.$cor2->lastname; ?>
					
					<div class="dropdown">
						<button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
							<?php echo $cor1->firstname.' '.$cor1->lastname; ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							
							
							<li role="presentation">
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/wellness_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Wellness
								</a>
								
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/forensic_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/forensic_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Forensic
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/cooccurring_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/cooccurring_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Cooccuring
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/physicalhealth_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/physicalhealth_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Physical Health
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/recoveryvitals_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/recoveryvitals_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Recovery vitals
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/tmed_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/tmed_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Tmed
								</a>
							</li>
							
						</ul>
					</div>
				
				
				</td>
				<td> <?php echo $cor2->coredate; ?> </td>
				<td> <?php echo $cor2->renewal; ?> </td>
				<td> <?php echo $cor2->plan; ?> </td>
				<td> <?php echo $cor2->goal; ?> </td>
				<td> <?php echo $cor2->step1; ?> </td>
				<td> <?php echo $cor2->step2; ?> </td>
				<td> <?php echo $cor2->step3; ?> </td>
				<td> <?php echo $cor2->target; ?> </td>
				<td> <?php echo $cor2->cr_timestamp; ?> </td>
			</tr>
		<?php } ?>
	<?php } ?>
	</table>
	
	
	
	<div style="clear: both;"></div>
	
	<h1> Core3 List </h1>
	<table class='table table-bordered table-condensed table-hover table-striped'>
	<tr>		
		<th> patient_id </th>
		<th>	zip	 </th>
		<th>	identify </th>
		<th> is_present </th>
		<th> is_service </th>
		<th> pulse </th>
		<th> relatiopnship </th>
		<th> supporter </th>
		<th>	visits </th>
		<th>	medicine </th>
		<th>	concentration </th>
		<th>	pulse2 </th>
		<th>	cr_timestamp </th>
	</tr>
	</hr>
	
	<?php if(!empty($core3)){ ?>
		
		<?php foreach($core3 as $cor3){ ?>
			<tr>
				<td> <?php //echo $cor3->firstname.' '.$cor3->lastname; ?>
				
				<div class="dropdown">
						<button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
							<?php echo $cor1->firstname.' '.$cor1->lastname; ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							
							
							<li role="presentation">
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/wellness_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Wellness
								</a>
								
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/forensic_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/forensic_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Forensic
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/cooccurring_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/cooccurring_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Cooccuring
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/physicalhealth_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/physicalhealth_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Physical Health
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/recoveryvitals_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/recoveryvitals_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Recovery vitals
								</a>
							</li>
							<li role="presentation">
								<!--<a role="menuitem" tabindex="-1" href="<?php //echo base_url('therapist/tmed_list/').'/id/'.$sort.'/'.$start_date;  ?>">-->
								<a role="menuitem" data-toggle="modal" href="<?php echo base_url('therapist/tmed_list/').'/id/'.$sort.'/'.$start_date.'/'.$cor1->patient_id.'/1';  ?>" data-target="#myModal">
									Tmed
								</a>
							</li>
							
						</ul>
					</div>
				</td>
				<td> <?php echo $cor3->zip; ?> </td>
				<td> <?php echo $cor3->identify; ?> </td>
				<td> <?php echo $cor3->is_present; ?> </td>
				<td> <?php echo $cor3->is_service; ?> </td>
				<td> <?php echo $cor3->pulse; ?> </td>
				<td> <?php echo $cor3->relatiopnship; ?> </td>
				<td> <?php echo $cor3->supporter; ?> </td>
				<td> <?php echo $cor3->visits; ?> </td>
				<td> <?php echo $cor3->medicine; ?> </td>
				<td> <?php echo $cor3->concentration; ?> </td>
				<td> <?php echo $cor3->pulse2; ?> </td>
				<td> <?php echo $cor3->cr_timestamp; ?> </td>
			</tr>
		<?php } ?>
	<?php } ?>
	</table>
</div>
</div>
