
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
    include('nav.php')
    ?>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card shadow-lg border-0 rounded-3">
          <div class="card-header bg-info text-white text-center">
            <h4>Contact Us</h4>
          </div>
          <div class="card-body bg-light">
            <form action="contact.php" method="POST">
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

              <!-- Message -->
              <div class="mb-3">
                <label for="message" class="form-label text-secondary">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
              </div>

              <!-- Submit -->
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-info text-white">
                  Send Message
                </button>
              </div>
            </form>

            <?php
            // Simple PHP form handler
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $name = htmlspecialchars($_POST['name']);
              $email = htmlspecialchars($_POST['email']);
              $message = htmlspecialchars($_POST['message']);

              if (!empty($name) && !empty($email) && !empty($message)) {
                  echo '<div class="alert alert-success mt-3">Thank you, '. $name .'! Your message has been received.</div>';
                  
                  // Example: save to database OR send mail
                  // mail("yourmail@example.com", "New Contact Message", $message, "From: $email");
              } else {
                  echo '<div class="alert alert-danger mt-3">Please fill in all fields.</div>';
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
