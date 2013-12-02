	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="span9">
					<p class="licenses">2013 Блог Сергея Маргелова.  Всё содержимое сайта можно использовать в соответствии с лицензией <a rel="nofollow" href="http://creativecommons.org/licenses/by/3.0/" target="_blank"><img alt="Лицензия Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/80x15.png"></a>.</p>
				</div>
				<div class="span3">
					<p class="copy">web site development <a href="http://smargelov.ru">smargelov</a></p>
				</div>
			</div>
		</div>
	</div>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.fitvids.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.min.js"></script>
	<script>
	$(document).ready(function(){
		$(".post").fitVids();
	});
	</script>
	<script>
		if ($.cookie('viewed_banner') != $('#infobox').text()) {
			$('#infobox').show();
			$('#close-button').on('click', function() {
				$('#infobox').hide();
				$.cookie('viewed_banner', $('#infobox').text(), { expires: 365,
				                                                  path: "/"});
			});
		}
	</script>
	<?php wp_footer(); ?>
</body>
</html>