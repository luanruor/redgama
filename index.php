<?php 
include 'head.php';
include 'menu.php';
include 'controladores/login.php';

if(isset($_SESSION["login_user_sys"])){
header("location: interno.php");
} 
?>
    <span>
    <?php 
        if($error!=""){
            echo "<script>alert('".$error."')</script>";
        }
    ?>
    </span>

    <?php
        include 'formularios/Ingreso.php';
        include 'formularios/Logo.php';
    ?>
<?php 
include 'footer.php';
?>