<?php
header('Content-Type: application/json');

// MATIKAN OUTPUT ERROR KE BROWSER
ini_set('display_errors', 0);
error_reporting(0);

$uploadDir = __DIR__ . '/../uploads/berita/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (!isset($_FILES['file'])) {
    echo json_encode(['error' => 'No file']);
    exit;
}

$file = $_FILES['file'];

if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['error' => 'Upload failed']);
    exit;
}

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','webp'];

if (!in_array($ext, $allowed)) {
    echo json_encode(['error' => 'Invalid file']);
    exit;
}

$filename = uniqid('berita_') . '.' . $ext;

if (!move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
    echo json_encode(['error' => 'Cannot move file']);
    exit;
}

echo json_encode([
    'location' => '/pdmbanjarbaru/admin/uploads/berita/' . $filename
]);
