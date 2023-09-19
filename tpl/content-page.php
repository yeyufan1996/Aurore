<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aurore
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (akina_option('patternimg') || !get_post_thumbnail_id(get_the_ID())) { ?>
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header>
	<?php } ?>
	<?php get_template_part('layouts/sidebox'); ?>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __('Pages:', 'aurore'),
				'after' => '</div>',
			));
		?>
	</div>

	<footer class="entry-footer">
		<?php
		edit_post_link(
			sprintf(
				__('编辑 %s', 'aurore'),
				the_title('<span class="screen-reader-text">"', '"</span>', false)
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer>
</article>