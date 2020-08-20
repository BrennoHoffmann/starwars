<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
$arrayPosts = array();
?>
<?php get_header(); ?>

<div class="main">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<div class="content">
				<h1><?php the_title(); ?></h1>
				<p>
					<?php the_content(); ?>
				</p>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>