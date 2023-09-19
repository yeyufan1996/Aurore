<?php


?>
<figure id="centerbg" class="centerbg">
    <?php if (!akina_option('focus_infos')) { ?>
        <div class="focusinfo">
            <?php if (akina_option('focus_logo_text')): ?>
                <h1 class="center-text glitch is-glitching Ubuntu-font"
                    data-text="<?php echo akina_option('focus_logo_text', ''); ?>">
                    <?php echo akina_option('focus_logo_text', ''); ?>
                </h1>
            <?php elseif (akina_option('focus_logo')): ?>
                <div class="header-tou"><a href="<?php bloginfo('url'); ?>"><img
                            src="<?php echo akina_option('focus_logo', ''); ?>"></a></div>
            <?php else: ?>
                <div class="header-tou"><a href="<?php bloginfo('url'); ?>"><img
                            src="<?php bloginfo('template_url'); ?>/images/avatar.jpg"></a></div>
            <?php endif; ?>
            <div class="header-info">
                <?php
                if (akina_option('hitokoto_enable') != '0') {
                    // 开启一言签名
                    echo '<script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>';
                    echo '<p id="hitokoto"><a href="#" id="hitokoto_text">:D 获取中...</a></p>';
                } else {
                    echo akina_option('admin_des', 'Hi, Mashiro?');
                }
                ?>
                <?php if (akina_option('social_style') == "v2"): ?>
                    <div class="top-social_v2">
                        <li id="bg-pre"><img class="flipx" src="https://cdn.yeyufan.cn/blog/img/next-b.svg" /></li>
                        <?php if (akina_option('github')) { ?>
                            <li><a href="<?php echo akina_option('github', ''); ?>" target="_blank" class="social-github"
                                    title="github"><img src="https://cdn.yeyufan.cn/blog/img/github.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('sina')) { ?>
                            <li><a href="<?php echo akina_option('sina', ''); ?>" target="_blank" class="social-sina"
                                    title="sina"><img src="https://cdn.yeyufan.cn/blog/img/sina.png" /></a></li>
                        <?php } ?>
                        <?php if (akina_option('telegram')) { ?>
                            <li><a href="<?php echo akina_option('telegram', ''); ?>" target="_blank" class="social-lofter"
                                    title="telegram"><img src="https://cdn.yeyufan.cn/blog/img/telegram.svg" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('qq')) { ?>
                            <li class="qq"><a href="<?php echo akina_option('qq', ''); ?>" title="Initiate chat ?"><img
                                        src="https://cdn.yeyufan.cn/blog/img/qq.png" /></a></li>
                        <?php } ?>
                        <?php if (akina_option('qzone')) { ?>
                            <li><a href="<?php echo akina_option('qzone', ''); ?>" target="_blank" class="social-qzone"
                                    title="qzone"><img src="https://cdn.yeyufan.cn/blog/img/qzone.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('wechat')) { ?>
                            <li class="wechat"><a href="#"><img src="https://cdn.yeyufan.cn/blog/img/wechat.png" /></a>
                                <div class="wechatInner">
                                    <img src="<?php echo akina_option('wechat', ''); ?>" alt="WeChat">
                                </div>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('lofter')) { ?>
                            <li><a href="<?php echo akina_option('lofter', ''); ?>" target="_blank" class="social-lofter"
                                    title="lofter"><img src="https://cdn.yeyufan.cn/blog/img/lofter.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('bili')) { ?>
                            <li><a href="<?php echo akina_option('bili', ''); ?>" target="_blank" class="social-bili"
                                    title="bilibili"><img src="https://cdn.yeyufan.cn/blog/img/bilibili.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('youku')) { ?>
                            <li><a href="<?php echo akina_option('youku', ''); ?>" target="_blank" class="social-youku"
                                    title="youku"><img src="https://cdn.yeyufan.cn/blog/img/youku.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('wangyiyun')) { ?>
                            <li><a href="<?php echo akina_option('wangyiyun', ''); ?>" target="_blank" class="social-wangyiyun"
                                    title="CloudMusic"><img src="https://cdn.yeyufan.cn/blog/img/wangyiyun.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('twitter')) { ?>
                            <li><a href="<?php echo akina_option('twitter', ''); ?>" target="_blank" class="social-wangyiyun"
                                    title="Twitter"><img src="https://cdn.yeyufan.cn/blog/img/twitter.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('facebook')) { ?>
                            <li><a href="<?php echo akina_option('facebook', ''); ?>" target="_blank" class="social-wangyiyun"
                                    title="Facebook"><img src="https://cdn.yeyufan.cn/blog/img/facebook.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('jianshu')) { ?>
                            <li><a href="<?php echo akina_option('jianshu', ''); ?>" target="_blank" class="social-wangyiyun"
                                    title="Jianshu"><img src="https://cdn.yeyufan.cn/blog/img/jianshu.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('zhihu')) { ?>
                            <li><a href="<?php echo akina_option('zhihu', ''); ?>" target="_blank" class="social-wangyiyun"
                                    title="Zhihu"><img src="https://cdn.yeyufan.cn/blog/img/zhihu.png" /></a>
                            </li>
                        <?php } ?>
                        <?php if (akina_option('csdn')) { ?>
                            <li><a href="<?php echo akina_option('csdn', ''); ?>" target="_blank" class="social-wangyiyun"
                                    title="CSDN"><img src="https://cdn.yeyufan.cn/blog/img/csdn.png" /></a></li>
                        <?php } ?>
                        <?php if (akina_option('email_name') && akina_option('email_domain')) { ?>
                            <li><a onclick="mail_me()" class="social-wangyiyun" title="E-mail"><img
                                        src="https://cdn.yeyufan.cn/blog/img/email.svg" /></a>
                            </li>
                        <?php } ?>
                        <li id="bg-next"><img src="https://cdn.yeyufan.cn/blog/img/next-b.svg" />
                        </li>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (akina_option('social_style') == "v1"): ?>
                <div class="top-social">
                    <li id="bg-pre"><img class="flipx" src="https://cdn.yeyufan.cn/blog/img/next-b.svg" /></li>
                    <?php if (akina_option('github')) { ?>
                        <li><a href="<?php echo akina_option('github', ''); ?>" target="_blank" class="social-github"
                                title="github"><img src="https://cdn.yeyufan.cn/blog/img/github.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('sina')) { ?>
                        <li><a href="<?php echo akina_option('sina', ''); ?>" target="_blank" class="social-sina" title="sina"><img
                                    src="https://cdn.yeyufan.cn/blog/img/sina.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('telegram')) { ?>
                        <li><a href="<?php echo akina_option('telegram', ''); ?>" target="_blank" class="social-lofter"
                                title="telegram"><img src="https://cdn.yeyufan.cn/blog/img/telegram.svg" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('qq')) { ?>
                        <li class="qq"><a href="<?php echo akina_option('qq', ''); ?>" title="Initiate chat ?"><img
                                    src="https://cdn.yeyufan.cn/blog/img/qq.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('qzone')) { ?>
                        <li><a href="<?php echo akina_option('qzone', ''); ?>" target="_blank" class="social-qzone"
                                title="qzone"><img src="https://cdn.yeyufan.cn/blog/img/qzone.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('wechat')) { ?>
                        <li class="wechat"><a href="#"><img src="https://cdn.yeyufan.cn/blog/img/wechat.png" /></a>
                            <div class="wechatInner">
                                <img src="<?php echo akina_option('wechat', ''); ?>" alt="WeChat">
                            </div>
                        </li>
                    <?php } ?>
                    <?php if (akina_option('lofter')) { ?>
                        <li><a href="<?php echo akina_option('lofter', ''); ?>" target="_blank" class="social-lofter"
                                title="lofter"><img src="https://cdn.yeyufan.cn/blog/img/lofter.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('bili')) { ?>
                        <li><a href="<?php echo akina_option('bili', ''); ?>" target="_blank" class="social-bili"
                                title="bilibili"><img src="https://cdn.yeyufan.cn/blog/img/bilibili.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('youku')) { ?>
                        <li><a href="<?php echo akina_option('youku', ''); ?>" target="_blank" class="social-youku"
                                title="youku"><img src="https://cdn.yeyufan.cn/blog/img/youku.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('wangyiyun')) { ?>
                        <li><a href="<?php echo akina_option('wangyiyun', ''); ?>" target="_blank" class="social-wangyiyun"
                                title="CloudMusic"><img src="https://cdn.yeyufan.cn/blog/img/wangyiyun.png" /></a>
                        </li>
                    <?php } ?>
                    <?php if (akina_option('twitter')) { ?>
                        <li><a href="<?php echo akina_option('twitter', ''); ?>" target="_blank" class="social-wangyiyun"
                                title="Twitter"><img src="https://cdn.yeyufan.cn/blog/img/twitter.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('facebook')) { ?>
                        <li><a href="<?php echo akina_option('facebook', ''); ?>" target="_blank" class="social-wangyiyun"
                                title="Facebook"><img src="https://cdn.yeyufan.cn/blog/img/facebook.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('jianshu')) { ?>
                        <li><a href="<?php echo akina_option('jianshu', ''); ?>" target="_blank" class="social-wangyiyun"
                                title="Jianshu"><img src="https://cdn.yeyufan.cn/blog/img/jianshu.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('zhihu')) { ?>
                        <li><a href="<?php echo akina_option('zhihu', ''); ?>" target="_blank" class="social-wangyiyun"
                                title="Zhihu"><img src="https://cdn.yeyufan.cn/blog/img/zhihu.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('csdn')) { ?>
                        <li><a href="<?php echo akina_option('csdn', ''); ?>" target="_blank" class="social-wangyiyun"
                                title="CSDN"><img src="https://cdn.yeyufan.cn/blog/img/csdn.png" /></a></li>
                    <?php } ?>
                    <?php if (akina_option('email_name') && akina_option('email_domain')) { ?>
                        <li><a onclick="mail_me()" class="social-wangyiyun" title="E-mail"><img
                                    src="https://cdn.yeyufan.cn/blog/img/email.svg" /></a></li>
                    <?php } ?>
                    <li id="bg-next"><img src="https://cdn.yeyufan.cn/blog/img/next-b.svg" /></li>
                </div>
            <?php endif; ?>
        </div>
    <?php } ?>
</figure>
<?php
echo bgvideo();