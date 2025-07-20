<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text Analyzer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2 class="mb-4">Text Analyzer</h2>

    <form method="post">
        <div class="mb-3">
            <label for="text" class="form-label">Enter your text:</label>
            <textarea name="text" id="text" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $text = $_POST['text'];

        echo "<hr>";

        echo "<label>Original Text:</label><br>";
        echo "<div>" . htmlspecialchars($text) . "</div><br>";

        echo "<label>Length:</label><br>";
        echo "<div>" . strlen($text) . " characters</div><br>";

        $cleaned = str_replace("bad", "***", $text);
        echo "<label>Replaced 'bad' with '***':</label><br>";
        echo "<div>" . htmlspecialchars($cleaned) . "</div><br>";

        echo "<label>First 10 characters:</label><br>";
        echo "<div>" . htmlspecialchars(substr($text, 0, 10)) . "</div><br>";

        echo "<label>Ucfirst:</label><br>";
        echo "<div>" . htmlspecialchars(ucfirst($text)) . "</div><br>";

        echo "<label>Uppercase:</label><br>";
        echo "<div>" . htmlspecialchars(strtoupper($text)) . "</div><br>";
    }
    ?>
</div>

</body>
</html>
