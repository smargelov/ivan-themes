<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="span9 main">
				<?php the_breadcrumb(); ?>
				<?php if (have_posts()): ?>
					<div class="row">
						<div class="span9">
							<h2 class="well">
								Результаты по запросу &ldquo;<?php the_search_query(); ?>&rdquo;
							</h2>
						</div>
					</div>
				<?php while (have_posts()) : the_post(); ?>
				<div class="post">
					<div class="row">
						<h2 class="span9 list"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					</div>
					<?php if( is_single()): ?> 
					<div class="row">
						<div class="span9 postinfo">
							<span class="postdate">
								<a href="#"><?php the_time('d.m.Y'); ?></a>
							</span>
							<span class="postcomment">
								<?php comments_popup_link(); ?>
							</span>
							<span class="posttags">
								<?php the_tags('Тэги: ', ', ', ''); ?> 
							</span>
						</div>
					</div>
					<?php else : ?>
					<!-- Если не найдено -->
					<?php endif; ?>
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