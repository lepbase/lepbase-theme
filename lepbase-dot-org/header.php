<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Lepbase_Dot_Org
 * @since Lepbase Dot Org 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
       <?php include_once("analyticstracking.php") ?>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
		<div class="header-main clearfix">
<!--			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="lb-site-title"><img class="lb-site-logo" src="<?php echo get_site_icon_url( ); ?>"/> <?php bloginfo( 'name' ); ?><span class="lb-site-tagline">[<?php bloginfo( 'description' ); ?>]</span></div></a>
-->
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="lb-site-title"><img class="lb-site-logo" src="<?php echo get_site_icon_url( ); ?>"/><img class="lb-site-long-logo"
src="/wp-content/themes/lepbase-dot-org/images/wordpress-lepbase.png" /></div></a>';
			
			
			<?php
			// get all the categories from the database
			$cats = get_categories(array('orderby'=>'id')); 
			$scats = array();
			foreach ($cats as $cat) {
				if ($cat->name == 'blog'){
					array_unshift($scats,$cat);
				}
				elseif ($cat->name == 'home' || $cat->name == 'featured' || $cat->name == 'toprow'){
					continue;
				}
				else {
					$scats[] = $cat;
				}
			}
				// loop through the categories
				foreach (array_reverse($scats) as $cat) {
					// setup the cateogory ID
					$cat_id= $cat->term_id;
					// Make a header for the cateogry
					$cat_link = get_category_link( $cat_id );
					echo '<a href="'.$cat_link.'"><div class="lb-menu-category">';
					echo '<img title="'.$cat->name.'"';
    				echo ' src="'.get_template_directory_uri().'/images/'.$cat->name.'-icon.png"';
    				echo ' class="lb-menu-linkicon" />';
					
					echo '<h2 class="lb-menu-label">'.$cat->name.'</h2>';
					// create a custom wordpress query
					query_posts("cat=$cat_id&posts_per_page=100");
					// start the wordpress loop!
					if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php // create our link now that the post is setup ?>
						<!--a href="<?php the_permalink();?>"><div class="lb-menu-post"><?php the_title(); ?></div></a-->
						
					<?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>
					</div></a>
					<?php wp_reset_query(); ?>
				<?php } // done the foreach statement ?>

			
		</div>

		<!--div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div-->
	</header><!-- #masthead -->
	<div id="main" class="site-main">