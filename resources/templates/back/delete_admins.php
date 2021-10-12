<?php
require_once("../../config.php");





if (isset($_GET['id'])) {


$query = query("DELETE FROM admin WHERE admin_id= " .escape_string($_GET['id']). " ");
confirm($query) ;
set_message("Admin   DELETED") ;
redirect("../../../public/admin/index.php?admins");


}
else {
  redirect("../../../public/admin/index.php?admins");
}
