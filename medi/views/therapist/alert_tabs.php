<?php
$temp = explode("_", $uri);
?>
<h3>Notifications</h3>
<ul class="nav-tabs nav" id="alert_therapist" data-url="<?php echo $temp[0]; ?>">
  <li <? if (strpos($uri, "wellness") !== false) { ?> class="active" <? } ?> ><a href="<?php echo base_url('therapist/wellness_list/') ?>">Wellness</a></li>
  <li <? if (strpos($uri, "forensic") !== false) { ?> class="active" <? } ?> ><a href="<?php echo base_url('therapist/forensic_list/') ?>">Forensic</a></li>
  <li <? if (strpos($uri, "cooccurring") !== false) { ?> class="active" <? } ?> ><a href="<?php echo base_url('therapist/cooccurring_list/') ?>">Cooccuring</a></li>
  <li <? if (strpos($uri, "physicalhealth") !== false) { ?> class="active" <? } ?> ><a href="<?php echo base_url('therapist/physicalhealth_list/') ?>">Physical Health</a></li>
  <li <? if (strpos($uri, "recoveryvitals") !== false) { ?> class="active" <? } ?> ><a href="<?php echo base_url('therapist/recoveryvitals_list/') ?>">Recovery vitals</a></li>
  <li <? if (strpos($uri, "tmed") !== false) { ?> class="active" <? } ?> ><a href="<?php echo base_url('therapist/tmed_list/') ?>">Tmed</a></li>	  
</ul>