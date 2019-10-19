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
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
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
              <a class="btn btn-app" href="<?php echo site_url('admin/contact_us'); ?>">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <a class="btn btn-app" href="<?php echo site_url('admin/contact_us/reply/'.$dt_users->id); ?>">
                <i class="fa fa-rotate-left"></i> Reply
              </a>              
            </div>
            <div class="col-sm-6">
              <a class="btn btn-app pull-right bg-maroon" href="<?php echo site_url('admin/contact_us/delete/'.$dt_users->id); ?>">
                <i class="fa fa-download"></i> Delete
              </a>
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
        
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Details</h3>
          </div>     
          <!-- /.box-header -->
          <div class="box-body">
          
            <div class="form-horizontal">
              <div class="form-group hidden">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Id</label>
                <div class="col-sm-8">
                  <input name="id" class="form-control" id="input-id" placeholder="ID" type="text" value="<?php echo $dt_users->id; ?>">
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Nama Depan</label>
                <div class="col-sm-8">
                  <input name="fname" class="form-control" id="input-username" placeholder="Nama Depan" type="text" value="<?php echo $dt_users->fname; ?>">
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Nama Belakang</label>
                <div class="col-sm-8">
                  <input name="lname" class="form-control" id="input-username" placeholder="Nama Belakang" type="text" value="<?php echo $dt_users->lname; ?>">
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-8">
                  <input name="email" class="form-control" id="input-username" placeholder="E-mail" type="email" value="<?php echo $dt_users->email; ?>">
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Subyek</label>
                <div class="col-sm-8">
                  <input name="subject" class="form-control" id="input-username" placeholder="subject" type="text" value="<?php echo $dt_users->subject; ?>">
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <div class="col-sm-1">
                  
                </div>
                <label class="col-sm-2 control-label">Pesan</label>
                <div class="col-sm-8">
                  <textarea name="pesan" class="form-control" id="input-email" placeholder="Pesan" type="text" value="<?php echo $dt_users->pesan; ?>"><?php echo $dt_users->pesan; ?></textarea>
                </div>
                <div class="col-sm-1">
                  
                </div>
              </div>
            </div>
            <!-- /.form-horizontal -->
  
          </div>
          <!-- /.box-body -->
          
        </div>
        <!-- /.box -->
       
      </div>
      <!-- /.col-sm-12 -->

    </div>
    <!-- /.row -->
    
    <?php if (!empty($reply) || ($reply == 'replymsg')) { ?>
          <!-- /.row -->
      <div class="row">
        <div class="col-sm-12">
        <?php echo form_open('admin/contact_us/updatereply'); ?>          
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Reply Message</h3>
            </div>     
            <!-- /.box-header -->
            <div class="box-body">
            
              <div class="form-horizontal">
                <div class="form-group hidden">
                  <div class="col-sm-1">
                    
                  </div>
                  <label class="col-sm-2 control-label">Id</label>
                  <div class="col-sm-8">
                    <input name="id" class="form-control" id="input-id" placeholder="ID" type="text" value="<?php echo $dt_users->id; ?>">
                  </div>
                  <div class="col-sm-1">
                    
                  </div>
                </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
                <div class="form-group">
                  <div class="col-sm-1">
                    
                  </div>
                  <label class="col-sm-2 control-label">Pesan</label>
                  <div class="col-sm-8">
                    <textarea name="pesanreply" class="form-control" id="input-email" placeholder="Pesan" type="text"></textarea>
                  </div>
                  <div class="col-sm-1">
                    
                  </div>
                </div>
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
              <button type="submit" class="btn btn-info">Reply</button>

            </div>
            
            <div class="col-sm-1">
            </div> 
           </div>
            
          </div>
          <!-- /.box -->
         
        </div>
        <!-- /.col-sm-12 -->
        <?php echo form_close(); ?>
      </div>
      <!-- /.row --> 
    <?php } ?>   
  
    <!--------------------------
      | Your Page Content Here |
      -------------------------->
    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->