<ul class="breadcrumb" style="margin-bottom: 5px;">
  <li class="active">
    <a href='<?php //echo base_url('supert/details/')."/".$user_id."/".$row->id ?>'>Home</a></li> 
</ul>
<div class="bs-docs-section">

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
          <h1 id="tables">List of therapist</h1>
      </div>

      <div class="bs-example table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr class="success">            
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach($results as $row) {
            ?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->firstname; ?></td>
                <td><?php echo $row->lastname; ?></td> 
                <td><a href="<?php echo base_url('supert/details/')."/".$row->id ?>" >View</a></td>            
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
