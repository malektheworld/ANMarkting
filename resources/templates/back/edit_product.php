<?php


edit_product_admin();


if (isset($_GET['id'])) {

  $query = query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
  confirm($query) ;
  while ($row = fetch_array($query)) {

    $product_title =       escape_string ($row['product_title']) ;
    $product_category_id = escape_string ($row['product_category_id']) ;
    $product_price =       escape_string ($row['product_price']) ;
    $product_Info =        escape_string ($row['product_Info']) ;
    $product_quantity =    escape_string ($row['product_quantity']) ;
    $product_img =         escape_string ($row['product_img']) ;
    $product_img = display_image($row['product_img']);

}

}



 ?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product

</h1>
</div>



<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control"value="<?php echo $product_title; ?>" >

    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_Info" id="" cols="30" rows="10" class="form-control" > <?php echo $product_Info; ?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $product_price; ?>">
      </div>
    </div>







</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">


     <div class="form-group">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>
        <select name="product_category_id" id="" class="form-control">
            <option value="<?php echo  $product_category_id; ?>"><?php echo show_product_category($product_category_id) ; ?></option>
            <?php show_category(); ?>

        </select>


</div>


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
        <input type="text" name="product_quantity"  class="form-control" value="<?php echo $product_quantity; ?>">
    </div>

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file">
        <br>
        <img src="../../resources/<?php echo $product_img; ?>" width="200px" height="100px" alt="">

    </div>



</aside><!--SIDEBAR-->



</form>
