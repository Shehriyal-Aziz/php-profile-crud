<?php
ob_start();
include('../connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        /* ===== NAVBAR ===== */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #333;
            color: white;
            padding: 10px 20px;
            z-index: 1;
        }

        .navbar .brand {
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .links a {
            margin-left: 15px;
            text-decoration: none;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .navbar .links a:hover {
            background: #555;
        }

        /* ===== SIDEBAR ===== */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #333;
            margin: 10px;
        }

        .sidebar {
            position: fixed;
            top: 50px;
            left: 0px;
            /* hidden by default */
            width: 250px;
            height: 85%;
            background: #82829c;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            transition: left 0.3s ease;
            padding: 20px;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background: #ddd;
        }

        /* ===== MAIN CONTENT ===== */
        .content {
            margin-left: 290px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar.active~.content {
            margin-left: 250px;
        }

        /* ===== TABLE STYLING (your existing) ===== */
        h2 {
            font-family: Arial, sans-serif;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td {
            color: #555;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .sidebar.active~.content {
                margin-left: 200px;
            }

            .navbar .links {
                display: none;
                /* hide navbar links on small screens */
            }

            .sidebar-toggle {
                display: block;
                /* show toggle btn */
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div class="brand">Website</div>
        <div class="links">
            <a href="../feedback.php">Feedback</a>
            <a href="../contact.php">Contact</a>
            <a href="../make_profile.php">Make Profile</a>
        </div>
        <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Kanban</a></li>
            <li><a href="inbox.php">Inbox</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Sign In</a></li>
            <li><a href="#">Sign Up</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="content">
        <h1>Users</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Operation</th>
            </tr>
            <?php
            $store = mysqli_query($connection, "select * from users");
            while ($main = mysqli_fetch_array($store)) {
            ?>
                <tr>
                    <td><?php echo $main['f_name'] ?></td>
                    <td><?php echo $main['u_name'] ?></td>
                    <td>
                        <div class="d-flex">
                            <form method="post">
                                <input name="id" type="hidden" value="<?php echo $main['id'] ?>">
                                <button type="submit" class="btn btn-info mx-1" name="btnview">View More</button>
                            </form>


                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $main['id'] ?>">
                                <button type="submit" name="btnupdate" class="btn btn-success mx-1">Update</button>
                            </form>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $main['id'] ?>">
                                <button type="submit" name="btndelete" class="btn btn-danger mx-1">Delete</button>
                            </form>


                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
    if (isset($_POST['btnview'])) {
        $id = $_POST['id'];
        header('Location:viewmore.php?id=' . $id);
        exit;
    }

    if (isset($_POST['btnupdate'])) {
        $id = $_POST['id'];
        header('location: update.php?id=' . $id);
        exit;
        
    }

    if (isset($_POST['btndelete'])) {
        $id = $_POST['id'];
        $delete = mysqli_query($connection, 'delete from users where id =' . $id);
    }
    ?>

    
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("active");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>