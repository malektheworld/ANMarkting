<?php
require_once("../resources/config.php");
 ?>
 <!-- nave here             -->
 <?php
include(TEMPLATE_FRONT .DS. "header.php");

  ?>

  <head>
    <style media="screen">
    .dw{
      width: 500px ;
      height: 250px ;
      margin: 10px;
      overflow: scroll;
    }
    .bm{
      margin: 10px;
    }

    .b3{
      font-size: 10px;
      margin: 10px;
    }
    .container {
margin-top: 20px;
      display: flex;
      justify-content: center;
    }
    </style>
  </head>
  <body>

    <!-- <div class="container">
      <img src="asus.jpg" alt="Asus">
      <img src="dell.jpg" alt="dell" style="margin-left:100px;" >
    </div> -->

<div class="container  card-group ">

<div>
  <?php get_cat_by_id(); ?>
  

</div>

</div>

<?php
include(TEMPLATE_FRONT .DS. "footer.php");
 ?>
