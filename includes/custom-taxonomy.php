<?php
add_action('init', 'create_brand');
 
function create_brand() {
    register_taxonomy('brand', 'post', array(
            'label' => 'Brand',
            'labels' => array(
                'name'          => __('Brand'),
                'singular_name' => __('Brand'),
                'add_new_item'  => __('Add New Brand'),
                'new_item'      => __('New Brand'),
                'add_new'       => __('Add Brand'),
                'edit_item'     => __('Edit Brand')
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'brand', 'with_front' => true, )
        )
    );
}

