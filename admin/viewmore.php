<?php
ob_start();
include '../connect.php';
?>
<?php

$id = $_GET['id'];
$rec = mysqli_query($connection,"select * from users where id = '$id'");
$r = mysqli_fetch_array($rec);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
       body {
  background-color: #f4f6f9;
  font-family: "Segoe UI", Arial, sans-serif;
  color: #333;
}

.content {
  display: flex;
  justify-content: center;
  align-items: flex-start;
}

.profile-card {
  background: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.08);
  max-width: 600px;
  width: 100%;
}

.profile-card h2 {
  margin-bottom: 8px;
  font-size: 1.6rem;
  font-weight: 600;
}

.profile-card .hint {
  color: #6c757d;
  font-size: 0.95rem;
  margin-bottom: 20px;
}

.user_data label {
  display: block;
  margin-bottom: 6px;
  font-weight: 500;
  color: #444;
}

.user_data input,
.user_data select {
  width: 100%;
  padding: 10px 12px;
  margin-bottom: 18px;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 0.95rem;
  transition: border-color 0.2s, box-shadow 0.2s;
}

.user_data input:focus,
.user_data select:focus {
  outline: none;
  border-color: #0d6efd;
  box-shadow: 0 0 0 3px rgba(13,110,253,0.15);
}

.user_data .full {
  width: 100%;
}

@media (max-width: 576px) {
  .profile-card {
    padding: 20px;
  }
  .profile-card h2 {
    font-size: 1.3rem;
  }
}

    </style>
</head>

<body>
  
<div class=" content container mt-4">
    <div class="profile-card">
  <h2>view Profile</h2>
  <p class="hint"> profile details below.</p>

  

  <form class="user_data" method="post" action="">

  <label for="fname">First Name</label>
  <input type="text" id="fname" name="fname" value="<?php echo $r['f_name']; ?>">

  <!-- Last Name -->
  <label for="lname">Last Name</label>
  <input type="text" id="lname" name="lname" value="<?php echo $r['l_name']; ?>">

  <!-- Username -->
  <label for="uname">Username</label>
  <input type="text" id="uname" name="uname" value="<?php echo $r['u_name']; ?>">

  <!-- Bio -->
  <label for="bio" class="full">Bio</label>
  <input class="full" type="text" id="bio" name="bio" value="<?php echo $r['bio']; ?>">

  <!-- Gender -->
  <label for="gender">Gender</label>
  <select name="gender" id="gender">
    <option value="male"   <?php if($r['gender']=="male") echo "selected"; ?>>Male</option>
    <option value="female" <?php if($r['gender']=="female") echo "selected"; ?>>Female</option>
    <option value="other"  <?php if($r['gender']=="other") echo "selected"; ?>>Other</option>
  </select>

  <!-- Email -->
  <label for="email">Email</label>
  <input type="email" id="email" name="email" value="<?php echo $r['email']; ?>">

  <!-- Age -->
  <label for="age">Age</label>
  <input type="number" id="age" name="age" value="<?php echo $r['age']; ?>">

  <!-- Blood -->
  <label for="blood">Blood group</label>
  <input type="text" id="blood" name="blood" value="<?php echo $r['blood']; ?>">

  <!-- Address -->
  <label for="address" class="full">Address</label>
  <input class="full" type="text" id="address" name="address" value="<?php echo $r['address']; ?>">

  <!-- Password -->
  <label for="password" class="full">Password</label>
  <input class="full" type="password" id="password" name="u_password" value="<?php echo $r['u_password']; ?>">
<a href="user.php" class="btn btn-primary d-block mx-auto w-100">
  Back to user page
</a>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>