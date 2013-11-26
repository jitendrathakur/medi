<ul class="breadcrumb" style="margin-bottom: 5px;">
  <li><a href="<?php echo base_url('supert/') ?>">Home</a></li>
  <li class="active"><a href="<?php echo base_url('supert/details/').'/'.$user_id; ?>">Detail</a></li> 
</ul>
<div class="bs-docs-section">

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">Therapist: <?php echo @$therapist->firstname. " ".@$therapist->lastname; ?></h1>
        <h3 id="tables">Details</h3>
      </div>

      <div class="bs-example table-responsive">

        <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
          <li class=""><a class='btn btn-primary' href="<?php echo base_url('supert/core_journal1_list/').'/'.$user_id; ?>">Core Journal 1</a></li>
          <li class="primary"><a class='btn btn-warning' href="<?php echo base_url('supert/core_journal2_list/').'/'.$user_id; ?>">Core Journal 2</a></li>
          <li class="success"><a class='btn btn-info' href="<?php echo base_url('supert/core_journal3_list/').'/'.$user_id; ?>">Core Journal 3</a></li>
                 
        </ul>        

      </div>

    </div>

  </div>

</div>
