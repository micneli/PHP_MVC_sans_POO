<?php
include('header.php');
session_start();
// var_dump($_SESSION, $_SESSION['email']);
?>
<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 mx-auto mt-5">
      <div class="card card-body bg-light">
        <h1>Message sent</h1>
        <p>A zipped file has been sent to the following email address: <?php echo $_SESSION['email']; ?></p>
      </div>
    </div>
  </div>
</div>
