<?php
function optionsframework_option_name()
{

    // 从样式表获取主题名称
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options()
{
    // 测试数据
    $test_array = array(
        'one' => __('1', 'aurore'),
        'two' => __('2', 'aurore'),
        'three' => __('3', 'aurore'),
        'four' => __('4', 'aurore'),
        'five' => __('5', 'aurore'),
        'six' => __('6', 'aurore'),
        'seven' => __('7', 'aurore'),
    );

    // 复选框数组
    $multicheck_array = array(
        'one' => __('1', 'aurore'),
        'two' => __('2', 'aurore'),
        'three' => __('3', 'aurore'),
        'four' => __('4', 'aurore'),
        'five' => __('5', 'aurore'),
    );

    // 复选框默认值
    $multicheck_defaults = array(
        'one' => '1',
        'five' => '1',
    );

    // 背景默认值
    $background_defaults = array(
        'color' => '',
        'image' => 'https://cdn.yeyufan.cn/blog/img/default-bg.jpg',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment' => 'scroll');

    // 版式默认值
    $typography_defaults = array(
        'size' => '15px',
        'face' => 'georgia',
        'style' => 'bold',
        'color' => '#bada55');

    // 版式设置选项
    $typography_options = array(
        'sizes' => array('6', '12', '14', '16', '20'),
        'faces' => array('Helvetica Neue' => 'Helvetica Neue', 'Arial' => 'Arial'),
        'styles' => array('normal' => '普通', 'bold' => '粗体'),
        'color' => false,
    );

    // 将所有分类（categories）加入数组
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }

    // 将所有标签（tags）加入数组
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ($options_tags_obj as $tag) {
        $options_tags[$tag->term_id] = $tag->name;
    }

    // 将所有页面（pages）加入数组
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }

    // 如果使用图片单选按钮, define a directory path
    $imagepath = get_template_directory_uri() . '/images/';

    $options = array();

    //基本设置
    $options[] = array(
        'name' => __('Basic settings', 'aurore'), /*基本设置*/
        'type' => 'heading');

    $options[] = array(
        'name' => __('Site title', 'aurore'), /*站点名称*/
        'desc' => __('Mashiro\'s Blog', 'aurore'),
        'id' => 'site_name',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Author', 'aurore'), /*作者*/
        'desc' => __('Suran', 'aurore'),
        'id' => 'author_name',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Theme style', 'aurore'), /*主题风格*/
        'id' => 'theme_skin',
        'std' => "#FE9600",
        'desc' => __('Custom theme color', 'aurore'), /*自定义主题颜色*/
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Theme scheme tool transparency', 'aurore'), /*切换主题菜单透明度*/
        'desc' => __('Adjust the theme scheme menu transparency, fill  in decimals between 0 and 1, the smaller the value, the more transparent. The default value is 0.8', 'aurore'), /*调整切换主题菜单透明度，值越小越透明。默认透明度0.8*/
        'id' => 'sakura_skin_alpha',
        'std' => '0.8',
        'type' => 'text');

    $options[] = array(
        'name' => __('Change web background', 'aurore'), /*切换网页背景*/
        'desc' => __('The foreground switches the background of the webpage. There are 8 urls separated by commas. The order corresponds to the foreground scheme tool button position (the order of the buttons is from left to right, top to bottom). If no background is needed, fill in the corresponding position as none.<strong>Note: If the theme is updated from v3.2.3 and below, be sure to change the [Version Control] parameter under the [Other] tab of this configuration page to any new value!</strong>', 'aurore'), /*前台切换网页背景，共8个url，使用英文逗号分隔，顺序对应前台切换主题按钮位置（按钮顺序从左至右，从上至下）,如不需要背景则填写对应位置为none。*/
        'id' => 'sakura_skin_bg',
        'std' => 'none,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/sakura.png,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/plaid2dbf8.jpg,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/star02.png,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/kyotoanimation.png,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/dot_orange.gif,https://api.mashiro.top/bing/,https://cdn.jsdelivr.net/gh/moezx/cdn@3.1.2/other-sites/api-index/images/me.png',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Darkmode', 'aurore'),
        'desc' => __('Automatically turn on dark mode from 10:00 p.m. to 06:00 a.m.', 'aurore'),
        'id' => 'darkmode',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Personal avatar', 'aurore'), /*个人头像*/
        'desc' => __('The best size is 130px*130px.', 'aurore'), /*最佳尺寸130px*130px。*/
        'id' => 'focus_logo',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Text LOGO', 'aurore'), /*文字版LOGO*/
        'desc' => __('The home page does not display the avatar above, but displays a paragraph of text (use the avatar above if left blank).The text is recommended not to be too long, about 16 bytes is appropriate.', 'aurore'), /*首页不显示上方的头像，而是显示一段文字（此处留空则使用上方的头像）。文字建议不要过长，16个字节左右为宜。*/
        'id' => 'focus_logo_text',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('logo', 'aurore'),
        'desc' => __('The best height size is 40px。', 'aurore'), /*最佳高度尺寸40px。*/
        'id' => 'akina_logo',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Favicon', 'aurore'),
        'desc' => __('It is the small logo on the browser tab, fill in the url', 'aurore'), /*就是浏览器标签栏上那个小 logo，填写url*/
        'id' => 'favicon_link',
        'std' => get_template_directory_uri().'/images/favicon.ico',
        'type' => 'text');

    $options[] = array(
        'name' => __('Custom keywords and descriptions ', 'aurore'), /*自定义关键词和描述*/
        'desc' => __('Customize keywords and descriptions after opening', 'aurore'), /*开启之后可自定义填写关键词和描述*/
        'id' => 'akina_meta',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Site keywords', 'aurore'), /*网站关键词*/
        'desc' => __('Each keyword is divided by a comma "," and the number is within 5.', 'aurore'), /*各关键字间用半角逗号","分割，数量在5个以内最佳。*/
        'id' => 'akina_meta_keywords',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Site descriptions', 'aurore'), /*网站描述*/
        'desc' => __('Describe the site in concise text, with a maximum of 120 words.', 'aurore'), /*用简洁的文字描述本站点，字数建议在120个字以内。*/
        'id' => 'akina_meta_description',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Expand the nav menu', 'aurore'), /*展开导航菜单*/
        'desc' => __('Check to enable, default shrink', 'aurore'), /*勾选开启，默认收缩*/
        'id' => 'shownav',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Head decoration', 'aurore'), /*头部装饰图*/
        'desc' => __('Enable by default, check off, display on the article page, separate page and category page', 'aurore'), /*默认开启，勾选关闭，显示在文章页面，独立页面以及分类页*/
        'id' => 'patternimg',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Search button', 'aurore'), /*搜索按钮*/
        'id' => 'top_search',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('Open', 'aurore'),
            'no' => __('Close', 'aurore'),
        ));

    $options[] = array(
        'name' => __('Home article style', 'aurore'), /*首页文章风格*/
        'id' => 'post_list_style',
        'std' => "imageflow",
        'type' => "radio",
        'options' => array(
            'standard' => __('Standard', 'aurore'), /*标准*/
            'imageflow' => __('Graphic', 'aurore'), /*图文*/
        ));

    $options[] = array(
        'name' => __('Cover manifest', 'aurore'), /*首页文章特色图选项*/
        'desc' => __('Select how to call the post featue image, only for the post without feature image', 'aurore'), /*选择文章特色图的调用方式，只对没有设置特色图像的文章生效*/
        'id' => 'post_cover_options',
        'std' => "type_1",
        'type' => "select",
        'options' => array(
            'type_1' => __('same as the cover of the first screen (default)', 'aurore'), /*跟随第一屏封面图*/
            'type_2' => __('custom api (advanced)', 'aurore'), /*外部随机图API*/
        )
    );

    $options[] = array(
        'name' => __('Cover images url', 'aurore'), /*图片库url*/
        'desc' => __('Fill in the custom image api url.', 'aurore'),
        'id' => 'post_cover',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Home article feature images (only valid for standard mode)', 'aurore'), /*首页文章特色图（仅对标准风格生效）*/
        'id' => 'list_type',
        'std' => "round",
        'type' => "radio",
        'options' => array(
            'round' => __('Round', 'aurore'), /*圆形*/
            'square' => __('Square', 'aurore'), /*方形*/
        ));

    $options[] = array(
        'name' => __('Home article feature images alignment (only for graphic mode, default left and right alternate)', 'aurore'), /*首页文章特色图对齐方式（仅对图文风格生效，默认左右交替）*/
        'id' => 'feature_align',
        'std' => "alternate",
        'type' => "radio",
        'options' => array(
            'left' => __('Left', 'aurore'), /*向左对齐*/
            'right' => __('Right', 'aurore'), /*向右对齐*/
            'alternate' => __('Alternate', 'aurore'), /*左右交替*/
        ));

    $options[] = array(
        'name' => __('Comment shrink', 'aurore'), /*评论收缩*/
        'id' => 'toggle-menu',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('Open', 'aurore'), /*开启*/
            'no' => __('Close', 'aurore'), /*关闭*/
        ));

    $options[] = array(
        'name' => __('Display author information at the end of the article?', 'aurore'), /*文章末尾显示作者信息？*/
        'desc' => __('Check to enable', 'aurore'), /*勾选启用*/
        'id' => 'show_authorprofile',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Paging mode', 'aurore'), /*分页模式*/
        'id' => 'pagenav_style',
        'std' => "ajax",
        'type' => "radio",
        'options' => array(
            'ajax' => __('Ajax load', 'aurore'), /*ajax加载*/
            'np' => __('Previous and next page', 'aurore'), /*上一页和下一页*/
        ));

    $options[] = array(
        'name' => __('Automatically load the next page', 'aurore'), /*自动加载下一页*/
        'desc' => __('(seconds) Set to automatically load the next page time, the default is not automatically loaded', 'aurore'), /*（秒）设置自动加载下一页时间，默认不自动加载*/
        'id' => 'auto_load_post',
        'std' => '233',
        'type' => 'select',
        'options' => array(
            '0' => __('0', 'aurore'),
            '1' => __('1', 'aurore'),
            '2' => __('2', 'aurore'),
            '3' => __('3', 'aurore'),
            '4' => __('4', 'aurore'),
            '5' => __('5', 'aurore'),
            '6' => __('6', 'aurore'),
            '7' => __('7', 'aurore'),
            '8' => __('8', 'aurore'),
            '9' => __('9', 'aurore'),
            '10' => __('10', 'aurore'),
            '233' => __('Do not load automatically', 'aurore'), /*不自动加载*/
        ));

    $options[] = array(
        'name' => __('Blogger description', 'aurore'), /*博主描述*/
        'desc' => __('A self-described statement', 'aurore'), /*一段自我描述的话*/
        'id' => 'admin_des',
        'std' => '一沙一世界，一花一天堂。君掌盛无边，刹那成永恒。',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Footer info', 'aurore'), /*页脚信息*/
        'desc' => __('Footer description, support for HTML code', 'aurore'), /*页脚说明文字，支持HTML代码*/
        'id' => 'footer_info',
        'std' => 'Copyright &copy; by Mashiro All Rights Reserved.',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Google analytics', 'aurore'), /*Google 统计代码*/
        'desc' => __('UA-xxxxx-x', 'aurore'),
        'id' => 'google_analytics_id',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('CNZZ Statistics (not recommand)', 'aurore'), /*站长统计（不建议使用）*/
        'desc' => __('Statistics code, which will be invisible in web page.', 'aurore'), /*填写统计代码，将被隐藏*/
        'id' => 'site_statistics',
        'std' => '',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Customize CSS styles', 'aurore'), /*自定义CSS样式*/
        'desc' => __('Fill in the CSS code directly, no need to write style tags', 'aurore'), /*直接填写CSS代码，不需要写style标签*/
        'id' => 'site_custom_style',
        'std' => '',
        'type' => 'textarea');

    //第一屏
    $options[] = array(
        'name' => __('First screen', 'aurore'), /*第一屏*/
        'type' => 'heading');
    $options[] = array(
            'name' => __('开启鼠标点击特效', 'options_click'), /*鼠标点击特效*/
            'desc' => __('默认关闭，勾选开启', 'options_click'),/*默认关闭，勾选开启*/
            'id' => 'canvas_click',
            'std' => '0',
            'type' => 'checkbox');
    $options[] = array(
            'name' => __('开启蜂窝背景动效', 'options_framework_theme'),/*蜂窝背景动效*/
            'desc' => __('默认关闭，勾选开启', 'options_framework_theme'),/*默认关闭，勾选开启*/
            'id' => 'canvas_nest',
            'std' => '0',
            'type' => 'checkbox');
            
    $options[] = array(
            'name' => __('开启首屏底部动画', 'akina'),  /*首屏底部动画*/
            'desc' => __('默认底部没有动画', 'akina'),
            'id' => 'focus_canvas_animinte',
            'std' => "animinte-nothing",
            'type' => "radio",
            'options' => array(
                'animinte-nothing' => __('没有动画', ''),
                'waveloop' => __('波浪动画', ''),
                'bubble' => __('气泡动画', '')
            ));

    $options[] = array(
        'name' => __('Main switch', 'aurore'), /*总开关*/
        'desc' => __('Default on, check off', 'aurore'), /*默认开启，勾选关闭*/
        'id' => 'head_focus',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Social information', 'aurore'), /*社交信息*/
        'desc' => __('Enable by default, check off, display avatar, signature, SNS', 'aurore'), /*默认开启，勾选关闭，显示头像、签名、SNS*/
        'id' => 'focus_infos',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Social information style', 'aurore'), /*社交信息样式*/
        'id' => 'social_style',
        'std' => "v2",
        'type' => "radio",
        'options' => array(
            'v2' => __('Merge with signature', 'aurore'), /*与签名合并*/
            'v1' => __('Independent line', 'aurore'), /*独立成行*/
        ));

    $options[] = array(
        'name' => __('Cover manifest', 'aurore'), /*封面图片库选项*/
        'desc' => __('Select how to call the cover random image', 'aurore'), /*选择封面随机图的调用方式*/
        'id' => 'cover_cdn_options',
        'std' => "type_2",
        'type' => "select",
        'options' => array(
            'type_1' => __('webp images (optimization)', 'aurore'), /*webp优化随机图*/
            'type_2' => __('built-in api (default)', 'aurore'), /*内置原图随机图*/
            'type_3' => __('custom api (advanced)', 'aurore'), /*外部随机图API*/
        )
    );

    $options[] = array(
        'name' => __('Cover images url', 'aurore'), /*图片库url*/
        'desc' => sprintf(__('Fill in the manifest path for random picture display, please refer to <a href = "https: //github.com/mashirozx/Sakura/wiki/options">Wiki </a>. If you select webp images above, click <a href = "%s">here</a> to update manifest', 'aurore'), rest_url('sakura/v1/database/update')), /*填写 manifest 路径，更多信息请参考<a href="https://github.com/mashirozx/Sakura/wiki/options">Wiki</a>,，如果你在上面选择了webp优化，点击<a href = "%s">这里</a>更新 manifest*/
        'id' => 'cover_cdn',
        'std' => 'https://cdn.yeyufan.cn/blog/img',
        'type' => 'text');

    $options[] = array(
        'name' => __('full-screen display', 'aurore'), /*全屏显示*/
        'desc' => __('Default on, check off', 'aurore'), /*默认开启，勾选关闭*/
        'id' => 'focus_height',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Enable video', 'aurore'), /*开启视频*/
        'desc' => __('Check on', 'aurore'), /*勾选开启*/
        'id' => 'focus_amv',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Live', 'aurore'),
        'desc' => __('Check to enable, the video will continue to play automatically, you need to enable Pjax', 'aurore'), /*勾选开启，视频自动续播，需要开启Pjax功能*/
        'id' => 'focus_mvlive',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Video address', 'aurore'), /*视频地址*/
        'desc' => __('The source address of the video, the address is spliced below the video name, the slash is not required at the end of the address', 'aurore'), /*视频的来源地址，该地址拼接下面的视频名，地址尾部不需要加斜杠*/
        'id' => 'amv_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Video name', 'aurore'), /*视频名称*/
        'desc' => __('abc.mp4, just fill in the video file name abc, multiple videos separated by commas such as abc, efg, do not care about the order, because the loading is random extraction', 'aurore'), /*abc.mp4 ，只需要填写视频文件名 abc 即可，多个用英文逗号隔开如 abc,efg ，无需在意顺序，因为加载是随机的抽取的 */
        'id' => 'amv_title',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Background image filter', 'aurore'), /*背景图滤镜*/
        'id' => 'focus_img_filter',
        'std' => "filter-nothing",
        'type' => "radio",
        'options' => array(
            'filter-nothing' => __('Nothing', 'aurore'), /*无*/
            'filter-undertint' => __('Undertint', 'aurore'), /*浅色*/
            'filter-dim' => __('Dim', 'aurore'), /*暗淡*/
            'filter-grid' => __('Grid', 'aurore'), /*网格*/
            'filter-dot' => __('Dot', 'aurore'), /*点点*/
        ));

    $options[] = array(
        'name' => __('Whether to turn on the top-feature', 'aurore'), /*是否开启聚焦*/
        'desc' => __('Default on', 'aurore'),
        'id' => 'top_feature',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Top-feature style', 'aurore'), /*聚焦样式*/
        'id' => 'top_feature_style',
        'std' => "left_and_right",
        'type' => "radio",
        'options' => array(
            'left_and_right' => __('Alternate left and right', 'aurore'), /*左右交替*/
            'bottom_to_top' => __('From bottom to top', 'aurore'), /*从下往上*/
        ));

    $options[] = array(
        'name' => __('Top-feature title', 'aurore'), /*聚焦标题*/
        'desc' => __('Default is Discovery, you can also change it to other, of course you can\'t use it as an advertisement!Not allowed!!', 'aurore'), /*默认为聚焦，你也可以修改为其他，当然不能当广告用！不允许！！*/
        'id' => 'feature_title',
        'std' => 'Discovery',
        'class' => 'mini',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 1 image', 'aurore'), /*聚焦图一*/
        'desc' => __('size 257px*160px', 'aurore'), /*尺寸257px*160px*/
        'id' => 'feature1_img',
        'std' => $imagepath . '/temp.png',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Top-feature 1 title', 'aurore'), /*聚焦图一标题*/
        'desc' => __('Top-feature 1 title', 'aurore'), /*聚焦图一标题*/
        'id' => 'feature1_title',
        'std' => 'feature1',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 1 description', 'aurore'), /*聚焦图一描述*/
        'desc' => __('Top-feature 1 description', 'aurore'), /*聚焦图一描述*/
        'id' => 'feature1_description',
        'std' => 'Description goes here 1',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 1 link', 'aurore'), /*聚焦图一链接*/
        'desc' => __('Top-feature 1 link', 'aurore'), /*聚焦图一链接*/
        'id' => 'feature1_link',
        'std' => '#',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 2 image', 'aurore'), /*聚焦图二*/
        'desc' => __('size 257px*160px', 'aurore'), /*尺寸257px*160px*/
        'id' => 'feature2_img',
        'std' => $imagepath . '/temp.png',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Top-feature 2 title', 'aurore'), /*聚焦图二标题*/
        'desc' => __('Top-feature 2 title', 'aurore'), /*聚焦图二标题*/
        'id' => 'feature2_title',
        'std' => 'feature2',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 2 description', 'aurore'), /*聚焦图二描述*/
        'desc' => __('Top-feature 2 description', 'aurore'), /*聚焦图二描述*/
        'id' => 'feature2_description',
        'std' => 'Description goes here 2',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 2 link', 'aurore'), /*聚焦图二链接*/
        'desc' => __('Top-feature 2 link', 'aurore'), /*聚焦图二链接*/
        'id' => 'feature2_link',
        'std' => '#',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 3 image', 'aurore'), /*聚焦图三*/
        'desc' => __('size 257px*160px', 'aurore'), /*尺寸257px*160px*/
        'id' => 'feature3_img',
        'std' => $imagepath . '/temp.png',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Top-feature 3 title', 'aurore'), /*聚焦图三标题*/
        'desc' => __('Top-feature 3 title', 'aurore'), /*聚焦图三标题*/
        'id' => 'feature3_title',
        'std' => 'feature3',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 3 description', 'aurore'), /*聚焦图三描述*/
        'desc' => __('Top-feature 3 description', 'aurore'), /*聚焦图三描述*/
        'id' => 'feature3_description',
        'std' => 'Description goes here 3',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top-feature 3 link', 'aurore'), /*聚焦图三链接*/
        'desc' => __('Top-feature 3 link', 'aurore'), /*聚焦图三链接*/
        'id' => 'feature3_link',
        'std' => '#',
        'type' => 'text');

    //文章页
    $options[] = array(
        'name' => __('Post page', 'aurore'), /*文章页*/
        'type' => 'heading');

    $options[] = array(
        'name' => __('Post style', 'aurore'), /*文章样式*/
        'id' => 'entry_content_theme',
        'std' => "sakura",
        'type' => "radio",
        'options' => array(
            'aurore' => __('aurore', 'aurore'), /*默认样式*/
            'github' => __('GitHub', 'aurore'),
        ));

    $options[] = array(
        'name' => __('Post like', 'aurore'), /*文章点赞*/
        'id' => 'post_like',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('Open', 'aurore'), /*开启*/
            'no' => __('Close', 'aurore'), /*关闭*/
        ));

    $options[] = array(
        'name' => __('Post share', 'aurore'), /*文章分享*/
        'id' => 'post_share',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('Open', 'aurore'), /*开启*/
            'no' => __('Close', 'aurore'), /*关闭*/
        ));

    $options[] = array(
        'name' => __('Previous and Next', 'aurore'), /*上一篇下一篇*/
        'id' => 'post_nepre',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('Open', 'aurore'), /*开启*/
            'no' => __('Close', 'aurore'), /*关闭*/
        ));

    $options[] = array(
        'name' => __('Author profile', 'aurore'), /*博主信息*/
        'id' => 'author_profile',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('Open', 'aurore'), /*开启*/
            'no' => __('Close', 'aurore'), /*关闭*/
        ));

    $options[] = array(
        'name' => __('Alipay reward', 'aurore'), /*支付宝打赏*/
        'desc' => __('Alipay qrcode', 'aurore'), /*支付宝二维码*/
        'id' => 'alipay_code',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Wechat reward', 'aurore'), /*微信打赏*/
        'desc' => __('Wechat qrcode ', 'aurore'), /*微信二维码*/
        'id' => 'wechat_code',
        'type' => 'upload');

    //社交选项
    $options[] = array(
        'name' => __('Social network', 'aurore'), /*社交网络*/
        'type' => 'heading');

    $options[] = array(
        'name' => __('Wechat', 'aurore'), /*微信*/
        'desc' => __('Wechat qrcode', 'aurore'), /*微信二维码*/
        'id' => 'wechat',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Sina Weibo', 'aurore'), /*新浪微博*/
        'desc' => __('Sina Weibo address', 'aurore'), /*新浪微博地址*/
        'id' => 'sina',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Tencent QQ', 'aurore'), /*腾讯QQ*/
        'desc' => __('tencent://message/?uin={{QQ number}}. for example, tencent://message/?uin=123456', 'aurore'), /*tencent://message/?uin={{QQ号码}}，如tencent://message/?uin=123456*/
        'id' => 'qq',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Telegram', 'aurore'),
        'desc' => __('Telegram link', 'aurore'), /*Telegram链接*/
        'id' => 'telegram',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Qzone', 'aurore'), /*QQ空间*/
        'desc' => __('Qzone address', 'aurore'), /*QQ空间地址*/
        'id' => 'qzone',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('GitHub', 'aurore'),
        'desc' => __('GitHub address', 'aurore'), /*GitHub地址*/
        'id' => 'github',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Lofter', 'aurore'),
        'desc' => __('Lofter address', 'aurore'), /*lofter地址*/
        'id' => 'lofter',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('BiliBili', 'aurore'),
        'desc' => __('BiliBili address', 'aurore'), /*B站地址*/
        'id' => 'bili',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Youku video', 'aurore'), /*优酷视频*/
        'desc' => __('Youku video address', 'aurore'), /*优酷地址*/
        'id' => 'youku',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Netease Cloud Music', 'aurore'), /*网易云音乐*/
        'desc' => __('Netease Cloud Music address', 'aurore'), /*网易云音乐地址*/
        'id' => 'wangyiyun',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Twitter', 'aurore'),
        'desc' => __('Twitter address', 'aurore'), /*推特地址*/
        'id' => 'twitter',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Facebook', 'aurore'),
        'desc' => __('Facebook address', 'aurore'), /*脸书地址*/
        'id' => 'facebook',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Jianshu', 'aurore'), /*简书*/
        'desc' => __('Jianshu address', 'aurore'), /*简书地址*/
        'id' => 'jianshu',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('CSDN', 'aurore'),
        'desc' => __('CSND community address', 'aurore'), /*CSND社区地址*/
        'id' => 'csdn',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Zhihu', 'aurore'), /*知乎*/
        'desc' => __('Zhihu address', 'aurore'), /*知乎地址*/
        'id' => 'zhihu',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Email-name', 'aurore'), /*邮箱-用户名*/
        'desc' => __('The name part of name@domain.com, only the frontend has js runtime environment can get the full address, you can rest assured to fill in', 'aurore'), /*name@domain.com 的 name 部分，前端仅具有js运行环境时才能获取完整地址，可放心填写*/
        'id' => 'email_name',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Email-domain', 'aurore'), /*邮箱-域名*/
        'desc' => __('The domain.com part of name@domain.com', 'aurore'), /*ame@domain.com 的 domain.com 部分*/
        'id' => 'email_domain',
        'std' => '',
        'type' => 'text');

    //评论区
    $options[] = array(
        'name' => __('Comment field', 'aurore'), /*评论区*/
        'type' => 'heading');
 
    $options[] = array(
        'name' => __('Gravatar avatar proxy', 'aurore'),
        'desc' => __('A front-ed proxy for Gravatar, eg. gravatar.2heng.xin/avatar . Leave it blank if you do not need.', 'aurore'),
        'id' => 'gravatar_proxy',
        'std' => "gravatar.2heng.xin/avatar",
        'type' => "text");

    $options[] = array(
        'name' => __('Comment image upload API', 'aurore'), /*评论图片上传接口*/
        'id' => 'img_upload_api',
        'std' => "imgur",
        'type' => "radio",
        'options' => array(
            'imgur' => __('Imgur (https://imgur.com)', 'aurore'),
            'smms' => __('SM.MS (https://sm.ms)', 'aurore'),
            'chevereto' => __('Chevereto (https://chevereto.com)', 'aurore'),
        ));

    $options[] = array(
        'name' => __('Imgur Client ID', 'aurore'),
        'desc' => __('Register your application <a href="https://api.imgur.com/oauth2/addclient">here</a>, note we only need the Client ID here.', 'aurore'),
        'id' => 'imgur_client_id',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('SM.MS Secret Token', 'aurore'),
        'desc' => __('Register your application <a href="https://sm.ms/home/apitoken">here</a>.', 'aurore'),
        'id' => 'smms_client_id',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Chevereto API v1 key', 'aurore'),
        'desc' => __('Get your API key here: ' . akina_option('cheverto_url') . '/dashboard/settings/api', 'aurore'),
        'id' => 'chevereto_api_key',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Chevereto URL', 'aurore'),
        'desc' => __('Your Chevereto homepage url, no slash in the end, eg. https://your.cherverto.com', 'aurore'),
        'id' => 'cheverto_url',
        'std' => 'https://your.cherverto.com',
        'type' => 'text');

    $options[] = array(
        'name' => __('Comment images proxy', 'aurore'),
        'desc' => __('A front-ed proxy for the uploaded images. Leave it blank if you do not need.', 'aurore'),
        'id' => 'cmt_image_proxy',
        'std' => 'https://images.weserv.nl/?url=',
        'type' => 'text');

    $options[] = array(
        'name' => __('Imgur upload proxy', 'aurore'),
        'desc' => __('A back-ed proxy to upload images. You may set a self hosted proxy with Nginx, following my <a href="https://2heng.xin/2018/06/06/javascript-upload-images-with-imgur-api/">turtal</a>. This feature is mainly for Chinese who cannot access to Imgur due to the GFW. The default and official setting is 【<a href="https://api.imgur.com/3/image/">https://api.imgur.com/3/image/</a>】', 'aurore'),
        'id' => 'imgur_upload_image_proxy',
        'std' => 'https://api.imgur.com/3/image/',
        'type' => 'text');

    $options[] = array(
        'name' => __('Comments reply notification', 'aurore'), /*邮件回复通知*/
        'desc' => __('WordPress will use email to notify users when their comments receive a reply by default. Tick this item allows users to set their own comments reply notification', 'aurore'), /*WordPress默认会使用邮件通知用户评论收到回复，开启此项允许用户设置自己的评论收到回复时是否使用邮件通知*/
        'id' => 'mail_notify',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Administrator comment notification', 'aurore'), /*邮件回复通知管理员*/
        'desc' => __('Whether to use email notification when the administrator\'s comments receive a reply', 'aurore'), /*当管理员评论收到回复时是否使用邮件通知*/
        'id' => 'admin_notify',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Enable private comment', 'aurore'), /*允许私密评论*/
        'desc' => __('Allow users to set their own comments to be invisible to others', 'aurore'), /*允许用户设置自己的评论对其他人不可见*/
        'id' => 'open_private_message',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Human verification', 'aurore'), /*机器人验证*/
        'desc' => __('Enable human verification', 'aurore'), /*开启机器人验证*/
        'id' => 'norobot',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('QQ avatar link encryption', 'aurore'), /*QQ头像链接加密*/
        'desc' => __('Do not display the user\'s qq avatar links directly.', 'aurore'), /*不直接暴露用户qq头像链接*/
        'id' => 'qq_avatar_link',
        'std' => "off",
        'type' => "select",
        'options' => array(
            'off' => __('Off (default)', 'aurore'), /*关闭（默认）*/
            'type_1' => __('use redirect (general security)', 'aurore'), /*使用 重定向（安全性一般）'*/
            'type_2' => __('fetch data at backend (high security)', 'aurore'), /*后端获取数据（安全性高）*/
            'type_3' => __('fetch data at backend (high security，slow)', 'aurore'), /*后端获取数据（安全性高, 慢）*/
        ));

    $options[] = array(
        'name' => __('Comment UA infomation', 'aurore'), /*评论UA信息*/
        'desc' => __('Check to enable, display the user\'s browser, operating system information', 'aurore'), /*勾选开启，显示用户的浏览器，操作系统信息*/
        'id' => 'open_useragent',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Comment location infomation', 'aurore'), /*评论位置信息*/
        'desc' => __('Check to enable, display the user\'s location info', 'aurore'), /*勾选开启，显示用户的位置信息*/
        'id' => 'open_location',
        'std' => '0',
        'type' => 'checkbox');


    $options[] = array(
        'name' => __('Time Zone adjustment', 'aurore'), /*时区调整*/
        'desc' => __('If the comment has a time difference problem adjust here, fill in an integer, the calculation method: actual_time = display_error_time - the_integer_you_entered (unit: hour)', 'aurore'), /*如果评论出现时差问题在这里调整，填入一个整数，计算方法：实际时间=显示错误的时间-你输入的整数（单位：小时）*/
        'id' => 'time_zone_fix',
        'std' => '0',
        'type' => 'text');
    //后台配置
    $options[] = array(
        'name' => __('Dashboard configuration', 'aurore'), /*后台配置*/
        'type' => 'heading');

    //后台面板自定义配色方案
    $options[] = array(
        'name' => __('Dashboard panel custom color scheme', 'aurore'), /*后台面板自定义配色方案*/
        'desc' => __('You can design the dashboard panel (/wp-admin/) style yourself below, but before you start, please go to <a href="/wp-admin/profile.php">here</a> to change the color scheme to custom.(Custom).<br><b>Tip: </b>How to match colors? Maybe <a href="https://mashiro.top/color-thief/">this</a> can help you.', 'aurore'), /*你可以在下面自行设计后台面板（/wp-admin/）样式，不过在开始之前请到<a href="/wp-admin/profile.php">这里</a>将配色方案改为自定义（Custom）。<br><b>Tip: </b>如何搭配颜色？或许<a href="https://mashiro.top/color-thief/">这个</a>可以帮到你。*/
        'id' => 'scheme_tip',
        'std' => '',
        'type' => 'typography ');

    $options[] = array(
        'name' => __('Panel main color A', 'aurore'), /*面板主色调A*/
        'id' => 'dash_scheme_color_a',
        'std' => "#c6742b",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Panel main color B', 'aurore'),
        'id' => 'dash_scheme_color_b',
        'std' => "#d88e4c",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Panel main color C', 'aurore'),
        'id' => 'dash_scheme_color_c',
        'std' => "#695644",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Panel main color D', 'aurore'),
        'id' => 'dash_scheme_color_d',
        'std' => "#a19780",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Panel icon color——base', 'aurore'), /*面板图标配色——base*/
        'id' => 'dash_scheme_color_base',
        'std' => "#e5f8ff",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions used to color any SVG icons.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Panel icon color——focus', 'aurore'),
        'id' => 'dash_scheme_color_focus',
        'std' => "#fff",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions used to color any SVG icons.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Panel icon color——current', 'aurore'),
        'id' => 'dash_scheme_color_current',
        'std' => "#fff",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions used to color any SVG icons.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('Other custom panel styles(CSS)', 'aurore'), /*其他自定义面板样式(CSS)*/
        'desc' => __('If you need to adjust other styles of the panel, put the style here.', 'aurore'), /*如果还需要对面板其他样式进行调整可以把style放到这里*/
        'id' => 'dash_scheme_css_rules',
        'std' => '#adminmenu .wp-has-current-submenu .wp-submenu a,#adminmenu .wp-has-current-submenu.opensub .wp-submenu a,#adminmenu .wp-submenu a,#adminmenu a.wp-has-current-submenu:focus+.wp-submenu a,#wpadminbar .ab-submenu .ab-item,#wpadminbar .quicklinks .menupop ul li a,#wpadminbar .quicklinks .menupop.hover ul li a,#wpadminbar.nojs .quicklinks .menupop:hover ul li a,.folded #adminmenu .wp-has-current-submenu .wp-submenu a{color:#f3f2f1}body{background-image:url(https://view.moezx.cc/images/2019/04/21/windows10-2019-4-21-i3.jpg);background-size:cover;background-repeat:no-repeat;background-attachment:fixed;}#wpcontent{background:rgba(255,255,255,.8)}',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Login interface background image', 'aurore'), /*后台登陆界面背景图*/
        'desc' => __('Use the default image if left this blank', 'aurore'), /*该地址为空则使用默认图片*/
        'id' => 'login_bg',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Login interface logo', 'aurore'), /*后台登陆界面logo*/
        'desc' => __('Used for login interface display', 'aurore'), /*用于登录界面显示*/
        'id' => 'logo_img',
        'std' => $imagepath . 'mashiro-logo-s.png',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Login/registration related settings', 'aurore'), /*登陆/注册相关设定*/
        'desc' => __(' ', 'space', 'aurore'),
        'id' => 'login_tip',
        'std' => '',
        'type' => 'typography ');

    $options[] = array(
        'name' => __('Specify login address', 'aurore'), /*指定登录地址*/
        'desc' => __('Forcibly do not use the background address to log in, fill in the new landing page address, such as http://www.xxx.com/login [Note] Before you fill out, test your new page can be opened normally, so as not to enter the background or other problems happening', 'aurore'), /*强制不使用后台地址登陆，填写新建的登陆页面地址，比如 http://www.xxx.com/login【注意】填写前先测试下你新建的页面是可以正常打开的，以免造成无法进入后台等情况*/
        'id' => 'exlogin_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Specify registered address', 'aurore'), /*指定注册地址*/
        'desc' => __('This link is used on the login page as a registration entry', 'aurore'), /*该链接使用在登录页面作为注册入口，建议填写*/
        'id' => 'exregister_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Allow users to register', 'aurore'), /*允许用户注册*/
        'desc' => __('Check to allow users to register at the frontend', 'aurore'), /*勾选开启，允许用户在前台注册*/
        'id' => 'ex_register_open',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Automatically redirect after login', 'aurore'), /*登录后自动跳转*/
        'desc' => __('After checken, the administrator redirects to the background and the user redirects to the home page.', 'aurore'), /*勾选开启，管理员跳转至后台，用户跳转至主页*/
        'id' => 'login_urlskip',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Registration verification (frontend only, backend forced open)', 'aurore'), /*注册验证（仅前端，后端强制开启）*/
        'desc' => __('Check to enable slide verification', 'aurore'), /*勾选开启滑动验证*/
        'id' => 'login_validate',
        'std' => '0',
        'type' => 'checkbox');

    //CDN 优化
    $options[] = array(
        'name' => __('CDN', 'aurore'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Images CDN', 'aurore'), /*图片库*/
        'desc' => __('Note: Fill in the format http(s)://your CDN domain name/. <br>In other words, the original path is http://your.domain/wp-content/uploads/2018/05/xx.png and the picture will load from http://your CDN domain/2018/05/xx.png', 'aurore'), /*注意：填写格式为 http(s)://你的CDN域名/。<br>也就是说，原路径为 http://your.domain/wp-content/uploads/2018/05/xx.png 的图片将从 http://你的CDN域名/2018/05/xx.png 加载*/
        'id' => 'qiniu_cdn',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Use the front-end library locally (lib.js、lib.css)', 'aurore'), /*本地调用前端库（lib.js、lib.css）*/
        'desc' => __('The front-end library don\'t load from jsDelivr, not recommand', 'aurore'), /*前端库不走 jsDelivr，不建议启用*/
        'id' => 'jsdelivr_cdn_test',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Use js and css file of the theme (sakura-app.js、style.css) locally', 'aurore'), /*本地调用主题 js、css 文件（sakura-app.js、style.css）*/
        'desc' => __('The js and css files of the theme do not load from jsDelivr, please open when DIY', 'aurore'), /*主题的 js、css 文件不走 jsDelivr，DIY 时请开启*/
        'id' => 'app_no_jsdelivr_cdn',
        'std' => '0',
        'type' => 'checkbox');

    //其他
    $options[] = array(
        'name' => __('Others', 'aurore'), /*其他*/
        'type' => 'heading');

    $options[] = array(
        'name' => __('About', 'aurore'), /*关于*/
        'desc' => sprintf(__('Theme Sakura v %s  |  <a href="https://2heng.xin/theme-sakura/">Theme document</a>  |  <a href="https://github.com/mashirozx/Sakura/">Source code</a><a href="https://github.com/mashirozx/Sakura/releases/latest"><img src="https://img.shields.io/github/release/mashirozx/Sakura.svg?style=flat-square" alt="GitHub release"></a>', 'aurore'), SAKURA_VERSION), /*Theme Sakura v'.SAKURA_VERSION.'  |  <a href="https://2heng.xin/theme-sakura/">主题说明</a>  |  <a href="https://github.com/mashirozx/Sakura/">源码</a><a href="https://github.com/mashirozx/Sakura/releases/latest"><img src="https://img.shields.io/github/release/mashirozx/Sakura.svg?style=flat-square" alt="GitHub release"></a>*/
        'id' => 'theme_intro',
        'std' => '',
        'type' => 'typography ');

    $options[] = array(
        'name' => __('Check for Updates', 'aurore'), /*检查更新*/
        'desc' => '<a href="https://github.com/mashirozx/Sakura/releases/latest">Download the latest version</a>',
        'id' => "release_info",
        'std' => "tag",
        'type' => "images",
        'options' => array(
            'tag' => 'https://img.shields.io/github/release/mashirozx/Sakura.svg?style=flat-square',
            'tag2' => 'https://img.shields.io/github/commits-since/mashirozx/Sakura/v' . SAKURA_VERSION . '/dev.svg?style=flat-square',
        ),
    );

    $options[] = array(
        'name' => __('Footer float music player', 'aurore'), /*页脚悬浮播放器*/
        'desc' => __('Choose which platform you\'ll use.', 'aurore'),
        'id' => 'aplayer_server',
        'std' => "netease",
        'type' => "select",
        'options' => array(
            'netease' => __('Netease Cloud Music (default)', 'aurore'),
            'xiami' => __('Xiami Music', 'aurore'),
            'kugou' => __('KuGou Music', 'aurore'),
            'baidu' => __('Baidu Music', 'aurore'),
            'tencent' => __('QQ Music (may fail) ', 'aurore'),
            'off' => __('Off', 'aurore'),
        ));

    $options[] = array(
        'name' => __('Song list ID', 'aurore'),
        'desc' => __('Fill in the "song list" ID, eg: https://music.163.com/#/playlist?id=2288037900 The ID is 2288037900', 'aurore'),
        'id' => 'aplayer_playlistid',
        'std' => '2288037900',
        'type' => 'text');

    $options[] = array(
        'name' => __('Netease Cloud Music cookie', 'aurore'),
        'desc' => __('For Netease Cloud Music, fill in your vip account\'s cookies if you want to play special tracks.<b>If you don\'t know what does mean, left it blank.</b>', 'aurore'),
        'id' => 'aplayer_cookie',
        'std' => '',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Version Control', 'aurore'), /*版本控制*/
        'desc' => __('Used to update frontend cookies and browser caches, any string can be used', 'aurore'), /*用于更新前端 cookie 及浏览器缓存，可使用任意字符串*/
        'id' => 'cookie_version',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Enable PJAX (recommand on)', 'aurore'), /*开启PJAX局部刷新（建议开启）*/
        'desc' => __('The principle is the same as Ajax', 'aurore'), /*原理与Ajax相同*/
        'id' => 'poi_pjax',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Enable NProgress progress bar', 'aurore'), /*开启NProgress加载进度条*/
        'desc' => __('Default off, check on', 'aurore'), /*默认不开启，勾选开启*/
        'id' => 'nprogress_on',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Enable sidebar widget', 'aurore'), /*支持侧栏小部件*/
        'desc' => __('Default off, check on', 'aurore'), /*默认不开启，勾选开启*/
        'id' => 'sakura_widget',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Enable Announcement', 'aurore'),
        'desc' => __('Default off, check on', 'aurore'), /*默认不显示，勾选开启*/
        'id' => 'head_notice',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Announcement content', 'aurore'),
        'desc' => __('Announcement content, the text exceeds 142 bytes will be scrolled display (mobile device is invalid)', 'aurore'), /*公告内容，文字超出142个字节将会被滚动显示（移动端无效），一个汉字 = 3字节，一个字母 = 1字节，自己计算吧*/
        'id' => 'notice_title',
        'std' => '',
        'type' => 'text');
    $options[] = array(
        'name' => __('Bilibili UID', 'aurore'), /*bilibiliUID*/
        'desc' => __('Fill in your UID, eg.https://space.bilibili.com/13972644/, only fill in with the number part.', 'aurore'),
        'id' => 'bilibili_id',
        'std' => '13972644',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Bilibili Cookie', 'aurore'), /*Bilibili Cookie*/
        'desc' => __('Fill in your Cookies, go to your bilibili homepage, you can get cookies in brownser network pannel with pressing F12. If left this blank, you\'ll not get the progress.', 'aurore'),
        'id' => 'bilibili_cookie',
        'std' => 'LIVE_BUVID=',
        'type' => 'textarea');
    $options[] = array(
        'name' => __('The categories of articles that don\'t not show on homepage', 'aurore'), /*首页不显示的分类文章*/
        'desc' => __('Fill in category ID, multiple IDs are divided by a comma ","', 'aurore'), /*填写分类ID，多个用英文“ , ”分开*/
        'id' => 'classify_display',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Images category', 'aurore'), /*图片展示分类*/
        'desc' => __('Fill in category ID, multiple IDs are divided by a comma ","', 'aurore'), /*填写分类ID，多个用英文“ , ”分开*/
        'id' => 'image_category',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Statistics Interface', 'aurore'), /*统计接口*/
        'id' => 'statistics_api',
        'std' => "theme_build_in",
        'type' => "radio",
        'options' => array(
            'wp_statistics' => __('WP-Statistics plugin (Professional statistics, can exclude invalid access)', 'aurore'), /*WP-Statistics 插件（专业性统计，可排除无效访问）*/
            'theme_build_in' => __('Theme built-in (simple statistics, calculate each page access request)', 'aurore'), /*主题内建（简单的统计，计算每一次页面访问请求）*/
        ));

    $options[] = array(
        'name' => __('Statistical data display format', 'aurore'), /*统计数据显示格式*/
        'id' => 'statistics_format',
        'std' => "type_1",
        'type' => "radio",
        'options' => array(
            'type_1' => __('23333 Views (default)', 'aurore'), /*23333 次访问（默认）*/
            'type_2' => __('23,333 Views (britain)', 'aurore'), /*23,333 次访问（英式）'*/
            'type_3' => __('23 333 Views (french)', 'aurore'), /*23 333 次访问（法式）*/
            'type_4' => __('23k Views (chinese)', 'aurore'), /*23k 次访问（中式）*/
        ));

    $options[] = array(
        'name' => __('Enable live search', 'aurore'), /*启用实时搜索*/
        'desc' => __('Real-time search in the foreground, call the Rest API to update the cache every hour, you can manually set the cache time in api.php', 'aurore'), /*前台实现实时搜索，调用 Rest API 每小时更新一次缓存，可在 functions.php 里手动设置缓存时间*/
        'id' => 'live_search',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Include comments in live search', 'aurore'), /*实时搜索包含评论*/
        'desc' => __('Search for comments in real-time search (not recommended if there are too many comments on the site)', 'aurore'), /*在实时搜索中搜索评论（如果网站评论数量太多不建议开启）*/
        'id' => 'live_search_comment',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Enable baguetteBox', 'aurore'), /*启用 baguetteBox*/
        'desc' => __('Default off，<a href="https://github.com/mashirozx/Sakura/wiki/Fancybox">please read wiki</a>', 'aurore'), /*默认禁用，<a href="https://github.com/mashirozx/Sakura/wiki/Fancybox">请阅读说明</a>*/
        'id' => 'image_viewer',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Enable lazyload in posts', 'aurore'), /*文章内图片启用 lazyload*/
        'desc' => __('Default on', 'aurore'), /*默认启用*/
        'id' => 'lazyload',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('lazyload spinner', 'aurore'),
        'desc' => __('The placeholder to display when the image loads, fill in the image url', 'aurore'), /*图片加载时要显示的占位图，填写图片 url*/
        'id' => 'lazyload_spinner',
        'std' => 'https://cdn.jsdelivr.net/gh/moezx/cdn@3.0.2/img/svg/loader/trans.ajax-spinner-preloader.svg',
        'type' => 'text');

    $options[] = array(
        'name' => __('Whether to enable the clipboard copyright', 'aurore'), /*是否开启剪贴板版权标识*/
        'desc' => __('Automatically add a copyright to the clipboard when copying more than 30 bytes, which is enabled by default.', 'aurore'), /*复制超过30个字节时自动向剪贴板添加版权标识，默认开启*/
        'id' => 'clipboard_copyright',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Email address prefix', 'aurore'), /*发件地址前缀*/
        'desc' => __('For sending system mail, the sender address displayed in the user\'s mailbox, do not use Chinese, the default system email address is bibi@your_domain_name', 'aurore'), /*用于发送系统邮件，在用户的邮箱中显示的发件人地址，不要使用中文，默认系统邮件地址为 bibi@你的域名*/
        'id' => 'mail_user_name',
        'std' => 'bibi',
        'type' => 'text');

    return $options;
}
