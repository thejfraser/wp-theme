<?php
$thumb = get_the_post_thumbnail( null, 'card-image', [ 'class' => 'activator' ] );
if (!$thumb) {
	$thumb = sprintf(
		'<img width="412" height="154" alt="Article image header" src="%s" class="default-image default-card-image activator">',
		'https://wwwstatic.jamiefraser.co.uk/themes/jamiefraser.co.uk/img/default-card-image.jpg'
	);
}
?>
<div class="col s12 m4">
	<div class="card small">
		<div class="card-image waves-effect waves-block waves-blue">
			<?php echo $thumb; ?>
		</div>
		<div class="card-stacked">
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4"><i class="material-icons right" aria-hidden="true">more_vert</i> <?php echo get_the_title(); ?></span>
			</div>
			<div class="card-action single-card-action">
				<a href="<?php the_permalink(); ?>" class="block blue-text">Read Post <i class="material-icons right" aria-hidden="true">arrow_forward</i></a>
			</div>
		</div>
		<div class="card-reveal">
			<i class="material-icons right">close</i>
			<?php echo wpautop(get_the_excerpt()); ?>
			<div class="reveal-foot">
				<?php echo get_the_tag_list( '<div class="chip">#', '</div><div class="chip">#', '</div>', get_the_ID() ); ?>
			</div>
		</div>
	</div>
</div>
