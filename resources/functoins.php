<?php
//helper functoin
function set_message($msg){
  if (!empty($msg)) {
$_SESSION['message'] = $msg ;
    // code...
  }
  else {
    $msg = "" ;
  }
}
function display_message(){
  if (isset(  $_SESSION['message'])) {
    echo   $_SESSION['message'];
    unset(  $_SESSION['message']);
    // code...
  }
}

function redirect($location){

  header("Location: $location ");
}


function query($sql) {
  global $connection;

  return mysqli_query($connection,$sql);
}

function confirm($result){
  global $connection ;
  if (!$result) {
    die("Query Faild" . mysqli_error($connection));
    // code...
  }
}
function escape_string($string) {
  global $connection ;
  return mysqli_real_escape_string($connection,$string);
}
function fetch_array($result){
  return mysqli_fetch_array($result);
}

//get products





function get_category(){

  $query =  query("SELECT * FROM categories") ;
  confirm($query);

  while ($row = fetch_array($query)) {
    $cat_img =   display_image($row['cat_img']);

    $category= <<<DELIMETER
    <div class="col-sm-4 ">
    <div class="card  border-danger" style=" width:300px;margin:10px;height:400px;">
  <img src="../resources/{$cat_img}" class="card-img-top cardImage" alt="..." style="  width: 295px;
    height: 200px ;">
  <div class="card-body">
  <h5 class="card-title">{$row['cat_title']}</h2>
  <p class="card-text">{$row['cat_Info']}</p>
  <a href="category_id.php?id={$row['cat_id']}" class="btn btn-dark">see more</a>
  </div>
  </div>
  </div>


DELIMETER;
echo $category;
  }
}
function get_category_name(){

  $query =  query("SELECT * FROM categories") ;
  confirm($query);

  while ($row = fetch_array($query)) {
    $category= <<<DELIMETER
     <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>


DELIMETER;
echo $category;
  }
}

function get_cat_by_id() {
  $query = query("SELECT * FROM  products WHERE product_category_id = " . escape_string($_GET['id']) ." ");
  confirm($query);
  while ($row = fetch_array($query)) {
    $product_img =   display_image($row['product_img']);

    $category= <<<DELIMETER
     <div class="card mb-3 dpading border-dark dw " style="max-width: 540px;display:inline-block;">
     <div class="row no-gutters">
       <div class="col-md-4">
         <img src="../resources/{$product_img}" class="card-img" alt="...">
       </div>
       <div class="col-md-8">
         <div class="card-body">
           <h5 class="card-title">{$row['product_title']}</h5>
           <ul>

         <li>{$row['product_Info']}</li>

     </ul>
     <h6><span class="badge badge-danger" style="margin-left:10px;"> Price:{$row['product_price']} Ls</span>  </h6>
     <a class="btn btn-dark  rounded-right rounded-left b3" target="_blank" href="cart.php?add={$row['product_id']}">Add to cart

     <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
     </svg>


             </a>
         </div>
       </div>
     </div>
   </div>
DELIMETER;
  echo $category;
  }

}








function login_admin()
{
if (isset($_POST['submit'])) {
$username= escape_string  ($_POST['username']);
$password=  escape_string( $_POST['password'] );

$query = query(" SELECT * FROM admin WHERE username='{$username}' AND password='{$password}' ");
 confirm($query);


if (mysqli_num_rows($query) == 0) {
  set_message("your password or user name are worng");
  redirect("login_admin.php");
}
else {
  $_SESSION['username'] = $username ;
  redirect("admin");
}

}
}
function send_message(){
if (isset($_POST['submit'])) {
  $to = "someone@gmail.com" ;
  $name = $_POST['name'];
 $email = $_POST['email'] ;
 $subject = $_POST['subject'];
 $message = $_POST['msg'];
 $headers = "From: {$name} {$email}";
$result=   mail($to,$subject,$message,$headers);
if (!$result) {
  echo "error";
  // code...
}
else {
  echo "sent";
}


}

}
function last_id(){
  global $connection ;
 return   mysqli_insert_id($connection);

}

