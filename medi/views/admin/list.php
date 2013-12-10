<div class="bs-docs-section">
  <div class="row">
    <div class="col-lg-12">
      <a href="<?php echo base_url('admin/add/') ?>" class="btn btn-success pull-right" > Add New User</a>
      <div class="page-header">
          <h1 id="tables">List of User</h1>
      </div>

      <div class="bs-example table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr class="success">            
              <th>Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Role</th>
              <th>Username</th>
              <th>Email</th>
              <th>Mobile</th>
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
                <td><?php echo ($row->access == 'Normal') ? 'Patient' : $row->access; ?></td> 
                <td><?php echo $row->user; ?></td>   
                <td><?php echo $row->email; ?></td>                
                <td><?php echo $row->mobile; ?></td> 
                <td><a href="<?php echo base_url('admin/add/')."/".$row->id ?>" >Edit</a></td>            
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
