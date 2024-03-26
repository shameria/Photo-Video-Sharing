<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo & Video Sharing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>_Sha˚mE1₊ra✧ 🗑̅̅̅</h1>
    </header>
    <main>
        <div class="upload-section">
            <h2>Upload Photos and Videos</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload" name="submit">
            </form>
        </div>
        <div class="gallery-section">
            <h2>Gallery</h2>
            <div class="gallery">
                <?php
                // Display uploaded photos
                $photo_files = glob('uploads/photos/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                foreach ($photo_files as $photo_file) {
                    echo '<img src="' . $photo_file . '" alt="Photo">';
                }

                // Display uploaded videos
                $video_files = glob('uploads/videos/*.{mp4,avi,flv}', GLOB_BRACE);
                foreach ($video_files as $video_file) {
                    echo '<video controls><source src="' . $video_file . '" type="video/mp4">Your browser does not support the video tag.</video>';
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>