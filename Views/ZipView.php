<?php
require_once "header.php";
?>

<?php //include 'upload.php'; ?>
<div class="container mx-auto">
    <div class="row mt-5">
    	<div class="mx-auto">
    		<h4 class="col-12 text-center mb-5">Create Zip File of Multiple Uploaded Files </h4>
    		<div class="row-8 form-container">
            <?php 
            if(!empty($error)) {
            ?>
    			    <p class="error text-center"><?php echo $error; ?></p>
            <?php
            }
            ?>
            <!-- <?php
            if(!empty($success)) {
            ?>
    			    <p class="success text-center">
                Files uploaded successfully and compressed into a zip format
              </p>
              <p class="success text-center">
                <a href="uploads/<?php echo $success; ?>" target="__blank">Click here to download the zip file</a>
              </p>
	    	    <?php 
            }
            ?> -->
		    <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="formGroupExampleInput">Your Name</label>
            <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Recipient's Email Address</label>
            <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
          </div>
				  <div class="input-group mb-3">
						<!-- <div class="input-group-prepend">
						    <input type="submit" class="btn btn-primary" value="Upload">
						</div> -->
						<div class="custom-file">
						    <input type="file" class="custom-file-input" name="file[]" multiple>
						    <label class="custom-file-label" >Choose File</label>
						</div>
					</div>
          <button type="submit" class="btn btn-primary btn-block" name="sendForm">Submit</button>
				</form>
    		</div>
		</div>
	</div>
	</div>