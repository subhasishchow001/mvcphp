<?php require 'Views/base/header.php'; ?>
<?php error_reporting(false); ?>
<div class="container-fluid">
	<h1 class="text-center mb-6">Payment</h1>
	<div class="row">
		<div class="col-md-6">	
			<select id="AttorneyEmpresa" class="form-select">
				<?php 
					foreach ($studentdatas as $studentname) {
						?>
						<option value="<?= $studentname->id," ".  $studentname->name," ".$studentname->pic;  ?>"><?= $studentname->name; ?></option>
						<?php
					}
				?>
				
			</select>



			<div class="col-md-6" id="paymetu"><image src="uploads" id="studentimage1"></div>
		</div>
		<form method="post" class="row mt-6" style="display: flex;">
			<div class="col-lg-3">
				<div class="form-floating">
					<lebel for='studentname'> Student Name</lebel>
					<input type="text" name="studentname" id="studentname" disabled class="form-control">
					<input type="hidden" name="userid" value="" id="numericValueInput">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
					<lebel for="paymentdate">Payment Date</lebel>
					<input type="date" name="paymentdate" value="<?= date('Y-m-d')?>" default="<?= date('Y-m-d') ?>" id="paymentdate" class="form-control">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
				<lebel for="selectSem">Select Semester</lebel>
					<select id="selectSem" class="form-select" name="selectsem">
					<option value="1st">First Sem</option>
					<option value="2nd">Secoend Sem</option>
					<option value="3rd">Third Sem</option>
					<option value="4th">Fourth Sem</option>
					<option value="5th">Fifth Sem</option>
					<option value="6th">Sixth Sem</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
					<lebel for="rupees">Rupees</lebel>
					<input type="tel" name="rupees" id="rupees" class="form-control">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
					<lebel for="paytpe">Payment Type </lebel>
						<select class="form-select" name="paymenttype">
							<option value="cash">Cash</option>
							<option value="online">Online</option>
						</select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
				<lebel for="totalpay">payment</lebel>
					<select class="form-select" name="paymentcount">
						<option value="partial">Partial</option>
						<option value="full">Full</option>
					</select>
				</div>
				<input type="hidden" name="recivedby" value="<?= $_SESSION['user_data']->loginid ?>" default="<?= $_SESSION['user_data']->loginid ?>">
			</div>
	<!-- 		<div class="row mt-4">
				<div class="container"></div>
			</div> -->
			<div class="row mt-4">
				<div class="col-lg-12 text-center">
					<input type="submit" name="generate" value="generate" class="btn btn-primary text-center" onclick="printButton()">
				</div>
			</div>
		</form>
	</div>
</div>




<?php require 'Views/base/footer.php' ?>