<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</section>
<footer>
    <div class="copyright">
        <p>&copy; <?php echo date('Y'); ?> <a
                href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</p>
        <p><?php _e('The theme is <a href="https://muguang.me/" target="_blank">apollo</a>, Powered by <a href="http://www.typecho.org">Typecho</a>'); ?>
            .</p>
    </div>
</footer>
</div>
<?php $this->footer(); ?>
<script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
<?php if (!empty($this->options->pjax) && in_array('InstantClick', $this->options->pjax)): ?>
    <script src="//cdn.staticfile.org/instantclick/3.0.1/instantclick.min.js" data-no-instant></script>
    <script src="<?php $this->options->themeUrl('js/prism.js'); ?>" data-no-instant></script>
    <script data-no-instant>
        InstantClick.on('change', function (isInitialLoad) {
            if (isInitialLoad === false) {
                if (typeof Prism !== 'undefined') Prism.highlightAll(true, null);
            }
        });
        InstantClick.init();
    </script>
<?php else: ?>
    <script src="<?php $this->options->themeUrl('js/prism.js'); ?>" data-no-instant></script>
<?php endif; ?>
</body>

</html>
