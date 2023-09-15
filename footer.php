<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sakura
 */

?>
</div><!-- #content -->
<?php
if (akina_option('general_disqus_plugin_support')) {
	get_template_part('layouts/duoshuo');
} else {
	comments_template('', true);
}
?>
</div><!-- #page Pjax container-->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info" theme-info="Sakura v<?php echo AURORE_VERSION; ?>">
		<div class="footertext">
			<div class="img-preload">
				<img src="https://cdn.jsdelivr.net/gh/moezx/cdn@3.1.9/img/Sakura/images/wordpress-rotating-ball-o.svg">
				<img src="https://cdn.jsdelivr.net/gh/moezx/cdn@3.1.9/img/Sakura/images/disqus-preloader.svg">
			</div>
			<p style="color: #666666;">
				<?php echo akina_option('footer_info', ''); ?>
			</p>
		</div>
		<div class="footer-device">
			<p style="font-family: 'Ubuntu', sans-serif;">
				<span style="color: #b9b9b9;">
					<?php /* 能保留下面两个链接吗？算是我一个小小的心愿吧~ */?>
					Theme <a href="https://2heng.xin/theme-sakura/" target="_blank"
						style="color: #b9b9b9;;text-decoration: underline dotted rgba(0, 0, 0, .1);">Sakura</a> <i
						class="iconfont icon-sakura rotating" style="color: #ffc0cb;display:inline-block"></i> by <a
						href="https://2heng.xin/" target="_blank"
						style="color: #b9b9b9;;text-decoration: underline dotted rgba(0, 0, 0, .1);">Mashiro</a>
				</span>
			</p>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
<div class="openNav no-select">
	<div class="iconflat no-select">
		<div class="icon"></div>
	</div>
	<div class="site-branding">
		<?php if (akina_option('akina_logo')) { ?>
			<div class="site-title"><a href="<?php bloginfo('url'); ?>"><img
						src="<?php echo akina_option('akina_logo'); ?>"></a></div>
		<?php } else { ?>
			<h1 class="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<?php } ?>
	</div>
</div><!-- m-nav-bar -->
</section><!-- #section -->
<!-- m-nav-center -->
<div id="mo-nav">
	<div class="m-avatar">
		<?php $ava = akina_option('focus_logo') ? akina_option('focus_logo') : get_template_directory_uri() . '/images/avatar.jpg'; ?>
		<img src="<?php echo $ava ?>">
	</div>
	<div class="m-search">
		<form class="m-search-form" method="get" action="<?php echo home_url(); ?>" role="search">
			<input class="m-search-input" type="search" name="s"
				placeholder="<?php _e('搜索......', 'aurore') /**/?>" required>
		</form>
	</div>
	<?php wp_nav_menu(array('depth' => 2, 'theme_location' => 'primary', 'container' => false)); ?>
</div><!-- m-nav-center end -->
<a class="cd-top faa-float animated "></a>
<button id="moblieGoTop" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
<button id="moblieDarkLight"><i class="fa fa-moon-o" aria-hidden="true"></i></button>
<!-- search start -->
<form class="js-search search-form search-form--modal" method="get" action="<?php echo home_url(); ?>" role="search">
	<div class="search-form__inner">
		<?php if (akina_option('live_search')) { ?>
			<div class="micro">
				<i class="iconfont icon-search"></i>
				<input id="search-input" class="text-input" type="search" name="s"
					placeholder="<?php _e('想要找点什么呢?', 'aurore') /**/?>" required>
			</div>
			<div class="ins-section-wrapper">
				<a id="Ty" href="#"></a>
				<div class="ins-section-container" id="PostlistBox"></div>
			</div>
		<?php } else { ?>
			<div class="micro">
				<p class="micro mb-">
					<?php _e('想要找点什么呢', 'aurore')?>
				</p>
				<i class="iconfont icon-search"></i>
				<input class="text-input" type="search" name="s" placeholder="<?php _e('Search', 'sakura') ?>" required>
			</div>
		<?php } ?>
	</div>
	<div class="search_close"></div>
</form>
<!-- search end -->
<?php wp_footer(); ?>
<?php if (akina_option('site_statistics')) { ?>
	<div class="site-statistics">
		<script type="text/javascript"><?php echo akina_option('site_statistics'); ?></script>
	</div>
<?php } ?>

<?php if (akina_option('focus_canvas_animinte') == 'waveloop') { ?>
<!-- 波浪动画 -->
<script type="text/javascript">
    $(function () {
        //底部波浪动画
        function waveloop1() {
            $("#banner_bolang_bg_1").css({"left": "-236px"}).animate({"left": "-1233px"}, 25000, 'linear', waveloop1);
        }

        function waveloop2() {
            $("#banner_bolang_bg_2").css({"left": "0px"}).animate({"left": "-1009px"}, 60000, 'linear', waveloop2);
        }

        //循环播放
        if (screen && screen.width > 480) {
            waveloop1();
            waveloop2();
        }
    });
</script>
<?php } ?>


<?php if (akina_option('focus_canvas_animinte') == 'bubble') { ?>
<!-- 气泡动画 -->
<script type="text/javascript">
    var sUserAgent = navigator.userAgent.toLowerCase();
    var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
    var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
    var bIsMidp = sUserAgent.match(/midp/i) == "midp";
    var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
    var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
    var bIsAndroid = sUserAgent.match(/android/i) == "android";
    var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
    var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
    if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
    }else{
        $(window).on("load",function() {

	var width, 
	    height, 
	    largeHeader, 
	    canvas, 
	    ctx, 
	    circles, 
	    target, 
	    animateHeader = true;

	// Main
	initHeader();
	addListeners();

    function initHeader() {
        width = window.innerWidth;
        height = window.innerHeight;
        target = {
        	x: 0, 
        	y: height
        };

        largeHeader = document.getElementById('large-header');
        largeHeader.style.height = height+'px';

        canvas = document.getElementById('bubble-canvas');
        canvas.width = width;
        canvas.height = height;
        ctx = canvas.getContext('2d');

        // create particles
        circles = [];
        for(var x = 0; x < width*0.5; x++) {
            var c = new Circle();
            circles.push(c);
        }
        animate();
    }

    // Event handling
    function addListeners() {
        window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }

    function scrollCheck() {
        if(document.body.scrollTop > height) 
        	animateHeader = false;
        else 
        	animateHeader = true;
    }

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        largeHeader.style.height = height+'px';
        canvas.width = width;
        canvas.height = height;
    }

    function animate() {
        if(animateHeader) {
            ctx.clearRect(0,0,width,height);
            for(var i in circles) {
                circles[i].draw();
            }
        }
        requestAnimationFrame(animate);
    }

    // Canvas manipulation
    function Circle() {
        var _this = this;

        // constructor
        (function() {
            _this.pos = {};
            init();
        })();

        function init() {
            _this.pos.x = Math.random()*width;
            _this.pos.y = height+Math.random()*100;
            _this.alpha = 0.1+Math.random()*0.3;
            _this.scale = 0.1+Math.random()*0.3;
            _this.velocity = Math.random();
        }

        this.draw = function() {
            if(_this.alpha <= 0) {
                init();
            }
            _this.pos.y -= _this.velocity;
            _this.alpha -= 0.0005;
            ctx.beginPath();
            ctx.arc(_this.pos.x, _this.pos.y, _this.scale*10, 0, 2 * Math.PI, false);
            ctx.fillStyle = 'rgba(255,255,255,'+ _this.alpha+')';
            ctx.fill();
        };
    }

});
        $(document).ready(function () {
        $(".bubble").show();
    });
    };

