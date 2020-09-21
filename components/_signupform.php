<form action="signup.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" autocomplete="off" name="username" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" autocomplete="off" name="password">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" autocomplete="off" name="cpassword">
    <small id="emailHelp" class="form-text text-muted"><i>Make sure to type the same password.</i></small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>