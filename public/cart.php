
<?php
require_once("../resources/config.php")
 ?>
<?php

if ($_SESSION['user_id']==null) {
  redirect('register.php'); }
  else {


if (isset($_GET['add'])) {

  $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']) ." ") ;
   confirm($query);
   while ($row = fetch_array($query)) {

     if ($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]) {
       $_SESSION['product_'.$_GET['add']]+=1;
       redirect("checkout.php");
     }
     else {
       set_message("We only have ".$row['product_quantity']." available sorry ");
     }
    redirect("checkout.php");
   }
  // $_SESSION['product_' . $_GET['add']] +=1 ;
  // redirect("index.php");
  // code...
}
}

if (isset($_GET['remove'] )) {
  $_SESSION['product_'.$_GET['remove']]--;
  if ($_SESSION['product_'.$_GET['remove']] < 1)
   {
     unset($_SESSION['item_total']);
     unset($_SESSION['item_quantity']);
  redirect("checkout.php");}

  else {
    redirect("checkout.php");
  }

}



if (isset($_GET['delete'] )) {


  $_SESSION['product_'.$_GET['delete']] = '0';
  unset($_SESSION['item_total']);
  unset($_SESSION['item_quantity']);



  redirect("checkout.php");








}

function cart() {
$total = 0 ;
$item_quantity = 0 ;
$item_name = 1 ;
$item_number = 1 ;
$amount = 1 ;
$quantity = 1  ;

foreach ($_SESSION as $name => $value) {
  if ($value>0) {


  if (substr($name,0,8) == 'product_') {
    $length = strlen((int)$name - 8);
    $id = substr($name,8,$length);

$query = query("SELECT * FROM products WHERE product_id=" .escape_string($id) ."");
confirm($query);
while ($row=fetch_array($query)) {
  $sub = $row['product_price']*$value;
  $item_quantity += $value ;
  $product_img = display_image($row['product_img']);


$product = <<<DELIMETER
<tr>
<td>{$row['product_title']}</td>
<td> <img src="../resources/{$product_img}" height='50px' width='100px'></td>

<td>{$row['product_price']}</td>
<td>{$value}</td>
<td>{$sub}</td>
<td> <a class='btn btn-primary' href="cart.php?remove={$row['product_id']}"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M6 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/> </svg></a>
<a class='btn btn-success' href="cart.php?add={$row['product_id']}"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
</svg></a>
<a class='btn btn-danger' href="cart.php?delete={$row['product_id']}"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
  <path fill-rule="evenodd" d="M6.646 5.646a.5.5 0 0 1 .708 0L8.5 6.793l1.146-1.147a.5.5 0 0 1 .708.708L9.207 7.5l1.147 1.146a.5.5 0 0 1-.708.708L8.5 8.207 7.354 9.354a.5.5 0 1 1-.708-.708L7.793 7.5 6.646 6.354a.5.5 0 0 1 0-.708z"/>
</svg></a>
</td>
</tr>

DELIMETER;

echo $product;

}

$_SESSION['item_total'] = $total+= $sub ;
$_SESSION['item_quantity'] = $item_quantity ;



} }



}

}
function show_check(){
  if (isset($_SESSION['item_quantity'])&& $_SESSION['item_quantity']>=1 ) {
    // code...

$pay_button= <<<DELIMETER

<h3> Buy Now <h3>
<a href='thank_you.php?user_id={$_SESSION['user_id']}&email={$_SESSION['email']}&order_amount={$_SESSION['item_total']}&quantity={$_SESSION['item_quantity']}' target='_blank' class="btn btn-success">
<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>

</svg>
</a>

DELIMETER;
return $pay_button ; }

}



 ?>
