<!DOCTYPE html>
<html>
<head>
    <title>Student Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark py-5">

<div class="container">
    <h2 class="text-center text-primary mb-5"> Students Table</h2>

    <?php
    
    $students = [
        ["name" => "Ali", "course" => "PHP", "grade" => "65%","Status" => "passed"],
        ["name" => "Sara", "course" => "HTML", "grade" => "48%","Status" => "Faild"],
        ["name" => "Mona", "course" => "CSS", "grade" => "75%","Status" => "passed"],
        ["name" => "Tarek", "course" => "JS", "grade" => "90%","Status" => "passed"],
    ];
    ?>

    <table class="table table-bordered  text-center align-middle">
        <thead class="bg-primary">
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $index => $student): ?>
                <tr class="<?= $student['grade'] < 50 ? 'table-danger' : 'table-success' ?>">
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['course'] ?></td>
                    <td><?= $student['grade'] ?></td>
                    <td><?= $student['Status'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#studentModal<?= $index ?>">
                            View
                        </button>
                    </td>
                </tr>

                
                <div class="modal fade" id="studentModal<?= $index ?>" tabindex="-1" aria-labelledby="studentModalLabel<?= $index ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="studentModalLabel<?= $index ?>">Student Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center ">
                                <p><strong>Name:</strong> <?= $student['name'] ?></p>
                                <p><strong>Course:</strong> <?= $student['course'] ?></p>
                                <p><strong>Grade:</strong> <?= $student['grade'] ?></p>
                                <p><strong>Status:</strong> <?= $student['Status'] ?></p>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
