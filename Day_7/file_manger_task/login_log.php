<?php
session_start();
if (!isset($_SESSION['logged_in_user'])) {
    header("Location: login.php");
    exit;
}

$log_file = "logs/login.log";
$log_entries = [];

if (file_exists($log_file)) {
    $lines = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        
        $parts = explode("] Username: ", $line);
        if (count($parts) == 2) {
            $date = trim(str_replace("[", "", $parts[0]));

            $rest = explode(" | Status: ", $parts[1]);
            if (count($rest) == 2) {
                $user = trim($rest[0]);
                $status = trim($rest[1]);

                $log_entries[] = [
                    'date' => $date,
                    'user' => $user,
                    'status' => $status
                ];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <div class="card p-4 bg-secondary">
        <h2 class="mb-4">Login Attempts Log</h2>

        <?php if (count($log_entries) > 0): ?>
        <table class="table table-dark table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>User</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($log_entries as $entry): ?>
                    <tr>
                        <td><?= htmlspecialchars($entry['date']) ?></td>
                        <td><?= htmlspecialchars($entry['user']) ?></td>
                        <td>
                            <?php if ($entry['status'] === 'success'): ?>
                                <span class="badge bg-success">Success</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Fail</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <div class="alert alert-warning text-center">No login attempts found.</div>
        <?php endif; ?>

        <div class="mt-4">
            <a href="dashboard.php" class="text-white">Back to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
