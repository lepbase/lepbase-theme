<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lepbase_Dot_Org
 * @since Lepbase Dot Org 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

<?php $page_cat = single_cat_title( '', false ); ?>
	<?php if (!$page_cat){ $categories = get_the_category(get_the_ID());
				foreach ($categories as $category){
	 				if ($category->name == 'featured'){
						continue;
					}
	 				$page_cat = $category->name;
	 			}
	 } 
if ($page_cat){ 
  $pre = get_page_by_title( $page_cat );
  if ($pre){
	echo '<div class="lb-home-text-top">';
  	echo $pre->post_content;
	echo "</div>";
  }
}
?>

		<?php if ( have_posts() ) : ?>
			<!--header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'lepbasedotorg' ), single_cat_title( '', false ) ); ?></h1>

				<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header--><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( $tag = get_query_var( 'tag', 0 )) : 
							if ( !has_tag($tag,0)) : 
								break;
							endif;
						endif;
					?>
				<?php get_template_part( 'content', 'catpic' ); ?>
			<?php endwhile; ?>

			<?php lepbasedotorg_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>