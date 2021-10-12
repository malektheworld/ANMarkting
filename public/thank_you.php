<?php
require_once("../resources/config.php");
 ?>
 <!-- nave here             -->
 <?php
include(TEMPLATE_FRONT .DS. "header.php");

include('cart.php');
  ?>
  <?php
  if (isset($_GET['user_id'])) {
    // code...
  $user_id= escape_string($_GET['user_id']);
  $email = escape_string($_GET['email']);
  $amount = escape_string($_GET['order_amount']);
  $quantity = escape_string($_GET['quantity']);
  $date= date("Y/m/d");



  $send_order = query("INSERT INTO orders ( user_id,email,product_price,product_quantity,order_date)
      VALUES('{$user_id}','{$email}','{$amount}','{$quantity}','{$date}')") ;
  confirm($send_order) ;


}






function show_order () {

   $query = query("SELECT * FROM  orders WHERE user_id = " . escape_string($_GET['user_id']) ." ");
  confirm($query);
   while ($row = fetch_array($query)) {
 $order= <<<DELIMETER
 <tr class="cart-subtotal">
 <th>Items:</th>
 <td><span class="amount">
 </span>{$row['product_quantity']} </td>
 </tr>
 <tr>
 <th>User Email</th>
 <td>{$row['email']}</td>
 </tr>

 <tr class="order-total">
 <th>Order Total</th>
 <td> {$row['product_price']} </td>
 </tr>
 <tr class="order-date">
 <th>Order Date</th>
 <td> {$row['order_date']} </td>
 </tr>

 </tbody>
DELIMETER;
echo $order;

} }


session_destroy();

 ?>




    <!-- Page Content -->
    <div class="container">
      <h1 class="text-center"><span class="badge badge-secondary">THANK YOU FOR YOUR VISITING</span></h1>

      <h1 class="text-center badge badge-secondary"></h1>




      <div class="col-xs-4" style="margin-bottom:300px;">
      <h2>Your  Order</h2>

      <table class="table table-bordered" cellspacing="0">


<?php show_order(); ?>
      </table>

      </div>








    </div>



    <?php
    include(TEMPLATE_FRONT .DS. "footer.php");
     ?>
