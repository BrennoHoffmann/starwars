<?php 
if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$arrayPosts = array();
?>
<?php get_header(); ?>

	<div class="main">
		<div class="container all single">
			<div class="row">
				<div class="col mobile-1-1 tablet-4-7 desk-2-3">
					<div class="row">
						<div class="col mobile-1-1">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="single-content">
								<div class="row">
									<div class="col mobile-1-1">
										<div class="text-right">
											<h1 class="amontillado red"><?php the_title(); ?></h1>
										</div>
										<div class="labels">
											<?php
												$categories = get_the_category();
												$category_id = $categories[0]->cat_ID;
											?>
											<span class="cat red"><?php echo get_cat_name( $category_id  );?></span>
											<?php $dia =  get_the_date('j'); ?>
											<span class="date arvo"><?php echo $dia; ?> de <?php the_date('F, Y'); ?></span>
										</div>
										
										<div class="thumb">
											<?php the_post_thumbnail('post_thumbnail'); ?>
											<img src="<?php bloginfo('template_url');?>/dist/img/mask_04.png" class="mask"/>
											<img src="<?php bloginfo('template_url');?>/dist/img/wire-single.png" class="wire"/>
										</div>
									</div>
									<div class="col mobile-1-1">
										<?php the_content(); ?>
									</div>											
								</div>
							</div>
							<?php endwhile; endif; ?>
						</div>								
					</div>
					<?php include 'includes/relacionados.php'; ?>
				</div>
				<div class="col mobile-1-1 tablet-3-7 desk-1-3">
					<?php get_sidebar(); ?>
				</div>				
			</div>			
		</div>
	</div>
<?php get_footer(); ?>	