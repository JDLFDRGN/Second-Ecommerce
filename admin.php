<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <?php
        include 'session.php';
        if(isset($_POST['submit'])){    
            $product_image = $_FILES['product-file']['name'];
            $product_tmpname = $_FILES['product-file']['tmp_name'];
            $product_description = $_POST['product-description'];
            $query = "INSERT INTO product(productImage, productDescription)
                      VALUES('$product_image','$product_description');";
            if($connect->query($query)){
                move_uploaded_file($product_tmpname, "img/uploaded/".$product_image);
            }
        }else if(isset($_POST['edit'])){
            $product_id = $_POST['product-id'];
            $product_image = $_FILES['product-file']['name'];
            $product_tmpname = $_FILES['product-file']['tmp_name'];
            $product_description = $_POST['product-description'];
            $query = "UPDATE product SET productImage = '$product_image', productDescription = '$product_description' WHERE productID = $product_id";
            
            if($product_image != null && $product_description != null){
                $connect->query($query);
                move_uploaded_file($product_tmpname, "img/uploaded/".$product_image);
            }
        }else if(isset($_POST['delete'])){
            $product_id = $_POST['product-id'];
            $query = "DELETE FROM product WHERE productID = $product_id";
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
                        <input type='button' value='logout' onclick="navigate('index.php')">                     
                    </div>                    
                </div>
                <div class="navigation-menu-second-section">
                    <ul class="admin-navigation-category">
                        <input type="button" value="All products">
                        <input type="button" value="Add products" onclick="showAddForm('mode1')">
                        <button type="button"><a href="#second-section">View check out products</a></button>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="first-section">
            <h1>ALL PRODUCTS</h1>
            <div class="admin-products">
                <?php
                    $select = $connect->query("SELECT * FROM product");
                    for($i=0;$i<$select->num_rows;$i++){
                        $transform = $select->fetch_assoc();
                        echo "<div class='admin-product-container' id='$transform[productID]'>";
                        echo "<img src='img/uploaded/$transform[productImage]' />";
                        echo "<pre>$transform[productDescription]</pre>";
                        echo "</div>";
                    }
                ?>
            </div>
        </section>
        <section id="second-section">
        <h1>CHECKED OUT PRODUCTS</h1>
            <div class="admin-checkout-products">
                <?php
                    $select = $connect->query("SELECT * FROM transaction INNER JOIN product ON transaction.productID = product.productID INNER JOIN customer ON transaction.customerID = customer.customerID");
                    for($i=0;$i<$select->num_rows;$i++){
                        $transform = $select->fetch_assoc();
                        echo "<div class='admin-checkout-container'>";
                        echo "<img src='img/uploaded/$transform[productImage]' />";
                        echo "<div class='admin-product-information'>";
                        echo "<pre class='admin-product-description'>Description:<br>$transform[productDescription]</pre>";
                        echo "<div class='admin-customer-name'>Name: $transform[firstname] $transform[lastname]</div>";
                        echo "<div class='admin-customer-age'>Age: $transform[age]</div>";
                        echo "<div class='admin-customer-gender'>Gender: $transform[gender]</div>";
                        echo "</div>";
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
    </div>
    <form class="add-product" method="POST" id="add-product-form" enctype="multipart/form-data">
        <input type="text" id="product-id" name="product-id" style="display: none">
        <div class="add-upload-image">
            <img src="img/no-image.png" alt="wala" class="add-image-preview">
            <input type="file" id="add-file-image" name="product-file" accept="image/*">
        </div>
        <div class="add-product-details">
            <textarea cols="50" rows="10" placeholder="Enter product description" name="product-description"></textarea>
        </div>
        <div class="add-buttons">
            <input type="submit" value="Add" class="add-submit-button" name="submit">
            <input type="submit" value="Edit" name="edit" class="edit-button">
            <input type="submit" value="Delete" name="delete" class="delete-button">
            <input type="button" value="Cancel" class="add-cancel-button" onclick="hideAddForm()">
        </div>
    </form>
</body>
</html>