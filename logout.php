<?php
    setcookie("customerID", "", time() - 1);
    header('Location: index.php');
?>