<?php

if ( function_exists('register_sidebars') )
	register_sidebars(0);

if (get_option('cc_header_show_worldwide') == NULL) {
   add_option('cc_header_show_worldwide', true);
}

/* to enable local testing on WP (not WPMU) */
if (!function_exists('get_current_site')) { function get_current_site() {} }
if (!function_exists('licenseUri')) { function licenseUri() {} }

/* theme options page */
add_action ('admin_menu', 'cc_theme_menu');

function cc_header_image() {
  return stripslashes (get_option ('cc_header_image'));
}

function cc_show_worldwide() {
  return get_option('cc_header_show_worldwide');
}

function cc_theme_menu() {
  add_theme_page('Customize SJ Kubrick', 'Customize SJ Kubrick', 5, basename(__FILE__), 'cc_theme_options');
}

/* TODO: Make this a file upload instead of location reference. */
function cc_theme_options() {
  
  if ($_POST['cc_header_image']) {
    update_option ('cc_header_image', $_POST['cc_header_image']);
    $message = "Header image location updated!";
  }

  if ($_POST['cc_show_worldwide_submitted']) {

    if ($_POST['cc_show_worldwide']) {
       update_option('cc_header_show_worldwide', true);
    } else {
       update_option('cc_header_show_worldwide', false);
    }

    $message = "Toolbar display updated.";
  }


  // display feedback that something happened
  if ($message) {
    ?>
    <div class="wrap"><?= $message ?></div>
    <?php    
  }
  ?>
  
  <div class="wrap">
   <h2>Header Image Location (optional)</h2>
   <p><small>Add path, or URL, to an image to be used in place of blog title for each page. Will use default blog title if left blank.</small></p>
   <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" name="blurb" method="post" accept-charset="utf-8">
    <input type="text" name="cc_header_image" size="45" value="<?= cc_header_image() ?>" id="cc_header_image">
    <p><input type="submit" value="Update &rarr;" /></p>
   </form>
  </div>

  <div class="wrap">
   <h2>Header Toolbar</h2>
   <p>Display the custom SJ header toolbar?</p>
   <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" name="i18n" method="post" accept-charset="utf-8">
    <input type="checkbox" name="cc_show_worldwide" size="45" id="cc_show_worldwide" <?=cc_show_worldwide()?'checked':''?> />
    <input type="hidden" name="cc_show_worldwide_submitted" value="true" />
    <p><input type="submit" value="Update &rarr;" /></p>
   </form>
  </div>

  <?php
}


?>
<?php
/* Author: Nick Momrik
Author URI: http://mtdewvirus.com/
*/
function mdv_recent_posts($no_posts = 5, $before = '<li>', $after = '</li>', $hide_pass_post = true, $skip_posts = 0, $show_excerpts = false, $include_pages = false) {
    global $wpdb;
	$time_difference = get_settings('gmt_offset');
	$now = gmdate("Y-m-d H:i:s",time());
    $request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' ";
	if($hide_pass_post) $request .= "AND post_password ='' ";
	if($include_pages) $request .= "AND (post_type='post' OR post_type='page') ";
	else $request .= "AND post_type='post' ";
	$request .= "AND post_date_gmt < '$now' ORDER BY post_date DESC LIMIT $skip_posts, $no_posts";
    $posts = $wpdb->get_results($request);
	$output = '';
    if($posts) {
		foreach ($posts as $post) {
			$post_title = stripslashes($post->post_title);
			$permalink = get_permalink($post->ID);
			$output .= $before . '<br /><a href="' . $permalink . '" rel="bookmark" 
title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '">' . htmlspecialchars($post_title) . '</a>';
			$output .= $after;
			if($show_excerpts) {
				$post_excerpt = stripslashes($post->post_excerpt);
				$output.= $post_excerpt . '<br />';
			}
		}
	} else {
		$output .= $before . "None found" . $after;
	}
    echo $output;
}
?>
