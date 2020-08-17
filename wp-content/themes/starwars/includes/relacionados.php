		<?php
			$tags = wp_get_post_tags($post->ID);
			$count = 1;
			  $tag_ids = array();
			  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			  $args=array(
			  'tag__in' => $tag_ids,
			  'post__not_in' => array($post->ID),
			  'showposts'=>2,
			  'caller_get_posts'=>1
			  );
			  $my_query = new wp_query($args);
			  if( $my_query->have_posts() ) {
				echo	'<div class="relacionados">';
				echo		'<div class="row">';
				echo			'<div class="col mobile-1-1">';
				echo				'<h4 class="arvo">Posts Relacionados</h4>';
				echo			'</div>';
				echo		'</div>';
				echo		'<div class="row">';

				while ($my_query->have_posts()) {
					$my_query->the_post();
					?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'card_big' );?>
					<div class="col mobile-1-1 desk-1-2">
						<a href="<?php the_permalink(); ?>" class="card-rel">
							<div class="row">
								<div class="col mobile-1-2">
									<?php the_post_thumbnail('square'); ?>
								</div>
								<div class="col mobile-1-2">
									<h5 class="black"><?php the_title(); ?></h5>
									<span class="date red"><?php echo get_the_date('F, Y'); ?></span>
								</div>									
							</div>
						</a>
					</div>
					<?php
				}
				echo		'</div>';
				echo '</div>';
				
			}
		?>