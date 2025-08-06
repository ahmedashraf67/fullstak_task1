<!DOCTYPE html>
<html>
<head>
    <title>Server Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger py-5">

<div class="container test-white">
   <p> <strong>Server Name:</strong> <?php echo $_SERVER['SERVER_NAME']; ?></p>
       
   <p> <strong>Server Address:</strong> <?php echo $_SERVER['SERVER_ADDR']; ?> </p>    
</div>
</body>
</html>
