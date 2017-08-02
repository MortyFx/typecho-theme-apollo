<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="shortcut icon" href="<?php if ($this->options->favicon): $this->options->favicon();
    else: $this->options->themeUrl('img/favicon.ico');endif; ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?php $this->header(); ?>
</head>

<body>
<!--[if lt IE 8]>
<div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a
    href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.
</div>
<![endif]-->
<div class="wrap">
    <header>
        <a href="<?php $this->options->siteUrl(); ?>" class="logo-link"><img
                src="<?php if ($this->options->logo): $this->options->logo();
                else: $this->options->themeUrl('img/logo.png');endif; ?>"></a>
        <ul class="nav nav-list">
            <li class="nav-list-item"><a href="<?php $this->options->siteUrl(); ?>"
                                         class="nav-list-link <?php if ($this->is('index')) echo 'active'; ?>">BLOG</a>
            </li>
            <li class="nav-list-item"><a href="<?php $this->options->siteUrl('archives.html'); ?>"
                                         class="nav-list-link <?php if ($this->is('page', 'archives')) echo 'active'; ?>">ARCHIVES</a>
            </li>
            <li class="nav-list-item"><a href="<?php $this->options->siteUrl('about.html'); ?>"
                                         class="nav-list-link <?php if ($this->is('page', 'about')) echo 'active'; ?>">ABOUT</a>
            </li>
            <li class="nav-list-item"><a href="<?php $this->options->siteUrl('links.html'); ?>"
                                         class="nav-list-link <?php if ($this->is('page', 'links')) echo 'active'; ?>">LINKS</a>
            </li>
            <li class="nav-list-item"><a href="<?php $this->options->siteUrl('guestbook.html'); ?>"
                                         class="nav-list-link <?php if ($this->is('page', 'guestbook')) echo 'active'; ?>">GUESTBOOK</a>
            </li>
        </ul>
    </header>
    <section class="container">
