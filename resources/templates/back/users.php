<?php

require_once("../../resources/config.php") ;

 ?>
 <?php include(TEMPLATE_BACK."/header.php"); ?>



        <div id="page-wrapper">

            <div class="container-fluid">



                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Users

                        </h1>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fist name</th>
                                        <th>Last name</th>
                                        <th>email</th>
                                    </tr>
                                </thead>
                                <tbody>

                          <?php show_user1(); ?>




                                </tbody>
                            </table> <!--End of Table-->


                        </div>











                    </div>
                    <?php include(TEMPLATE_BACK."/footer.php"); ?>
