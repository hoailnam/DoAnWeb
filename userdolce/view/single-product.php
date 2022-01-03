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

<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<?php
		include '../utils/MySqlUtils.php';
		$dbCon = new MySqlUtils();
		$param = array();
		if (isset($_GET['product_id'])) {
			$query = "select * from product where product_id=?";
			$param[] = $_GET['product_id'];
		} else {
			$query = "select * from product";
		}

		$pr = $dbCon->getPrDetails($query, $param);

		echo '<div class="row s_product_inner">';
		echo '<div class="col-lg-6"> ';
		echo '<div class="s_Product_carousel">';
		echo '<div class="single-prd-item"> ';
		echo '<img src="img/product/' . explode(',', $pr['product_img'])[0] . '" alt="">';
		echo '</div> ';
		echo '<div class="single-prd-item">';
		echo '<img src="img/product/' . explode(',', $pr['product_img'])[0] . '" alt="">';
		echo '</div>';
		echo '<div class="single-prd-item"> ';
		echo '<img src="img/product/' . explode(',', $pr['product_img'])[0] . '" alt="">';
		echo '</div>';
		echo '</div> ';
		echo '</div>';
		echo '<div class="col-lg-5 offset-lg-1"> ';
		echo '<div class="s_product_text">';
		echo '<h3>' . $pr['product_name'] . '</h3> ';
		echo '<h2>' . number_format($pr['product_price']) . '</h2>    ';


		echo '<div class="card_area d-flex align-items-center">';
		echo '<form method="post" action="../controller/usercontroller.php">
				<button class="primary-btn">
				<input type="hidden" name="id" value="' . $pr["product_id"] . '">
				<input type="hidden" name="cart" value="add">
				<input type="hidden" name="qty" value="1">
				Add to Cart</button>
				<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
				<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
				</div></form>';
		?>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
			</li>
		</ul>




	</div>
	</div>

	</div>
	</div>
</section>
<!--================End Product Description Area =================-->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Deals of the Week</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
						labore et dolore
						magna aliqua.</p>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- End related-product Area -->

<!-- start footer Area -->
<?php include 'layout/footerpage.php'; ?>
<!-- End footer Area -->
<?php include 'layout/scriptpage.php'; ?>

</body>

</html>