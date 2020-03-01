<?php
require_once "header.php";
session_start();
?>

<table>
  <thead>
    <th>Nom</th>
    <th>Telechargement</th>
  </thead>
  <tbody>
    <tr>
    <td><?php echo $_SESSION['username']; ?></td>
    <!-- <td><a href="<?php echo "Uploads/$zipPath"; ?>" download>Telecharger</a></td> -->
    <td><a href="uploads/<?php echo $zipPath; ?>" target = "__self">Telecharger</a></td>
    </tr>
  </tbody>
</table>

<?php
require_once "footer.php";
?>