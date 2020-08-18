<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
$arrayPosts = array();
?>
<?php get_header(); ?>

<div class="main">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>