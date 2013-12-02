			<div class="span3 sidebar">
				<div class="widget">
					<div class="row">
						<div class="span3">
							<h4>Кнопочки</h4>
							<ul class="follow-box">
								<li><a href="http://feeds.feedburner.com/smargelov/" target="_blank" title="Подпишись на обновления блога"><i class="icon-rss"></i>RSS</a></li>
								<li><a href="http://www.twitter.com/smargelov" target="_blank" title="Следуй за мной в Twitter"><i class="icon-tw"></i>Twitter</a></li>
								<li><a href="http://www.youtube.com/margeloff" target="_blank" title="Смотри мой канал на YouTube"><i class="icon-yt"></i>YouTube</a></li>
								<li><a href="http://www.facebook.com/smargelov" target="_blank" title="Читай меня в Facebook"><i class="icon-fb"></i>Facebook</a></li>
								<li><a href="https://plus.google.com/u/0/116132623399119508149" target="_blank" title="Добавляй меня в круги на G+"><i class="icon-gp"></i>Google +</a></li>
								<li><a href="http://vkontakte.ru/id84581806" target="_blank" title="Добавляй меня в друзья на VK"><i class="icon-vk"></i>VK</a></li>
							</ul>
						</div>
					</div>
				</div> <!-- /widget -->
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar(Sidebar)): ?>
				<div class="widget">
					<div class="row">
						<div class="span3">
							<h4>Блогролл</h4>
							<ul class="xoxo blogroll">
								<li><a href="http://dolboeb.livejournal.com" target="_blank">Блог Антона Носика</a></li>
								<li><a href="http://runetologia.podfm.ru/" target="_blank">Подкаст "Рунетология"</a></li>
								<li><a href="http://echo.msk.ru/programs/code/" target="_blank">Подкаст Юлии Латыниной</a></li>
								<li><a href="http://www.shender.ru/paper/" target="_blank">Сайт Виктора Шендеровича</a></li>
							</ul>
						</div>
					</div>
				</div> <!-- /widget -->
				<div class="widget">
					<div class="row">
						<div class="span3">
							<h4>Мой хостер</h4>
						</div>
					</div>
					<div class="row">
						<div class="span3">
							<div style="text-align: center;">
								<a href="http://timeweb.ru/?i=4204&a=80"><img src="http://timeweb.ru/img/b/240x100/240x100-10.jpg" alt=""></a>
							</div>
						</div>
					</div>
				</div> <!-- /widget -->
				<?php endif; ?>
			</div> <!-- /sidebar -->