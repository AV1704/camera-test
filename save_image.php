<?php
$data = json_decode(file_get_contents("php://input"), true);
if (!$data || !isset($data['image'])) {
    http_response_code(400);
    exit("Invalid image data.");
}

$imageData = $data['image'];
$imageData = str_replace('data:image/png;base64,', '', $imageData);
$imageData = str_replace(' ', '+', $imageData);
$image = base64_decode($imageData);

$filename = 'photos/' . date('Ymd_His') . '.png';
file_put_contents($filename, $image);
echo "Saved";
