<?php 
    include "./resurser/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    if ($id) {
        
        // 2. Ställ en SQL-fråga
        $sql = "SELECT * FROM blogg WHERE id='$id'";
        $result = $conn->query($sql);
    
        // Gick det bra?
        if (!$result) {
            die("Något blev fel med SQL-satsen.");
        }
    
        // 3. Ta emot svaret och bearbeta det
        $rad = $result->fetch_assoc();
    ?>
        <form action="#" method="post">
            <label>Title <input type="text" name="title" value="<?php echo $rad['title'] ?>" required></label>
            <label>Content <textarea name="content" required><?php echo $rad['content'] ?></textarea></label>
            <button class="btn btn-primary">Uppdatera inlägg</button>
        </form>
    <?php
    }
    // Ta emot text från formuläret och spara ned i en textfil.
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    
    if ($title && $content) {
    
        // 2. Registrera inlägget i tabellen
        $sql = "UPDATE blogg SET title='$title', content='$content' WHERE id='$id'";
        $result = $conn->query($sql);
    
        // Gick det bra?
        if (!$result) {
            die("Något blev fel med SQL-satsen.");
        } else {
            echo "<p class=\"alert alert-success\">Inläggets har uppdaterats.</p>";
        }
    
        // 3. Stäng ned anslutningen
        $conn->close();
    }
    ?>
</body>
</html>