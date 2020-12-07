<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>TheSiS | <?= $title; ?></title>
	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- My Icon -->
	<link rel="icon" href="<?= base_url('assets/') ?>img/icon.png" />
	<?php if ($title == "Admin Page") : ?>
		<meta http-equiv="refresh" content="30" />
		<!-- My Css For Switch-->
		<link href="<?= base_url('assets/') ?>css/switch.css" rel="stylesheet">
	<?php endif; ?>
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">