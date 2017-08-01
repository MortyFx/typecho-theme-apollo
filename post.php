<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


    <div class="post">
        <article class="post-block">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <div class="post-info">
                <time datetime="<?php $this->date('c'); ?>"
                      itemprop="datePublished"><?php $this->date('F j, Y'); ?></time><?php if ($this->user->hasLogin()): ?>
                    <code class="notebook">
                        <a href="<?php $this->options->adminUrl(); ?>write-<?php if ($this->is('post')): ?>post<?php else: ?>page<?php endif; ?>.php?cid=<?php echo $this->cid; ?>"
                           class="category-link" target="_blank">编辑</a></code>
                <?php endif; ?></div>
            <div class="post-content">
                <?php $this->content(); ?>
            </div>
        </article>
        <div
            class="paginator"><?php $this->thePrev('%s', '', ['title' => 'PREV ARTICLE', 'tagClass' => 'prev']); ?><?php $this->theNext('%s', '', ['title' => 'NEXT ARTICLE', 'tagClass' => 'next']); ?></div>
        <?php $this->need('comments.php'); ?>
    </div>

<?php $this->need('footer.php'); ?>