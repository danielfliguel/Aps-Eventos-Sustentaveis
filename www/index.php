<?php 
require_once ('head.php');

// include 'navbar.php';

?>
<div class="col-12">
	<?php
	if (@$_GET['success']==true){
		?>
		<div class="alert-light text-danger text-center py-3">
			<?php echo $_GET['success'];?>
		</div>
		<?php
	}
	?>
</div>

<h1 style="margin-top: 50px;">BEM VINDO <?php echo $_SESSION['usuario']; ?></h1>
<div class="container" style="margin-top: 50px;">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8 d-flex justify-content-center">
			<img src="img/earth-1389715_1920.png" style="width: 80%;" alt="">
		</div>
		<div class="col-2"></div>
	</div>
</div>
