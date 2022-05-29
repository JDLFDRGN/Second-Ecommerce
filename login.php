<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div class="container login-container">
        <div id="login">
            <div class="login-first-section">
                <h1>Log in to ShoeMe Express</h1>
            </div>
            <div class="login-second-section">
                <form id="login-form" method="POST" action="validate.php">
                    <div class="login-input">
                        <input type="text" placeholder = "Username" name="username" required>
                        <input type="password" placeholder = "Password" name="password" required>
                    </div>
                    <div class="login-button">
                        <input type="button" value="Home" onclick="navigate('index.php')">
                        <input type="submit" value="Login" name="submit">
                    </div>
                    <div class="login-footer">
                        <span>Don't have an account?</span>
                        <a href="signup.php" id="login-signup">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
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