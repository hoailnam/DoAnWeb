<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->

<body id="category">
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Fashon Category</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
						<?php
						include '../utils/MySqlUtils.php';
						$dbCon = new MySqlUtils();
						$query = 'SELECT * FROM list';
						$dbCon->getList($query);
						?>
					</ul>
				</div>

			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">

					<?php
					$page = 1;
					$param = array();
					$sql = "select count(*) from product";
					$sotrang = $dbCon->getPage($sql, $param);
					echo ' <div class="select-this">';
					echo '<form action="#"> ';
					echo '<div class="custom-pagination">';
					echo '<ul class="pagination"> ';
					if (isset($_GET['list_id']))
						for ($i = 1; $i <= $sotrang; $i++)
							echo ' <li class="page-item"><a class="page-link" href="category.php?list_id=' . $_GET['list_id'] . '&page=' . $i . '">' . $i . '</a></li> ';

					else {
						for ($i = 1; $i <= $sotrang; $i++)
							echo ' <li class="page-item"><a class="page-link" href="category.php?page=' . $i . '">' . $i . '</a></li> ';
					}
					echo '</ul> ';
					echo '</div>';
					echo '</form> ';
					echo '</div>';


					?>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						<?php

						if (isset($_GET['page']))
							$page = $_GET['page'];
						if (isset($_GET['list_id'])) {
							$query = "select * from product where list_id=?";
							$param[] = $_GET['list_id'];
						} else
							$query = "select * from product";
						$query .= ' limit ' . ($page - 1) * 8 . ',' . 8;
						$list = $dbCon->getDataPr($query, $param);
						foreach ($list as $pr) {
							echo '<div class="col-lg-3 col-md-6">';
							echo '<div class="single-product">';

							echo '<a href="single-product.php?product_id=' . $pr['product_id'] . '"><img src="img/product/' . explode(',', $pr['product_img'])[0] . '" alt=""></a>';
							echo '<div class="product-details">';
							echo '<h6>' . $pr['product_name'] . '</h6>';
							echo '<div class="price">';
							echo '<h6>' . number_format($pr['product_price']) . ' VND</h6>';
							echo '</div>';
							echo '<div class="prd-bottom">';
							
							
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
						}
						?>
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="pagination">
						<?php
						$page = 1;
						$param = array();
						$sql = "select count(*) from product";
						$sotrang = $dbCon->getPage($sql, $param);
						echo ' <div class="select-this">';
						echo '<form action="#"> ';
						echo '<div class="custom-pagination">';
						echo '<ul class="pagination"> ';
						if (isset($_GET['list_id']))
							for ($i = 1; $i <= $sotrang; $i++)
								echo ' <li class="page-item"><a class="page-link" href="category.php?list_id=' . $_GET['list_id'] . '&page=' . $i . '">' . $i . '</a></li> ';

						else {
							for ($i = 1; $i <= $sotrang; $i++)
								echo ' <li class="page-item"><a class="page-link" href="category.php?page=' . $i . '">' . $i . '</a></li> ';
						}
						echo '</ul> ';
						echo '</div>';
						echo '</form> ';
						echo '</div>';


						?>
					</div>
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>

	<!-- Start related-product Area -->

	<!-- End related-product Area -->

	<!-- start footer Area -->
	<?php include 'layout/footerpage.php'; ?>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most
										modern technology. If you are
										looking for something that can make your interior look awesome, and at the same
										time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<?php include 'layout/scriptpage.php'; ?>
</body>

</html>