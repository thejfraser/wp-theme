<?php get_header(); ?>

<?php
if (have_posts()) :
while( have_posts() ) :
the_post();

$thumb = get_the_post_thumbnail( null, 'featured-banner', [ 'style' => 'width:100%; height:1080px;']);

?>
<section class="main-carousel featured grey lighten-2">
	<div class="carousel">
		<div class="carousel-item">
			<div class="parallax-container">
				<div class="parallax">
					<?php echo $thumb; ?>
				</div>
			</div>
			<div class="cover">
				<h2 class="post-title white-text raleway"><?php echo get_the_title() ?></h2>
			</div>
		</div>
	</div>
</section>

<div class="container">


	<article>
		<h1 class="title raleway"><?php echo get_the_title(); ?></h1>


		<?php the_content(); ?>

	</article>
	<?php
		endwhile;
	endif;
	?>
</div>

<?php get_footer(); ?>
