<?php

require_once("../../resources/config.php") ;

 ?>
 <?php include(TEMPLATE_BACK."/header.php"); ?>



        <div id="page-wrapper">

            <div class="container-fluid">



                    <div class="col-lg-12">


                        <h1 class="page-header">
                          Admins

                        </h1>


                        <a href="index.php?add_admin" class="btn btn-primary">Add Admin</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>

                          <?php show_user_admin(); ?>




                                </tbody>
                            </table> <!--End of Table-->


                        </div>











                    </div>
                    <?php include(TEMPLATE_BACK."/footer.php"); ?>
