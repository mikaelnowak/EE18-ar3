<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <?php
    if (isset($_POST["submit"])) {
        $file = $_FILES["file"];
        var_dump($file);

        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileType = $file["type"];
        $fileTmpName = $file["tmp_name"];
        $fileError = $file["error"];

        //allowed file exentsion

        $allowed = [ "png","gif","jpeg"];
        $fileType = explode("/", $fileType);

        if (in_array($fileType[1], $allowed)) {
                if ($error !== 0) {
                    if ($fileSize <= 500000) {
                        $fileNameNew = uniqid('', true).".$imageType";

                        $fileDestination = "./uppladdat/$fileNameNew";

                        move_uploaded_file($fileTempName, $fileDestination);
                    } else {
                        echo "<p>The file is to large</p>";
                    }
                } else {
                    echo "<p>Something went wrong</p>";
                }
                
            } else {
                echo "<p>File types jpeg, png and gif are only allowed</p>";
            }
        }
        ?>
    </div>
</body>
</html>