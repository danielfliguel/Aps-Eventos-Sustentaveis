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

<h1>BEM VINDO <?php echo $_SESSION['usuario']; ?></h1>
