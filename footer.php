<?php $current_site = get_current_site(); ?>

 <hr />
 <div id="footer">
        <p>
               <?php bloginfo('name'); ?> is a project of <a href="http://learn.creativecommons.org">ccLearn</a> at <a href="http://creativecommons.org">Creative Commons</a>. <a href="<?php bloginfo('rss2_url'); ?>">Blog RSS</a><br />
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
<a href="<?=licenseUri()?>"></a>
<span style="font-size:80%;">
Except where otherwise <a href="http://creativecommons.org/policies">noted</a>, content on this site is
licensed under a <a rel="license" href="<?#licenseUri()?>">Creative Commons Attribution 3.0 Unported License</a></span>
</p>
</div>

<?php wp_footer(); ?>
<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>
</body>
</html>
