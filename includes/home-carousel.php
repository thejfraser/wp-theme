<a <?php echo $linkattr; ?> class="carousel-item">
	<div class="parallax-container">
		<div class="parallax">
			<img src="<?php echo esc_attr( $image ) ?>" style="width:100%; height:1080px;">
		</div>
	</div>
	<div class="cover">
		<h2 class="post-title white-text raleway"><?php echo esc_html( $title ); ?></h2>
		<?php if ( $strap ) : ?>
			<p class="excerpt flow-text white-text raleway"><?php echo esc_html( $strap ); ?></p>
		<?php endif; ?>
	</div>
</a>