<?php
session_start();
if (!isset($_SESSION['logged_in_user'])) {
    header("Location: login.php");
    exit;
}

$log_file = "logs/uploads.log";
$log_entries = [];

if (file_exists($log_file)) {
    $lines = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {


        preg_match('/\[(.*?)\] Username: (.*?) \| Type: (.*?) \| Path: (.*?) \| MIME: (.*)/', $line, $matches);
        if (count($matches) === 6) {
            $log_entries[] = [
                'date' => $matches[1],
                'user' => $matches[2],
                'type' => $matches[3],
                'path' => $matches[4],
                'mime' => $matches[5]
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <div class="card p-4 bg-secondary">
        <h2 class="mb-4">Image Upload Log</h2>

        <?php if (count($log_entries) > 0): ?>
        <table class="table table-dark table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>User</th>
                    <th>Type</th>
                    <th>Path</th>
                    <th>MIME</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($log_entries as $entry): ?>
                    <tr>
                        <td><?= htmlspecialchars($entry['date']) ?></td>
                        <td><?= htmlspecialchars($entry['user']) ?></td>
                        <td><?= htmlspecialchars($entry['type']) ?></td>
                        <td><?= htmlspecialchars($entry['path']) ?></td>
                        <td><?= htmlspecialchars($entry['mime']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <div class="alert alert-warning text-center">No image upload logs found.</div>
        <?php endif; ?>

        <div class="mt-4">
            <a href="dashboard.php" class="text-white">Back to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
 