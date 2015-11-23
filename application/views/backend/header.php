<html>
<head>
	<meta charset="UTF-8">
	<title>Frontend</title>
	<link rel="stylesheet" href="<?= base_url() ?>ui/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>ui/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>ui/css/custom.css">
	
</head>
<body>
	<nav class="navbar navbar-default top_nav">
	  <div class="container">
	  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  		<ul class="nav navbar-nav">
				<li><a href="http://www.romaniacurata.ro/despre-noi/">Despre noi</a></li>
				<li><a href="http://www.romaniacurata.ro/contact/">Contact</a></li>
				<li><a href="http://www.romaniacurata.ro/category/english/">English</a></li>
				<li><a href="http://www.romaniacurata.ro/autori-arc/">Autori</a></li>
				<li><a href="http://www.romaniacurata.ro/category/editorial/">Editorial</a></li>
				<li><a href="http://www.romaniacurata.ro/arhiva/">Arhivă</a></li>
				<li><a href="http://www.romaniacurata.ro/despre-noi/redactia-romania-curata/">Redacția România Curată</a></li>
				<li><a href="<?php echo base_url('backend/logout') ?>"><span class="glyphicon glyphicon-log-out"> </span> LogOut </a></li>
			</ul>
	  	</div>
	  </div>
	 </nav>
	<div class="container"> <!-- START CONTAINER -->

		<header id="header" class="site-header" role="banner">			
			<a href="http://www.romaniacurata.ro/" title="România curată" rel="home"><img class="img img-responsive" src="http://romaniacurata.ro/wp-content/uploads/extra/header-rc-z1.jpg" id="logo" alt="România curată" title="România curată" /></a>
		</header>

		<nav class="navbar navbar-inverse">			
				<ul class="nav navbar-nav">
					<li ><a href="http://www.romaniacurata.ro/campanii/">Campanii</a></li>
					<li ><a href="http://www.romaniacurata.ro/liste-negre/">Liste negre</a></li>
					<li ><a href="http://www.romaniacurata.ro/voluntari/">Alatură-te</a></li>
					<li ><a href="http://www.romaniacurata.ro/mediu-curat/">Mediu curat</a></li>
					<li ><a href="http://www.romaniacurata.ro/monitorizam-statul/">Monitorizăm statul</a></li>
					<li class="dropdown"><a href="http://www.romaniacurata.ro/coalitia-pentru-universitati-curate/">Universități curate</a>
					<ul class="sub-menu" style="display: none;">
						<li ><a href="http://www.romaniacurata.ro/category/cuc/">Coaliția pentru Universități Curate</a></li>
						<li ><a href="http://www.romaniacurata.ro/resurse-student-arc/">Resurse student ARC</a></li>
					</ul>
					</li>
					<li><a href="http://www.romaniacurata.ro/fonduri-europene/">Fonduri europene</a>
					<ul class="sub-menu" style="display: none;">
						<li ><a href="http://www.romaniacurata.ro/fonduri-europene/tactici-de-fraudare/">Tactici de fraudare</a></li>
						<li><a href="http://www.romaniacurata.ro/fonduri-europene/fonduri-europene-resurse/">Resurse</a>
						<ul class="sub-menu" style="display: none;">
							<li ><a href="http://www.romaniacurata.ro/fonduri-europene/rapoarte-oficiale/">Rapoarte oficiale</a></li>
							<li ><a href="http://www.romaniacurata.ro/fonduri-europene/sesizari-frauda-si-nereguli/">Sesizări fraudă şi nereguli</a></li>
							<li ><a href="http://www.romaniacurata.ro/fonduri-europene/legislatie-normativ/">Legislatie / normativ</a></li>
						</ul>
						</li>
						<li ><a href="http://www.romaniacurata.ro/fonduri-europene/analize/">Analize</a></li>
					</ul>
					</li>
					<li ><a href="http://www.romaniacurata.ro/anti-discrminare/editoriale/">Anti-Discriminare</a></li>
					<li><a href="http://www.romaniacurata.ro/category/pdg/">Podul</a>
					<ul class="sub-menu" style="display: none;">
						<li ><a href="http://www.romaniacurata.ro/category/pdg/proiectul/">Proiectul</a></li>
						<li ><a href="http://www.romaniacurata.ro/category/pdg/articole/">Articole</a></li>
						<li ><a href="http://www.romaniacurata.ro/category/pdg/rapoarte/">Rapoarte</a></li>
						<li ><a href="http://www.romaniacurata.ro/category/pdg/webinar/">Webinar</a></li>
					</ul>
					</li>
				</ul>
		</nav>

