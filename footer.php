<?php $current_site = get_current_site(); ?>

 <hr />
 <div id="footer">
        <p>
               <?php bloginfo('name'); ?> is a project of <a href="http://learn.creativecommons.org">ccLearn</a> at <a href="http://creativecommons.org">Creative Commons</a>. 
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
</div>

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

<a href="<?=licenseUri()?>">
<span style="font-size:80%;"><img src="img src="http://i.creativecommons.org/l/by/3.0/88x31.png" alt="some rights reserved" /></a><br/>
Except where otherwise <a href="http://creativecommons.org/policies">noted</a>,
content on this site is<br/>
licensed under a <a rel="license" href="<?=licenseUri()?>">Creative Commons Attribution United States 3.0 License</a>.</span>
		<?php wp_footer(); ?>
</body>
</html>
