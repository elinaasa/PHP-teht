<?php

global $DBH;
require_once 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = 'UPDATE MediaItems SET title = :title, description = :description WHERE media_id = :media_id';

    $data = [
        'media_id' => $_POST['media_id'],
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];

    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        header('Location: index.php?success=Data modified successfully.');
    } catch (PDOException $e) {
        echo "Could not update data from the database." . $e->getMessage();
        file_put_contents('PDOErrors.txt', 'modifyData.php - ' . $e->getMessage(), FILE_APPEND);
        exit;
    }
} else {
    echo 'Invalid request';
    exit;
}