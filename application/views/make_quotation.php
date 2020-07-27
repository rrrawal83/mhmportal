<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="resources/custom.js"></script>
</head>
<body>

<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="make_quotation">Make Quotation</a></li>
      </ul>
    </div>
  </nav>

  <h2>Make Quotation</h2>
  <?php echo form_open("submit_quotation_data");?>
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-6 form-group">
          <label for="quotation_title">Title</label>
          <input type="text" class="form-control" id="quotation_title" placeholder="Quotation Title" name="quotation_title" value="">
        </div>
        <div class="col-sm-3 form-group">
          <label for="quotation_date">Date</label>
          <input type="text" class="form-control" id="quotation_date" value="<?php echo date("d/m/Y");?>" name="quotation_date" readonly>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="col-sm-9 form-group">
          <label for="billing_address">Billing Address: </label>
          <textarea class="form-control" id="billing_address" name="billing_address"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="col-sm-9 form-group">
          <label for="grand_total">Grand Total Amount: </label>
          <input type="text" class="form-control" id="grand_total" name="grand_total" value="0" readonly>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="col-sm-3 form-group">
          <label for="product_name">Add Products :  </label>
          <a class="btn btn-primary" id="add">Add</a>
          <a class="btn btn-danger" id="remove">Remove</a>
        </div>
      </div>

      <div class="products_table">
        <div class="col-sm-12 add_products" id="product_row_1">
          <div class="col-sm-2 form-group">
            <label for="product_name">Select Product: </label>
            <select class="form-control product_select" name="product_name[]">
              <option selected disabled>Select Product</option>
              <?php foreach($products as $product){
                echo "<option value='".$product['product_id']."'>".$product['name']."</option>";
              }?>
            </select>
          </div>
          <div class="col-sm-2 form-group">
            <label for="product_hsn">HSN Code: </label>
            <input type="text" class="form-control" id="product_hsn" name="product_hsn[]" readonly>
          </div>
          <div class="col-sm-2 form-group">
            <label for="product_price">Price: </label>
            <input type="text" class="form-control" id="product_price" name="product_price[]" readonly>
          </div>
          <div class="col-sm-1 form-group">
            <label for="product_quantity">Quantity: </label>
            <input type="number" class="form-control" id="product_quantity" name="product_quantity[]" min=1 value="1">
          </div>
          <div class="col-sm-2 form-group">
            <label for="product_sub_total">Sub Total: </label>
            <input type="text" class="form-control" id="product_sub_total" name="product_sub_total[]" readonly>
          </div>
          <div class="col-sm-1 form-group">
            <label for="product_gst">Tax (%): </label>
            <input type="text" class="form-control" id="product_gst" name="product_gst[]" readonly>
          </div>
          <div class="col-sm-2 form-group">
            <label for="product_main_total">Total: </label>
            <input type="text" class="form-control product_final_total" id="product_main_total" name="product_main_total[]" readonly>
          </div>
        </div>
      </div>
    </div>


    <button type="submit" class="btn btn-default">Submit</button>
    <?php echo form_close();?>
</div>

</body>
</html>
