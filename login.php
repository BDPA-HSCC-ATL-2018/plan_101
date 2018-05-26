<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/plan_101_header.php';
  include_once $_SERVER['DOCUMENT_ROOr'] . '/web-assets/tpl/plan_101_nav.php';
?>
<div class="jumbotron">
<div class="card text-center text-white bg-primary w-60">
  <div class="card-header"> PLAN101 </div>
    <div class="card-body">
    <form class="container-fluid" action="dashboard.php" method="request">
      <div class-"form-group">
        <label for="user"> UserName </label>
        <input type="text" class="form-control" id="user"> </input>
      </div>
      <div class="form-group">
        <label for="password"> Password </label>
        <input type="text" class="form-control" id="password"> </input>
      </div>
      <div class="form=group">
        <button type="submit" class="btn btn-outline-light">Log In</button>
      </div>
    </form>
    <div class="card-footer"><a href="signup.php" class="card-text py-1 text-light">Don't have an account? Sign Up</a></div>
  </div>
</div>
</div>
<?php include_once $_SERVER ['DOCUMENT_ROOT'] . '/web-assets/tpl/plan_101_footer.php' ; ?>
