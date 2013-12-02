<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="span9 main">
				<?php the_breadcrumb(); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
				<div class="post">
					<div class="row">
						<h1 class="span9 list"><?php the_title(); ?></h1>
					</div>
					<div class="row">
						<div class="span9 postinfo">
							<span class="postdate">
								<?php the_time('d.m.Y'); ?>
							</span>
							<span class="postcomment">
								<?php comments_popup_link(); ?>/<?php echo get_post_meta ($post->ID,'views',true); ?>
							</span>
							<span class="posttags">
								<?php the_tags('Тэги: ', ', ', ''); ?> 
							</span>
						</div>
					</div>
					<div class="row">
						<div class="span9">
							<?php the_content() ?> 
							<div class="well visible-desktop">
								<div class="share42init" data-url="<?php the_permalink() ?>" data-title="<?php the_title() ?>"></div>
								<script type="text/javascript" src="http://www.smargelov.com/wp-content/themes/ivan/share42/share42.js"></script>
							</div>
							<hr>
							<?php 	
							$tags = wp_get_post_tags($post->ID);
							if ($tags) {
							    $tag_ids = array();
							    foreach($tags as $each_tag)
							        $tag_ids[] = $each_tag->term_id;
							    $args = array(
							        'tag__in' => $tag_ids,
							        'post__not_in' => array($post->ID),
							        'orderby'=> 'rand',
							        'showposts' => 4, //вывод количество статей
							        //'caller_get_posts' => 1 //раскомментируйте, если используете WP < 3.1
							        'ignore_sticky_posts' => 1 //если используете WP >= 3.1
							    );
							    $query = new WP_Query($args);
							    if( $query->have_posts() ) {
							        echo '<div class="related">';
							        echo '<h3>Стоит так же посмотреть:</h3><ol>'; //измените название на свое
							        while ($query->have_posts()) {
							            $query->the_post();
							        ?>
							            <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Перейти по ссылке: <?php the_title_attribute(); ?>">
							            <?php the_title(); ?></a></li>
							        <?php
							        }
							        echo '</ol>';
							        echo '</div>';
							    }
							}
							wp_reset_query(); 
							?>
						</div>
					</div>
				</div> <!-- /post -->
				<ul class="pager">
					<li class="previous">
						<?php previous_post_link('%link', '<span>&larr; Раньше</span><br>%title', true); ?>
					</li>
					<li class="next">
						<?php next_post_link('%link', '<span>Позже &rarr;</span><br>%title', true); ?>
					</li>
				</ul>
				<?php include (TEMPLATEPATH . '/ad.php'); ?>
				<?php comments_template(); ?>
				<?php endwhile; ?>
				<?php bootstrap_pagination();?> <!-- пагинация -->
				<?php else : ?>
				<!-- Если не найдено -->
				<?php endif; ?>
			</div> <!-- /main -->
<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>