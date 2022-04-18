<?php
$carpetaArchivos = $_GET['carpetaArchivos'];
if(isset($_REQUEST["file"])){
    // Get parameters
    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
    /* Check if the file name includes illegal characters
    like "../" using the regular expression */
    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
        $filepath = $carpetaArchivos . $file;
        echo $filepath;

        // Process download
        if(file_exists($filepath)) {
            header('Location: '.$filepath.'');
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=".basename($filepath));
            header("Content-Transfer-Encoding: binary");
            header('Expires: 0');
            header('Pragma: no-cache');
            readfile($filepath);
            die();
        } else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid file name!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>