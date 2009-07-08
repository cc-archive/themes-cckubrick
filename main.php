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
<ul>
 <?php
 global $post;
 $myposts = get_posts('numberposts=5&offset=1&category=1');
 foreach($myposts as $post) :
 ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
 <?php endforeach; ?>
 </ul> 
</div>

<?php get_footer(); ?>
