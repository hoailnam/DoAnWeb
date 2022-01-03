<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->


<body>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Register</h1>
                    <nav class="d-flex align-items-center">
                        <h5>Home <span class="lnr lnr-arrow-right"></span> Register</h5>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!--================Registration Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="login_form_inner">
                <h1>Sign up</h1>
                <p>Please fill in this form to create an account</p>
                <form class="row login_form" action="registercontroller.php" method="POST" id="contactForm">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="username" name="username" autofocus placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" pattern="^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="password" class="form-control" id="password" name="password" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="password" class="form-control" id="confirm" name="confirm" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="address" name="address" pattern="^[a-zA-Z0-9\+_\-]*$" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" pattern="^[0-9\+_\-]*$" placeholder="Phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone number'">
                    </div>
                    <div class="col-md-12">
                        <div>
                            <h5>Gender</h5>
                        </div>
                        <p>
                            <label class="radio">
                                <input type="radio" id="male" name="name">
                                Male
                            </label>
                            <label class="radio">
                                <input type="radio" id="female" name="name">
                                Female
                            </label>
                            <label class="radio">
                                <input type="radio" id="other" name="name" checked>
                                Other
                            </label>
                        </p>
                    </div>
                    <div class="creat_account">
                        <p><input type="checkbox" onclick="showPass()"> Show Password</p>
                        <p><input type="checkbox" id="agree" name="agree"> By creating an account you agree to our <a href="#">Terms & Privacy</a></p>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn" id="signup" name="signup">Sign up</button>
                        <p class="container sign in">
                        <p> Already have an account? <a href="login.php"> Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Registration Area =================-->
    <!-- footer -->
    <?php include 'layout/footer.php' ?>
    <!-- footer -->
</body>

</html>