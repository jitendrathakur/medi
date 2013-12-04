<ul class="breadcrumb" style="margin-bottom: 5px;">
  <!--<li class="active"><a href='<?php echo base_url('supert/details/')."/".$user_id."/".$row->id ?>'>Home</a></li> -->
</ul>
<div class="bs-docs-section">

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">Therapist Patient Management</h1>
        <a href="<?php echo base_url('supert/patient_therapist_create') ?>" class="btn btn-info" > Assign Patient </a>
      </div>

      <div class="bs-example table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr class="success">            
              <th>Id</th>
              <th>Therapist</th>
              <th>Patient</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
               <?php if(!empty($results)){ ?>
                    <?php foreach($results as $row) { ?>
                    <tr>
                          <td><?php echo $row->id; ?></td>
                          <td><?php echo $row->therapist_name; ?></td>
                          <td><?php echo $row->patient_name; ?></td> 
                          <td>
                               
                               <a href="<?php echo base_url('supert/patient_therapist_edit/')."/".$row->id ?>" >
                                    Edit
                               </a>
                               |
                               <a href="<?php echo base_url('supert/patient_therapist_remove/')."/".$row->id ?>" >
                                    X
                               </a>
                               
                          </td>            
                    </tr>
                    <?php } ?>
               <?php }else{ ?>
                    <tr>
                          <td colspan="4" align="center">No Result Found</td>
                    </tr>
               <?php } ?>
          </tbody>
        </table>

      </div>

    </div>

  </div>

</div>
