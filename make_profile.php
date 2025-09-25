<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
    :root{
  --bg:#fafafa;
  --card:#fff;
  --muted:#8e8e8e;
  --border:#dbdbdb;
  --accent:#0095f6; /* insta-like blue */
  --radius:8px;
  --maxw:600px;
  --gap:14px;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial;
}

/* page */
body{
  background: linear-gradient(180deg, #ffffff 0%, #fbfbfb 100%);
  display:flex;
  align-items:flex-start;
  justify-content:center;
  min-height:100vh;
  padding:40px 16px;
  color:#111;
  margin:0;
}

/* card */
.profile-card{
  width:100%;
  max-width:var(--maxw);
  background:var(--card);
  border-radius:12px;
  box-shadow: 0 6px 18px rgba(25,25,25,0.06);
  padding:22px;
  border:1px solid var(--border);
  box-sizing:border-box;
}

/* header */
.profile-card h2{
  margin:0 0 8px 0;
  font-size:18px;
  font-weight:600;
  color:#111;
}

/* small caption */
.profile-card .hint{
  color:var(--muted);
  font-size:13px;
  margin-bottom:14px;
}

/* avatar row (optional) */
.avatar-row{
  display:flex;
  gap:14px;
  align-items:center;
  margin-bottom:18px;
}

.avatar{
  width:72px;
  height:72px;
  border-radius:50%;
  background:linear-gradient(180deg,#f6f6f6,#efefef);
  border:1px solid var(--border);
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:600;
  color:var(--muted);
  overflow:hidden;
}

.avatar img{
  width:100%;
  height:100%;
  object-fit:cover;
}

/* form layout */
.user_data{
  display:grid;
  grid-template-columns: 1fr 1fr;
  gap:var(--gap);
  align-items:start;
}

/* Make the form single column on small screens */
@media (max-width:640px){
  .user_data{
    grid-template-columns: 1fr;
  }
}

/* labels */
.user_data label{
  display:block;
  font-size:13px;
  color:var(--muted);
  margin-bottom:6px;
}

/* inputs and selects */
.user_data input[type="text"],
.user_data input[type="email"],
.user_data input[type="number"],
.user_data input[type="password"],
.user_data select{
  width:100%;
  padding:10px 12px;
  border-radius:8px;
  border:1px solid var(--border);
  background:#fff;
  font-size:14px;
  box-sizing:border-box;
  outline:none;
  transition: box-shadow .12s, border-color .12s;
}

/* slightly larger fields that should span full width */
.user_data input[type="text"].full,
.user_data input[type="email"].full,
.user_data input[type="password"].full,
.user_data input[type="number"].full,
.user_data select.full{
  grid-column: 1 / -1;
}

/* focus state */
.user_data input:focus,
.user_data select:focus{
  border-color: rgba(0,149,246,0.9);
  box-shadow: 0 4px 12px rgba(0,149,246,0.08);
}

/* small helper text under inputs (if you want) */
.helper{
  font-size:12px;
  color:#9a9a9a;
  margin-top:6px;
}

/* divider to separate sections */
.divider{
  height:1px;
  background:var(--border);
  margin:10px 0 14px;
  grid-column: 1 / -1;
}

/* submit button full width on smaller devices, placed at bottom */
.user_data button[type="submit"]{
  grid-column: 1 / -1;
  padding:10px 14px;
  border-radius:10px;
  border:none;
  font-weight:600;
  font-size:15px;
  cursor:pointer;
  background: linear-gradient(90deg, var(--accent), #006edc);
  color:white;
  box-shadow: 0 6px 18px rgba(0,149,246,0.18);
  transition: transform .08s ease, box-shadow .08s ease, opacity .08s;
}

/* hover and active */
.user_data button[type="submit"]:hover{ transform: translateY(-1px); }
.user_data button[type="submit"]:active{ transform: translateY(0); opacity:.98; }

/* small secondary button style (if needed) */
.btn-secondary{
  background:transparent;
  color:var(--muted);
  border:1px solid var(--border);
}

/* small accessibility tweaks */
.user_data input[required]{
  box-shadow: none;
}

/* spacing tweaks for tidy layout */
.user_data .full + .full { margin-top:0; }

    </style>
</head>

<body>

    <div class="profile-card">
  <h2>Make Profile</h2>
  <p class="hint">Add profile details below.</p>

  

  <form class="user_data" method="post" action="">
    <!-- use "full" class on fields you want to span full width -->
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lname" required>

    <label for="uname">Username</label>
    <input type="text" id="uname" name="uname" required>

    <label for="bio" class="full">Bio</label>
    <input class="full" type="text" id="bio" name="bio" required>

    <label for="gender">Gender</label>
    <select name="gender" id="gender" required>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="age">Age</label>
    <input type="number" id="age" name="age" required>

    <label for="blood">Blood group</label>
    <input type="text" id="blood" name="blood" required>

    <label for="address" class="full">Address</label>
    <input class="full" type="text" id="address" name="address" required>

    <label for="password" class="full">Password</label>
    <input class="full" type="password" id="password" name="password" required>

    <button type="submit" name="btn">Complete</button>
  </form>
</div>

    <?php
    include 'connect.php';

    if (isset($_POST['btn'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $bio = $_POST['bio'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $blood = $_POST['blood'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        

        if ($fname == '' || $lname == '' || $uname == '' || $email == '' || $bio == '' || $age == '' || $gender == '' || $address == '' || $password == '' ) {
            echo "<script>alert('All fields are required');</script>";
        } else {
            $query = "INSERT INTO `users` (`f_name`, `l_name`, `u_name`, `gender`, `bio`, `email`, `age`, `blood`, `address`, `u_password`) 
                  VALUES ('$fname','$lname','$uname','$gender','$bio','$email','$age', '$blood','$address','$password')";
            $done = mysqli_query($connection, $query);

            if ($done) {
                echo '<div class="alert alert-primary alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x w-50" role="alert" style="z-index:1055;">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Success!</strong> Feedback submitted.
      </div>';
      
      header("Location: index.php");
            } else {
                echo "<script>alert('Error saving feedback');</script>";
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>