<?php
    include 'session.php';
    $adminUsername = "admin";
    $adminPassword = "admin123";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $select = $connect->query("SELECT * FROM customer");

        if($username == $adminUsername && $password == $adminPassword){
            header('Location: admin.php');
        }

        for($i=0;$i<$select->num_rows;$i++){
            $transform = $select->fetch_assoc();

            if($transform['email'] == $username && $transform['password'] == $password){
                setcookie("customerID",$transform['customerID'],time() + 86400);
                echo "<script>alert('Log in successfully!!')</script>"; 
                header('Location: index.php');
            }
        }
        echo "<script>";
        echo "let ans = alert('Invalid username or password!'); if(!ans) location.href='login.php';";
        echo "</script>";
    }
?>