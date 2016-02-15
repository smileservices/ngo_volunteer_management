<?php $this->load->view('frontend/header'); ?>
<div class="col-md-6 col-md-offset-3"> 
  <div class="panel">
      
    <div class="panel-body">
      <h1><?php echo lang('login_heading');?></h1>
      <p><?php echo lang('login_subheading');?></p>
      <div id="infoMessage"><?php echo $message;?></div>
      <?php echo form_open("auth/login");?>
        <div class="form-group">
       <label for="identity">Username:</label>
       <input class="form-control" type="text" size="20" id="identity" name="identity"/>
      </div>
      <div class="form-group">
       <label for="password">Password:</label>
       <input class="form-control" type="password" size="20" id="password" name="password"/>
      </div>
      <button class="btn btn-raised" type="submit" value="Login"/>Login <span class="glyphicon glyphicon-log-in"> </span> </button>
      <div class="checkbox">
        <label>
          <input id="remember" name="remember" type="checkbox"><span class="checkbox-material"></span> Pastreaza-ma logat
        </label>
      </div>
      
      <?php echo form_close();?>
      </div>
    <div class="panel-footer">
      <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
    </div>
  </div>
</div>
<?php $this->load->view('frontend/footer'); ?>