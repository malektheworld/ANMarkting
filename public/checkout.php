
<?php
require_once("../resources/config.php");
 ?>
 <!-- nave here             -->
 <?php
include(TEMPLATE_FRONT .DS. "header.php");
  ?>

  <?php

include("cart.php"); 

   ?>

       <!-- Page Content -->
       <head>
         <style media="screen">
           table{
             margin: 10px;
             width: 100%;
           }
           .m2{
             margin-left: 200px;
           }
           .dt{
             width: 100%;
           }
         </style>
       </head>
       <div class="modal-dialog modal-sm">
 <?php display_message(); ?>

       </div>
       <div class="container">

         <h3 class="display-4" >Checkout</h3>

   <!-- /.row -->
   <div class="row table-responsive table-responsive-xl">



   <form action="" method="post">
       <table class="table table-striped">
           <thead style="width:100%;">
             <tr>
              <th>Product</th>
              <th>Product Image</th>

              <th>Price</th>
              <th>Quantity</th>
              <th>Sub-total</th>

             </tr>
           </thead>
           <tbody>
             <?php cart(); ?>
           </tbody>
       </table>
        <?php echo show_check(); ?>
   </form>





   <!--  ***********CART TOTALS*************-->

   <div class="col-xs-4 pull-right m2 ">
   <h2>Cart Totals</h2>

   <table class="table table-bordered" cellspacing="0">

   <tr class="cart-subtotal">
   <th>Items:</th>
   <td><span class="amount"><?php

   echo  isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity']='empty' ;
    ; ?>
   </span></td>
   </tr>
   <tr class="shipping">
   <th>Shipping and Handling</th>
   <td>Free Shipping</td>
   </tr>

   <tr class="order-total">
   <th>Order Total</th>
   <td><strong><span class="amount"> <?php

   echo  isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total']='empty' ;



    ?></span></strong> </td>
   </tr>


   </tbody>

   </table>

   </div><!-- CART TOTALS-->


    </div><!--Main Content-->
  </div>
 <?php
 include(TEMPLATE_FRONT .DS. "footer.php");
  ?>
