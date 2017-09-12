<?php get_header(); ?>


<section class="recent-posts container fillviewport">
	<div class="row">
		<div class="col s12 center-align">
			<h1 class="raleway"><?php the_archive_title(); ?></h1>
		</div>
	</div>
	<div class="row">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'includes/post-loop' );
			endwhile;
		else:
			echo '<p class="flow-text center-align grey-text text-lighten-2">- No Posts Found -</p>';
		endif;
		?>

	</div>

	<div class="row">
		<div class="col s12">
			<?php
			global $wp_query;
			$maxPageNumber = $wp_query->max_num_pages;
			$currentPage   = get_query_var( 'paged' );
			$link          = get_post_type_archive_link( get_queried_object()->name );
			echo buildPagination( $currentPage, $maxPageNumber, $link );
			?>

		</div>
	</div>
</section>
<?php get_footer(); ?>
