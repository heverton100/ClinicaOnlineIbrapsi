<?php 
	$active1 = "";
	$active2 = "";
	$active3 = "";
	$active4 = "";
	$active5 = "";
	$active6 = "";


	switch (pathinfo($_SERVER['REQUEST_URI'],PATHINFO_BASENAME)) {
		case "index.php":
			$active1 = "active";
			break;
		case "agendamentos.php":
			$active2 = "active";
			break;
		case "my-patients.php":
			$active3 = "active";
			break;
		case "editar-perfil.php":
			$active4 = "active";
			break;
		case "horarios.php":
			$active5 = "active";
			break;
		case "alterar-senha.php":
			$active6 = "active";
			break;
	}
?>

<!-- Profile Sidebar -->
<div class="profile-sidebar">
	<div class="widget-profile pro-widget-content">
		<div class="profile-info-widget">
			<a href="#" class="booking-doc-img">
				<img src="<?php echo '../../'.$_SESSION['URLFOTO']; ?>" alt="User Image">
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
					<a href="index.php">
						<i class="fas fa-columns"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<li class="<?php echo $active2; ?>">
					<a href="agendamentos.php">
						<i class="fas fa-calendar-check"></i>
						<span>Agendamentos</span>
					</a>
				</li>
				<li class="<?php echo $active3; ?>">
					<a href="my-patients.php">
						<i class="fas fa-user-injured"></i>
						<span>Meus Pacientes</span>
					</a>
				</li>

				<li class="<?php echo $active4; ?>">
					<a href="editar-perfil.php">
						<i class="fas fa-user-cog"></i>
						<span>Perfil</span>
					</a>
				</li>
				<li class="<?php echo $active5; ?>">
					<a href="horarios.php">
						<i class="fas fa-hourglass-start"></i>
						<span>Programar Horários</span>
					</a>
				</li>
				<li class="<?php echo $active6; ?>">
					<a href="alterar-senha.php">
						<i class="fas fa-lock"></i>
						<span>Alterar Senha</span>
					</a>
				</li>
				<li>
					<a href="../../account/login.php?logout=1">
						<i class="fas fa-sign-out-alt"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- /Profile Sidebar -->

<style>
.main-menu-wrapper {
    display: none;
}

li.nav-item.contact-item {
    display: none;
}

nav.navbar.navbar-expand-lg.header-nav {
    height: 60px;
    background-color: #203a74;
}

li.nav-item.dropdown.has-arrow.logged-item {
    height: 60px;
}

a.navbar-brand.logo {
    width: 110px;
}

.header .has-arrow .dropdown-toggle:after {
	border-bottom: 2px solid #ffffff;
    border-right: 2px solid #ffffff;
}
</style>
<script src="http://localhost/clinica/assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(".custom-logotipo").attr("src", "../../assets/img/logobranco.png");
</script>