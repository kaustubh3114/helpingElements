<?php

include('C:\xampp\htdocs\helpingelements\partials-front\menu.php'); ?>

<body>

    <!-- service sEARCH Section Starts Here -->
    <section class="service-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order">
               
                    

                    <div class="service-menu-img">
                        <img src="../helpingelements/photos/pujari.jpg" alt="helping elements" class="img-responsive img-curve">
                    </div>
    
                    <div class="service-menu-desc">
                        <h3>Service title</h3>
                        <p class="service-price">₹300</p>

                        <div class="order-label">time</div>
                        <input type="time" name="time" class="input-responsive" value="1" required>
                        
                    </div>

                
                    Delivery Details
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                

            </form>

        </div>
    </section>
    <!-- service sEARCH Section Ends Here -->

    
    <?php

include('C:\xampp\htdocs\helpingelements\partials-front\footer.php'); ?>
   