<?php
/**
 * archives
 *
 * @package custom
 */
$this->need('header.php'); ?>


    <div class="post">
        <article class="post-block">
            <h1 class="post-title"><?php $this->title() ?></h1>
            <div class="post-content">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                $year = 0;
                $mon = 0;
                $i = 0;
                $j = 0;
                while ($archives->next()):
                    $year_tmp = date('Y', $archives->created);
                    $mon_tmp = date('m', $archives->created);
                    $y = $year;
                    $m = $mon;
                    if ($mon != $mon_tmp && $mon > 0) $output .= '</ul>';
                    if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                    if ($year != $year_tmp) {
                        $year = $year_tmp;
                    }
                    if ($mon != $mon_tmp || ($mon == $mon_tmp && $y != $year_tmp)) {
                        $mon = $mon_tmp;
                        $output .= '<h4>' . $year_tmp . ' 年' . $mon_tmp . ' 月</h4>';
                        $output .= '<ul>';
                    }
                    $output .= '<li><a href="' . $archives->permalink . '">' . $archives->title . '</a>&nbsp;&nbsp;&nbsp;&nbsp;(' . date('M j, Y', $archives->created) . ')</li>';
                endwhile;
                $output .= '</ul>';
                echo $output;
                ?>
            </div>
        </article>
    </div>

<?php $this->need('footer.php'); ?>