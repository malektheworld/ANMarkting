 <?php

require_once("../../resources/config.php") ;

  ?>
  <?php include(TEMPLATE_BACK."/header.php"); ?>

  <?php if (!isset($_SESSION['username'])){

    redirect("../../public");  } ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>

                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                if ($_SERVER['REQUEST_URI'] == "/ecomme/public/admin/" || $_SERVER['REQUEST_URI'] =="/ecomme/public/admin/index.php" )

 {                     include(TEMPLATE_BACK."/admin_content.php");
                  // code...
                }
                 if (isset($_GET['orders'])) {
                   include(TEMPLATE_BACK."/orders.php");
                   // code...
                 }
                 if (isset($_GET['categories'])) {
                   include(TEMPLATE_BACK."/categories.php");
                   // code...
                 }

                 if (isset($_GET['products'])) {
                   include(TEMPLATE_BACK."/products.php");
                   // code...
                 }
                 if (isset($_GET['add_product'])) {
                   include(TEMPLATE_BACK."/add_product.php");
                   // code...
                 }
                 if (isset($_GET['edit_product'])) {
                   include(TEMPLATE_BACK."/edit_product.php");
                   // code...
                 }
                 if (isset($_GET['users'])) {
                   include(TEMPLATE_BACK."/users.php");
                   // code...
                 }
                 if (isset($_GET['add_admin'])) {
                   include(TEMPLATE_BACK."/add_admin.php");
                   // code...
                 }
                 if (isset($_GET['edit_user'])) {
                   include(TEMPLATE_BACK."/edit_user.php");
                   // code...
                 }

                 if (isset($_GET['admins'])) {
                   include(TEMPLATE_BACK."/admins.php");
                   // code...
                 }



                 ?>




            </div>
            <!-- /.container-fluid -->

        </div>
        <?php include(TEMPLATE_BACK."/footer.php"); ?>
