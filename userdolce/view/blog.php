<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->


<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Blog Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.php">Blog</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Blog Categorie Area =================-->
<section class="blog_categorie_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="blog-details.php">
                                <h5>Social Life</h5>
                            </a>
                            <div class="border_line"></div>
                            <p>Enjoy your social life together</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="blog-details.php">
                                <h5>Politics</h5>
                            </a>
                            <div class="border_line"></div>
                            <p>Be a part of politics</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories_post">
                    <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                    <div class="categories_details">
                        <div class="categories_text">
                            <a href="blog-details.php">
                                <h5>Food</h5>
                            </a>
                            <div class="border_line"></div>
                            <p>Let the food be finished</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Categorie Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '<article class="row blog_item">';
                        echo '<div class="col-md-3"> ';
                        echo
                        '<div class="blog_info text-right">';
                        echo '<div class="post_tag"> ';
                        echo '<a href="#">Food,</a>';
                        echo '<a class="active" href="#">Technology,</a> ';
                        echo '<a href="#">Politics,</a>';
                        echo '<a href="#">Lifestyle</a> ';
                        echo '</div>';
                        echo '<ul class="blog_meta list"> ';
                        echo '<li><a href="#">Mark wiens<i class="lnr lnr-user"></i></a></li>';
                        echo '<li><a href="#">12 Dec, 2018<i class="lnr lnr-calendar-full"></i></a></li> ';
                        echo '<li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>';
                        echo '<li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li> ';
                        echo '</ul>';
                        echo '</div> ';
                        echo '</div>';
                        echo '<div class="col-md-9"> ';
                        if ($i == 0) {
                            echo '<div class="blog_post"><img src="img/blog/main-blog/m-blog-1.jpg" alt=""> ';
                        } elseif ($i == 1) {
                            echo '<div class="blog_post"><img src="img/blog/main-blog/m-blog-2.jpg" alt=""> ';
                        } elseif ($i == 2) {
                            echo '<div class="blog_post"><img src="img/blog/main-blog/m-blog-3.jpg" alt=""> ';
                        } elseif ($i == 3) {
                            echo '<div class="blog_post"><img src="img/blog/main-blog/m-blog-4.jpg" alt=""> ';
                        } elseif ($i == 4) {
                            echo '<div class="blog_post"><img src="img/blog/main-blog/m-blog-5.jpg" alt=""> ';
                        }
                        echo '<div class="blog_details">';
                        echo '<a href="single-blog.php"> ';
                        echo '<h2>Astronomy Binoculars A Great Alternative</h2>';
                        echo '</a> ';
                        echo '<p>MCSE boot camps have its supporters and its detractors. Some people do not
                                            understand why you should have to spend money on boot camp when you can get
                                            the MCSE study materials yourself at a fraction.</p>';
                        echo '<a href="single-blog.php" class="white_bg_btn">View More</a> ';
                        echo '</div>';
                        echo '</div> ';
                        echo '</article>';
                    }

                    ?>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-left"></span>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="lnr lnr-chevron-right"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                        <h4>Charlie Barber</h4>
                        <p>Senior blog writer</p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
                            should have to spend money on boot camp when you can get. Boot camps have itssuppor
                            ters andits detractors.</p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post1.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.php">
                                    <h3>Space The Final Frontier</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post2.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.php">
                                    <h3>The Amazing Hubble</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post3.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.php">
                                    <h3>Astronomy Or Astrology</h3>
                                </a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post4.jpg" alt="post">
                            <div class="media-body">
                                <a href="blog-details.php">
                                    <h3>Asteroids telescope</h3>
                                </a>
                                <p>01 Hours ago</p>
                            </div>
                        </div>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Catgories</h4>
                        <ul class="list cat-list">
                            <?php
                            $ten = array("Technology", "Lifestyle", "Fashion", "Art", "Food", "Architecture", "Adventure");
                            $gia = array("37", "24", "59", "29", "15", "09", "44");
                            for ($i = 0; $i < 7; $i++) {
                                echo '<li>';
                                echo '<a href="#" class="d-flex justify-content-between"> ';
                                echo '<p>' . $ten[$i] . '</p>';
                                echo '<p>' . $gia[$i] . '</p> ';
                                echo '</a>';
                                echo '</li>';
                            }

                            ?>

                        </ul>
                        <div class="br"></div>
                    </aside>
                    <aside class="single-sidebar-widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <p>
                            Here, I focus on a range of items and features that we use in life without
                            giving them a second thought.
                        </p>
                        <div class="form-group d-flex flex-row">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                            </div>
                            <a href="#" class="bbtns">Subcribe</a>
                        </div>
                        <p class="text-bottom">You can unsubscribe at any time</p>
                        <div class="br"></div>
                    </aside>
                    <aside class="single-sidebar-widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Adventure</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!-- start footer Area -->
<?php include 'layout/footerpage.php'; ?>
<!-- End footer Area -->

<?php include 'layout/scriptpage.php'; ?>
</body>

</html>