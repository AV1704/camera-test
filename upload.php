<?php
$data = json_decode(file_get_contents("php://input"), true);
if (!$data || !isset($data['image'])) {
  http_response_code(400);
  echo "No image data received.";
  exit;
}

$image = $data['image'];

// Remove the "data:image/png;base64," part
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);

$imgData = base64_decode($image);
$filename = 'captures/' . date('Ymd_His') . '.png';

if (!is_dir('captures')) {
  mkdir('captures', 0755, true);
}

file_put_contents($filename, $imgData);
echo "Image saved as $filename";
