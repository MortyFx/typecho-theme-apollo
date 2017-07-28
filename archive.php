<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<h3 class="archive-title"><?php $this->archiveTitle(array(
        'category' => _t('分类 %s 下的文章'),
        'search' => _t('包含关键字 %s 的文章'),
        'tag' => _t('标签 %s 下的文章'),
        'author' => _t('%s 发布的文章')
    ), '', ''); ?></h3>

<ul class="home post-list">
    <?php if ($this->have()): ?>
        <?php while ($this->next()): ?>

            <li class="post-list-item">
                <article class="post-block">
                    <h2 class="post-title"><a href="<?php $this->permalink() ?>"
                                              class="post-title-link"><?php $this->title() ?></a></h2>
                    <div class="post-info">
                        <time datetime="<?php $this->date('c'); ?>"
                              itemprop="datePublished"><?php $this->date('F j, Y'); ?></time>
                    </div>
                    <div class="post-content">
                        <?php print_excerpt($this, 255); ?>
                    </div>
                    <a href="<?php $this->permalink() ?>" class="read-more">Read more »</a></article>
            </li>

        <?php endwhile; ?>
    <?php else: ?>
        <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
    <?php endif; ?>


    <nav class="paginator">
        <div class="paginator-doc">PAGE
            <?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo 1; ?>
            OF <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></div>
        <?php $this->pageLink('PREV PAGE'); ?>
        <?php $this->pageLink('NEXT PAGE', 'next'); ?></nav>


    <?php $this->need('footer.php'); ?>
