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

  <h2>All Products Details</h2>
  <table class="table table-bordered">
    <tr><td>Sr No</td><td>Product Name</td><td>Gst Applicable</td><td>HSN Code</td><td>Price</td></tr>
    <?php
    $i=1;
    foreach($products as $product){
      echo "<tr><td>".($i++)."</td><td>".$product['name']."</td><td>".$product['gst']."</td><td>".$product['hsn_code']."</td><td>".$product['price']."</td></tr>";
    }?>
  </table>
</div>

</body>
</html>
