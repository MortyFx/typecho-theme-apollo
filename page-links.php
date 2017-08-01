<?php
/**
 * links
 *
 * @package custom
 */
$this->need('header.php'); ?>


    <div class="post">
        <article class="post-block">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <div class="post-content">
                <div class="links">
                    <?php $this->content(); ?>
                </div>
            </div>
        </article>
    </div>

<?php $this->need('footer.php'); ?>