<?php
ob_start();
session_start();
require_once('env.php');
require_once('Models/Zip.php');

$title = "Zip/send Files";

$options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass, $options);

if (isset($_POST['sendForm'])) {
  if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['senderEmail'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $senderEmail = $_POST['senderEmail'];

    if ($_FILES && $_FILES['file']) {

      if (!empty($_FILES['file']['name'][0])) {
        // echo $_FILES['file']['name'][0];

        $zip = new ZipArchive();
        $zip_name = getcwd() . "/uploads/upload_" . time() . ".zip";
        echo $zip_name;

        // Create a zip target
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
          $error .= "Sorry ZIP creation is not working currently.<br/>";
        }

        $fileCount = count($_FILES['file']['name']);
        for ($i = 0; $i < $fileCount; $i++) {

          if ($_FILES['file']['tmp_name'][$i] == '') {
            continue;
          }
          // $newname = date('YmdHis', time()) . mt_rand() . '.jpg';

          // Moving files to zip.
          $zip->addFromString($_FILES['file']['name'][$i], file_get_contents($_FILES['file']['tmp_name'][$i]));

          // moving files to the target folder.
          // move_uploaded_file($_FILES['file']['tmp_name'][$i], './uploads/' . $newname);
        }
        $zip->close();

        // Create HTML Link option to download zip
        $success = basename($zip_name); // basename returns filename from the specified path
        $uniqueId = mt_rand(100000, 999999);
        insertIntoDB($name, $email, $success, $uniqueId);

        // $emailMessage = '<a href="/download&id=' . $uniqueId . '">Click here to get to the download page: </a>';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $from = $senderEmail;

        // Create email headers
        $headers .= 'From: ' . $from . "\r\n" .
          'Reply-To: ' . $from . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $emailMessage = '<html><body>';
        $emailMessage .= '<h1 style="color:#f40;">Zipped file sent</h1>';
        $emailMessage .= 'Click here to get to the download page: <a href="' . $base_url . '/download&id=' . $uniqueId . '">Link</a>';
        $emailMessage .= '</body></html>';

        mail($email, 'Vous avez recu un fichier zip', $emailMessage, $headers);

        $_SESSION['email'] = $email;
        $_SESSION['username'] = $name;
        // var_dump($base_url, $uniqueId);
        header("Location: messageSent");
      } else {
        $error = '<strong>Error!! </strong> Please select a file.';
      }
    }
  } else {
    $error = "Tous les champs doivent être rempli !";
  }
}

require_once('Views/ZipView.php');