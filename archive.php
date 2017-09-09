<?php get_header(); ?>


<section class="recent-posts container">
	<div class="row">
		<div class="col s12 center-align">
			<h2 class="raleway"><?php the_archive_title(); ?></h2>
		</div>
	</div>
	<div class="row">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$thumbId = get_the_post_thumbnail( null, 'card-image', [ 'class' => 'activator' ] );
				?>
				<div class="col s8 offset-s2 m4">
					<div class="card small">
						<div class="card-image waves-effect waves-block waves-blue">
							<?php echo $thumbId; ?>
						</div>
						<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?php echo get_the_title(); ?><i
							class="material-icons right">more_vert</i></span>
							<p><a href="<?php echo get_the_permalink(); ?>">Read Post</a></p>
						</div>
						<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?php echo get_the_title(); ?><i
							class="material-icons right">close</i></span>
							<p><?php echo get_the_excerpt(); ?></p>
							<div class="reveal-foot">
								<?php echo get_the_tag_list( '<div class="chip">#', '</div><div class="chip">#', '</div>', get_the_ID() ); ?>
							</div>
						</div>
					</div>
				</div>


				<?php
			endwhile;
		endif;
		?>
	</div>
</section>
<?php get_footer(); ?>
