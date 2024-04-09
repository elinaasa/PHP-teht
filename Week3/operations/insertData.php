<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
global $DBH;
require_once __DIR__ . '/../db/dbConnect.php';

require_once __DIR__ . '/../MediaProject/MediaItemDbOps.class.php';

$mediaItemDbOps = new MediaProject\MediaItemDbOps($DBH);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && isset($_POST['description']) && $_FILES['file'] !== null) {
        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];
        $temp_file = $_FILES['file']['tmp_name'];
        $destination = __DIR__ . '/../uploads/' . $filename;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/quicktime'];
        if (!in_array($filetype, $allowedTypes)) {
            header('Location: ../home.php?success=Invalid file type');
            exit;
        }
        // check file size
        $max_size = 1024 * 1024; // 1MB

        if ($filesize > $max_size) {
            echo "File too large";
            exit;
        }
        // double check that file does not contain php
        if (str_contains($filename, '.php')) {
            echo "Invalid file name";
            exit;
        }
        if (move_uploaded_file($temp_file, $destination)) {
            echo "File uploaded successfully";
        } else {
            echo "Error uploading file";
        }


        $data = [
            'user_id' => $_SESSION['user']['user_id'],
            'filename' => $filename,
            'media_type' => $filetype,
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'filesize' => $filesize,
        ];

        if ($mediaItemDbOps->insertMediaItem($data)) {
            header('Location: ../home.php?success=Item added');

        } else {
            header('Location: ../home.php?success=Item not added');
        }
    }
}
