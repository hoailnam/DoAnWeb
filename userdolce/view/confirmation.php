<!-- header -->
<?php include 'layout/header.php' ?>
<!-- header -->
<?php
include '../model/order.php';
$history = orderModel::getOrder($_GET['order_id']);
$details = orderModel::getDetailsOrder($_GET['order_id']);
?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<h1>Confirmation</h1>
				<nav class="d-flex align-items-center">
					<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
					<a href="category.php">Confirmation</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
	<div class="container">
		<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
		<div class="row order_d_inner">
			<div class="col-lg-4">
				<div class="details_item">
					<h4>Order Info</h4>
					<ul class="list">
						<li><a href="#"><span>Order number</span> : <?php echo $history[0]['order_id'] ?></a></li>
						<li><a href="#"><span>Date</span> : <?php echo $history[0]['order_date'] ?></a></li>
						<li><a href="#"><span>Total</span> : <?php echo number_format($history[0]['amount'], 0, ",", ".") ?> VND</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="details_item">
					<h4>Shipping Address</h4>
					<ul class="list">
						<li><a href="#"><span>Street</span> : <p>Address</p><span> : <?php echo $history[0]['order_address'] ?></span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="order_details_table">
			<h2>Order Details</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>


						<?php
						foreach ($details as $i => $pr) :
							echo '<tr>';
							echo '<td> ';
							echo '<p>' . $pr['product_name'] . '</p>';
							echo '</td> ';
							echo '<td>';
							echo '<h5>x ' . $pr['quaility'] . '</h5> ';
							echo '</td>';
							echo '<td> ';
							echo '<p>' . number_format($pr['product_price'], 0, ",", ".") . ' VND</p>';
							echo '</td>';
							echo '</tr>';
						endforeach;
						?>
						<tr>
							<td>
								<h4>Subtotal</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p><?php echo number_format($history[0]['amount'], 0, ",", ".") ?> VND</p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Shipping</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p><?php $ship = 0;
									echo number_format($ship = 100000, 0, ",", ".") ?> VND</p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Total</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p><?php echo number_format($history[0]['amount'] + $ship, 0, ",", ".") ?> VND</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!--================End Order Details Area =================-->

<!-- start footer Area -->
<?php include 'layout/footerpage.php'; ?>
<!-- End footer Area -->

<?php include 'layout/scriptpage.php'; ?>
</body>

</html>