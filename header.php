<?php ob_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<nav class="blue darken-3">
			<div class="nav-wrapper container">
				<h1 class="nomargin raleway">
					<a href="#" class=" brand-logo">Jamie Fraser</a>
				</h1>
				<ul id="nav-mobile" class="right">
					<li>
						<a href="#" data-activates="slide-out" class="nav">
							<span class="hide-on-med-and-down raleway">Menu <i class="material-icons right">menu</i></span>
							<i class="material-icons hide-on-large-only">menu</i>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<ul id="slide-out" class="side-nav">
		<li>
			<div class="user-view">
				<div class="background">
					<img src="http://www.jamiefraser.co.uk/assets/dw.jpg" />

				</div>
				<a href="#!user">
					<img class="circle" src="images/yuna.jpg">
				</a>
				<a href="#!name">
					<span class="white-text name blockit">Jamie Fraser</span>
				</a>
				<a href="#!email">
					<span class="white-text email blockit">test@test.co</span>
				</a>
			</div>
		</li>
		<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
		<li><a href="#!">Second Link</a></li>
		<li>
			<div class="divider"></div>
		</li>
		<li><a class="subheader">Subheader</a></li>
		<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
	</ul>