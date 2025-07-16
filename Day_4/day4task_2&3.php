<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger py-5">

    <div class="container">
        <h2 class="text-center text-white mb-4"> Products</h2>

        <table class="table table-bordered  text-center">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Price (EGP)</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $products = [
                    ["name" => "Laptop", "price" => 15000, "quantity" => 5],
                    ["name" => "Headphones", "price" => 500, "quantity" => 15],
                    ["name" => "Smartphone", "price" => 8000, "quantity" => 8],
                ];

               
                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>{$product['name']}</td>";
                    echo "<td>{$product['price']}</td>";
                    echo "<td>{$product['quantity']}</td>";
                    echo "</tr>";
                }
                ?>

                
        <ul class="list-group">

            <?php
            
            $employee = [
                "Name" => "Ahmed Elgaml",
                "Job Title" => "Software Engineer",
                "Department" => "IT",
                "Salary" => "15,000 EGP"
            ];

            
            foreach ($employee as $key => $value) {
                echo "<li class='list-group-item'><strong>$key:</strong> $value</li>";
            }
            ?>
        </ul>
            </tbody>
        </table>
    </div>

</body>
</html>
