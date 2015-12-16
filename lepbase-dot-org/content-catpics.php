<?php
/**
 * The template for displaying sets of category pictures 
 *
 * @package WordPress
 * @subpackage Lepbase
 * @since Lepbase 1.1
 */
?>			<div class="lb-category-posts">
			<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
				<?php if ( $tag = get_query_var( 'tag', 0 )) : 
							if ( !has_tag($tag,0)) : 
								break;
							endif;
						endif;
					?>
				<?php get_template_part( 'content', 'catpic' ); ?>

			<?php endforeach; ?>
			</div> <!--lb-category-posts-->