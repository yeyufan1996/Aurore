<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Akina
 */
?>
<?php header('X-Frame-Options: SAMEORIGIN'); ?>
<!DOCTYPE html>
<!-- 
Theme by                                                                                    
   SSSSSSSSSSSSSSS                                                                       
 SS:::::::::::::::S                                                                      
S:::::SSSSSS::::::S                                                                      
S:::::S     SSSSSSS                                                                      
S:::::S            uuuuuu    uuuuuu rrrrr   rrrrrrrrr   aaaaaaaaaaaaa  nnnn  nnnnnnnn    
S:::::S            u::::u    u::::u r::::rrr:::::::::r  a::::::::::::a n:::nn::::::::nn  
 S::::SSSS         u::::u    u::::u r:::::::::::::::::r aaaaaaaaa:::::an::::::::::::::nn 
  SS::::::SSSSS    u::::u    u::::u rr::::::rrrrr::::::r         a::::ann:::::::::::::::n
	SSS::::::::SS  u::::u    u::::u  r:::::r     r:::::r  aaaaaaa:::::a  n:::::nnnn:::::n
	   SSSSSS::::S u::::u    u::::u  r:::::r     rrrrrrraa::::::::::::a  n::::n    n::::n
			S:::::Su::::u    u::::u  r:::::r           a::::aaaa::::::a  n::::n    n::::n
			S:::::Su:::::uuuu:::::u  r:::::r          a::::a    a:::::a  n::::n    n::::n
SSSSSSS     S:::::Su:::::::::::::::uur:::::r          a::::a    a:::::a  n::::n    n::::n
S::::::SSSSSS:::::S u:::::::::::::::ur:::::r          a:::::aaaa::::::a  n::::n    n::::n
S:::::::::::::::SS   uu::::::::uu:::ur:::::r           a::::::::::aa:::a n::::n    n::::n
 SSSSSSSSSSSSSSS       uuuuuuuu  uuuurrrrrrr            aaaaaaaaaa  aaaa nnnnnn    nnnnnn
-->
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<title itemprop="name">
		<?php global $page, $paged;
		wp_title('-', true, 'right');
		bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page()))
			echo " - $site_description";
		if ($paged >= 2 || $page >= 2)
			echo ' - ' . sprintf(__('第 %s 页 ', 'aurore'), max($paged, $page)); ?>
	</title>
	<?php
	if (akina_option('akina_meta') == true) {
		$keywords = '';
		$description = '';
		if (is_singular()) {
			$keywords = '';
			$tags = get_the_tags();
			$categories = get_the_category();
			if ($tags) {
				foreach ($tags as $tag) {
					$keywords .= $tag->name . ',';
				}
				;
			}
			;
			if ($categories) {
				foreach ($categories as $category) {
					$keywords .= $category->name . ',';
				}
				;
			}
			;
			$description = mb_strimwidth(str_replace("\r\n", '', strip_tags($post->post_content)), 0, 240, '…');
		} else {
			$keywords = akina_option('akina_meta_keywords');
			$description = akina_option('akina_meta_description');
		}
		;
		?>
		<meta name="description" content="<?php echo $description; ?>" />
		<meta name="keywords" content="<?php echo $keywords; ?>" />
	<?php } ?>
	<link rel="shortcut icon" href="<?php echo akina_option('favicon_link', ''); ?>" />
	<meta name="theme-color" content="#31363b">
	<meta http-equiv="x-dns-prefetch-control" content="on">
	<?php wp_head(); ?>
	<script type="text/javascript">
		if (!!window.ActiveXObject || "ActiveXObject" in window) {
			alert('朋友，IE浏览器未适配哦~\n如果是 360、QQ 等双核浏览器，请关闭 IE 模式！');
		}
	</script>
	<?php if (akina_option('google_analytics_id', '')): ?>
		<script>
			window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments) } gtag('js', new Date()); gtag('config', '<?php echo akina_option('google_analytics_id', ''); ?>');
		</script>
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
	<div class="scrollbar" id="bar"></div>
	<section id="main-container">
		<?php
		if (!akina_option('head_focus')) {
			$filter = akina_option('focus_img_filter');
			?>

			<div id="large-header" class="headertop large-header <?php echo $filter; ?>">
				<?php get_template_part('layouts/imgbox');
				?>
				<canvas id="bubble-canvas" class="bubble"></canvas>
			</div>

			</div>
		<?php } ?>
		<div id="page" class="site wrapper">
			<?php if (is_front_page()) { ?><!--判断是否为首页-->
				<header class="site-header no-select is-homepage" role="banner">
				<?php } else { ?>
					<header class="site-header no-select" role="banner">
					<?php } ?>
					<div class="site-top">
						<div class="site-branding">
							<?php if (akina_option('akina_logo')) { ?>
								<div class="site-title">
									<a href="<?php bloginfo('url'); ?>"><img
											src="<?php echo akina_option('akina_logo'); ?>"></a>
								</div>
							<?php } else { ?>
								<span class="site-title">
									<span class="logolink serif">
										<a href="<?php bloginfo('url'); ?>">
											<span class="site-name">
												<?php echo akina_option('site_name', ''); ?>
											</span>
										</a>
									</span>
								</span>
							<?php } ?><!-- logo end -->
						</div><!-- .site-branding -->

						<?php header_user_menu();
						if (akina_option('top_search') == 'yes') { ?>
							<div class="searchbox"><i class="iconfont js-toggle-search iconsearch icon-search"></i></div>
						<?php } ?>
						<div class="lower">
							<?php if (!akina_option('shownav')) { ?>
								<div id="show-nav" class="showNav">
									<div class="line line1"></div>
									<div class="line line2"></div>
									<div class="line line3"></div>
								</div>
							<?php } ?>
							<nav>
								<?php wp_nav_menu(array('depth' => 2, 'theme_location' => 'primary', 'container' => false)); ?>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</header>
				<?php if (get_post_meta(get_the_ID(), 'cover_type', true) == 'hls') {
					the_video_headPattern_hls();
				} elseif (get_post_meta(get_the_ID(), 'cover_type', true) == 'normal') {
					the_video_headPattern_normal();
				} else {
					the_headPattern();
				} ?>
				<div id="content" class="site-content">