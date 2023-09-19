<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aurore
 */

?>
<article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
	<div class="post-entry">
		<div class="feature">
			<?php if (has_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>">
					<div class="overlay"><i class="iconfont icon-text"></i></div>
					<?php the_post_thumbnail(); ?>
				</a>
			<?php } else { ?>
				<a href="<?php the_permalink(); ?>">
					<div class="overlay"><i class="iconfont icon-text"></i></div><img
						src="<?php bloginfo('template_url'); ?>/images/random/d-<?php echo rand(1, 10) ?>.jpg" />
				</a>
			<?php } ?>
		</div>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="p-time">
			<?php if (is_sticky()): ?>
				<i class="iconfont hotpost icon-hot"></i>
			<?php endif ?>
			<i class="iconfont icon-time"></i>
			<?php echo poi_time_since(strtotime($post->post_date_gmt)); ?>
		</div>
		<?php the_excerpt(); ?>
		<footer class="entry-footer">
			<div class="post-more">
				<a href="<?php the_permalink(); ?>"><i class="iconfont icon-caidan"></i></a>
			</div>
			<div class="info-meta">
				<div class="comnum">
					<span><i class="iconfont icon-mark"></i>
						<?php comments_popup_link('NOTHING', '1 ' . __("条评论", "aurore") , '% ' . __("条评论", "aurore") ); ?>
					</span>
				</div>
				<div class="views">
					<span><i class="iconfont icon-attention"></i>
						<?php echo get_post_views(get_the_ID()) . ' ' . _n('Hit', '热度', get_post_views(get_the_ID()), 'aurore') /**/?>
					</span>
				</div>
			</div>
		</footer>
	</div>
	<hr>
</article>