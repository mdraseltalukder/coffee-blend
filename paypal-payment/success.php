<?php
$name = $_GET['name'] ?? 'Customer';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>
</head>
<body>
    <h1>✅ Payment Successful</h1>
    <p>Thanks, <?php echo htmlspecialchars($name); ?>. Your payment has been processed.</p>
</body>
</html>
