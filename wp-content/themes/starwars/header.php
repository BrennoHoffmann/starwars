<?php 
	$home = array(
		'theme_location'  => '',
		'menu' => 'Header',
		'container'       => false,
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => 7,
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '%3$s',
		'depth'           => 0,
		'walker'          => ''
	);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Star Wars <?php wp_title(); ?></title>

	<?php wp_head(); ?>

</head>
<body>
	<header class="head">
		<div class="container">
			<div class="row">
				<div class="col mobile-1-2 desk-1-4">
					<?php the_custom_logo(); ?>
				</div>
				<div class="col mobile-1-2 desk-3-4">
					<ul class="menu" data-trigger="#hamburguer">
						<?php wp_nav_menu($home); ?>
					</ul>
					<div class="hamburguer">
						<a href="#hamburguer" class="menu-mobile trigger">
							<div data-trigger="#hamburguer">
								<span class="bar1"></span>
								<span class="bar2"></span>
								<span class="bar3"></span>
							</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</header>