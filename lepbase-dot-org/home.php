<?php
/**
 * The template for displaying the home page
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

<?php 
  $pre = get_page_by_title( 'before' );
  if ($pre){
	echo '<div class="lb-home-text-top">';
  	echo $pre->post_content;
	echo "</div>";
  }
?>


<div class="lb-category-posts">
		<?php $args = array( 'category' => get_cat_ID('toprow'), 'numberposts' => 3 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<?php get_template_part( 'content', 'catpic' ); ?>
<?php endforeach; 
wp_reset_postdata();?>

<?php 
  $pre = get_page_by_title( 'between' );
  if ($pre){
	echo '<div class="lb-home-text-top lb-home-text-bottom">';
  	echo $pre->post_content;
	echo "</div>";
  }
?>

<div class="lb-category-posts">
		<?php $args = array( 'category' => get_cat_ID('featured'), 'numberposts' => 9 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<?php get_template_part( 'content', 'catpic' ); ?>
<?php endforeach; 
wp_reset_postdata();?>

</div> <!--lb-category-posts-->

<?php 
  $pre = get_page_by_title( 'after' );
  if ($pre){
  	echo '<div class="lb-home-text-bottom">';
	echo $pre->post_content;
  	echo "<div></div>";
  }
?>

			<!--?php lepbasedotorg_paging_nav(); ?-->


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>