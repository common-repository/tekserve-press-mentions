<?php
 
/**
 * Template Name: Tekserve Press Mention - Single
 * Description: Used as a page template to contents of an article, with author, publication, original publication date, and link to the original article.  Genesis only for now...
 */
 
//* Customize the post info function to display custom fields
add_action( 'genesis_after_post_title', 'tekserve_press_date_only' );
function tekserve_press_date_only() {
	$post_info = get_the_date();
	echo '<div id="tekserve-press-meta"><a href="'.genesis_get_custom_field('tekserve_press_url').'"><div id="tekserve-press-date">Originally appeared on '.$post_info.' </div>';
}

add_action('genesis_after_post_title', 'tekserve_press_publication');
function tekserve_press_publication() {
	if ( is_single() && genesis_get_custom_field('tekserve_press_publication') ) {
		echo '<div id="tekserve-press-publication">in <em>' .genesis_get_custom_field('tekserve_press_publication').'</em>.  </div>';
	}
}

add_action('genesis_after_post_title', 'tekserve_press_author');
function tekserve_press_author() {
	if ( is_single() && genesis_get_custom_field('tekserve_press_author') ) {
		echo '<div id="tekserve-press-author">By: '. genesis_get_custom_field('tekserve_press_author') .'</div></a></div>';
	}
}

//display featured image before title

add_action('genesis_before_post_title', 'tekserve_press_logo');
function tekserve_press_logo() {
	$press_logo = get_the_post_thumbnail($post_id, 'full');
	echo $press_logo;
}

/** Remove Post Info */
remove_action( 'genesis_after_post_title', 'genesis_post_meta' );
 
genesis();