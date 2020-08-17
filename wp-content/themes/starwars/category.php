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
						$count = 1;
						if ( have_posts() ) {
						while ( have_posts() ) { the_post();
						?>
							<div class="card">
								<div class="row">
									<div class="col mobile-1-1 desk-1-2">
										<a href="<?php the_permalink(); ?>">
											<div class="thumb">
												<?php the_post_thumbnail('thumb'); ?>
												<img src="<?php bloginfo('template_url'); ?>/dist/img/mask_0<?php echo $count; ?>.png" class="mask"/>
											</div>
										</a>
									</div>
									<div class="col mobile-1-1 desk-1-2">
										<a href="<?php the_permalink(); ?>">
											<h2 class="amontillado red"><span><?php the_title(); ?></span></h2>
										</a>
										<?php
											$categories = get_the_category();
											$category_id = $categories[0]->cat_ID;
										?>
										<span class="cat">
											<a href="<?php echo get_category_link( $category_id ); ?>">
												<?php echo get_cat_name( $category_id  );?>
											</a>
										</span>
										<a href="<?php the_permalink(); ?>">
											<?php the_excerpt(); ?>
											<span class="more backToBlack">continue lendo</span>
										</a>
									</div>											
								</div>
							</div>
						<?php if($count == 4){$count = 1;}else{$count++;}; }} 
						wp_reset_postdata(); ?>						

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