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
	<div class="post-status">
		<div class="postava">
			<a href="javascript:;">
				<img alt="<?php the_author(); ?>" src="<?php echo get_avatar_profile_url(); ?>"
					class="avatar avatar-64 photo" height="64" width="64">
			</a>
		</div>
		<div class="s-content">
			<p>
				<?php echo mb_strimwidth(strip_shortcodes(strip_tags(apply_filters('the_content', $post->post_content))), 0, 150, "..."); ?>
			</p>
			<div class="s-time">
				<?php if (is_sticky()): ?>
					<i class="iconfont hotpost icon-hot"></i>
				<?php endif ?>
				<i class="iconfont icon-time"></i>
				<?php echo poi_time_since(strtotime($post->post_date_gmt)); ?>
			</div>
		</div>
		<footer class="entry-footer">
			<div class="info-meta">
				<div class="comnum">
					<span><i class="iconfont icon-mark"></i>
						<?php comments_popup_link('NOTHING', '1 ' . __("条评论", "aurore"), '% ' . __("条评论", "aurore")); ?>
					</span>
				</div>
				<div class="views">
					<span><i class="iconfont icon-attention"></i>
						<?php echo get_post_views(get_the_ID()) . ' ' . _n('Hit', '热度', get_post_views(get_the_ID()), 'aurore') ?>
					</span>
				</div>
			</div>
		</footer>
	</div>
	<hr>
</article>