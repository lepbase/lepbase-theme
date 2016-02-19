<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Lepbase_Dot_Org
 * @since Lepbase Dot Org 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<!--div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div-->
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
			<a href="<?php echo get_page_link(); ?>">
				<h1><?php the_title(); ?></h1>
			</a>
			<hr/>
		<?php else : ?>
		<?php $meta = get_post_meta(get_the_ID(), 'link', true); ?>
		<h1 class="entry-title">
			<?php if ($meta){ ?>
				<a href="<?php echo $meta ?>" rel="bookmark"><?php the_title()?></a>
			<?php } else { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			<?php } ?>
		</h1>
		<?php endif; // is_single() ?>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php $author = get_the_author(); ?>
		<?php $date = the_date('F jS Y','','',false); ?>
		<?php $page_link = get_page_link(); ?>
		<?php $related = false; ?>
		<?php $names = array(); ?>
		<?php $tags = get_the_tags(); ?>
		<?php foreach ($tags as $tag){
				$names[] = $tag->name;
			} ?>
			
			
			<?php if($tags){
					$related = list_related_posts_by_tag( $tags ); 
				} ?>
			<?php if($related && max(array_map('count', $related)) > 0) : ?>
				<div class="lb-blog-linkbox clearfix">
				<div class="lb-linkbox-header">related pages</div>
				<?php foreach($related as $tag => $cats) : ?>
					<?php if ( !in_array($tag,$names)) : 
							continue;
						endif; ?>
					<div class="lb-blog-linkset clearfix">
						<div class="lb-blog-linktext">
						  <?php echo get_tag_header($tag); ?>
						</div>
						<?php foreach($cats as $cat => $arr) : ?>
							<div class="lb-blog-link">
    										<?php echo get_generic_tag_link($cat,$arr); ?>
    									</div>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
				</div>
			
			<?php endif; ?>
			<div class="lb-updated-by">
			Added 
			by
			<?php echo $author; ?>
			on
			<?php echo $date; ?>
			</div>
			<?php
			the_content();

			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'lepbasedotorg' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'lepbasedotorg' ) . '</span>', __( 'One comment so far', 'lepbasedotorg' ), __( 'View all % comments', 'lepbasedotorg' ) ); ?>
			</div><!-- .comments-link -->
		<?php endif; // comments_open() ?>

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->