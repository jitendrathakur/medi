<ul class="breadcrumb" style="margin-bottom: 5px;">
  <li><a href="<?php echo base_url('supert/') ?>">Home</a></li>
  <li class=""><a href="<?php echo base_url('supert/details/').'/'.$user_id; ?>">Detail</a></li> 
  <li class="active"><a href="">Core journal 3 List</a></li> 
</ul>
<div class="bs-docs-section">

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">Therapist: <?php echo @$therapist->firstname. " ".@$therapist->lastname; ?></h1>
        <h3 id="tables">Core 3 Journal</h3>
      </div>

      <div class="bs-example table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr class="success">            
              <th>Id</th>
              <th>Patient</th>
              <th>Zip</th>
              <th>Identify</th>
              <th>Supporter</th>
              <th>Visits</th>
              <th>Medicins</th>
              <th>Concentration</th>
              <th>Pulse2</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach($results as $row) {
            ?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->firstname." ".$row->lastname; ?></td>
                <td><?php echo $row->zip; ?></td>
                <td><?php echo $row->identify; ?></td>
                <td><?php echo $row->supporter; ?></td>
                <td><?php echo $row->visits; ?></td>
                <td><?php echo $row->medicine; ?></td>
                <td><?php echo $row->concentration; ?></td>
                <td><?php echo $row->pulse2; ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="<?php echo base_url('supert/core_journal3_edit/')."/".$user_id."/".$row->id ?>" >Edit</a>
                    <?php if ($row->close) {
                      echo "closed";
                    } else {
                      ?>
                      <a class="btn btn-danger btn-sm" href="<?php echo base_url('supert/core_journal3_list/')."/".$user_id."/".$row->id."/closed" ?>" >Close</a></td>

                      <?php

                    }
                  ?>
               
                
              </tr>
            <?php
              }
            ?>
          
          </tbody>
        </table>

      </div>

    </div>

  </div>

</div>
