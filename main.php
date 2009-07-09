<?php
/*
Template Name: Main
*/
?>

<?php get_header(); ?>

        <div id="content" class="narrowcolumn">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post" id="post-<?php the_ID(); ?>">
                <h2><?php the_title(); ?></h2>
                        <div class="entry">
                                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

                                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

                        </div>
                </div>
                <?php endwhile; endif; ?>
        <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
</div>

<h2>
	<a href="<?php echo $falbum->create_url("show/recent"); ?>" title="View all recent photos">Recent Photos</a>
</h2>
<br />
<?php echo $falbum->show_recent(1,8,'s');?>
<br />

<?php get_footer(); ?>
