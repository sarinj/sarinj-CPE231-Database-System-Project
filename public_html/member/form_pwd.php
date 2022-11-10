<form action="emp_pwd_db.php" method="POST"   name="add" class="form-horizontal" id="add">
  <div class="form-group">
    <div class="col-sm-2" align="right"></div>
    <div class="col-sm-5" align="left"> <h3><i class="fas fa-cog"></i> Edit Password  </h3> </div>
  </div>
  <div class="form-group has-warning">
    <div class="col-sm-2" align="right"> </div>
    <div class="col-sm-5" align="left">
      <b> Current Password </b>
      <input  name="emp_password1" type="password" required class="form-control"  placeholder="" pattern="^[a-zA-Z0-9]+$" title="Only English or Number" minlength="1" id="inputWarning" />
    </div>
  </div>
  <div class="form-group has-success">
    <div class="col-sm-2" align="right"> </div>
    <div class="col-sm-5" align="left">
      <b> New Password </b>
      <input  name="emp_password2" type="password" required class="form-control"  placeholder="" pattern="^[a-zA-Z0-9]+$" title="Only English or Number" minlength="2" id="inputSuccess"/>
    </div>
  </div>
  <div class="form-group has-success">
    <div class="col-sm-2" align="right"> </div>
    <div class="col-sm-5" align="left">
      <b> Confirm New Password </b>
      <input  name="emp_password3" type="password" required class="form-control"  placeholder="" pattern="^[a-zA-Z0-9]+$" title="Only English or Number" minlength="2" id="inputSuccess"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2"> </div>
    <div class="col-sm-5">
      <input type="hidden" name="emp_id" value="<?php echo $mid;?>">
      <button type="submit" class="btn btn-primary" id="btn"> Save
      </button>
    </div>
    
  </div>
</form>