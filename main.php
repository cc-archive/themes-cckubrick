<?php
/*
Template Name: Main
*/
?>

<?php get_header(); ?>

        <div id="content" class="narrowcolumn">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div style="margin: 0px;" class="post" id="post-<?php the_ID(); ?>">
                <h2><?php the_title(); ?></h2>
                        <div class="entry">
                                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

                                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

                        </div>
                </div>
                <?php endwhile; endif; ?>
        <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
<div style="width: 100%; padding: 5px; clear: both; overflow: hidden;">
<div style="float:left;">
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 3,
  interval: 6000,
  width: '400',
  height: '250',
  theme: {
    shell: {
      background: '#4f4f4f',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#000000',
      links: '#ff0000'
    }
  },
  features: {
    scrollbar: false,
    loop: true,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'default'
  }
}).render().setUser('SJournalism').start();
</script>
</div>
<div style="float:right;">
<script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US"></script><script 
type="text/javascript">FB.init("3aa0c2ba1f7528fc67a5f24b48966f96");</script><fb:fan profile_id="154018086889" stream="0" connections="14" width="400"></fb:fan><div 
style="font-size:12px; 
padding-left:10px"><a href="http://www.facebook.com/pages/Student-Journalism-20/154018086889">Student Journalism 2.0 on Facebook</a> </div>
</div></div>
<h3>Recent Posts:</h3><br />
<center>
<div style="width: 750px; align: center; text-align: left;">
<?php mdv_recent_posts(10, '<span style="font-size: 130%;"><strong>', '</strong></span><br />', true, 0, true, false); ?>
</div>
</center>
</div>

<?php echo $falbum->show_random(12,'Student Journalism 2.0',1,'s');?>

<?php get_footer(); ?>
