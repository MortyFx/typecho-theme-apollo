<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="post">
    <article class="post-block">
        <h1 class="post-title">404 - <?php _e('页面没找到'); ?></h1>
        <div class="post-content">
            <?php _e('你想查看的页面已被转移或删除了. '); ?>
        </div>
    </article>
</div>

<?php $this->need('footer.php'); ?>
