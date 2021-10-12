<?php
require_once("../../config.php");





if (isset($_GET['id'])) {


$query = query("DELETE FROM orders WHERE order_Id= " .escape_string($_GET['id']). " ");
confirm($query) ;
set_message("order  DELETED") ;
redirect("../../../public/admin/index.php?orders");


}
else {
  redirect("../../../public/admin/index.php?orders");
}
