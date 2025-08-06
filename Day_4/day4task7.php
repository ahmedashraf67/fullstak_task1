<!DOCTYPE html>
<html>
<head>
    <title>Product Prices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark py-5">

<div class="container">
    <h2 class="text-danger mb-4">Products Price </h2>

    <div class="card p-4">
        <ul class="list-group">
            <?php
            
            $products = [
                "Monitor" => 1200,
                "chair" => 1000,
                "Headset" => 400,
                "Keyboard" => 6000,
                "Mouse" => 150
            ];

            
            arsort($products); 

           
            foreach ($products as $product => $price) {
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                        <strong>$product</strong>
                        <span class='badge bg-danger rounded-pill'>$price EGP</span>
                      </li>";
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>
