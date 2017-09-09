		<?php
		if ( ! is_home() ) {
			get_template_part( 'includes/tech-banner' );
		}
		?>

		<footer class="page-footer blue darken-3">
			<div class="container">
				<p class="center-align">"Random thought for the day"</p>
			</div>
			<div class="footer-copyright">
				<div class="container">
					&copy; 2017 &bull; <a href="">Jamie Fraser</a>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>
<?php
		$html = ob_get_clean();
		$html = preg_replace( '/[\r\n\t]/', ' ', $html );
		$html = preg_replace('/  +/', ' ', $html);
		echo $html;