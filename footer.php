<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</section>
    <footer>
        <!-- <div class="paginator"><a href="/page/2/" class="next">NEXT</a></div> -->
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('The theme is <a href="https://muguang.me/" target="_blank">apollo</a>, Powered by <a href="http://www.typecho.org">Typecho</a>'); ?>.</p>
        </div>
    </footer>
    </div>
    <script async src="//cdn.bootcss.com/mathjax/2.6.1/MathJax.js?config=TeX-MML-AM_CHTML"></script>
     <?php $this->footer(); ?> 
</body>

</html>
