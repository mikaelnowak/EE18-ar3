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
        <h1>Ladda upp en fil</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label>Ange filnamn
            <input type="file" name="file">
            </label>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>