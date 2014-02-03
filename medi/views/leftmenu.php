<? if($this->auth->check_access('Normal'))
				 { ?>  

	<div class="col-md-2" >
	  	<ul id="side-menu" >		
			<li <? if (strpos($uri, "wellness") !== false) { ?> style="background-color:#000000;" <? } ?> ><a href="<?php echo base_url('forms/wellness_form') ?>" >Wellness Journal</a></li>
			<li  <? if (strpos($uri, "forensic") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/forensic_form') ?>" >Forensic Journal</a></li>
		    <li  <? if (strpos($uri, "cooccurring") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/cooccurring_form') ?>" >Co-Occurring Journal</a></li>
		    <li  <? if (strpos($uri, "recoveryvitals") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/recoveryvitals_form') ?>" >Recovery Vitals Journal</a></li>
		    <li  <? if (strpos($uri, "physicalhealth") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/physicalhealth_form') ?>" >Physical Health Journal</a></li>
			<li <? if (strpos($uri, "tmed") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/tmed_form') ?>" >T-MeD Journal</a></li>
			<li <? if (strpos($uri, "wrap") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/wrap_form') ?>" >Wrap</a></li>
	  	</ul>
 	</div>
<? } ?>

<? if($this->auth->check_access('Therapists')) { ?>
                 
  <div class="col-md-2" >
  	<ul id="side-menu" >		
		<li <? if( $uri == "therapist_to_patient_view" ){ ?> style="background-color:#000000;" <? } ?> >
			<a href="<?php echo base_url('therapist/wellness_list') ?>" >
				Daily Journals
			</a>
		</li>		
		<li <? if($uri == "core_journal_form" || $uri == "core1_list" ){ ?> style="background-color:#000000;" <? } ?> >
			<a href="<?php echo base_url('forms/core1_list') ?>" >
				Core Journal
			</a>
		</li>
		<li  <? if($uri == "core_journal_form2"  || $uri == "core2_list" ){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/core2_list') ?>" >Core Journal II</a></li>
		<li  <? if($uri == "core_journal_form3" || $uri == "core3_list"){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/core3_list') ?>" >Core Journal III</a></li>

  	</ul>
  </div>
 <? } ?>
     