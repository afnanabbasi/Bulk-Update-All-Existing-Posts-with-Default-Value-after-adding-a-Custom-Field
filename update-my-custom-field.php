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
