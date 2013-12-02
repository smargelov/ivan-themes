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
						<div class="span9">
							<?php the_content() ?> 
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