<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->


<body>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Information</h1>
                    <nav class="d-flex align-items-center">
                        <h5>Home <span class="lnr lnr-arrow-right"></span> Information</h5>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!--================Registration Area =================-->

    <section class="login_box_area section_gap">
        <section class="product_description_area">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="Information-tab" data-toggle="tab" href="#Information" role="tab" aria-controls="Information" aria-selected="false">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="changepass-tab" data-toggle="tab" href="#changepass" role="tab" aria-controls="changepass" aria-selected="true">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">History</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="true">Cart</a>
                    </li> -->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Information" role="tabpanel" aria-labelledby="Information-tab">
                        <div class="row">
                            <div class="col-lg-3"> </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?php
                                    include_once '../controller/usercontroller.php';


                                    $email = $_SESSION["user_name"];

                                    $user_name = get_infor($email)->get_username();
                                    $pass = get_infor($email)->get_password();
                                    $address = get_infor($email)->get_address();
                                    $phone = get_infor($email)->get_phone();

                                    echo '
                                    <div class="col-md-12 form-group">
                                        <div>User name</div> <input type="text" class="form-control" id="username" name="username" placeholder="' . $user_name . '" disabled>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div>Address</div> <input type="text" class="form-control" id="address" name="address" placeholder="' . $address . '" disabled>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div>Phone number</div> <input type="text" class="form-control" id="phonenumber" name="phonenumber" pattern="^[0-9\+_\-]*$" placeholder="' . $phone . '" disabled>
                                    </div>'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="changepass" role="tabpanel" aria-labelledby="changepass-tab">
                        <form class="row login_form" action="controller/usercontroller.php" method="POST">
                            <div class="col-lg-3"> </div>
                            <div class="col-lg-6">
                                <div class="col-md-12 form ">
                                    <div>Old Password</div>
                                    <p><input type="password" class="form-control" id="password" name="password" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Old Password"></p>
                                </div>
                                <div class="col-md-12 form">
                                    <div>New Password</div>
                                    <p><input type="password" class="form-control" id="new_password" name="new_password" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="New Password"></p>
                                </div>
                                <div class="col-md-12 form">
                                    <div>Confirm Password</div>
                                    <p><input type="password" class="form-control" id="confirm" name="confirm" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Confirm Password"></p>
                                </div>
                                <div class="col-md-12 ">
                                    <p><input type="checkbox" onclick="showPass()"> Show Password</p>
                                </div>
                                <div class="col-md-12 ">
                                    <button type="submit" class="primary-btn" id="user" name="user" value="changepass">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="cart_inner">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                               
                                        include '../model/order.php';
                                        $user_id = $_SESSION['user_id'];
                                        $history = orderModel::getHistoryOrder($user_id);
                                        foreach ($history as $his) :
                                            echo '<tr >';
                                            echo '<th scope="row">' . $his['order_id'] . '</th> ';
                                            echo '<th scope="row">' . $his['order_date'] . '</th>';
                                            echo '<th scope="row">' . $his['order_name'] . '</th> ';
                                            echo '<th scope="row">' . $his['order_status'] . '</th>';
                                            echo '<th scope="row">' . $his['order_address'] . '</th> ';
                                            echo '<th scope="row"><a href="confirmation.php?order_id=' . $his['order_id'] . '" class="genric-btn info radius">Xem</a> </th>';

                                            echo '</tr>';
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                                <div class="checkout_btn_inner float-right">
                                    <a class="btn_1" href="../view/shop.php">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart-tab">
                        àdà
                    </div> -->
                </div>
        </section>
    </section>
    <!--================End Registration Area =================-->
    <!-- footer -->
    <?php include 'layout/footer.php' ?>
    <!-- footer -->
</body>

</html>