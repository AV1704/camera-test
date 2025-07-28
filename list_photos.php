<!DOCTYPE html>
<html>
<head>
  <title>Captured Photos</title>
</head>
<body>
  <h2>Captured Images</h2>
  <?php
    $dir = "photos";

    // Check if directory exists
    if (!is_dir($dir)) {
      echo "<p>No 'photos' directory found.</p>";
      exit;
    }

    // Get all PNG files in the directory
    $files = glob($dir . "/*.png");

    if (count($files) === 0) {
      echo "<p>No images found.</p>";
    } else {
      echo "<ul>";
      foreach ($files as $file) {
        $filename = basename($file);
        echo "<li>";
        echo "<img src='$dir/$filename' style='width:200px;margin:10px;border:1px solid #ccc;'><br>";
        echo "<a href='$dir/$filename' download>Download</a> | ";
        echo "<a href='$dir/$filename' target='_blank'>Open</a>";
        echo "</li>";
      }
      echo "</ul>";
    }
  ?>
</body>
</html>