function show_order_admin () {
 $query = query(" SELECT * FROM  orders ");
  confirm($query);
  while ($row = fetch_array($query)) {
$order= <<<DELIMETER
<tbody>
     <tr>
         <td> {$row['order_Id']} </td>
         <td> {$row['user_id']} </td>

       <td>{$row['email']}</td>
         <td>{$row['product_price']}</td>
         <td>{$row['product_quantity']}</td>
         <td>{$row['order_date']}</td>
         <td>
         <a class='btn btn-danger' href="../../resources/templates/back/delete_orders.php?id={$row['order_Id']}">
         <span class='glyphicon glyphicon-remove'> </span></a>
         </td>
     </tr>


 </tbody>
DELIMETER;
echo $order;

} }


  /**************** USers Register**********************/
  function register_user(){
    if (isset($_POST['submit'])) {

      $firstname = escape_string($_POST['firstname']) ;
      $lastname = escape_string($_POST['lastname']) ;
      $country = escape_string($_POST['country']) ;
      $city = escape_string($_POST['city']) ;
      $mobile = escape_string($_POST['mobile']) ;
      $address = escape_string($_POST['address']) ;
      $date = escape_string($_POST['birthday']) ;
      $email = escape_string($_POST['email']) ;
      $password = escape_string($_POST['password']) ;


      $query = query("INSERT INTO users (firstname,lastname,country,city,mobile,address,birthday,email,password) VALUES('{$firstname}',
'{$lastname}','{$country}','{$city}','{$mobile}','{$address}','{$date}','{$email}','{$password}') ");
      confirm($query);
      redirect("index.php?");
    } }
    function login_user()
    {
    if (isset($_POST['submit'])) {
    $email= escape_string  ($_POST['email']);
    $password=  escape_string( $_POST['password'] );

    $query = query(" SELECT * FROM users  WHERE email='{$email}' AND password='{$password}' ");
     confirm($query);
     while ($row=fetch_array($query)) {
       $_SESSION['user_id'] = $row['user_id'] ;

       // code...
     }
    if (mysqli_num_rows($query) == 0) {
      set_message("your password or email are worng");
      redirect("register.php");
    }
    else {
      $_SESSION['email'] = $email ;


      redirect("index.php");
    }


    }



    }
/************************************ Admin product ***************************/

function display_image($picture) {


  return "uploads". DS. $picture ;
}



function show_product_category($product_category_id){


$category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
confirm($category_query);
while ($category_row = fetch_array($category_query)) {
 return     $category_row['cat_title'];

}

}





