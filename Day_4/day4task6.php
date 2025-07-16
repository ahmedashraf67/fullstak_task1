<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark py-5">

<div class="container">
    <h2 class="text-center text-primary mb-4"> Available Courses</h2>

    <div>
        <ul class="list-group">
            <?php
            
            $courses = ["HTML", "CSS", "JavaScript", "PHP"];
            $courses[] = "MySQL";

            array_unshift($courses, "Git");

            
            array_shift($courses);

            foreach ($courses as $course) {
                echo "<li class='list-group-item'>$course</li>";
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>
