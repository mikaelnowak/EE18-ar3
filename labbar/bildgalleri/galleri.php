<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bildgalleri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Ladda upp en fil</h1>
      <form action="#" method="POST" enctype="multipart/form-data">
          <label>Ange filnamn
          <input type="file" name="file">
          </label>
          <button type="submit" name="submit">Submit</button>
      </form>
      <?php
      // Ladda upp bilder till katalogen
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

                    $fileDestination = "./bilder/$fileNameNew";

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

      // Ange katalogen
      $katalog = "./bilder";

      echo "<h1>Bildgalleri</h1>";

      // Hämta katalogens innehåll
      $filer = scandir($katalog);
      
      // Loopa igenom alla funna filer
      foreach ($filer as $fil) {

          // Visa inte ”." och ”.."
          if ($fil == '.' || $fil == '..') {
              continue;
          }
          
          // Visa bara bilden om filformat ”.jpg”
          $info = pathinfo($fil);
          //var_dump($info);

          echo "<tabel>";

          if ($info["extension"] == "jpg" || $info["extension"] == "png" || $info["extension"] == "jpeg") {
            echo "<tr><td><img src=\"./bilder/$info[basename]\"></tr></td>";
          }

          echo "<tabel>";
      }
      ?>
    </div>
</body>
</html>