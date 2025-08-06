<!DOCTYPE html>
<html>
<head>
    <title>High Salary Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark py-5">

<div class="container">
    <h2 class="text-success mb-4"> High Salary Employees</h2>

    <?php
    
    $employees = [
        "Ali" => 4500,
        "Tarek" => 7000,
        "Mona" => 6000,
        "Ziad" => 8000,
     
    ];

    
    $highSalary = array_filter($employees, function($salary) {
        return $salary > 5000;
    });
    ?>

    
    <div class="row mb-5">
        <div class="col">
            
            <ul class="list-group">
                <?php
                foreach ($highSalary as $name => $salary) {
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                            <strong>$name</strong>
                            <span class='badge bg-success rounded-pill'>$salary EGP</span>
                          </li>";
                }
                ?>
            </ul>
        </div>
    </div>

   
    <div class="row">
        <div class="col">
            <h4 class="text-white"> Table View</h4>
            <table class="table table-bordered text-white " >
                <thead class="table-dark">
                    <tr>
                        <th>Employee Name</th>
                        <th>Salary (EGP)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($highSalary as $name => $salary) {
                        echo "<tr>
                                <td>$name</td>
                                <td>$salary</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
