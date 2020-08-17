<div class="sidebar">
	<div class="about">
		<h4 class="arvo black">Sobre nós</h4>
		<img src="<?php bloginfo('template_url'); ?>/dist/img/friday.png"/>
		<h3 class="arvo red">TGI FRIDAYS</h3>
		<p><?php the_field('descricao', 'option'); ?></p>
		<a href="<?php the_field('link', 'option'); ?>">Saiba mais</a>
	</div>
	<div class="social">
		<h4 class="arvo black">Nossas redes</h4>
		<ul class="inline middle">
			<?php $link = get_field('link_facebook', 'option'); if(!empty($link)): ?>
				<li><a href="<?php the_field('link_facebook', 'option'); ?>"><i class="sprite sprite-icon-facebook"></i></a></li>
			<?php endif; ?>
			<?php $link = get_field('link_youtube', 'option'); if(!empty($link)): ?>
				<li><a href="<?php the_field('link_youtube', 'option'); ?>"><i class="sprite sprite-icon-play"></i></a></li>
			<?php endif; ?>
			<?php $link = get_field('link_instagram', 'option'); if(!empty($link)): ?>
				<li><a href="<?php the_field('link_instagram', 'option'); ?>"><i class="sprite sprite-icon-instagram"></i></a></li>
			<?php endif; ?>
		</ul>
	</div>	
	<div class="posts">
		<h4 class="arvo black">Posts Principais</h4>
		<ul class="lista">
			<?php
			$args = array(
				'posts_per_page' => 4,
				'post_type'		=> 'post',
			);
			$my_query = new WP_Query( $args );
			if ( $my_query->have_posts() ) {
			while ( $my_query->have_posts() ) { $my_query->the_post();  //array_push($arrayPosts,get_the_ID());

			?>
			<li>
				<a href="<?php bloginfo('template_url'); ?>">
					<div class="row">
						<div class="col mobile-1-3 ">
							<div class="thumb">
								<?php the_post_thumbnail('small'); ?>
							</div>
						</div>
						<div class="col mobile-2-3">
							<h5 class="black"><?php the_title(); ?></h5>
							<span class="date"><?php echo get_the_date('F, Y'); ?></span>
						</div>											
					</div>
				</a>
			</li>
			<?php }} wp_reset_postdata(); ?>											
		</ul>
	</div>							
</div>