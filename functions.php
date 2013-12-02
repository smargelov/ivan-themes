<?php 

// Пагинация Bootstrap
function bootstrap_pagination($pages = '', $range = 2)
{
$showitems = ($range * 2)+1;

global $paged;
if(empty($paged)) $paged = 1;

if($pages == '')
{
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
{
$pages = 1;
}
}

if(1 != $pages)
{
echo "<div class='pagination pagination-centered'><ul>";
if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
}
}

if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
echo "</ul></div>\n";
}
}

// Подлючаем виджеты
if (function_exists('register_sidebar'))
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'before_widget' => '<div id="%1$s" class="widget"><div class="row"><div class="span3">',
        'after_widget' => '</div></div></div> ',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

// Регистрируем меню
   register_nav_menus(
   array(
  'primary'=>__('Меню'),
  )
);

// хлебные крошки
function the_breadcrumb() {
	echo '<ul class="breadcrumb">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Главная';
		echo "</a></li> / ";
		if (is_single()) {
			echo '<li>';
			the_time('d.m.Y');
			echo ' </li><li>';
			echo "</li> / <li>";
			the_title();
			echo '</li>';
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
		elseif (is_tag()) {echo"<li>Метка: "; single_tag_title(); echo"</li>";}
		elseif (is_day()) {echo"<li>Архив за "; the_time('F jS, Y'); echo'</li>';}
		elseif (is_month()) {echo"<li>Архив за "; the_time('F, Y'); echo'</li>';}
		elseif (is_year()) {echo"<li>Архив за "; the_time('Y'); echo'</li>';}
		elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
		elseif (is_search()) {echo"<li>Результаты поиска"; echo'</li>';}
		echo '</ul>';
	}
}

/* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

/* ------------ Настройки -------------- */
$meta_key		= 'views';	// Ключ мета поля, куда будет записываться количество просмотров.
$who_count 		= 1; 			// Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированых пользователей.
$exclude_bots 	= 1;			// Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.
/* СТОП настройкам */

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; // чтобы 1 раз за поток
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}

 ?>