<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
	<?php mars_gtm('head') ?>
	<!--=== OPEN-GRAPH TAGS ===-->
	<?php mars_ogtags() ?>
	<!--=== PRELOAD FONTS ===-->
	<?php // mars_preload_fonts() ?>
	<!--=== WP HEAD ===-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php mars_gtm('body') ?>

	<?php $custom_logo_id = get_theme_mod('custom_logo');
	$image = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>

	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="<?php echo  site_url(); ?>">
				<div
				class="logo"
				style="background-image: url('<?php echo $image[0] ? $image[0] : get_template_directory_uri()?>/assets/images/MarsLogoBlack.webp')">
				</div>
			</a>
			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e('Toggle Navigation', 'theme-textdomain'); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar-content">


				<?php
				wp_nav_menu(array(
					'theme_location' => 'mainmenu', // Defined when registering the menu
					'menu_id'        => 'menu-main',
					'container'      => false,
					'depth'          => 2,
					'menu_class'     => 'navbar-nav mr-auto',
					'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
					'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
				));
				?>
			</div>

			<?php if (have_rows('rs', 'options')) : ?>
				<?php while (have_rows('rs', 'options')) : the_row(); ?>
					<ul class="navbar-nav ml-auto header__rs">
						<?php if (get_sub_field('facebook')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('facebook'); ?>" target="_blank">
									<i class="fab fa-facebook-f" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('twitter')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('twitter'); ?>" target="_blank">
									<i class="fab fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('linkedin')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('linkedin'); ?>" target="_blank">
									<i class="fab fa-linkedin-in" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
						<?php if (get_sub_field('instagram')) : ?>
							<li class="footer__rs__item">
								<a href="<?php the_sub_field('instagram'); ?>" target="_blank">
									<i class="fab fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</nav>
	<?php
		$bg_default = get_field('default_bg_light', 'option');
	if (is_page() && !is_front_page() || is_single()) :
		$background_image = get_the_post_thumbnail_url();
		?>
		<header class="page-header <?php echo $background_image ? "hasBg" : "default"?>" style="background-image: url(<?php echo $background_image ? $background_image : $bg_default; ?>)">
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
		<?php elseif (is_home()) :
			$background_image_home = get_the_post_thumbnail_url(get_option('page_for_posts'));
			?>
					<header class="page-header <?php echo $background_image_home ? "hasBg" : "default"?>" style="background-image: url(<?php echo $background_image_home ? $background_image_home : $bg_default; ?>)">
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>
		<?php elseif (is_archive() || is_category()) :
			$category = get_queried_object();
			$image = get_field('image', $category);
			?>
			<header class="page-header" style="background-image: url(<?= $image['url'];?>)">
				<h1 class="page-title screen-reader-text">
					<?php
					if (is_day()) :
						echo get_the_date();
					elseif (is_month()) :
						echo get_the_date(_x('F Y', 'monthly archives date format', 'stanlee'));
					elseif (is_year()) :
						echo get_the_date(_x('Y', 'yearly archives date format', 'stanlee'));
					else :
						single_cat_title();
					endif;
					?>
				</h1>
			</header>
	<?php endif; ?>
	<div id="content" class="site-content">