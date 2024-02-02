<?php
if (isset($_GET['file'])) {
    $filePath = $_GET['file'];

    // Validate the file path to prevent directory traversal
    if (strpos($filePath, "stored_files/") === 0 && file_exists($filePath)) {
        // Set the appropriate Content-Type header based on the file extension
        $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $contentType = "";
        switch ($fileExtension) {
            case 'pdf':
                $contentType = 'application/pdf';
                break;
            case 'jpg':
            case 'jpeg':
                $contentType = 'image/jpeg';
                break;
            case 'png':
                $contentType = 'image/png';
                break;
            default:
                $contentType = 'application/octet-stream';
                break;
        }

        // Set the Content-Type header
        header('Content-Type: ' . $contentType);

        // Output the file content
        readfile($filePath);
    } else {
        echo "Invalid file path.";
    }
} else {
    echo "File path not specified.";
}
?>
