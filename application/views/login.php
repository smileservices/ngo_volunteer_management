<?php require 'frontend/header.php'; ?>
<div class="col-md-6 col-md-offset-3"> 
  <div class="panel">
  <div class="panel-header">
    <h2 class="text-center">Login</h2>
  </div>
    <div class="panel-body">
     <?php echo validation_errors(); ?>
     <?php echo form_open('verifylogin'); ?>
      <div class="form-group">
       <label for="username">Username:</label>
       <input class="form-control" type="text" size="20" id="username" name="username"/>
      </div>
      <div class="form-group">
       <label for="password">Password:</label>
       <input class="form-control" type="password" size="20" id="password" name="password"/>
      </div>
       <button class="btn btn-raised" type="submit" value="Login"/>Login <span class="glyphicon glyphicon-log-in"> </span> </button>
     </form>
    </div>
  </div>
</div>
<?php require 'frontend/footer.php'; ?>
