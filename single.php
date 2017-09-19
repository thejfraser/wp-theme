<?php get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$thumb = get_the_post_thumbnail( null, 'featured-banner', [ 'style' => 'width:100%; height:1080px;' ] );

		if (!$thumb) {
			$thumb = sprintf(
				'<img width="1920" height="1080" alt="Article image header" src="%s" class="default-image default-feature-banner">',
				'https://wwwstatic.jamiefraser.co.uk/themes/jamiefraser.co.uk/img/default-post-image.jpg'
			);
		}
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
						<h1 class="post-title white-text raleway"><?php echo get_the_title() ?></h1>
					</div>
				</div>
			</div>
		</section>

		<div class="container">


			<article>

				<?php the_content(); ?>

				<?php echo get_the_tag_list( 'Tagged: <div class="chip">#', '</div><div class="chip">#', '</div>', get_the_ID() ); ?>

			</article>

		</div>


		<?php
	endwhile;
endif;
?>
<?php get_footer(); ?>
