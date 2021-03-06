<?php
// Load the Parent and Child Stylesheets
add_action( 'wp_enqueue_scripts', 'ucla_theme_enqueue_styles' );
function ucla_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'ucla-style' ),
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

add_action( 'after_setup_theme', 'remove_parent_widget_init' );

function remove_parent_widget_init()
{
  remove_action( 'widgets_init', 'ucla_widgets_init' );
  // Add Sidebar widget
  add_action( 'widgets_init', 'ucla_widgets_init_nolist' );
  function ucla_widgets_init_nolist() {
      register_sidebar( array(
        'name' => esc_html__( 'Sidebar Widget Area', 'ucla' ),
        'id' => 'primary-widget-area',
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ) );
  }
  
}

add_action('wp_head','my_analytics', 20);
function my_analytics() {
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-176255018-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	    function gtag(){dataLayer.push(arguments);}
	    gtag('js', new Date());
	    gtag('config', 'UA-176255018-1');
	    </script>
<?php
}
