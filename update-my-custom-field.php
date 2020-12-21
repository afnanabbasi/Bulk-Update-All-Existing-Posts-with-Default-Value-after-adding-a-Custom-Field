<?php
add_action('admin_init', 'update_my_custom_field');
function update_my_custom_field(){
       $args = array(
              'post_type'=> 'page', // replace with your post type, eg. "post" for posts.
              'posts_per_page' => -1,
              'post_status'=> 'publish'
       );
       $posts = get_posts($args);

       foreach($posts as $post){
           if(!get_post_meta($post->ID, 'your_field_name')){
              update_post_meta($post->ID, 'your_field_name', 'Your default value for the field.');
           }
       }
  }

// Use this to update a field with it's own value.
add_action('init', 'update_my_custom_field');
function update_my_custom_field(){
       $args = array(
              'post_type'=> 'portfolio', // replace with your post type, eg. "post" for posts.
              'posts_per_page' => -1,
              'post_status'=> 'publish'
       );
       $posts = get_posts($args);

       foreach($posts as $post){
		   // if($post->ID == 47298 || $post->ID == '47298'){
           $related_to_studio = get_post_meta($post->ID, 'related_to_studio', true);
             update_field('field_541068c17ac50', $related_to_studio, $post->ID); // 'field_541068c17ac5' is the 'field key', more here: https://www.advancedcustomfields.com/resources/update_field/
		   // }
       }
}
