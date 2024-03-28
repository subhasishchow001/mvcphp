<?php require 'Views/base/header.php';?>
<div class="container-fluid">
	<h1 class="text-center mb-6">Edit Payment</h1>
	<div class="row">
		<form method="post" class="row mt-6" style="display: flex;">
		<?php foreach($billdat as $details){
			?>
			<div class="col-lg-3">
				<div class="form-floating">
					<lebel for="paymentdate">Payment Date</lebel>
					<input type="date" name="paymentdate" value="<?= $details->paymentdate?>" id="paymentdate" class="form-control" disabled>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
				<lebel for="selectSem">Select Semester</lebel>
					<select id="selectSem" class="form-select" name="selectsem">
					<option value="1st" <?php if( $details->semester == '1st'){ echo "selected";}?>>First Sem</option>
					<option value="2nd" <?php if( $details->semester == '2nd'){ echo "selected";}?>>Secoend Sem</option>
					<option value="3rd" <?php if( $details->semester == '3rd'){ echo "selected";}?>>Third Sem</option>
					<option value="4th" <?php if( $details->semester == '4th'){ echo "selected";}?>>Fourth Sem</option>
					<option value="5th" <?php if( $details->semester == '5th'){ echo "selected";}?>>Fifth Sem</option>
					<option value="6th" <?php if( $details->semester == '6th'){ echo "selected";}?>>Sixth Sem</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
					<lebel for="rupees">Rupees</lebel>
					<input type="tel" name="uprupees" id="rupees" class="form-control" value="<?= $details->rupees?>">
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
					<lebel for="paytpe">Payment Type </lebel>
						<select class="form-select" name="paymenttype">
							<option value="cash" <?php if($details->paymenttype == 'cash'){ echo 'selected';}?>>Cash</option>
							<option value="online" <?php if($details->paymenttype == 'online'){ echo 'selected';}?>>Online</option>
						</select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-floating">
				<lebel for="totalpay">payment</lebel>
					<select class="form-select" name="paymentcount">
						<option value="partial" <?php if($details->paymentcount == 'partial'){ echo 'selected';}?>>Partial</option>
						<option value="full" <?php if($details->paymentcount == 'full'){ echo 'selected';}?>>Full</option>
					</select>
				</div>
			<?php }?>
			</div>
	<!-- 		<div class="row mt-4">
				<div class="container"></div>
			</div> -->
			<div class="row mt-4">
				<div class="col-lg-12 text-center">
					<input type="submit" name="updatedata" value="update" class="btn btn-primary text-center">
				</div>
			</div>
		</form>
	</div>
</div>


<?php require 'Views/base/footer.php';?>