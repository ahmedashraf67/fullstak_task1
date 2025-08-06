<!DOCTYPE html>
<html>
<head>
    <title>Array Functions Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger py-5">

    <div class="container">

        <div class="card p-4">
            <?php
            
            $developers_tools = ["Vs code", "Figma", "Githup", "Git", "postman"];

            
            echo "<p><strong>Total elements:</strong> " . count($developers_tools ) . "</p>";

            
            $tool = "Git";
            if (in_array($tool, $developers_tools )) {
                echo "<p><strong>'$tool'</strong> is found in the array </p>";
            } else {
                echo "<p><strong>'$tool'</strong> is NOT found in the array </p>";
            }

            $values = array_values($developers_tools );

            echo "<p><strong>All elements:</strong></p>";
            echo "<ul class='list-group'>";
            foreach ($values as $value) {
                echo "<li class='list-group-item'>$value</li>";
            }
            echo "</ul>";
            ?>
        </div>
    </div>

</body>
</html>
