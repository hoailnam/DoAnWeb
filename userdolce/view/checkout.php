<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <h5>Home <span class="lnr lnr-arrow-right"></span> Checkout</h5>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <form class="row contact_form" action="../controller/PayController.php" method="post" novalidate="novalidate">
            <div class="returning_customer">
                <div class="billing_details">
                    Proceed to Paypal
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Billing Details</h3>

                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" />
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea class="form-control" id="note" name="note" rows="1" placeholder="Order Notes"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li><a href="#">Product <span>Total</span></a></li>
                                    <!-- <li><a href="#">Fresh Blackberry <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                <li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span class="last">$720.00</span></a></li> -->
                                    <?php

                                    $total_price = 0;
                                    $ship = 100000;
                                    if (isset($_SESSION['cart_item'])) {
                                        foreach ($_SESSION['cart_item'] as $item) {
                                            $item_price = $item['qty'] * $item['price'];
                                            $total_price += ($item["price"] * $item["qty"]);
                                            echo    '<li><a href="product.php?id=' . $item['id'] . '">' . $item["name"] . '&emsp; x' . $item["qty"] . ' <span class="last">' . number_format($item_price, 0, '', ',') . ' VND</span></a></li>';
                                        }
                                    } else echo '<p style="text-align:center">Your cart empty</p>';

                                    echo '  </ul>
                                        <ul class="list list_2">
                                            <li><a href="#">Subtotal <span>' . number_format($total_price, 0, '', ',') . ' VND</span></a></li>
                                            <li><a href="#">Shipping <span>Flat rate: ' . number_format($ship, 0, '', ',') . ' VND</span></a></li>
                                            
                                            <li><a href="#" name="thanhtien">Total <span >' . number_format($total_price + $ship, 0, '', ',') . ' VND</span></a></li>
                                            <input name="thanhtien" type="text" hidden value="' . $total_price + $ship . '">
                                        </ul>';
                                    ?>

                                    <button type="submit" name="order_action" value="order" class="primary-btn">Proceed to Paypal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</section>
<!--================End Checkout Area =================-->

<!-- footer -->
<?php include 'layout/footer.php' ?>
<!-- footer -->
</body>

</html>