<?php 
	$active1 = "";
	$active2 = "";
	$active3 = "";

	switch (pathinfo($_SERVER['REQUEST_URI'],PATHINFO_BASENAME)) {
	  case "paciente_main":
	    	$active1 = "active";
	    break;
	  case "editar-perfil.php":
	    	$active2 = "active";
	    break;
	  case "alterar-senha.php":
	    	$active3 = "active";
	    break;
	}
?>

<!-- Profile Sidebar -->
<div class="profile-sidebar">
	<div class="widget-profile pro-widget-content">
		<div class="profile-info-widget">
			<a href="#" class="booking-doc-img">
				<img src="<?php echo '../'.$_SESSION['URLFOTO']; ?>" alt="User Image">
			</a>
			<div class="profile-det-info">
				<h3><?php echo $_SESSION['NOME']; ?></h3>
				
				<div class="patient-details">
					<h5 class="mb-0"><?php echo $_SESSION['email_user']; ?></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="dashboard-widget">
		<nav class="dashboard-menu">
			<ul>
				<li class="<?php echo $active1; ?>">
					<a href="../../public/dashboard/paciente_main">
						<i class="fas fa-columns"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="<?php echo $active2; ?>">
					<a href="editar-perfil.php">
						<i class="fas fa-user-cog"></i>
						<span>Perfil</span>
					</a>
				</li>
				<li class="<?php echo $active3; ?>">
					<a href="alterar-senha.php">
						<i class="fas fa-lock"></i>
						<span>Alterar Senha</span>
					</a>
				</li>
				<li>
					<a href="../../public/logout">
						<i class="fas fa-sign-out-alt"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- /Profile Sidebar -->