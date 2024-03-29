<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $page_title ?>
        <small><?php echo $page_description ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#"><i class="fa fa-circle-o"></i> About</a></li>
      <li class="active">Add</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php if(!empty($message))
    {
    ?> 
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Alert!</h4> 
      <?php echo $message; ?>
    </div>
    <?php } ?>
    <!-- /.alert -->
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tools</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>     
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-sm-6">
              <a class="btn btn-app" href="<?php echo site_url('admin/about'); ?>">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <a class="btn btn-app" href="<?php echo site_url('admin/about/add'); ?>">
                <i class="fa fa-rotate-left"></i> Undo
              </a>
            </div>
            <div class="col-sm-6">
                         
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-sm-12">
        <?php echo form_open_multipart('admin/about/add'); ?>
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Form</h3>
          </div>     
          <!-- /.box-header -->
          <div class="box-body">
          
            <div class="form-horizontal">

              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Image</label>
                <div class="col-sm-8">
                  <input type="file" name="image" />
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Title Image</label>
                <div class="col-sm-8">
                  <!-- <input name="first_name" class="form-control" id="input-first-name" placeholder="First Name" type="text"> -->
                  <?php echo form_input($form['title_image']);?>
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Sub Title Image</label>
                <div class="col-sm-8">
                  <!-- <input name="first_name" class="form-control" id="input-first-name" placeholder="First Name" type="text"> -->
                  <?php echo form_input($form['sub_title_image']);?>
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-8">
                  <!-- <input name="first_name" class="form-control" id="input-first-name" placeholder="First Name" type="text"> -->
                  <?php echo form_input($form['company_name']);?>
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>

              <!-- /.form-group -->
              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-8">
                  <?php echo form_textarea($form['ket']);?>
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>
              <!-- /.form-group -->


            </div>
            <!-- /.form-horizontal -->
  
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
              <button type="submit" class="btn btn-info">Save</button>
            </div>
            
            <div class="col-sm-1">
            </div> 
           </div>
        </div>
        <!-- /.box -->
        <?php echo form_close(); ?>
      </div>
      <!-- /.col-sm-12 -->

    </div>
    <!-- /.row -->
  <?php
  echo print_r($template_data['uri_segment']);
  echo '<br/>';
  echo $template_data['module'];
  echo '<br/>';
  echo $template_data['controller'];
  echo '<br/>';
  echo $template_data['method'];
  echo '<br/>';
  echo $template_data['directory'];
  ?>
    <!--------------------------
      | Your Page Content Here |
      -------------------------->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->