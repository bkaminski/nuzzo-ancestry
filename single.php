<?php get_header(); ?>
<section class="container" style="padding-top: 5rem;">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<h4>Birthdate: <?php the_field('birth_date'); ?></h4>
		
		<?php $location = get_field('birthplace');
		if( $location ) {
		// Loop over segments and construct HTML.
			$address = '';
			foreach( array('street_number', 'street_name', 'city', 'state', 'post_code', 'country') as $i => $k ) {
				if( isset( $location[ $k ] ) ) {
					$address .= sprintf( '<span class="segment-%s">%s</span>, ', $k, $location[ $k ] );
				}
			}
			// Trim trailing comma.
			$address = trim( $address, ', ' );

			// Display HTML.
			echo '<p>' . $address . '.</p>';
		} ?>

		<?php $location = get_field('birthplace');
		if( $location ): ?>
			<div class="acf-map" data-zoom="16">
				<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
			</div>
		<?php endif; ?>

	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

</section>
<?php get_footer(); ?>
