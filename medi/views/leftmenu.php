<? if($this->auth->check_access('Normal'))
				 { ?>
<div class="side-menu-class span2" >
       				 <ul id="side-menu" >
         			   <li style="margin-top:2px; font-size:150%; background-color:#FFFFFF; color:#02306F; " >Daily Journals</li>
          			   <li <? if($uri == "wellness_form"){ ?> style="background-color:#000000;" <? } ?> ><a href="<?php echo base_url('forms/wellness_form') ?>" >Wellness Journal</a></li>
          			   <li  <? if($uri == "forensic_form"){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/forensic_form') ?>" >Forensic Journal</a></li>
          			   <li  <? if($uri == "cooccurring_form"){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/cooccurring_form') ?>" >Co-Occurring Journal</a></li>
          			   <li  <? if($uri == "recoveryvitals_form"){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/recoveryvitals_form') ?>" >Recovery Vitals Journal</a></li>
          			   <li  <? if($uri == "physicalhealth_form"){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/physicalhealth_form') ?>" >Physical Health Journal</a></li>
           			   <li <? if($uri == "tmed_form"){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/tmed_form') ?>" >T-MeD Journal</a></li>
           			   <li><a href="#" >WRAP/BRICCS</a></li>
           			   <li><a href="#" >Declaration of Empowerment "Live Pulse"</a></li>
       				</ul>
    			</div>
<? } ?>

<? if($this->auth->check_access('Therapists'))
				 { ?>
                 
                 <div class="side-menu-class" >
       				 <ul id="side-menu" >
         			   <li style="margin-top:2px; font-size:150%; background-color:#FFFFFF; color:#02306F; " >Daily Journals</li>
          			   <li <? if($uri == "core_journal_form" || $uri == "core1_list" ){ ?> style="background-color:#000000;" <? } ?> ><a href="<?php echo base_url('forms/core1_list') ?>" >Core Journal</a></li>
          			   <li  <? if($uri == "core_journal_form2"  || $uri == "core2_list" ){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/core2_list') ?>" >Core Journal II</a></li>
          			   <li  <? if($uri == "core_journal_form3" || $uri == "core3_list"){ ?> style="background-color:#000000;" <? } ?>><a href="<?php echo base_url('forms/core3_list') ?>" >Core Journal III</a></li>

       				</ul>
    			</div>
 <? } ?>
                
                
                
