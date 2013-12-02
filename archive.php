<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="span9 main">
				<?php the_breadcrumb(); ?>
				<?php if (have_posts()): ?>
					<div class="row">
						<div class="span9">
							<h2 class="well">
								<?php $post = $posts[0]; ?>
								<?php if (is_category()): ?>
									<?php single_cat_title(); ?>
								<?php elseif (is_tag()): ?>
									Метка: <?php single_tag_title(); ?>
								<?php elseif (is_day()): ?>
									Архив за <?php the_time('d.m.Y'); ?>
								<?php elseif (is_month()): ?>
									Архив за <?php the_time('F, Y'); ?>
								<?php elseif (is_year()): ?>
									Архив за <?php the_time('Y'); ?> год
								<?php elseif (is_author()): ?>
									Архив автора
								<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])): ?>
									Архивы 
								<?php endif; ?>
							</h2>
						</div>
					</div>
				<?php while (have_posts()) : the_post(); ?>
				<div class="post">
					<div class="row">
						<h2 class="span9 list"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					</div>
					<div class="row">
						<div class="span9 postinfo">
							<span class="postdate">
								<a href="<?php the_permalink() ?>"><?php the_time('d.m.Y'); ?></a>
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
							<?php the_content('читать далее…') ?> 
						</div>
					</div>
				</div> <!-- /post -->
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