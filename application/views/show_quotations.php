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

  <h2>All Quotation</h2>
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-bordered">
          <tr><td>Sr No</td><td>Quotation Code</td><td>Quotation Title</td><td>Billing Address</td><td>Quotation Date</td><td>Quotation Amount</td><td>View Quotation</td></tr>
          <?php
          $i=1;
            foreach($quotataions as $quotation){
              $newDate = date("d M, Y", strtotime($quotation['date']));
              echo "<tr><td>".($i++)."</td><td>".$quotation['code']."</td><td>".$quotation['title']."</td><td>".$quotation['address']."</td><td>".$newDate."</td><td>".$quotation['total']."</td><td><a href='individual_quotations/".$quotation['code']."'>Show</a></td></tr>";
            }
          ?>
        </table>
      </div>
    </div>

</div>

</body>
</html>
