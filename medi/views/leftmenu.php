<? if($this->auth->check_access('Normal'))
				 { ?>
  <div class="bs-sidebar hidden-print affix col-md-2 well" >
	  <ul class="nav bs-sidenav" >
	    <li style="background-color:#FFFFFF; color:#02306F; " >Daily Journals</li>
	    <li <? if (strpos($uri, "wellness") !== false) { ?> style="background-color:#000000;" <? } ?> ><a href="<?php echo base_url('patient/wellness_list') ?>" >Wellness Journal</a></li>
	    <li  <? if (strpos($uri, "forensic") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('patient/forensic_list') ?>" >Forensic Journal</a></li>
	    <li  <? if (strpos($uri, "cooccurring") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('patient/cooccurring_list') ?>" >Co-Occurring Journal</a></li>
	    <li  <? if (strpos($uri, "recoveryvitals") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('patient/recoveryvitals_list') ?>" >Recovery Vitals Journal</a></li>
	    <li  <? if (strpos($uri, "physicalhealth") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('patient/physicalhealth_list') ?>" >Physical Health Journal</a></li>
		  <li <? if (strpos($uri, "tmed") !== false) { ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('patient/tmed_list') ?>" >T-MeD Journal</a></li>
		  <!--<li><a href="#" >WRAP/BRICCS</a></li>
		  <li><a href="#" >Declaration of Empowerment "Live Pulse"</a></li>-->
	  </ul>
	</div>
<? } ?>

<? if($this->auth->check_access('Therapists')) { ?>
                 
  <div class="col-md-2" >
  	<ul id="side-menu" >
		<!--<li style="margin-top:2px; font-size:150%; background-color:#FFFFFF; color:#02306F; " >
			<a href="<?php //echo base_url('therapist/therapist_to_patient_view') ?>" >
				Daily Journals
			</a>
		</li>-->
		<li <? if( $uri == "therapist_to_patient_view" ){ ?> style="background-color:#000000;" <? } ?> >
			<a href="<?php echo base_url('therapist/therapist_to_patient_view') ?>" >
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
     