function get_products_in_admin() {
$query = query("SELECT * From products") ;
confirm($query);

while ($row = fetch_array($query)) {

   $category = show_product_category($row['product_category_id']);
 $product_img =   display_image($row['product_img']);


$product = <<<DELIMETER



<tr>
  <td>{$row['product_id']}</td>
  <td>{$row['product_title']}</td>
  <td>
   <img src="../../resources/{$product_img}" alt="" width='100px' height='50px' > </a>
  </td>
  <td>{$category}</td>
  <td>{$row['product_price']}</td>
  <td>{$row['product_quantity']}</td>
  <td>                <a class='btn btn-danger' href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class='glyphicon glyphicon-remove'> </span></a>
        </td>
<td>
<a class='btn btn-primary' href="index.php?edit_product&id={$row['product_id']}">
<span class='glyphicon glyphicon-edit'> </span></a>
</td>

</tr>




DELIMETER;
echo $product;

}










}
/**************** ADD Product in Admin *****************/
function add_product_admin(){
if (isset($_POST['publish'])) {
$product_title =       escape_string ($_POST['product_title']) ;
$product_Info =        escape_string ($_POST['product_Info']) ;
$product_price =       escape_string ($_POST['product_price']) ;
$product_category_id = escape_string ($_POST['product_category_id']) ;
$product_quantity =    escape_string ($_POST['product_quantity']) ;
$product_img =         escape_string ($_FILES['file']['name']) ;
$image_temp =         escape_string ($_FILES['file']['tmp_name']) ;

move_uploaded_file($image_temp , UPLOAD_DIRECTORY . DS . $product_img ) ;
$query = query("INSERT INTO products(product_title,product_category_id,product_price,product_quantity,product_Info,product_img)
VALUES('{$product_title}','{$product_category_id}','{$product_price}','{$product_quantity}','{$product_Info}','{$product_img}')");
$last_id = last_id();

confirm($query) ;

set_message('New Product With id $last_id just Added') ;
redirect("index.php?products");
}
/************************* UPDATED Product *****************/
}
function edit_product_admin(){
if (isset($_POST['update'])) {
$product_title =       escape_string ($_POST['product_title']) ;
$product_Info =        escape_string ($_POST['product_Info']) ;
$product_price =       escape_string ($_POST['product_price']) ;
$product_category_id = escape_string ($_POST['product_category_id']) ;
$product_quantity =    escape_string ($_POST['product_quantity']) ;
$product_img =         escape_string ($_FILES['file']['name']) ;
$image_temp =         escape_string ($_FILES['file']['tmp_name']) ;
if (empty($product_img)) {
  $get_pic = query("SELECT product_img FROM products WHERE product_id= " .escape_string($_GET['id']) ." ");
  confirm($get_pic) ;
  while ($pic = fetch_array($get_pic)) {
    $product_img = $pic['product_img'];

  }
}

move_uploaded_file($image_temp , UPLOAD_DIRECTORY . DS . $product_img ) ;
$query = "UPDATE products SET ";
$query.= "product_title                = '{$product_title}'        , ";
$query.= "product_category_id          = '{$product_category_id}'  , ";
$query.= "product_price                = '{$product_price}'        , ";
$query.= "product_Info                 = '{$product_Info}'         , ";
$query.= "product_quantity             = '{$product_quantity}'     , ";
$query.= "product_img                  = '{$product_img}'           ";
$query.= " WHERE product_id=" . escape_string($_GET['id']);


$send_update_query = query($query) ;

confirm($send_update_query) ;

set_message(' Product has been UPDATED') ;
redirect("index.php?products");
}
}


/************************* users in Admin *************/
function show_user_admin() {


  $query = query("SELECT * FROM admin");
  confirm($query);
  while ($row = fetch_array($query)) {
    $user_id = $row['admin_id'];
    $username = $row['username'] ;
    $password = $row['password'] ;






  $user =  <<<DELIMETER
  <tr>
  <td> {$user_id} </td>
  <td> {$username} </td>
 <td>  <a class='btn btn-danger' href="../../resources/templates/back/delete_admins.php?id={$row['admin_id']}"><span class='glyphicon glyphicon-remove'> </span></a></td>
 </tr>
DELIMETER;


    echo $user  ; }}
    function show_user1() {


      $query = query("SELECT * FROM users");
      confirm($query);
      while ($row = fetch_array($query)) {
        $user_id = $row['user_id'];
        $firstname = $row['firstname'] ;
        $lasttname = $row['lastname'] ;
        $email = $row['email'] ;

        $password = $row['password'] ;






      $user =  <<<DELIMETER
      <tr>
      <td> {$user_id} </td>
      <td> {$firstname} </td>
      <td> {$lasttname} </td>
      <td> {$email} </td>

     <td>  <a class='btn btn-danger' href="../../resources/templates/back/delete_users.php?id={$row['user_id']}"><span class='glyphicon glyphicon-remove'> </span></a></td>
     </tr>
DELIMETER;


        echo $user  ; }}

    function add_admin(){
      if (isset($_POST['add_admin'])) {

        $username = escape_string($_POST['username']) ;
        $password = escape_string($_POST['password']) ;
        $query = query("INSERT INTO admin (username,password) VALUES('{$username}','{$password}') ");
        confirm($query);
        set_message("Admin Added") ;
        redirect("index.php?admins");
      } }


    function add_user(){
      if (isset($_POST['add_user'])) {

        $username = escape_string($_POST['username']) ;
        $email = escape_string($_POST['email']) ;
        $password = escape_string($_POST['password']) ;
        $user_photo = escape_string($_FILES['file']['name']) ;
        $photo_temp = escape_string($_FILES['file']['tmp_name']);


        move_uploaded_file($photo_temp ,UPLOAD_DIRECTORY. DS . $user_photo);

        $query = query("INSERT INTO users (username,email,password) VALUES('{$username}','{$email}','{$password}') ");
        confirm($query);
        set_message("User Added") ;
        redirect("index.php?users");
      } }
/********************************** reports in Admin ************************/
function show_report_admin() {


  $query = query("SELECT * FROM reports");
  confirm($query);
  while ($row = fetch_array($query)) {
    $report_id = $row['report_id'];
    $product_id = $row['product_id'];
    $product_price = $row['product_price'];
    $product_title = $row['product_title'];
    $product_quantity = $row['product_quantity'];






  $user =  <<<DELIMETER
  <tr>
  <td> {$report_id} </td>
  <td> {$product_id} </td>
  <td> {$product_title} </td>
  <td> {$product_price} </td>
  <td> {$product_quantity} </td>
 <td>  <a class='btn btn-danger' href="../../resources/templates/back/delete_report.php?id={$row['report_id']}"><span class='glyphicon glyphicon-remove'> </span></a></td>
 </tr>
DELIMETER;


    echo $user  ; }}




/************************************ Category in Admin ***************************/

function show_category_in_admin() {
$query = query("SELECT * FROM categories");
confirm($query);
while ($row = fetch_array($query)) {
$cat_id       = $row['cat_id'];
$cat_title    = $row['cat_title'];


$category =  <<<DELIMETER
<tr>
      <td>{$cat_id}</td>
      <td>{$cat_title}</td>
      <td>    <a class='btn btn-danger' href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><span class='glyphicon glyphicon-remove'> </span></a></td>

   </tr>
DELIMETER;


  echo $category ; }}

  function add_category(){
    if (isset($_POST['add_category'])) {
      $cat_img =   escape_string ($_FILES['file']['name']) ;
      $image_temp = escape_string ($_FILES['file']['tmp_name']) ;

      move_uploaded_file($image_temp , UPLOAD_DIRECTORY . DS . $cat_img ) ;
      $cat_Info = escape_string($_POST['cat_Info']) ;

      $cat_title = escape_string($_POST['cat_title']) ;

      if (empty($cat_title) || $cat_title == " " ) {

      }
      else {
      $query = query("INSERT INTO categories(cat_title,cat_Info,cat_img) VALUES('{$cat_title}','{$cat_Info}','{$cat_img}') ");
      confirm($query);
      set_message("category Created") ;
      redirect("index.php?categories");
    } }
  }



function show_category(){

  $query =  query("SELECT * FROM categories") ;
  confirm($query);

  while ($row = fetch_array($query)) {
    $category_option= <<<DELIMETER
    <option value="{$row['cat_id']}">  {$row['cat_title']}  </option>
DELIMETER;
echo $category_option;
  }
}

?>
