	<?php wp_footer(); ?>
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col mobile-1-1 text-center">
					<span>TM & © Lucasfilm Ltd. All Rights Reserved</span>
				</div>
			</div>
		</div>
	</footer>
		<script>
			jQuery(document).ready(function($){
				
				
				$('.trigger').click(function(e){
					e.preventDefault();
					var target = $(this).attr('href');
					$('[data-trigger="'+target+'"]').each(function(){
						$(this).toggleClass('active').siblings().removeClass('active');
					});
				});	

			});	
	</script>
</body>
</html>