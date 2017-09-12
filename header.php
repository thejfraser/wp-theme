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
				<a href="#menu!" data-activates="slide-out" class="nav">
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
				<img src="/wp-content/themes/jamiefraser.co.uk/img/dw.jpg"/>

			</div>
			<a href="mailto:enquiries@jamiefraser.co.uk">
				<img class="circle" src="/wp-content/themes/jamiefraser.co.uk/img/jamie-fraser.jpg" width="64" height="64">
				<span class="white-text name blockit">Jamie Fraser</span>
				<span class="white-text email blockit">Hello@JamieFraser.co.uk</span>
			</a>
		</div>
	</li>
	<li><a href="/posts/" class="waves-effect"><i class="material-icons blue-text" aria-hidden="true">view_headline</i>All Posts</a></li>
	<li><a href="/off-topic" class="waves-effect"><i class="material-icons blue-text" aria-hidden="true">explore</i>Off-Topic</a></li>
	<li>
		<div class="divider"></div>
	</li>
	<li><a href="/contact" class="waves-effect"><i class="material-icons blue-text" aria-hidden="true">email</i>Get In Touch</a></li>
</ul>