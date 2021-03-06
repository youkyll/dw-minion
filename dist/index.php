<?php get_header(); ?>
	<?php 
		$theme_option = get_option( 'dw_minion_theme_options' )['fullwidth_content'];
		if ( 'yes' == $theme_option ) : ?>
			<div id="content" class="site-content content-list full-width-page" role="main">
		<?php else : ?>
			<div id="primary" class="content-area">
				<div class="primary-inner">
					<div id="content" class="site-content content-list" role="main">
		<?php endif; ?>
		<?php  if( is_archive() ) : ?>
			<header class="page-header">
						<h1 class="page-title">
			<?php the_archive_title(); ?>
			</h1>
			<?php
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header>
		<?php elseif( is_search() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'dw-minion' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
		<?php endif; ?>
				<?php 
					if ( have_posts() ) : 
						while ( have_posts() ) : the_post(); 
						if ( 'yes' == $theme_option ) {
							get_template_part( 'content', 'full' );
						} else {
							get_template_part( 'content', get_post_format() ); 
						}
						endwhile;
						dw_minion_content_nav( 'nav-below' ); 
					else : 
						get_template_part( 'no-results', 'index' ); 
					endif; 
				?>
				<?php if ( 'yes' == $theme_option ) : ?>
				</div>
			<?php else : ?>
				</div>
			</div>
		</div>
		<?php get_sidebar('secondary'); ?>
		<?php endif; ?>
<?php get_footer(); ?>