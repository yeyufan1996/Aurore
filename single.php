<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Akina
 */
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while (have_posts()):
			the_post();
			get_template_part('tpl/content', 'single');
			get_template_part('layouts/sidebox');
			get_template_part('layouts/post', 'nextprev');
			if (akina_option('show_authorprofile')) {
				get_template_part('layouts/authorprofile');
			}
		endwhile;
		?>
	</main>
</div>
<?php
get_footer();