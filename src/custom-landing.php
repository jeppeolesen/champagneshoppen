<?php
/**
 * Template Name: Landing
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Champagne
 */

get_header(); ?>

	<div id="primary" class="content-area landing">
		<main id="main" class="site-main" role="main">
			<?php if( have_rows( 'content' ) ) :
				while( have_rows( 'content' ) ) : the_row();
					if( get_row_layout() == 'hero' ) : ?>
						<section class="hero">
							<h1><?php the_sub_field('cta'); ?></h1>
							<img src="<?php the_sub_field('image'); ?>" alt="">
						</section>
					<?php endif;
				endwhile;
			endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
