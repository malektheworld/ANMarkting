<?php
require_once("../resources/config.php");
 ?>
 <!-- nave here             -->
 <?php
include(TEMPLATE_FRONT .DS. "header.php");

  ?>
  <head>
    <style media="screen">
    .img1{
      margin-left:150px ;
      margin-top:10px;
    }
    .container{
      border-radius: 10px 10px 10px 10px;

    width: 500px;
    height:400px;
    padding: 20px;
    border: 1px solid black ;
    margin-left:500px;
    margin-top:100px;
    margin-bottom:100px;
    box-shadow: -5px -5px  5px 5px #ddd ;
    }
    </style>
  </head>
      <div class="container">
        <div class="">


        <img src="images/anm.jpg" width="200" height="100px"  alt="" class="img1 "></div>
        <form style="margin:20px;" method="post" enctype="multipart/form-data">
          <?php login_admin(); ?>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label"> Username
</label>
    <div class="col-sm-10">

      <input type="text" name="username" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control" id="inputPassword3">
    </div>
  </div>


  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" class="btn btn-dark btn-block" style="margin-left:75px;">Log in </button>
    </div>
  </div>
</form>



  </div>
  <?php
  include(TEMPLATE_FRONT .DS. "footer.php");
   ?>
