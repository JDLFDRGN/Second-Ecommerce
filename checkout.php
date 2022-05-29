<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <?php
        include 'session.php';

        if(isset($_POST['check-out'])){
            $selected_product = $_POST['selected-product'];
            $customer_id = $_COOKIE['customerID'];
            
            $query = "INSERT INTO transaction(productID, customerID)
                      VALUES('$selected_product','$customer_id');";
            $connect->query($query);
        }
    ?>
    <div class="container">
        <nav class="navigation-bar">
            <div class="navigation-logo">
                <img src="img/shoeme_logo.png">
            </div>
            <div class="navigation-menu">
                <div class="navigation-menu-first-section">
                    <div class="navigation-search-bar">
                        <input type="search" class="navigation-search-input">
                        <input type="submit" value="search" class="navigation-search-submit">
                    </div>
                    <div class="navigation-account">
                        <?php
                            if(!isset($_COOKIE['customerID'])){
                                echo "<input type='button' value='login' id='navigation-login'>";
                                echo "<input type='button' value='signup' id='navigation-signup'>";
                            }else{
                                echo "<input type='button' value='logout' class='navigation-logout'>";
                                echo "<script>";
                                echo "let navigationLogout = document.querySelector('.navigation-logout');";
                                echo "navigationLogout.addEventListener('click',()=>{location.href='logout.php'})";
                                echo "</script>";      
                            }
                        ?>                        
                    </div>                    
                </div>
                <div class="navigation-menu-second-section">
                    <ul class="navigation-category">
                        <li><a href="#">all brands</a></li>
                        <li><a href="#">new releases</a></li>
                        <li><a href="#">men</a></li>
                        <li><a href="#">women</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">sale</a></li>
                        <li><a href="index.php">home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="first-section">   
            <div class="home-products">
                <?php
                    $customer_id = $_COOKIE['customerID'];
                    $select = $connect->query("SELECT * FROM cart INNER JOIN product ON cart.productID = product.productID INNER JOIN customer ON cart.customerID = customer.customerID WHERE customer.customerID = $customer_id");
                    for($i=0;$i<$select->num_rows;$i++){
                        $transform = $select->fetch_assoc();
                        echo "<div class='home-product-container' id='$transform[productID]'>";
                        echo "<img src='img/uploaded/$transform[productImage]' />";
                        echo "<pre>$transform[productDescription]</pre>";
                        echo "</div>";  
                    }
                ?>
            </div>
        </section>
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
        <form class="home-buy" method="POST">
            <img src="img/no-image.png" class="home-buy-image">
            <pre class="home-buy-description"></pre>
            <input type="text" name="selected-product" value="huhu" id="selected-product">
            <div class="home-buy-buttons">
                <input type='submit' value='Check out' name='check-out'>
                <input type='button' value='Cancel' onclick='hideBuyForm()'>
            </div>
        </form>
    </div>
</body>
</html>