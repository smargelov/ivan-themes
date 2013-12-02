<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="span9 main">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); $loopcounter++; ?>
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
								<?php the_tags('Метки: ', ', ', ''); ?> 
							</span>
						</div>
					</div>
					<div class="row">
						<div class="span9">
							<?php the_content('читать далее…') ?> 
						</div>
					</div>
				</div> <!-- /post -->
				<?php if ($loopcounter <= 1) { include (TEMPLATEPATH . '/ad.php'); } ?>
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