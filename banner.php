<?php
/**
 * @package WordPress 
 * @subpackage Naher Banner Widgets
 * @Extends Wp_Widgets
 */
class Naher_Banner_Widget extends WP_Widget {
 
    public function __construct() {
        /**
         * @parent:: __construct()
         * ID, Name, Description
         */
         parent::__construct(
             'naher_widget',
             __('Naher Banner Widget','verum'),
             array('description'=>'This is a Advertisement Widget')
         );
         /**
          * Enqueue Scripts Add action 
          */
        add_action( 'admin_enqueue_scripts', array( $this, 'verum_admin_scripts' ) );

    }
    /**
     * Here add Enqueue Scripts
     * Widget Add image button input filed id sent to js file 
     */

    function verum_admin_scripts($screen){
        //if($screen=="widgets.php") {
        wp_enqueue_media();
        wp_enqueue_script('banner-js',get_template_directory_uri().'/Banner_widget/assets/main.js');
       // }    
    } 
    public function widget( $args, $instance ) {
        // outputs the content of the widget
    }
 
    public function form( $instance ) {
        
        /**
         * Here Admin Dashboard Form
         */
        $title = !empty($instance['title'])?$instance['title']:__('Title','verum');
        $img_id = !empty($instance['img_id'])?$instance['img_id']:'';
        $img_url = !empty($instance['img_url'])?$instance['img_url']:'';
        $target_url = !empty($instance['url'])?$instance['url']:'';
       // echo "<pre>";
      //  print_r($imageID);
      //  print_r($imageURL);
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php echo __('Title','verum');?></label>
                <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('title'));?>" id="<?php echo esc_attr($this->get_field_id('title'));?>" value="<?php echo esc_attr($title);?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('image'));?>"><?php echo __("Enter Your Banner Ad","verum");?></label>
                <br>
                <p class="imgpreview"></p>
                <input class="img_id" type="hidden" name="<?php echo esc_attr($this->get_field_name('img_id'));?>" id="<?php echo esc_attr($this->get_field_id('img_id'));?>" value="<?php echo esc_attr($img_id);?>">
                <input class="img_url" type="hidden" name="<?php echo esc_attr($this->get_field_name('img_url'));?>" id="<?php echo esc_attr($this->get_field_id('img_url'));?>" value="<?php echo esc_attr($img_url);?>">
                <input type="button"class="button btn-primary widgetuploader" id="<?php echo esc_attr($this->get_field_id('image'));?>" value="<?php echo __("Upload Image","verum");?>">
                <!-- <button class="button btn-primary widgetuploader" id="<?php echo esc_attr($this->get_field_id('image'));?>"><?php echo __("Upload Image","verum");?></button> -->
            </p> 
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('url'));?>"><?php echo __('Target URL','verum');?></label>
                <input class="widefat" type="url" name="<?php echo esc_attr($this->get_field_name('url'));?>" id="<?php echo esc_attr($this->get_field_id('url'));?>" value="<?php echo esc_attr($target_url);?>">
            </p>

        <?php 

    } // Form Function End Here
 
    // public function update( $new_instance, $old_instance ) {
    //     /**
    //      * Data Update from Here
    //      */
    //     $instance = array();
    //     $instance['title'] = !empty($new_instance['title'])?strip_tags($new_instance['title']): $old_instance;
    //     $instance['imageID'] = !empty($new_instance['imageID'])?strip_tags($new_instance['imageID']): $old_instance;
    //     $instance['imageURL'] = !empty($new_instance['imageURL'])?esc_url($new_instance['imageURL']): $old_instance;
    //     return $instance;
    // }
}
/**
 * Widget Class Initiate Here
 */
function verum_naher_banner(){
    register_widget('Naher_Banner_Widget');
}
add_action('widgets_init','verum_naher_banner');
 
?>