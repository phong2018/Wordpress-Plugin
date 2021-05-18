 

<?php
/* Register dynamic sidebar 'new_sidebar' */


function my_register_sidebars() { 
    register_sidebar(
        array(
        'id' => 'new-sidebar',
        'name' => esc_html__('Share2you new Sidebar' ),
        'description' => esc_html__( 'A short description of the sidebar.' ),
        'before_widget' => '<span id="%1$s" class="customize-partial-icon button">',
        'after_widget' => '</span>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    )
    );
/* Repeat the code pattern above for additional sidebars. */
}



add_action( 'widgets_init', 'my_register_sidebars' );

/*place this code in your teamplate you want to show sidebar

  <?php if ( is_active_sidebar( 'new-sidebar' ) ) : ?>
    <div class="sidebar new-sidebar">
        <?php dynamic_sidebar( 'new-sidebar' ); ?>
    </div>
  <?php endif; ?>

*/
?>
