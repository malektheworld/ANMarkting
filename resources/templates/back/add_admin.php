  <h1 class="page-header">
      Add Admin
      <small>Page</small>
  </h1>

<div class="col-md-6 user_image_box">

<span id="user_admin" class='fa fa-user fa-4x'></span>

</div>


<form action="" method="post" enctype="multipart/form-data">

<?php add_admin();  ?>


  <div class="col-md-6">




     <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" >

     </div>





      <div class="form-group">
          <label for="password">Password</label>
      <input type="password" name="password" class="form-control"  >

     </div>

      <div class="form-group">

      <input type="submit" name="add_admin" class="btn btn-primary pull-right" value="Add Admin" >

     </div>




  </div>



</form>
