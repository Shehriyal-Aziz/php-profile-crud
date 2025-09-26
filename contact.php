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
                <button type="submit" name="csubmit" class="btn btn-info text-white">
                  Send Message
                </button>
              </div>
            </form>

            <?php
            include('connect.php');


            if (isset($_POST['csubmit'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];
              $message = $_POST['message'];

              if ($name == '' || $email == '' || $message == '') {
                echo 'plz fill all feids';
              } else {
                $query = "INSERT INTO `contact` (c_name, c_email, c_message) 
                  VALUES ('$name', '$email', '$message')";
                $q = mysqli_query($connection, $query);

                if ($q) {
                  echo "<script>
                         alert('Saved!');
                         window.location.href = 'index.php';
                        </script>";
                } else {
                  echo "<script>alert('Error ');</script>";
                }
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