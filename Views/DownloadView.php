<?php
require_once "header.php";
session_start();
?>

<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 mx-auto mt-5">
      <div class="card card-body bg-light">
        <h1>Files received</h1>
        <?php var_dump($name); ?>
        <p>User <?php echo $_SESSION['username']; ?> sent you a zipped file. Click here to download it
        <a href="uploads/<?php echo $zipPath; ?>" target = "_self">Download</a></p>
      </div>
    </div>
  </div>
</div>

<?php
require_once "footer.php";
?>