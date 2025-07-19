<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">information about script</h4>
        </div>
        <div class="card-body">
            <?php
                $script_name = $_SERVER['SCRIPT_NAME'];          
                $user_ip = $_SERVER['REMOTE_ADDR'];               
                $user_browser = $_SERVER['HTTP_USER_AGENT'];      
                $script_type = pathinfo($script_name, PATHINFO_EXTENSION); 
            ?>
            <ul class="list-group">
                <li class="list-group-item"><strong>script name :</strong> <?php echo $script_name; ?></li>
                <li class="list-group-item"><strong>user ip :</strong> <?php echo $user_ip; ?></li>
                <li class="list-group-item"><strong>browser type :</strong> <?php echo $user_browser; ?></li>
                <li class="list-group-item"><strong>script type :</strong> <?php echo $script_type; ?></li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
