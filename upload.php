<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $targetDir = "uploads/";
    
    // Make sure uploads folder exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $filename = 'capture_' . date("Ymd_His") . '.jpg';
    $targetFile = $targetDir . basename($filename);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo "Success";
    } else {
        http_response_code(500);
        echo "Failed to save file.";
    }
} else {
    http_response_code(400);
    echo "No image received.";
}
?>
