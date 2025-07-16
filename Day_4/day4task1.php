<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger py-5">

<div class="container">
    <h2 class="text-center text-white mb-4">Book Titles</h2>

    <ul class="list-group">
        <?php
      
        $books = [
            "Clean code",
            "Pragmatic programer",
            "Design patterns",
            "You dont know JS",
            "Eloquent javascript"
        ];

       
        foreach ($books as $book) {
            echo "<li class='list-group-item'>$book</li>";
        }
        ?>
    </ul>
</div>

</body>
</html>
