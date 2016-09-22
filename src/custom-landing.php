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
							<a href="<?php the_sub_field('link'); ?>">
								<h1><?php the_sub_field('cta'); ?></h1>
								<img src="<?php the_sub_field('image'); ?>" alt="">
							</a>
						</section>
					<?php elseif( get_row_layout() == 'grid_1') : ?>
						<section class="grid type-1">
							<div class="left">
								<a href="<?php the_sub_field('link_1'); ?>">
									<h2><?php the_sub_field('text_1'); ?></h2>
									<img src="<?php the_sub_field('image_1'); ?>" alt="">
								</a>
							</div>
							<div class="center">
								<a href="<?php the_sub_field('link_2'); ?>">
									<h2><?php the_sub_field('text_2'); ?></h2>
									<img src="<?php the_sub_field('image_2'); ?>" alt="">
								</a>
							</div>
							<div class="right">
								<a href="<?php the_sub_field('link_3'); ?>">
									<h2><?php the_sub_field('text_3'); ?></h2>
									<img src="<?php the_sub_field('image_3'); ?>" alt="">
								</a>
							</div>
						</section>
					<?php elseif( get_row_layout() == 'grid_2') : ?>
						<section class="grid type-2">
							<?php if( have_rows( 'champagne' ) ) :
								while( have_rows( 'champagne' ) ) : the_row(); ?>
									<a href="<?php the_sub_field('link'); ?>">
										<div class="champagne">
											<img src="<?php the_sub_field('image'); ?>" alt="">
											<span class="name"><?php the_sub_field('name'); ?></span>
											<span class="house"><?php the_sub_field('text'); ?></span>
										</div>
									</a>
								<?php endwhile; 
							endif; ?>
						</section>
					<?php elseif( get_row_layout() == 'product' ) : ?>
							<section class="product">
								<div class="left">
									<img src="<?php the_sub_field('image'); ?>">
								</div>
								<div class="right">
									<div class="intro">
										<h2 class="name"><?php the_sub_field('name'); ?></h2>
										<h3 class="house"><?php the_sub_field('house'); ?></h3>
										<span class="price"><?php the_sub_field('price'); ?></span>
									</div>
									<div class="columns">
										<div class="column column-left"><?php the_sub_field('column_left'); ?></div>
										<div class="column column-right"><?php the_sub_field('column_right'); ?></div>
									</div>
								</div>
							</section>
					<?php endif;
				endwhile;
			endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
