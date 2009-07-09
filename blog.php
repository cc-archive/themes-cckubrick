<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="content" class="narrowcolumn">

<?php
$how_many=5; //How many posts do you want to show
require_once('wp-config.php'); // Change this for your path to wp-config.php file ?>
<ul id="whats-new">
<?
$news=$wpdb->get_results("SELECT `ID`,`post_title` FROM $wpdb->posts
WHERE `post_type`=\"post\" AND `post_status`=\"publish\" ORDER BY post_date DESC LIMIT $how_many");
foreach($news as $np){
printf ("<li><h3><a href=\"index.php?p=%s\">%s</a></h3></li>", $np->ID,$np->post_title);
}?>
</ul>
</div>
<?php get_footer(); ?>
