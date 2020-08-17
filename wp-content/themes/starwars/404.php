<?php

if( ! defined( 'ABSPATH' ) ) { header( 'Location: /' ); exit; }

?>
<?php get_header(); ?>
	<section class="back">
		<div class="container">
			<div class="row">
				<div class="col mobile-1-1">
					<a href="../" class="voltar">
						<img src="<?php bloginfo('template_url');?>/assets/img/mobile/seta-voltar.svg" /> Voltar
					</a>
				</div>
			</div>
		</div>
	</section>
	
	<style>
		.card-icones .blue{display:none;}
		.not_found{padding-top:20px;}
		.not_found img{width:100%;height:auto;}
	</style>
	
	<div class="not_found">
		<div class="container">
			<div class="row">
				<div class="col mobile-1-1 col-to-center">
					<div class="content">
						<h1 class="m-fs-24 d-fs-36">Erro 404.</small></h1>
						<h2 class="m-fs-16 d-fs-18">A página não pôde ser encontrada, desculpe.</h2>
						<span class="m-fs-16 d-fs-16">
							Parece que a página que você procura não existe ou você acessou o endereço errado. Aproveite para conhecer nossos produtos, ou 
							retorne à navegação voltando para a última página em que estava ou a nossa Home.
						</span>
						<h2 class="m-fs-16 d-fs-18 n-m-b">Conheça nossos produtos:</h2>
					</div>
				</div>
			</div>
		</div>
		<?php
		if( have_rows('conteudo', 12955) ):
			while ( have_rows('conteudo', 12955) ) : the_row();
				if( get_row_layout() == 'mini_cards' ): 
					include 'componentes/template-mini-cards.php';				
				endif;
			endwhile;
		else :
		endif;
		?>
		<div class="container">
			<div class="row">
				<div class="col mobile-1-1 col-to-center">
					<div class="content">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/404.png" />
					</div>
				</div>
			</div>
			<div class="row i-p-t i-p-b">
				<div class="col mobile-1-1 i-p-t i-p-b">
					<a href="<?php bloginfo('url'); ?>" class="button center">Voltar a home</a>
				</div>
			</div>			
		</div>		
	</div>

<?php get_footer(); ?>