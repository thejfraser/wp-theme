<?php
ob_start();
$htag = ( is_home() || is_front_page() ) ? 'h1' : 'span';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<nav class="blue darken-3">
		<div class="nav-wrapper container">
			<<?php echo $htag; ?> class="nomargin raleway">
			<a href="<?php echo bloginfo( 'url' ); ?>" class=" brand-logo">Jamie Fraser</a>
		</<?php echo $htag; ?>>
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
				<img src="http://www.jamiefraser.co.uk/assets/dw.jpg"/>

			</div>
			<a href="#!user">
				<img class="circle" src="images/yuna.jpg">
			</a>
			<a href="#!name">
				<span class="white-text name blockit">Jamie Fraser</span>
			</a>
			<a href="#!email">
				<span class="white-text email blockit">Hello@JamieFraser.co.uk</span>
			</a>
		</div>
	</li>
	<li><a href="/posts/"><i class="material-icons" aria-hidden="true">view_headline</i>All Posts</a></li>
	<li><a href="/off-topic"><i class="material-icons" aria-hidden="true">explore</i>Off-Topic</a></li>
	<li>
		<div class="divider"></div>
	</li>
	<li><a class="subheader">Subheader</a></li>
	<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>