</script>
<?php } ?>

<?php if (akina_option('canvas_nest') != '0') { ?>
<!-- 引入峰窝canvas 如果屏幕大于480的话 -->
<script type="text/javascript">
    if (screen && screen.width > 480) {
        document.write('<script src="https://cdn.yeyufan.cn/blog/js/canvas-nest.min.js" type="text/javascript"><\/script>');
    }
</script>
<?php } ?>

<?php if (akina_option('canvas_click') != '0') { ?>
<!-- 鼠标点击🌸飘落特效-->
<script src="https://cdn.yeyufan.cn/blog/js/click.min.js"></script>
<?php } ?>
<div class="changeSkin-gear no-select" style="bottom: -999px;">
	<div class="keys">
		<span id="open-skinMenu">
			<i class="iconfont icon-gear inline-block rotating"></i>&nbsp; 切换主题 | SCHEME TOOL
		</span>
	</div>
</div>
<div class="skin-menu no-select">
	<div class="theme-controls row-container">
		<ul class="menu-list">
			<li id="white-bg">
				<i class="fa fa-television" aria-hidden="true"></i>
			</li><!--Default-->
			<li id="sakura-bg">
				<i class="iconfont icon-sakura"></i>
			</li><!--Sakura-->
			<li id="gribs-bg">
				<i class="fa fa-slack" aria-hidden="true"></i>
			</li><!--Grids-->
			<li id="KAdots-bg">
				<i class="iconfont icon-dots"></i>
			</li><!--Dots-->
			<li id="totem-bg">
				<i class="fa fa-superpowers" aria-hidden="true"></i>
			</li><!--Orange-->
			<li id="pixiv-bg">
				<i class="iconfont icon-pixiv"></i>
			</li><!--Start-->
			<li id="bing-bg">
				<i class="iconfont icon-bing"></i>
			</li><!--Bing-->
			<li id="dark-bg">
				<i class="fa fa-moon-o" aria-hidden="true"></i>
			</li><!--Night-->
		</ul>
	</div>
	<div class="font-family-controls row-container">
		<button type="button" class="control-btn-serif selected" data-mode="serif"
			onclick="mashiro_global.font_control.change_font()">Serif</button>
		<button type="button" class="control-btn-sans-serif" data-mode="sans-serif"
			onclick="mashiro_global.font_control.change_font()">Sans Serif</button>
	</div>
</div>
<canvas id="night-mode-cover"></canvas>
<?php if (akina_option('sakura_widget')): ?>
	<aside id="secondary" class="widget-area" role="complementary" style="left: -400px;">
		<div class="heading">
			<?php _e('Widgets') /*小工具*/?>
		</div>
		<div class="sakura_widget">
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sakura_widget')): endif; ?>
		</div>
		<div class="show-hide-wrap"><button class="show-hide"><svg xmlns="http://www.w3.org/2000/svg" version="1.1"
					viewBox="0 0 32 32">
					<path d="M22 16l-10.105-10.6-1.895 1.987 8.211 8.613-8.211 8.612 1.895 1.988 8.211-8.613z"></path>
				</svg></button></div>
	</aside>
<?php endif; ?>
<?php if (akina_option('aplayer_server') != 'off'): ?>
	<div id="aplayer-float" style="z-index: 100;" class="aplayer"
		data-id="<?php echo akina_option('aplayer_playlistid', ''); ?>"
		data-server="<?php echo akina_option('aplayer_server'); ?>" data-type="playlist" data-fixed="true"
		data-theme="orange">
	</div>
<?php endif; ?>
</body>

</html>