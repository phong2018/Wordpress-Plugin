<?php
add_action('init', 'create_post_type');
 
function create_post_type() {
    register_post_type('video', array(
            'labels' => array(
                'name' => __('Videos'),
                'singular_name' => __('Video'),
                'add_new_item'  => __('Add New Video'),
                'new_item'      => __('New Video'),
                'add_new'       => __('Add Video'),
                'edit_item'     => __('Edit Video'),
                'search_items'  => __('Search Videos'),
                'all_items'  => __('Videos'),
            ),
            'public' => true,
            'has_archive' => true,
            'exclude_from_search' => true, 
        )
    );
}
 
 