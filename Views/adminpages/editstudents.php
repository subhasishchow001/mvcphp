<?php require 'Views/base/header.php' ?>
<?php error_reporting(false); ?>
<div class="container mb-6">
	<h2 class="text-center mb-6">Update Student</h2>
  <div class="row justify-content-center mt-4">
    <div class="col-lg-7">
    	<?php foreach($editgets as $edit){?>
      <form class="row g-3" method="post" enctype="multipart/form-data" id="studentform">
      	<div class="col-lg-12" id="image-holder" style="min-width: 200px; min-height:150px;">
      		<img id="thumbnil" style="width:250px; height: 150px; margin-top:10px; border: 1px solid;" src="<?php echo 'uploads/'.str_replace(' ','',$edit->name).$edit->pic;?>" alt="image"/>
      	</div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputEmail4" name="efname" value="<?= $edit->name; ?>">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Gurdians Name</label>
          <input type="text" class="form-control" id="inputPassword4" name="efathername" value="<?= $edit->fathername; ?>">
        </div>
         <div class="col-md-6">
          <label for="inputEmail4" class="form-label">email Id</label>
          <input type="email" class="form-control" id="inputEmail4" name="eemail" value="<?= $edit->emailid; ?>">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Phone number</label>
          <input type="tel" class="form-control" id="inputPassword4" maxlength="10" name="ephone" value="<?= $edit->phone; ?>">
        </div>
        <div class="col-md-6">
          <label for="inputAddress" class="form-label">Address</label>
          <textarea type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="eaddress"><?= $edit->address; ?></textarea>
        </div>
          <div class="col-md-6">
          <label for="subjectcomb" class="form-label">Subject Combination</label>
          <textarea type="text" class="form-control" id="subjectcomb" placeholder="bengali, english" name="esubject" ><?= $edit->subject; ?></textarea>
        </div>
        <div class="col-md-6">
          <label for="inputAddress2" class="form-label">Date of Birth</label>
          <input type="date" class="form-control" id="inputAddress2" name="edate" value="<?= $edit->dob; ?>" >
        </div>
         <div class="col-md-6">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Class</label>
          <select id="inputCity" class="form-select" name="eyid">
            <option value="bsc" <?php if( $edit->class == 'bsc'){ echo "selected";}?>>B.Sc</option>
            <option value="ba" <?php if( $edit->class == 'ba'){ echo "selected";}?>>B.A</option>
            <option value="ma" <?php if( $edit->class == 'ma'){ echo "selected";}?>>M.A</option>
            <option value="bed" <?php if( $edit->class == 'bed'){ echo "selected";}?>>B.ed</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label">Admisson Year</label>
          <select id="inputState" class="form-select" name="eyearselect">
          	<?php 
          	$starting_year  =date('Y', strtotime('-10 year'));
   			$ending_year = date('Y', strtotime('+10 year'));
   			 for($starting_year; $starting_year <= $ending_year; $starting_year++) {
   			 	echo '<option value="'.$starting_year.'"';
			 	if( $starting_year ==  $edit->year ) {
           				 echo ' selected="selected"';
     				}	
     			 echo ' >'.$starting_year.'</option>';
  				} 		
			?>
          </select>
        </div>
    <?php } ?>
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="update Student" name="updatestudent">
        </div>
      </form>
    </div>
  </div>
</div>

<?php require 'Views/base/footer.php' ?>