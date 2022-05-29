<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <?php
        include 'session.php';
        if(isset($_POST['submit'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $reenter_password = $_POST['reenter-password'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $query = "INSERT INTO customer(firstname,lastname,email,password,age,gender) 
                      VALUES('$firstname','$lastname','$email','$password','$age','$gender');";

            if($password == $reenter_password){
                $connect->query($query);
                echo "<script>alert('Signed up successfully!!')</script>";    
            }else{
                echo "<script>alert('Password does not match!!')</script>";
            }
        }
    ?>
    <div class="container signup-container">
        <form id="signup-form" method="POST">
            <h1 id="signup-title">Create your account</h1>
            <div class="signup-names">
                <input type="text" placeholder="First name" name="firstname" required>
                <input type="text" placeholder="Last name" name="lastname" required>
            </div>
            <input type="email" placeholder="Email" name="email" required>
            <div class="signup-passwords">
                <input type="password" id="signup-password" placeholder="Password" name="password" required>
                <input type="password" id="signup-reenter-password" placeholder="Confirm" name="reenter-password" required>
            </div>
            <div class="signup-show-password">
                <input type="checkbox" id="signup-checkbox" onchange="showPassword(this)">
                <label for="signup-checkbox">Show password</label>
            </div>
            <div class="signup-age-gender">
                <input type="number" placeholder="Age" name="age" required>
                <div class="signup-gender">
                    <label for="">Gender:</label>
                    <input type="radio" name="gender" value="male" required>
                    <label>Male</label>
                    <input type="radio" name="gender" value="female" required>
                    <label>Female</label>
                </div>
            </div>
            <div class="signup-buttons">
                <input type="button" value="Home" onclick="navigate('index.php')">
                <input type="submit" value="Sign-up" id="signup-submit" name="submit">
            </div>
            <div class="signup-footer">
                <span>Already have an account?</span>
                <a href="login.php">Login</a>
            </div>
        </form>
    </div>
        <footer id='home-footer' class='footer'>
            <div id="footer-top">
                <span id="footer-about-us">
                    <p>Browse The Latest Range Of Shoeme Express In The Online Store. Shop Now. Cash On Delivery. Fast, Free & Easy Returns. Click & Collect. Sign up and Get 10% off. Easy Returns. Types: Originals, Performance, Sport Inspired.</p>
                </span>
                <span id="footer-follow-us">
                    <h5 class="footer-title">FOLLOW US</h5>
                    <span id="footer-socialmedia-logos">
                        <img src="img/facebook-f-brands.svg" class="footer-icon">
                        <img src="img/instagram-brands.svg" class="footer-icon">
                        <img src="img/twitter-brands.svg" class="footer-icon">
                    </span>
                </span>
                <span id="footer-call-us">
                    <h5 class="footer-title">CALL US</h5>
                    <h4>09243309143</h4>
                    <h4>09197449953</h4>
                </span>
            </div>
            <div id="footer-bottom">
                <p>&copy2022 Shoeme Express. All Rights Reserved</p>
                <p>PRIVACY POLICY &nbsp&nbsp TERMS AND CONDITIONS</p>
            </div>
        </footer>
</body>
</html>