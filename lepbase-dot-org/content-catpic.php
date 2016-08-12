	<?php $title = get_the_title(); ?>
	<?php $excerpt = get_the_excerpt(); ?>
	<?php $page_link = get_page_link(); ?>
	<?php $related = false; ?>
	<?php $names = array(); ?>
	<?php $tags = get_the_tags(); ?>
	<?php foreach ($tags as $tag){
			$names[] = $tag->name;
		} ?>
	<?php $page_cat = single_cat_title( '', false ); ?>
	<?php if (!$page_cat){ $categories = get_the_category(get_the_ID());
				foreach ($categories as $category){
	 				if ($category->name == 'featured' || $category->name == 'toprow'){
						continue;
					}
	 				$page_cat = $category->name;
	 			}
	 } ?>
	<?php $meta = get_post_meta(get_the_ID(), 'link', true); ?>
	
	<div class="lb-excerpt-box clearfix">
		<?php if ($meta){ ?>
		<a class="lb-excerpt" href="<?php echo $meta ?>" title="<?php the_title()?>">
		<?php } else { ?>
		<a class="lb-excerpt" href="<?php the_permalink() ?>" title="<?php the_title()?>">
		<?php } ?>
		<?php // check if the post has a Post Thumbnail assigned to it.
				if ( has_post_thumbnail() ) {
					//echo '<div class="lb-excerpt-topbox">';
					//echo the_post_thumbnail('medium');
					//echo '</div><!--lb-excerpt-topbox-->';
				} ?>
		<?php if ($page_cat){ ?>
		<div class="lb-excerpt-catbox">
			<img class="lb-excerpt-catpic" src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/<?php echo $page_cat ?>-icon.png" />
		</div><!--lb-excerpt-catbox-->
		<?php } ?>
		<?php //if ( has_post_thumbnail() ) {
				//echo '<div class="lb-excerpt-bottombox">';
				//echo $title;
				//echo '</div><!--lb-excerpt-bottom-box-->';
			//} 
			//else {
				echo '<div class="lb-excerpt-bigbox">';
				if ( has_post_thumbnail() ) {
					echo '<div class="lb-excerpt-image-holder">';
					$image = get_the_post_thumbnail(null,'medium');
					preg_match('/src="([^"]+)/i', $image, $matches);
					if ($matches){ 
						echo '<div class="lb-excerpt-image" style="background-image:url(';
						echo $matches[1];
						echo ')"></div><!--lb-excerpt-image-->';
					}
					echo '</div><!--lb-excerpt-image-holder-->';
				}
				echo '<div class="lb-excerpt-bigbox-title">';
				echo $title;
				echo '</div>';
				echo '</div><!--lb-excerpt-bigbox-->';
			//} ?>
		</a>
		<?php if($tags){
					$related = list_related_posts( $tags ); 
				} ?>
			<?php if($related) : ?>
				<div class="lb-excerpt-linkbox">
					<?php foreach($related as $cat => $arr) : ?>
						<?php //if ( !in_array($tag,$names)) : 
								//continue;
							//endif; ?>
					
						<?php if(!($cat == $page_cat && array_key_exists('link',$arr))) : ?>
							<div class="lb-excerpt-link">
    							<?php echo get_generic_tag_link($cat,$arr); ?>
    						</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
	</div><!--lb-excerpt-box-->