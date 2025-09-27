<?php
session_start();
if(isset($_SESSION['users'])){

}else{
    header('Location:../login.php');
}
?>