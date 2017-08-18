<?php
/**
 * apollo 是一款移植自 Hexo 的 Typecho 极简主义主题
 *
 * @package apollo
 * @author pinggod & Patrick95
 * @version 1.0.2
 * @link https://muguang.me/
 * MIT © pinggod
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

    <ul class="home post-list">
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
            <a href="<?php $this->permalink() ?>" class="read-more">Read more »</a>
        </article>
    </li>

<?php endwhile; ?>
    <nav class="paginator">
        <div class="paginator-doc">PAGE
            <?php if ($this->_currentPage > 1) echo $this->_currentPage; else echo 1; ?>
            OF <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></div>
        <?php $this->pageLink('PREV PAGE'); ?>
        <?php $this->pageLink('NEXT PAGE', 'next'); ?></nav>


<?php $this->need('footer.php'); ?>