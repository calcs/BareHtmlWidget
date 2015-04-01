<?php
/*
Plugin Name: BareHtmlWidget
Plugin URI: http://chinotsubo.com/barehtmlwidget
Description: Output **bare** html snippet as a widget.
Version: 1.0
Author: Motoyan
Author URI: http://chinotsubo.com/
License: GPLv2
*/
class BareHtmlWidget extends WP_Widget{
    /**
     * Register this widget.
     */
    function __construct() {
        parent::__construct(
            'bare_html_widget', // Base ID
            'BareHtmlWidget', // Name
            array( 'description' => 'Bare Html Widget is the widget to implements tiny html snippet without any wrapper html codes. This is used to display Google Adsense and so on.', ) // Args
        );
    }
 
    /**
     * display this Widget
     *
     * @param array $args      'register_sidebar'
     * @param array $instance  instance
     */
    public function widget( $args, $instance ) {
        $snippet = $instance['snippet'];
        
        echo $snippet;
    }
 
    /** display this Widget's control panel
     *
     * @param array $instance instance
     * @return string|void
     */
    public function form( $instance ){
        $snippet = $instance['snippet'];
        $snippet_name = $this->get_field_name('snippet');
        $snippet_id = $this->get_field_id('snippet');
        ?>
        <p>
            <textarea class="widefat" id="<?php echo $snippet_id; ?>" name="<?php echo $snippet_name; ?>"><?php echo esc_html( $snippet ); ?></textarea>
        </p>
        <?php
    }
 
    /** 
     * validate new parameters
     *
     * @param array $new_instance  new_instance made at form()
     * @param array $old_instance  old instance
     * @return array               
     */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }
}
 
add_action( 'widgets_init', function () {
    register_widget( 'BareHtmlWidget' );  //register widget
} );
