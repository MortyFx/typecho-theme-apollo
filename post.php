<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="post">
    <article class="post-block">
        <h1 class="post-title"><?php $this->title() ?></h1>
        <div class="post-info"><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('F j, Y'); ?></time></div>
        <div class="post-content">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</div>

<?php $this->need('footer.php'); ?>
