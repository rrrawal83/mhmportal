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
        <li><a href="<?php echo base_url();?>">Add Products</a></li>
          <li><a href="make_quotation">Make Quotation</a></li>
      </ul>
    </div>
  </nav>

  <h2>Quotation Details</h2>
    <div class="row">
      <?php
      $code = "";
      $date = "";
      $title = "";
      $billing_address = "";
      $grand_total = "";
      foreach($basic_details as $details){
        $code = $details['code'];
        $date = date("d M, Y", strtotime($details['date']));
        $title = $details['title'];
        $billing_address = $details['address'];
        $grand_total = $details['total'];
      }?>
      <div class="col-sm-12">
          <span>Quotation Code: <label><?php echo $code;?></label></span>
          <span style="float:right;">Date: <label><?php echo $date;?></label></span>
      </div>
      <div class="col-sm-6">
        <span style="font-size:24px;">Title: <label><?php echo $title;?></label></span>
      </div>
      <div class="col-sm-6">
          <span style="float:right;">Billing Address: <label><?php echo $billing_address;?></label></span>
      </div>
      <div class="col-sm-12">
        <table class="table table-bordered">
          <tr><td>Sr No</td><td>Name</td><td>Hsn</td><td>Price</td><td>Quantity</td><td>Sub Total</td><td>Gst</td><td>Total</td></tr>
          <?php
          $i=1;
            foreach($main_details as $product){
              echo "<tr><td>".($i++)."</td><td>".$product['pd_name']."</td><td>".$product['hsn_code']."</td><td>".$product['price']."</td><td>".$product['quantity']."</td><td>".$product['sub_total']."</td><td>".$product['gst']."</td><td>".$product['main_total']."</td></tr>";
            }
          ?>
          <tr><td colspan="7">Total</td><td><?php echo $grand_total;?></td></tr>
        </table>
      </div>
    </div>

</div>

</body>
</html>
