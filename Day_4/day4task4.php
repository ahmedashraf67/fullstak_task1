<!DOCTYPE html>
<html>
<head>
    <title>High Salary Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success py-5">

    <div class="container">
        <h2 class="text-center text-white mb-4"> High Salary Employees</h2>

        <table class="table table-bordered  text-center">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Salary (EGP)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $employees = [
                    ["name" => "Ahmed", "department" => "IT", "salary" => 15000],
                    ["name" => "Ali", "department" => "HR", "salary" => 7000],
                    ["name" => "Mona", "department" => "Marketing", "salary" => 9000],
                ];

               
                foreach ($employees as $emp) {
                    if ($emp['salary'] > 8000) {
                        echo "<tr>";
                        echo "<td>{$emp['name']}</td>";
                        echo "<td>{$emp['department']}</td>";
                        echo "<td>{$emp['salary']}</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
