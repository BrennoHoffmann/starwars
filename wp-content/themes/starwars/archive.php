<?php 
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$arrayPosts = array();
?>
<?php get_header(); ?>

	<div class="main">
		<div class="container all">
			<div class="row">
				<div class="col mobile-1-1 text-center">
					<p class="init"><?php bloginfo('description'); ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col mobile-1-1 tablet-1-2 desk-2-3">
					<div class="row">
						<div class="col mobile-1-1">
						<?php
						$args = array(
							'post__not_in' =>  $arrayPosts,
							'post_type'		=> 'post',
						);
						$my_query = new WP_Query( $args );
						if ( $my_query->have_posts() ) {
						while ( $my_query->have_posts() ) { $my_query->the_post();  array_push($arrayPosts,get_the_ID());

						?>
							<a href="<?php the_permalink(); ?>" class="card">
								<div class="row">
									<div class="col mobile-1-1 desk-1-2">
										<div class="thumb">
											<?php the_post_thumbnail('thumb'); ?>
											<img src="<?php bloginfo('template_url'); ?>/dist/img/mask_01.png" class="mask"/>
										</div>
									</div>
									<div class="col mobile-1-1 desk-1-2">
										<h2 class="amontillado red"><span><?php the_title(); ?></span></h2>
										<?php
											$categories = get_the_category();
											$category_id = $categories[0]->cat_ID;
										?>
										<span class="cat"><?php echo get_cat_name( $category_id  );?></span>
										<?php the_excerpt(); ?>
										<span class="more backToBlack">continue lendo</span>
									</div>											
								</div>
							</a>
						<?php }} wp_reset_postdata(); ?>						

						</div>
					</div>
					<?php include 'includes/pagination.php'; ?>
				</div>
				<div class="col mobile-1-1 tablet-1-2 desk-1-3">
					<?php get_sidebar(); ?>
				</div>				
			</div>			
		</div>
	</div>
<?php get_footer(); ?>	