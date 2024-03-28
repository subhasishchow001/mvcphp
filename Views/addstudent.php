<?php require 'Views/base/header.php' ?>
<?php error_reporting(false); ?>

<div class="container mb-6">
	<h2 class="text-center mb-6">Student Register</h2>
  <div class="row justify-content-center mt-4">
    <div class="col-lg-7">
      <form class="row g-3" method="post" enctype="multipart/form-data" id="studentform">
      	<div class="col-lg-12" id="image-holder" style="min-width: 200px; min-height:150px;">
      		<img id="thumbnil" style="width:250px; height: 150px; margin-top:10px; border: 1px solid;" src="assets/exjs/img/OIP.jpg" alt="image"/>
      	</div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputEmail4" name="fname">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Gurdians Name</label>
          <input type="text" class="form-control" id="inputPassword4" name="fathername">
        </div>
         <div class="col-md-6">
          <label for="inputEmail4" class="form-label">email Id</label>
          <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Phone number</label>
          <input type="tel" class="form-control" id="inputPassword4" maxlength="10" name="phone">
        </div>
        <div class="col-md-6">
          <label for="inputAddress" class="form-label">Address</label>
          <textarea type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address"></textarea>
        </div>
          <div class="col-md-6">
          <label for="subjectcomb" class="form-label">Subject Combination</label>
          <textarea type="text" class="form-control" id="subjectcomb" placeholder="bengali, english" name="subject"></textarea>
        </div>
        <div class="col-md-6">
          <label for="inputAddress2" class="form-label">Date of Birth</label>
          <input type="date" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="date">
        </div>
         <div class="col-md-6">
          <label for="inputAddress2" class="form-label">photo</label>
          <input type="file" class="form-control" id="fileupload" placeholder="photo" accept="image/*" onchange="showMyImage(this)" name="fileupload">
        </div>
        <div class="col-md-4">
          <label for="inputCity" class="form-label">Class</label>
          <select id="inputCity" class="form-select" name="yid">
            <option value="0">Choose...</option>
            <option value="bsc">B.Sc</option>
            <option value="ba">B.A</option>
            <option value="ma">M.A</option>
            <option value="bed">B.ed</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">Year</label>
          <select id="inputState" class="form-select" name="yearselect">
            <option value="0">Choose...</option>
            <option value="<?= date("Y"); ?>"><?= date("Y"); ?></option>
    <!--         <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option> -->
          </select>
        </div>
        <div class="col-md-4">
          <input type="hidden" class="form-control" id="inputZip" value="<?= $_SESSION['user_data']->loginid ?>" default="<?= $_SESSION['user_data']->loginid ?>" name="addedby">
          <input type="hidden" class="form-control" id="inputZip" value="<?=date("Y-m-d") ?>" default="<?=date("Y-m-d") ?>" name="admissiondate">
        </div>
        <div class="col-12">
          <input type="submit" class="btn btn-primary" value="add Student" name="addstudent">
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

 function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
</script>


<?php require 'Views/base/footer.php' ?>