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
    height:600px;
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


        <img src="images/anm.jpg" width="200" height="100px"  alt="" class="img1 ">
      </div>
        <form method="post">
          <?php register_user(); ?>
  <div class="form-row " style="margin:10px;">
    <div class="col">
      <input type="text" name="firstname" class="form-control alert alert-dark" placeholder="First name">
    </div>
    <div class="col">
      <input type="text" name="lastname" class="form-control alert alert-dark" placeholder="Last name">
    </div>
  </div>
  <div class="form-row" style="margin:10px;">
    <div class="col">
      <input type="text"  name="country" class="form-control alert alert-dark" placeholder="country">
    </div>
    <div class="col">
      <input type="text" name="city" class="form-control alert alert-dark" placeholder="city">
    </div>

  </div>
  <div class="form-row" style="margin:10px;">
    <div class="col">
      <input type="text" name="mobile" class="form-control alert alert-dark" placeholder="mobile">
    </div>
    <div class="col">
      <input type="text" name="address" class="form-control alert alert-dark" placeholder="address">
    </div>

  </div>
  <div class="form-row" style="margin:10px;">
    <div class="col">
      <input type="date" name="Birthday" class="form-control alert alert-dark" placeholder="your Birthay">
    </div>
  </div>
  <div class="form-row" style="margin:10px;">
    <div class="col">
      <input type="email" name="email" class="form-control alert alert-dark" placeholder="email">
    </div>
  </div>
  <div class="form-row" style="margin:10px;">
    <div class="col">
      <input type="password" name="password" class="form-control alert alert-dark" placeholder="password">
    </div>
  </div>


  <div class="form-row" style="margin:10px;">
    <div class="col">
      <button type="submit" name="submit" class="btn btn-dark form-control btn-block"style="margin-left:5px;">Register</button>
    </div>
  </div>
  <!-- <div class="form-row"style="margin:10px;">
    <div class="col">
      <button type="button" class="btn btn-dark form-control btn-block">Register</button>

    </div>
  </div> -->
</form>

      </div>
      <?php
      include(TEMPLATE_FRONT .DS. "footer.php");
       ?>
