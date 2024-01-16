<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
	 
</head>
<body class="billbody">
<div class="container-fluid">
  <div class="card-body">
    <div class="container-fluid mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
      <div class="container-fluid">
        <div class="col-md-12">
          <div class="text-center">
            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
            <p class="pt-0">
            	<img src="assets/exjs/img/mm.png">
            </p>
          </div>

        </div>
        <div class="row" id="billid">
          <div class="col-xl-6">
            <ul class="list-unstyled">
            <?php
            	 foreach ($stu as $names) {
            	?>
	              <li class="text">To: <span style="color:#5d9fc5 ;"><?= $names->name; ?></span></li>
	              <li class="text">Address: <?= $names->address; ?></li>
	              <li class="text"><i class="fas fa-phone"></i><?= $names->phone;?></li>
            	<?php
            	} ?>

            </ul>
          </div>
          <div class="col-xl-6 ">
            <p class="text-muted">Invoice</p>
            <ul class="list-unstyled">
              	<?php foreach ($billd as $bill) {
              		?>
              		<li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> 
              		<span class="text-black">ID: </span><?= $bill->id; ?></li>
              		<li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span class="text-black">Creation Date: <?= $bill->paymentdate; ?> </span></li>
              		<?php 
              	}?>
              
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table">
            <thead style="background-color:#84B0CA ;" class="thead-dark">
              <tr>
                <th scope="col">semester</th>
                <th scope="col">payment Mode</th>
                <th scope="col">Payment</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
            	<?php foreach ($billd as $key) {
            		?>
            		 <tr>
		                <th scope="row"><?= $key->semester; ?></th>
		                <td><?=$key->paymenttype;?></td>
		                <td><?=$key->paymentcount;?></td>
		                <td><?="₹".$key->rupees;?></td>
		              </tr>

            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <ul class="list-unstyled">
              <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>
              <?php 

	         	foreach ($billd as $names) {
	         		echo "₹".$names->rupees;

	         	}?></li>
            </ul>
            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                style="font-size: 25px;"><?php foreach ($billd as $names) {
	         		echo "₹".$names->rupees;

	         	}?></span></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-6">
            <p>Mondal coaching</p>
          </div>
          <div class="col-xl-6 text-center">
	         <p>recived by:
	         	<?php 

	         	foreach ($billd as $names) {
	         	
	         	echo $names->recivedby;
	         }
	     ?> </p>
          </div>
        </div>
        <div><button class="btn btn-info" onclick="printPage()">print</button></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/js/scripts.js">
</script>
</body>
</html>