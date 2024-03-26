<?php
$target_photo_dir = "uploads/photos/";
$target_video_dir = "uploads/videos/";

// Create directories if they don't exist
if (!file_exists($target_photo_dir)) {
    mkdir($target_photo_dir, 0777, true);
}

if (!file_exists($target_video_dir)) {
    mkdir($target_video_dir, 0777, true);
}

if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
    $file_name = basename($_FILES["fileToUpload"]["name"]);
    $target_photo_file = $target_photo_dir . $file_name;
    $target_video_file = $target_video_dir . $file_name;

    // Check if uploaded file is a photo
    $photo_ext = strtolower(pathinfo($target_photo_file, PATHINFO_EXTENSION));
    if (in_array($photo_ext, array("jpg", "jpeg", "png", "gif"))) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_photo_file)) {
            // Redirect back to the gallery page (index.php)
            header("Location: index.php");
            exit;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Check if uploaded file is a video
    $video_ext = strtolower(pathinfo($target_video_file, PATHINFO_EXTENSION));
    if (in_array($video_ext, array("mp4", "avi", "flv"))) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_video_file)) {
            // Redirect back to the gallery page (index.php)
            header("Location: index.php");
            exit;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
