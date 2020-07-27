<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>">Add Products</a></li>
          <li><a href="make_quotation">Make Quotation</a></li>
      </ul>
    </div>
  </nav>

  <h2>Add Products</h2>

  <?php
  echo validation_errors();
  echo form_open("insert_product");
  ?>
    <div class="form-group">
      <label for="prod_name">Product Name:</label>
      <input type="text" class="form-control" id="prod_name" placeholder="Enter Product Name" name="product_name">
    </div>
    <div class="form-group">
      <label for="gst_percentage">GST %:</label>
      <input type="text" class="form-control" id="gst_percentage" placeholder="Enter GST" name="gst_percentage">
    </div>
    <div class="form-group">
      <label for="hsn_code">HSN Code:</label>
      <input type="text" class="form-control" id="hsn_code" placeholder="Enter HSN Code" name="hsn_code">
    </div>
    <div class="form-group">
      <label for="product_price">Product Price:</label>
      <input type="text" class="form-control" id="product_price" placeholder="Enter Price" name="product_price">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  <?php echo form_close();?>
</div>

</body>
</html>
