<?php $startTime = microtime( true ); ?>
<?php get_header(); ?>
<?php /* @todo: add blur on scroll, it may be cool! */ ?>
<section class="main-carousel featured grey lighten-2">
	<div class="carousel">
		<?php
		$cache = get_html_cache_path( 'home-carousel' );
		if ( $cache ) {
			include( $cache );
		} else {
			ob_start();

			$postQuery = new WP_Query( [
				'post_type'      => 'featured-banners',
				'posts_per_page' => 5,
				'orderby'        => 'modified',
				'order'          => 'DESC'
			] );

			if ( $postQuery->have_posts() ) :
				while ( $postQuery->have_posts() ) :
					$postQuery->the_post();

					$title  = get_field( 'title' );
					$strap  = get_field( 'strapline' );
					$image  = get_field( 'image' );
					$link   = get_field( 'link' );
					$newTab = get_field( 'open_in_new_tab' );

					$linkattr = $link
						? "href=\"{$link}\"" . ( $newTab ? " target=\"_blank\"" : "" )
						: "href=\"#\" onclick=\"return false;\"";
					include get_stylesheet_directory() . '/includes/home-carousel.php';
				endwhile;
				wp_reset_postdata();
			endif;

			$html = ob_get_clean();
			file_put_contents( get_html_cache_path_anyway( 'home-carousel' ), $html );
			echo $html;
		}
		?>
	</div>
</section>

<?php get_template_part( 'includes/tech-banner' ); ?>


<section class="recent-posts container">
	<div class="row">
		<div class="col s12 center-align">
			<h2 class="raleway">Recent Posts</h2>
		</div>
	</div>
	<div class="row">
		<?php
			$cache = get_html_cache_path( 'home-loop' );
			$cache = false;
			if ($cache ):
				include( $cache );
			else:
				ob_start();
				$postQuery = new WP_Query( [
					'post_type' => ['posts', 'off-topic-posts'],
					'posts_per_page' => 9,
					'orderby' => 'published',
					'order' => 'DESC'
				]);

				if ($postQuery->have_posts()):
					while( $postQuery->have_posts()) {
						$postQuery->the_post();
						get_template_part( 'includes/post-loop' );
					}
				endif;

				$html = ob_get_clean();
				file_put_contents( get_html_cache_path_anyway( 'home-loop' ), $html );
				echo $html;
			endif;
		?>
	</div>
</section>

<div class="row">
	<div class="col s6 center-align">
		<a class="waves-effect waves-light btn-large orange darken-2" href="<?php echo get_post_type_archive_link( 'posts' ); ?>">
			Read more posts
		</a>
	</div>
	<div class="col s6 center-align">
		<a class="waves-effect waves-light btn-large orange darken-2" href="<?php echo get_post_type_archive_link( 'off-topic-posts' ); ?>">
			Go off topic
		</a>
	</div>
</div>

<?php get_footer(); ?>
<!-- <?php echo microtime(true) - $startTime; ?> -->