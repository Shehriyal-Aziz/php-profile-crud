<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feedback</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(180deg, #ffffff 0%, #fbfbfb 100%);
      min-height: 100vh;

      color: #111;
      margin: 0;
    }

    .page-content {
      display: flex;
      align-items: flex-start;
      justify-content: center;


    }

    .feedback-card {
      width: 100%;
      max-width: 600px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(25, 25, 25, 0.06);
      padding: 22px;
      border: 1px solid #ddd;
      box-sizing: border-box;

    }

    .feedback-card h2 {
      margin: 0 0 10px 0;
      font-size: 20px;
      font-weight: 600;
      color: #111;
    }

    .feedback-card .hint {
      color: #6c757d;
      font-size: 14px;
      margin-bottom: 16px;
    }
  </style>
</head>

<body>

  <!-- Navbar include -->
  <?php include('nav.php'); ?>

  <div class="page-content mt-4">
    <div class="feedback-card">
      <h2>Feedback</h2>
      <p class="hint">We’d love to hear your thoughts.</p>

      <form method="POST" action="feedback.php">
        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label text-secondary">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label text-secondary">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Rating -->
        <div class="mb-3">
          <label class="form-label text-secondary">Rating</label>
          <select class="form-select" name="rating" required>
            <option value="">Select...</option>
            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
            <option value="4">⭐⭐⭐⭐ Good</option>
            <option value="3">⭐⭐⭐ Average</option>
            <option value="2">⭐⭐ Poor</option>
            <option value="1">⭐ Very Bad</option>
          </select>
        </div>

        <!-- Message -->
        <div class="mb-3">
          <label for="message" class="form-label text-secondary">Your Feedback</label>
          <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>

        <!-- Submit -->
        <div class="d-grid">
          <button type="submit" name="fsubmit" class="btn btn-info text-white">Submit Feedback</button>
        </div>
      </form>

      <?php
      include('connect.php');


      if (isset($_POST['fsubmit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $message = $_POST['message'];

        if ($name == '' || $email == '' || $rating == '' || $message == '') {
          echo 'plz fill all feids';
        } else {
          $query = "INSERT INTO `feedback` (f_name, f_email, rating, f_message) 
                  VALUES ('$name', '$email', '$rating', '$message')";
          $q = mysqli_query($connection, $query);

          if ($q) {
            echo "<script>
                         alert('Saved!');
                         window.location.href = 'index.php';
                        </script>";;
          } else {
            echo "<script>alert('Error saving feedback');</script>";
          }
        }
      }




      ?>

    </div>
  </div>

   <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>