<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name='yandex-verification' content='583cfd0ee78d52ac' />
	<meta name="author" content="Сергей Маргелов" />
	<title>
		<?php if ( is_home() ) { ?>
		Записки человеколюбивого мизантропа
		&nbsp;|&nbsp;
		Блог Сергея Маргелова
		<?php } ?>
		<?php if ( is_search() ) { ?>
		Результаты поиска&nbsp;|&nbsp;
		Блог Сергея Маргелова
		<?php } ?>
		<?php if ( is_single() ) { ?>
		<?php wp_title(''); ?>
		&nbsp;|&nbsp;
		Блог Сергея Маргелова
		<?php } ?>
		<?php if ( is_page() ) { ?>
		<?php wp_title(''); ?>
		&nbsp;|&nbsp;
		Блог Сергея Маргелова
		<?php } ?>
		<?php if ( is_category() ) { ?>
		<?php single_cat_title(); ?>
		&nbsp;|&nbsp;
		Блог Сергея Маргелова
		<?php } ?>
		<?php if ( is_month() ) { ?>
		Записи <?php the_time('F '); ?>
		&nbsp;|&nbsp;
		Блог Сергея Маргелова
		<?php } ?>
		<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?>
		Блог Сергея Маргелова
		&nbsp;|&nbsp;Записи с меткой &nbsp;|&nbsp;
		<?php  single_tag_title("", true); } } ?>
	</title>
	<link rel="alternate" type="application/rss+xml" title="Блог Сергея Маргелова RSS Feed" href="http://feeds.feedburner.com/smargelov/" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/speeddial-160px.png" />
	<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon-57x57-precomposed.png">
 	<?php wp_head(); ?> 
</head>
<body>
	<!-- <div id="infobox" style="display: none;">
		<div class="textwidget"><p>Приглашаю вас на встречу <a href="http://smargelov.ru/weekend">Интернет-бизнес. Преодолевая страх.</a></p></div>
		<div id="close-button">☒</div>
	</div> -->
	<div class="header">
		<!-- Навбар для планшетов и смартов -->
		<div class="navbar hidden-desktop">
			<div class="navbar-inner">
				<div class="container">

				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse">
					<?php 
						wp_nav_menu( array( 
							'theme_location' => 'primary',
							'fallback_cb'=> '', 
							'container' => false,
							'menu_class' => 'nav' 
						) ); 
					?>
					<form id="searchform" method="get" class="form-stacked form-search pull-right" action="<?php echo home_url( '/' ); ?>">
						<input type="text" id="search" class="search-query" name="s" placeholder="<?php _e("Поиск","bonestheme"); ?>" value="<?php the_search_query(); ?>">
					</form>
				</div>

				</div>
			</div>
		</div>
		<!-- конец /Навбар для планшетов и смартов -->
		<div class="container">
			<div class="row">
				<div class="span12 logo">
					<p class="bigtitle"><a href="/">Блог Сергея Маргелова</a></p>
				</div>
			</div>
			<div class="row visible-desktop">
				<div class="span12 logo">
					<p class="smalltitle"><a href="/">записки человеколюбивого мизантропа</a></p>
				</div>
			</div>
		</div>
		<div class="topnav visible-desktop">
			<div class="container">
				<div class="row">
					<?php wp_nav_menu( array( 'theme_location' => 'primary','fallback_cb'=> '', 'container' => false, 'menu_class' => 'menu span9' ) ); ?>
					<div class="span3">
						<form id="searchform" method="get" class="form-stacked form-search pull-right" action="<?php echo home_url( '/' ); ?>">
						<input type="text" id="search" class="search-query" name="s" placeholder="<?php _e("Поиск","bonestheme"); ?>" value="<?php the_search_query(); ?>">
					</form>
					</div>
				</div>
			</div>
		</div> <!-- /topnav -->
	</div> <!-- /header -->