<?php include_once('../includes/header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Cancelled</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-danger bg-opacity-10">

  <div class="py-5 container">
    <div class="justify-content-center row">
      <div class="col-md-6">

        <div class="shadow-sm p-4 rounded text-center alert alert-danger">
          <h2 class="mb-3">❌ Payment Cancelled</h2>
          <p class="lead">You cancelled the payment. No charge has been made.</p>
          <a href="<?= APPURL ?>/products/pay.php" class="mt-3 btn btn-danger">Try Again</a>
        </div>

      </div>
    </div>
  </div>

</body>
</html>
