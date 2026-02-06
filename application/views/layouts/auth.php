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
</head>

<body class="bg-light">
	<div class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
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
