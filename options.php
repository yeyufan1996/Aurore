<?php
function optionsframework_option_name()
{
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
        'image' => 'https://cdn.yeyufan.cn/blog/img/default-bg.webp',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment' => 'scroll'
    );

    // 版式默认值
    $typography_defaults = array(
        'size' => '15px',
        'face' => 'georgia',
        'style' => 'bold',
        'color' => '#bada55'
    );

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
        'name' => __('基本设置', 'aurore'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('站点名称', 'aurore'),
        'desc' => __('夜与凡', 'aurore'),
        'id' => 'site_name',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('作者', 'aurore'),
        'desc' => __('Suran', 'aurore'),
        'id' => 'author_name',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('主题颜色', 'aurore'),
        'id' => 'theme_skin',
        'std' => "#40d151",
        'desc' => __('自定义主题颜色', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('切换主题菜单透明度', 'aurore'),
        'desc' => __('调整主题菜单透明度，填写0到1之间的小数，值越小，越透明。默认值为 0.8', 'aurore'),
        'id' => 'sakura_skin_alpha',
        'std' => '0.8',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('切换网页背景', 'aurore'),
        'desc' => __('前台切换网页背景，共8个url，使用英文逗号分隔，对应前台切换主题按钮位置（按钮顺序从左至右，从上至下）,如不需要背景则对应位置填写为none。', 'aurore'),
        'id' => 'sakura_skin_bg',
        'std' => 'none,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/sakura.png,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/plaid2dbf8.jpg,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/star02.png,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/kyotoanimation.png,https://cdn.jsdelivr.net/gh/spirit1431007/cdn@1.6/img/dot_orange.gif,https://api.mashiro.top/bing/,https://cdn.jsdelivr.net/gh/moezx/cdn@3.1.2/other-sites/api-index/images/me.png',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => __('暗黑模式开关', 'aurore'),
        'desc' => __('晚上10：00到早上06：00自动打开暗模式', 'aurore'),
        'id' => 'darkmode',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('个人头像', 'aurore'),
        'desc' => __('推荐尺寸 130px*130px.', 'aurore'),
        'id' => 'focus_logo',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('文字版LOGO', 'aurore'),
        'desc' => __('首页不显示头像，而是显示文字（此处留空则使用头像）', 'aurore'),
        'id' => 'focus_logo_text',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('网站左上角LOGO', 'aurore'),
        'desc' => __('最佳高度40px。', 'aurore'),
        'id' => 'akina_logo',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('标签栏logo', 'aurore'),
        'desc' => __('就是浏览器标签栏上那个小 logo，填写url', 'aurore'),
        'id' => 'favicon_link',
        'std' => get_template_directory_uri() . '/images/favicon.ico',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('自定义网站关键词和描述', 'aurore'),
        'desc' => __('开启之后可自定义填写网站关键词和描述', 'aurore'),
        'id' => 'akina_meta',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('网站关键词', 'aurore'),
        'desc' => __('各关键字间用半角逗号","分割，数量在5个以内最佳。', 'aurore'),
        'id' => 'akina_meta_keywords',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('网站描述', 'aurore'),
        'desc' => __('用简洁的文字描述本站点，字数建议在120个字以内。', 'aurore'),
        'id' => 'akina_meta_description',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('展开导航菜单', 'aurore'),
        'desc' => __('勾选开启，默认收缩', 'aurore'),
        'id' => 'shownav',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('头部装饰图', 'aurore'),
        'desc' => __('默认开启，勾选关闭，显示在文章页面，独立页面以及分类页', 'aurore'),
        'id' => 'patternimg',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('搜索按钮', 'aurore'),
        'id' => 'top_search',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('开启', 'aurore'),
            'no' => __('关闭', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('首页文章风格', 'aurore'),
        'id' => 'post_list_style',
        'std' => "imageflow",
        'type' => "radio",
        'options' => array(
            'standard' => __('标准', 'aurore'),
            'imageflow' => __('图文', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('首页文章特色图选项', 'aurore'),
        'desc' => __('选择文章特色图的调用方式，只对没有设置特色图像的文章生效', 'aurore'),
        'id' => 'post_cover_options',
        'std' => "type_1",
        'type' => "select",
        'options' => array(
            'type_1' => __('跟随第一屏封面图', 'aurore'),
            'type_2' => __('外部随机图API', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('随机图库URL', 'aurore'),
        /**/
        'desc' => __('填写自定义随机图库URL', 'aurore'),
        'id' => 'post_cover',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('首页文章特色图（仅对标准风格生效）', 'aurore'),
        'id' => 'list_type',
        'std' => "round",
        'type' => "radio",
        'options' => array(
            'round' => __('圆形', 'aurore'),
            'square' => __('方形', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('首页文章特色图对齐方式（仅对图文风格生效，默认左右交替）', 'aurore'),
        'id' => 'feature_align',
        'std' => "alternate",
        'type' => "radio",
        'options' => array(
            'left' => __('向左对齐', 'aurore'),
            'right' => __('向右对齐', 'aurore'),
            'alternate' => __('左右交替', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('评论收缩', 'aurore'),
        'id' => 'toggle-menu',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('开启', 'aurore'),
            'no' => __('关闭', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('文章末尾显示作者信息？', 'aurore'),
        'desc' => __('勾选启用', 'aurore'),
        'id' => 'show_authorprofile',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('分页模式', 'aurore'),
        'id' => 'pagenav_style',
        'std' => "ajax",
        'type' => "radio",
        'options' => array(
            'ajax' => __('ajax加载', 'aurore'),
            'np' => __('上一页和下一页', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('自动加载下一页', 'aurore'),
        'desc' => __('（秒）设置自动加载下一页时间，默认不自动加载', 'aurore'),
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
            '233' => __('Do not load automatically', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('博主描述', 'aurore'),
        'desc' => __('一段自我描述的话', 'aurore'),
        'id' => 'admin_des',
        'std' => '无它，唯手熟尔',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => __('页脚信息', 'aurore'),
        'desc' => __('页脚说明文字，支持HTML代码', 'aurore'),
        'id' => 'footer_info',
        'std' => 'Copyright &copy; by Suran All Rights Reserved.',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => __('站长统计（不建议使用）', 'aurore'),
        'desc' => __('填写统计代码，将被隐藏', 'aurore'),
        'id' => 'site_statistics',
        'std' => '',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => __('自定义CSS样式', 'aurore'),
        'desc' => __('直接填写CSS代码，不需要写style标签', 'aurore'),
        'id' => 'site_custom_style',
        'std' => '',
        'type' => 'textarea'
    );

    //第一屏
    $options[] = array(
        'name' => __('第一屏', 'aurore'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('总开关', 'aurore'),
        'desc' => __('默认开启，勾选关闭', 'aurore'),
        'id' => 'head_focus',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('开启鼠标点击特效', 'options_click'),
        'desc' => __('默认关闭，勾选开启', 'options_click'),
        'id' => 'canvas_click',
        'std' => '0',
        'type' => 'checkbox'
    );
    $options[] = array(
        'name' => __('开启蜂窝背景动效', 'options_framework_theme'),
        'desc' => __('默认关闭，勾选开启', 'options_framework_theme'),
        'id' => 'canvas_nest',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('开启首屏底部动画', 'akina'),
        'desc' => __('默认底部没有动画', 'akina'),
        'id' => 'focus_canvas_animinte',
        'std' => "animinte-nothing",
        'type' => "radio",
        'options' => array(
            'animinte-nothing' => __('没有动画', ''),
            'waveloop' => __('波浪动画', ''),
            'bubble' => __('气泡动画', '')
        )
    );

    $options[] = array(
        'name' => __('社交信息', 'aurore'),
        'desc' => __('默认开启，勾选关闭，显示头像、签名', 'aurore'),
        'id' => 'focus_infos',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('是否开启一言', 'aurore'),
        'desc' => __('默认关闭，勾选开启', 'aurore'),
        'id' => 'hitokoto_enable',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('社交信息样式', 'aurore'),
        'id' => 'social_style',
        'std' => "v2",
        'type' => "radio",
        'options' => array(
            'v2' => __('与签名合并', 'aurore'),
            'v1' => __('独立成行', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('封面图片库选项', 'aurore'),
        'desc' => __('选择封面随机图的调用方式', 'aurore'),
        'id' => 'cover_cdn_options',
        'std' => "type_2",
        'type' => "select",
        'options' => array(
            'type_1' => __('webp优化随机图', 'aurore'),
            'type_2' => __('内置原图随机图', 'aurore'),
            'type_3' => __('外部随机图API', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('图片库url', 'aurore'),
        'desc' => sprintf(__('填写 manifest 路径，更多信息请参考<a href="https://github.com/yeyufan1996/Aurore/wiki/options">Wiki</a>,，如果你在上面选择了webp优化，点击<a href = "%s">这里</a>更新 manifest', 'aurore'), rest_url('aurore/v1/database/update')),
        /**/
        'id' => 'cover_cdn',
        'std' => 'https://cdn.yeyufan.cn/blog',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('全屏显示', 'aurore'),
        'desc' => __('默认开启，勾选关闭', 'aurore'),
        'id' => 'focus_height',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('开启视频', 'aurore'),
        'desc' => __('勾选开启', 'aurore'),
        'id' => 'focus_amv',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('Live', 'aurore'),
        'desc' => __('勾选开启，视频自动续播，需要在其他里开启Pjax功能', 'aurore'),
        'id' => 'focus_mvlive',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('视频地址', 'aurore'),
        'desc' => __('视频的来源地址，该地址拼接下面的视频名，地址尾部不需要加斜杠', 'aurore'),
        'id' => 'amv_url',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('视频名称', 'aurore'),
        'desc' => __('abc.mp4 ，只需要填写视频文件名 abc 即可，多个用英文逗号隔开如 abc,efg ，无需在意顺序，因为加载是随机的抽取的', 'aurore'),
        'id' => 'amv_title',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('背景图滤镜', 'aurore'),
        'id' => 'focus_img_filter',
        'std' => "filter-nothing",
        'type' => "radio",
        'options' => array(
            'filter-nothing' => __('无', 'aurore'),
            'filter-undertint' => __('浅色', 'aurore'),
            'filter-dim' => __('暗淡', 'aurore'),
            'filter-grid' => __('网格', 'aurore'),
            'filter-dot' => __('点点', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('是否开启聚焦图', 'aurore'),
        'desc' => __('勾选开启', 'aurore'),
        'id' => 'top_feature',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('聚焦样式', 'aurore'),
        'id' => 'top_feature_style',
        'std' => "left_and_right",
        'type' => "radio",
        'options' => array(
            'left_and_right' => __('左右交替', 'aurore'),
            'bottom_to_top' => __('从下往上', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('聚焦标题', 'aurore'),
        'desc' => __('默认为聚焦，你也可以修改为其他', 'aurore'),
        'id' => 'feature_title',
        'std' => '海上升明月',
        'class' => 'mini',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图一', 'aurore'),
        'desc' => __('尺寸257px*160px', 'aurore'),
        'id' => 'feature1_img',
        'std' => $imagepath . '/temp.png',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('聚焦图一标题', 'aurore'),
        'desc' => __('聚焦图一标题', 'aurore'),
        'id' => 'feature1_title',
        'std' => '聚焦图一标题',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图一描述', 'aurore'),
        'desc' => __('聚焦图一描述', 'aurore'),
        'id' => 'feature1_description',
        'std' => '聚焦图一描述',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图一链接', 'aurore'),
        'desc' => __('聚焦图一链接', 'aurore'),
        'id' => '聚焦图一链接',
        'std' => '#',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图二', 'aurore'),
        'desc' => __('尺寸257px*160px', 'aurore'),
        'id' => 'feature2_img',
        'std' => $imagepath . '/temp.png',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('聚焦图二标题', 'aurore'),
        'desc' => __('聚焦图二标题', 'aurore'),
        'id' => 'feature2_title',
        'std' => '聚焦图二标题',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图二描述', 'aurore'),
        'desc' => __('聚焦图二描述', 'aurore'),
        'id' => 'feature2_description',
        'std' => '聚焦图二描述',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图二链接', 'aurore'),
        'desc' => __('聚焦图二链接', 'aurore'),
        'id' => 'feature2_link',
        'std' => '#',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图三', 'aurore'),
        'desc' => __('尺寸257px*160px', 'aurore'),
        'id' => 'feature3_img',
        'std' => $imagepath . '/temp.png',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('聚焦图三标题', 'aurore'),
        'desc' => __('聚焦图三标题', 'aurore'),
        'id' => 'feature3_title',
        'std' => '聚焦图三标题',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图三描述', 'aurore'),
        'desc' => __('聚焦图三描述', 'aurore'),
        'id' => 'feature3_description',
        'std' => '聚焦图三描述',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('聚焦图三链接', 'aurore'),
        'desc' => __('聚焦图三链接', 'aurore'),
        'id' => 'feature3_link',
        'std' => '#',
        'type' => 'text'
    );

    //文章页
    $options[] = array(
        'name' => __('文章页', 'aurore'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('文章样式', 'aurore'),
        'id' => 'entry_content_theme',
        'std' => "sakura",
        'type' => "radio",
        'options' => array(
            'aurore' => __('Aurore', 'aurore'),
            'github' => __('Github', 'Github'),
        )
    );

    $options[] = array(
        'name' => __('文章点赞', 'aurore'),
        'id' => 'post_like',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('开启', 'aurore'),
            'no' => __('关闭', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('文章分享', 'aurore'),
        'id' => 'post_share',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('开启', 'aurore'),
            'no' => __('关闭', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('上一篇下一篇', 'aurore'),
        'id' => 'post_nepre',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('开启', 'aurore'),
            'no' => __('关闭', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('博主信息', 'aurore'),
        'id' => 'author_profile',
        'std' => "yes",
        'type' => "radio",
        'options' => array(
            'yes' => __('开启', 'aurore'),
            'no' => __('关闭', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('支付宝打赏', 'aurore'),
        'desc' => __('支付宝二维码', 'aurore'),
        'id' => 'alipay_code',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('微信打赏', 'aurore'),
        'desc' => __('微信二维码', 'aurore'),
        'id' => 'wechat_code',
        'type' => 'upload'
    );

    //社交选项
    $options[] = array(
        'name' => __('社交网络', 'aurore'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('微信', 'aurore'),
        'desc' => __('微信二维码', 'aurore'),
        'id' => 'wechat',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('新浪微博', 'aurore'),
        'desc' => __('新浪微博地址', 'aurore'),
        'id' => 'sina',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('腾讯QQ', 'aurore'),
        'desc' => __('tencent://message/?uin={{QQ号码}}，如tencent://message/?uin=123456', 'aurore'),
        'id' => 'qq',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('Telegram', 'aurore'),
        'desc' => __('Telegram链接', 'aurore'),
        'id' => 'telegram',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('QQ空间', 'aurore'),
        'desc' => __('QQ空间地址', 'aurore'),
        'id' => 'qzone',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('GitHub', 'aurore'),
        'desc' => __('GitHub地址', 'aurore'),
        'id' => 'github',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('Lofter', 'aurore'),
        'desc' => __('lofter地址', 'aurore'),
        'id' => 'lofter',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('B站', 'aurore'),
        'desc' => __('B站地址', 'aurore'),
        'id' => 'bili',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('优酷视频', 'aurore'),
        'desc' => __('优酷地址', 'aurore'),
        'id' => 'youku',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('网易云音乐', 'aurore'),
        'desc' => __('网易云音乐地址', 'aurore'),
        'id' => 'wangyiyun',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('推特', 'aurore'),
        'desc' => __('推特地址', 'aurore'),
        'id' => 'twitter',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('脸书', 'aurore'),
        'desc' => __('脸书地址', 'aurore'),
        'id' => 'facebook',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('简书', 'aurore'),
        'desc' => __('简书地址', 'aurore'),
        'id' => 'jianshu',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('CSDN', 'aurore'),
        'desc' => __('CSND社区地址', 'aurore'),
        'id' => 'csdn',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('知乎', 'aurore'),
        'desc' => __('知乎地址', 'aurore'),
        'id' => 'zhihu',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('邮箱-用户名', 'aurore'),
        'desc' => __('name@domain.com 的 name 部分，前端仅具有js运行环境时才能获取完整地址，可放心填写', 'aurore'),
        'id' => 'email_name',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('邮箱-域名', 'aurore'),
        'desc' => __('me@domain.com 的 domain.com 部分', 'aurore'),
        'id' => 'email_domain',
        'std' => '',
        'type' => 'text'
    );

    //评论区
    $options[] = array(
        'name' => __('评论区', 'aurore'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('Gravatar头像代理', 'aurore'),
        'desc' => __('填写Gravatar头像的代理地址,留空则不使用代理。', 'aurore'),
        'id' => 'gravatar_proxy',
        'std' => "https://cn.gravatar.com/avatar/",
        'type' => "text"
    );

    $options[] = array(
        'name' => __('评论上传图片接口', 'aurore'),
        'id' => 'img_upload_api',
        'std' => "imgur",
        'type' => "radio",
        'options' => array(
            'imgur' => __('Imgur (https://imgur.com)', 'aurore'),
            'smms' => __('SM.MS (https://sm.ms)', 'aurore'),
            'chevereto' => __('Chevereto (https://chevereto.com)', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('Imgur Client ID', 'aurore'),
        'desc' => __('<a href="https://api.imgur.com/oauth2/addclient">在此处注册</a> ', 'aurore'),
        'id' => 'imgur_client_id',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('SM.MS密钥', 'aurore'),
        'desc' => __(' <a href="https://sm.ms/home/apitoken">在此处注册</a>', 'aurore'),
        'id' => 'smms_client_id',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('Chevereto API key', 'aurore'),
        'desc' => __('在此处获取您的 API 密钥: ' . akina_option('cheverto_url') . '/dashboard/settings/api', 'aurore'),
        'id' => 'chevereto_api_key',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('Chevereto地址', 'aurore'),
        'desc' => __('Chevereto主页地址。比如：https://your.cherverto.com', 'aurore'),
        'id' => 'cheverto_url',
        'std' => 'https://your.cherverto.com',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('评论图片代理', 'aurore'),
        'desc' => __('上传图像的前端代理。如果不需要，请将其留空。', 'aurore'),
        'id' => 'cmt_image_proxy',
        'std' => 'https://images.weserv.nl/?url=',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('Imgur 上传代理', 'aurore'),
        'desc' => __('后端上传图片到 Imgur 的时候使用的代理', 'aurore'),
        'id' => 'imgur_upload_image_proxy',
        'std' => 'https://api.imgur.com/3/image/',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('邮件回复通知', 'aurore'),
        'desc' => __('WordPress默认会使用邮件通知用户评论收到回复，开启此项允许用户设置自己的评论收到回复时是否使用邮件通知', 'aurore'),
        'id' => 'mail_notify',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('邮件回复通知管理员', 'aurore'),
        'desc' => __('当管理员评论收到回复时是否使用邮件通知', 'aurore'),
        'id' => 'admin_notify',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('允许私密评论', 'aurore'),
        'desc' => __('允许用户设置自己的评论对其他人不可见', 'aurore'),
        'id' => 'open_private_message',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('机器人验证', 'aurore'),
        'desc' => __('开启机器人验证', 'aurore'),
        'id' => 'norobot',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('QQ头像链接加密', 'aurore'),
        'desc' => __('不直接暴露用户qq头像链接', 'aurore'),
        'id' => 'qq_avatar_link',
        'std' => "off",
        'type' => "select",
        'options' => array(
            'off' => __('关闭（默认）', 'aurore'),
            'type_1' => __('使用 重定向（安全性一般）', 'aurore'),
            'type_2' => __('后端获取数据（安全性高）', 'aurore'),
            'type_3' => __('后端获取数据（安全性高, 慢）', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('评论UA信息', 'aurore'),
        'desc' => __('勾选开启，显示用户的浏览器，操作系统信息', 'aurore'),
        'id' => 'open_useragent',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('评论位置信息', 'aurore'),
        'desc' => __('勾选开启，显示用户的位置信息', 'aurore'),
        'id' => 'open_location',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('时区调整', 'aurore'),
        'desc' => __('如果评论出现时差问题在这里调整，填入一个整数，计算方法：实际时间=显示错误的时间-你输入的整数（单位：小时）', 'aurore'),
        'id' => 'time_zone_fix',
        'std' => '0',
        'type' => 'text'
    );
    //后台配置
    $options[] = array(
        'name' => __('后台配置', 'aurore'),
        'type' => 'heading'
    );

    //后台面板自定义配色方案
    $options[] = array(
        'name' => __('后台面板自定义配色方案', 'aurore'),
        'desc' => __('你可以在下面自行设计后台面板（/wp-admin/）样式，不过在开始之前请到<a href="/wp-admin/profile.php">这里</a>将配色方案改为自定义（Custom）。<br><b>Tip: </b>如何搭配颜色？或许<a href="https://mashiro.top/color-thief/">这个</a>可以帮到你。', 'aurore'),
        'id' => 'scheme_tip',
        'std' => '',
        'type' => 'typography '
    );

    $options[] = array(
        'name' => __('面板主色调A', 'aurore'),
        'id' => 'dash_scheme_color_a',
        'std' => "#c6742b",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('面板主色调B', 'aurore'),
        'id' => 'dash_scheme_color_b',
        'std' => "#d88e4c",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('面板主色调C', 'aurore'),
        'id' => 'dash_scheme_color_c',
        'std' => "#695644",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('面板主色调D', 'aurore'),
        'id' => 'dash_scheme_color_d',
        'std' => "#a19780",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions which are used to give the user a feel for the theme.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('面板图标配色-base', 'aurore'),
        'id' => 'dash_scheme_color_base',
        'std' => "#e5f8ff",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions used to color any SVG icons.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('面板图标配色——focus', 'aurore'),
        'id' => 'dash_scheme_color_focus',
        'std' => "#fff",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions used to color any SVG icons.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('面板图标配色——current', 'aurore'),
        'id' => 'dash_scheme_color_current',
        'std' => "#fff",
        'desc' => __('<i>(array) (optional)</i> An array of CSS color definitions used to color any SVG icons.', 'aurore'),
        'type' => "color",
    );

    $options[] = array(
        'name' => __('其他自定义面板样式(CSS)', 'aurore'),
        'desc' => __('如果还需要对面板其他样式进行调整可以把style放到这里', 'aurore'),
        'id' => 'dash_scheme_css_rules',
        'std' => '#adminmenu .wp-has-current-submenu .wp-submenu a,#adminmenu .wp-has-current-submenu.opensub .wp-submenu a,#adminmenu .wp-submenu a,#adminmenu a.wp-has-current-submenu:focus+.wp-submenu a,#wpadminbar .ab-submenu .ab-item,#wpadminbar .quicklinks .menupop ul li a,#wpadminbar .quicklinks .menupop.hover ul li a,#wpadminbar.nojs .quicklinks .menupop:hover ul li a,.folded #adminmenu .wp-has-current-submenu .wp-submenu a{color:#f3f2f1}body{background-image:url(https://view.moezx.cc/images/2019/04/21/windows10-2019-4-21-i3.jpg);background-size:cover;background-repeat:no-repeat;background-attachment:fixed;}#wpcontent{background:rgba(255,255,255,.8)}',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => __('后台登陆界面背景图', 'aurore'),
        'desc' => __('该地址为空则使用默认图片', 'aurore'),
        'id' => 'login_bg',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('后台登陆界面logo', 'aurore'),
        'desc' => __('用于登录界面显示', 'aurore'),
        'id' => 'logo_img',
        'std' => $imagepath . 'aurore-logo-s.png',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __('登陆/注册相关设定', 'aurore'),
        'desc' => __(' ', 'space', 'aurore'),
        'id' => 'login_tip',
        'std' => '',
        'type' => 'typography '
    );

    $options[] = array(
        'name' => __('指定登录地址', 'aurore'),
        'desc' => __('强制不使用后台地址登陆，填写新建的登陆页面地址，比如 http://www.xxx.com/login【注意】填写前先测试下你新建的页面是可以正常打开的，以免造成无法进入后台等情况', 'aurore'),
        'id' => 'exlogin_url',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('指定注册地址', 'aurore'),
        'desc' => __('该链接使用在登录页面作为注册入口，建议填写', 'aurore'),
        'id' => 'exregister_url',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('允许用户注册', 'aurore'),
        'desc' => __('勾选开启，允许用户在前台注册', 'aurore'),
        'id' => 'ex_register_open',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('登录后自动跳转', 'aurore'),
        'desc' => __('勾选开启，管理员跳转至后台，用户跳转至主页', 'aurore'),
        'id' => 'login_urlskip',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('注册验证（仅前端，后端强制开启）', 'aurore'),
        'desc' => __('勾选开启滑动验证', 'aurore'),
        'id' => 'login_validate',
        'std' => '0',
        'type' => 'checkbox'
    );

    //CDN 优化
    $options[] = array(
        'name' => __('CDN', 'aurore'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('图片库', 'aurore'),
        'desc' => __('注意：填写格式为 http(s)://你的CDN域名/。<br>也就是说，原路径为 http://your.domain/wp-content/uploads/2018/05/xx.png 的图片将从 http://你的CDN域名/2018/05/xx.png 加载', 'aurore'),
        'id' => 'qiniu_cdn',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('本地调用前端库（lib.js、lib.css）', 'aurore'),
        'desc' => __('前端库不走 jsDelivr，不建议启用', 'aurore'),
        'id' => 'jsdelivr_cdn_test',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('本地调用主题 js、css 文件（sakura-app.js、style.css）', 'aurore'),
        'desc' => __('主题的 js、css 文件不走 jsDelivr，DIY 时请开启', 'aurore'),
        'id' => 'app_no_jsdelivr_cdn',
        'std' => '0',
        'type' => 'checkbox'
    );

    //其他
    $options[] = array(
        'name' => __('其他', 'aurore'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __('关于', 'aurore'),
        'desc' => sprintf(__('Theme Aurore v %s  | BY Suran  |  <a href="https://github.com/yeyufan1996/Aurore/">源码</a><a href="https://github.com/yeyufan1996/Aurore/releases/latest"><img src="https://img.shields.io/github/release/yeyufan1996/Aurore.svg?style=flat-square" alt="GitHub release"></a>', 'aurore'), AURORE_VERSION),
        'id' => 'theme_intro',
        'std' => '',
        'type' => 'typography '
    );

    $options[] = array(
        'name' => __('检查更新', 'aurore'),
        'desc' => '<a href="https://github.com/yeyufan1996/Aurore/releases/latest">下载最新版本</a>',
        'id' => "release_info",
        'std' => "tag",
        'type' => "images",
        'options' => array(
            'tag' => 'https://img.shields.io/github/release/yeyufan1996/Aurore.svg?style=flat-square',
        ),
    );

    $options[] = array(
        'name' => __('页脚悬浮播放器', 'aurore'),
        'desc' => __('选择播放源', 'aurore'),
        'id' => 'aplayer_server',
        'std' => "netease",
        'type' => "select",
        'options' => array(
            'netease' => __('网易云 (默认)', 'aurore'),
            'xiami' => __('小米', 'aurore'),
            'kugou' => __('酷狗', 'aurore'),
            'baidu' => __('百度', 'aurore'),
            'tencent' => __('QQ ', 'aurore'),
            'off' => __('关闭', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('歌单ID', 'aurore'),
        'desc' => __('填写歌单ID, 比如: https://music.163.com/#/playlist?id=2288037900  ID就是2288037900', 'aurore'),
        'id' => 'aplayer_playlistid',
        'std' => '2288037900',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('网易云cookie', 'aurore'),
        'desc' => __('一些VIP歌曲需要cookie', 'aurore'),
        'id' => 'aplayer_cookie',
        'std' => '',
        'type' => 'textarea'
    );

    $options[] = array(
        'name' => __('版本控制', 'aurore'),
        'desc' => __('用于更新前端 cookie 及浏览器缓存，可使用任意字符串', 'aurore'),
        'id' => 'cookie_version',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('开启PJAX局部刷新（建议开启', 'aurore'),
        'desc' => __('原理与Ajax相同', 'aurore'),
        'id' => 'poi_pjax',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('开启NProgress加载进度条', 'aurore'),
        'desc' => __('默认不开启，勾选开启', 'aurore'),
        'id' => 'nprogress_on',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('支持侧栏小部件', 'aurore'),
        'desc' => __('默认不开启，勾选开启', 'aurore'),
        'id' => 'sakura_widget',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('是否开启公告', 'aurore'),
        'desc' => __('默认不显示，勾选开启', 'aurore'),
        'id' => 'head_notice',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('公告内容', 'aurore'),
        'desc' => __('公告内容，文字超出142个字节将会被滚动显示（移动端无效），一个汉字 = 3字节，一个字母 = 1字节', 'aurore'),
        'id' => 'notice_title',
        'std' => '',
        'type' => 'text'
    );
    $options[] = array(
        'name' => __('Bilibili UID', 'aurore'),
        'desc' => __('Fill in your UID, eg.https://space.bilibili.com/13972644/, only fill in with the number part.', 'aurore'),
        'id' => 'bilibili_id',
        'std' => '13972644',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('Bilibili Cookie', 'aurore'),
        'desc' => __('Fill in your Cookies, go to your bilibili homepage, you can get cookies in brownser network pannel with pressing F12. If left this blank, you\'ll not get the progress.', 'aurore'),
        'id' => 'bilibili_cookie',
        'std' => 'LIVE_BUVID=',
        'type' => 'textarea'
    );
    $options[] = array(
        'name' => __('首页不显示的分类文章', 'aurore'),
        'desc' => __('填写分类ID，多个用英文“ , ”分开', 'aurore'),
        'id' => 'classify_display',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('图片展示分类', 'aurore'),
        'desc' => __('填写分类ID，多个用英文“ , ”分开', 'aurore'),
        'id' => 'image_category',
        'std' => '',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('统计接口', 'aurore'),
        'id' => 'statistics_api',
        'std' => "theme_build_in",
        'type' => "radio",
        'options' => array(
            'wp_statistics' => __('WP-Statistics 插件（专业性统计，可排除无效访问）', 'aurore'),
            'theme_build_in' => __('主题内建（简单的统计，计算每一次页面访问请求）', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('统计数据显示格式', 'aurore'),
        /**/
        'id' => 'statistics_format',
        'std' => "type_1",
        'type' => "radio",
        'options' => array(
            'type_1' => __('23333 次访问（默认）', 'aurore'),
            'type_2' => __('23,333 次访问（英式）', 'aurore'),
            'type_3' => __('23 333 次访问（法式）', 'aurore'),
            'type_4' => __('23k 次访问（中式）', 'aurore'),
        )
    );

    $options[] = array(
        'name' => __('启用实时搜索', 'aurore'),
        'desc' => __('前台实现实时搜索，调用 Rest API 每小时更新一次缓存，可在 functions.php 里手动设置缓存时间', 'aurore'),
        'id' => 'live_search',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('实时搜索包含评论', 'aurore'),
        'desc' => __('在实时搜索中搜索评论（如果网站评论数量太多不建议开启）', 'aurore'),
        'id' => 'live_search_comment',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('启用 baguetteBox', 'aurore'),
        'desc' => __('默认禁用，<a href="https://github.com/mashirozx/Sakura/wiki/Fancybox">请阅读说明</a>', 'aurore'),
        'id' => 'image_viewer',
        'std' => '0',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('文章内图片启用 lazyload', 'aurore'),
        'desc' => __('默认启用', 'aurore'),
        'id' => 'lazyload',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('占位图', 'aurore'),
        'desc' => __('图片加载时要显示的占位图，填写图片 url', 'aurore'),
        'id' => 'lazyload_spinner',
        'std' => 'https://cdn.jsdelivr.net/gh/moezx/cdn@3.0.2/img/svg/loader/trans.ajax-spinner-preloader.svg',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __('是否开启剪贴板版权标识', 'aurore'),
        'desc' => __('复制超过30个字节时自动向剪贴板添加版权标识，默认开启', 'aurore'),
        'id' => 'clipboard_copyright',
        'std' => '1',
        'type' => 'checkbox'
    );

    $options[] = array(
        'name' => __('发件地址前缀', 'aurore'),
        'desc' => __('用于发送系统邮件，在用户的邮箱中显示的发件人地址，不要使用中文，默认系统邮件地址为 bibi@你的域名', 'aurore'),
        'id' => 'mail_user_name',
        'std' => 'bibi',
        'type' => 'text'
    );

    return $options;
}