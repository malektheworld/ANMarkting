<?php

require_once("../../resources/config.php") ;

 ?>
 <?php include(TEMPLATE_BACK."/header.php"); ?>

<head>

</head>

        <div id="page-wrapper">

            <div class="container-fluid">





<h1 class="page-header">
  Product Categories

</h1>


<div class="col-md-4"  >
  <h4 class="bg-success"> <?php display_message(); ?></h4>

    <form action="" method="post">
<?php add_category(); ?>
        <div class="form-group">
            <label for="category-title">Title</label>
            <input name="cat_title" type="text" class="form-control">
        </div>


        <div class="form-group">
               <label for="product-title">Category Description</label>
          <textarea name="cat_Info" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <label for="product-title">Category Image</label>
            <input type="file" name="file">

        </div>
        <div class="form-group">

            <input name="add_category"  type="submit" class="btn btn-primary" value="Add Category">
        </div>

    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
      <?php
      show_category_in_admin  ();  ?>
    </tbody>

        </table>

</div>

















            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script >

    </script>

</body>

</html>
