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

<h3>Recent Posts:</h3>
method one:<br />
<?php wp_get_archives('title_li=&type=postbypost&limit=10'); ?>


two:<br />
<?php
$how_many=5; //How many posts do you want to show
require_once('wp-config.php'); // Change this for your path to wp-config.php file ?>
<ul id="whats-new">
<?
$news=$wpdb->get_results("SELECT `ID`,`post_title` FROM $wpdb->posts
WHERE `post_type`=\"post\" AND `post_status`=\"publish\" ORDER BY post_date DESC LIMIT $how_many");
foreach($news as $np){
printf ("<li><a href=\"%s\">%s</a></li>", get_permalink($np->ID),$np->post_title);
} ?>
</ul>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
