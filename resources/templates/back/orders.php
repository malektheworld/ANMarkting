

      <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>order Id</th>
           <th>user id</th>
           <th>Email</th>
           <th>amount</th>
           <th>Quantity</th>
           <th>Order Date</th>
      </tr>
    </thead>
    <?php show_order_admin(); ?>
</table>
</div>













         <?php include(TEMPLATE_BACK."/footer.php"); ?>
