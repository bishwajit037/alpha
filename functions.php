<?php
function alpha_bootstrapping(){
    load_plugin_textdomain("alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme", "alpha_bootstrapping");

function alpha_assets(){
    wp_enqueue_style("alpha", get_stylesheet_uri());
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts", "alpha_assets");

function alpha_sidebar() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Single Post Sidebar', 'alpha' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Right Sidebar', 'alpha' ),
			'before_widget' => '<div id="%1$s" class="sidebar-1 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
        );

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Right Sidebar', 'alpha' ),
			'id'            => 'footer-right',
			'description'   => esc_html__( 'Right Sidebar', 'alpha' ),
			'before_widget' => '<div id="%1$s" class="footer-right text-right %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Left Sidebar', 'alpha' ),
			'id'            => 'footer-left',
			'description'   => esc_html__( 'Left Sidebar', 'alpha' ),
			'before_widget' => '<div id="%1$s" class="footer-left m-0 p-0 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'alpha_sidebar' );

//Its a filter Hook for password protected post
function alpha_the_excerpt($excerpt){
	if(!post_password_required()){
		return $excerpt;
	} else {
		echo get_the_password_form();
	}
}
add_filter("the_excerpt", "alpha_the_excerpt");

//Protected Post Title Changing
function alpha_protected_title(){
 return "Locked : %s";
}
add_filter("protected_title_format", "alpha_protected_title");