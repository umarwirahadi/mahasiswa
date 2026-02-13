<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= isset($title) ? htmlspecialchars((string) $title, ENT_QUOTES, 'UTF-8') : 'Auth' ?></title>
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
	<link rel="icon" href="<?= base_url('assets/img/kaiadmin/favicon.ico') ?>" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
	<script>
		WebFont.load({
			google: {
				families: ["Public Sans:300,400,500,600,700"],
			},
			custom: {
				families: [
					"Font Awesome 5 Solid",
					"Font Awesome 5 Regular",
					"Font Awesome 5 Brands",
					"simple-line-icons",
				],
				urls: ["<?= base_url('assets/css/fonts.min.css') ?>"],
			},
			active: function () {
				sessionStorage.fonts = true;
			},
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/plugins.min.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/kaiadmin.min.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
	<style>
		body.auth-body {
			background-image: url('<?= base_url('assets/img/blogpost.jpg') ?>');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
		body.auth-body::before {
			content: "";
			position: fixed;
			inset: 0;
			background: var(--bs-body-bg, #f8f9fa);
			opacity: 0.88;
			pointer-events: none;
			z-index: 0;
		}
		.auth-container {
			position: relative;
			z-index: 1;
		}
		.side-bar-login {
			background-image: url('<?= base_url('assets/img/undraw/bg-login.jpg') ?>');
			background-size: cover;
			background-position: center;
		}
		.side-bar-register {
			background-image: url('<?= base_url('assets/img/undraw/sign_up2.png') ?>');
			background-size: cover;
			background-position: center;
		}
		.bg-purple-ppg {
			background-color: #BF55EC !important;
		}
	</style>
</head>

<body class="bg-light auth-body">
	<div class="container auth-container min-vh-100 d-flex align-items-center justify-content-center py-4 px-3">
		<?= isset($content) ? $content : '' ?>
	</div>

	<!-- Core JS Files -->
	<script src="<?= base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/kaiadmin.min.js') ?>"></script>
</body>

</html>
