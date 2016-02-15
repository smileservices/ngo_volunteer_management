<?php $this->load->view('frontend/header'); ?>
<div class="col-md-6 col-md-offset-3"> 
  <div class="panel">      
    <div class="panel-body">

<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <div class="form-group">
       <label for="identity">Email:</label>
       <input class="form-control" type="text" size="20" id="identity" name="identity"/>
      </div>
      <button class="btn btn-raised" name="submit" type="submit" value="Submit"/>Login <span class="glyphicon glyphicon-log-in"> </span> </button>

<?php echo form_close();?>

    </div>      
  </div>
</div>
<?php $this->load->view('frontend/footer'); ?>
