<?php get_header(); ?>
<div class="main">
	<div class="container">
		<div class="row">
			<?php
				if (have_posts()) :
					while (have_posts()) : the_post();
			?>
				<article>
					<?php if(!(is_page( 'home' ))): ?>
						<h1><?php the_title(); ?></h1>
					<?php endif; ?>
					<div class="content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php
					endwhile;
				endif;
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>