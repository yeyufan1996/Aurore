<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aurore
 */

?>

<article class="post works-list" itemscope="" itemtype="http://schema.org/BlogPosting">
	<div class="works-entry">
		<div class="works-main">
			<div class="works-feature">
				<?php if (has_post_thumbnail()) { ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
				<?php } else { ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo DEFAULT_FEATURE_IMAGE(); ?>" /></a>
				<?php } ?>
			</div>

			<div class="works-overlay">
				<h1 class="works-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<div class="works-p-time">
					<i class="iconfont icon-calendar"></i>
					<?php echo poi_time_since(strtotime($post->post_date_gmt)); //the_time('Y-m-d');?>
				</div>
				<div class="works-meta">
					<div class="works-comnum">
						<span><i class="iconfont icon-mark"></i>
							<?php comments_popup_link(__('暂无', 'aurore'), '1 ', '% '); ?>
						</span>
					</div>
					<div class="works-views">
						<span><i class="iconfont icon-attention"></i>
							<?php echo get_post_views(get_the_ID()); ?>
						</span>
					</div>
				</div>
				<a class="worksmore" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	</div>

</article>