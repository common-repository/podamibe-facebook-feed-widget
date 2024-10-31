<?php 

/**
* Register widget with WordPress.
*/

add_action('widgets_init', 'register_podamibe_facebook_feed');
function register_podamibe_facebook_feed() {
    register_widget('podamibe_facebook_feed');
}

/**
* Starts the main widget section
*/
class podamibe_facebook_feed extends WP_Widget {
    function __construct() {
        parent::__construct(
            'podamibe_facebook_feed',
            esc_html__( 'Podamibe Facebook Feeds', 'pfw' ),
            array( 'description' => esc_html__( 'Widget to display Facebook Feed on sidebar', 'pfw' ), ) 
            );

    }

    

        /**
        * Back-end widget form.
        */
        public function form( $instance ) {

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_main_icon' => '') );
            $pfw_main_icon     = esc_html( $instance[ 'pfw_main_icon' ]); 

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_main_title' => '') );
            $pfw_main_title    = esc_html( $instance[ 'pfw_main_title' ]); 

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_page_url' => '') );
            $pfw_page_url      = esc_html( $instance[ 'pfw_page_url' ]); 

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_app_id' => '') );
            $pfw_app_id        = esc_html( $instance[ 'pfw_app_id' ]); 
            
            $instance          = wp_parse_args( (array) $instance, array( 'pfw_frame_width' => '250') );
            $pfw_frame_width   = esc_html( $instance[ 'pfw_frame_width' ]); 

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_frame_height' => '300') );
            $pfw_frame_height  = esc_attr( $instance[ 'pfw_frame_height' ]);

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_small_header' => '') );
            $pfw_small_header  = esc_attr( $instance[ 'pfw_small_header' ]);

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_hide_cover' => '') );
            $pfw_hide_cover    = esc_attr( $instance[ 'pfw_hide_cover' ]); 

            $instance          = wp_parse_args( (array) $instance, array( 'pfw_show_facepile' => '') );
            $pfw_show_facepile = esc_attr( $instance[ 'pfw_show_facepile' ]); 


            $instance          = wp_parse_args( (array) $instance, array( 'pfw_tabs_section' => '') );
            $pfw_tabs_section = esc_attr( $instance[ 'pfw_tabs_section' ]); 


            
            ?>

            <p>
                <label for="<?php echo $this->get_field_id('pfw_main_icon'); ?>">
                    <?php esc_html_e( 'Main Icon :', 'pfw' ); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('pfw_main_icon'); ?>" name="<?php echo $this->get_field_name('pfw_main_icon'); ?>" type="text" value="<?php echo esc_attr($pfw_main_icon); ?>" />
                <?php _e('Insert Icon from <a href="http://fontawesome.io/icons/" target="_blank">here</a>','psl'); ?>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('pfw_main_title'); ?>">
                    <?php esc_html_e( 'Main Title :', 'pfw' ); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('pfw_main_title'); ?>" name="<?php echo $this->get_field_name('pfw_main_title'); ?>" type="text" value="<?php echo esc_attr($pfw_main_title); ?>" />
            </p>
            
            <p>
                <label for="<?php echo $this->get_field_id('pfw_page_url'); ?>">
                    <?php esc_html_e( 'Facebook Page URL :', 'pfw' ); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('pfw_page_url'); ?>" name="<?php echo $this->get_field_name('pfw_page_url'); ?>" type="text" value="<?php echo esc_url($pfw_page_url); ?>" required/>
            </p>
            
            <p>
                <label for="<?php echo $this->get_field_id('pfw_app_id'); ?>">
                    <?php esc_html_e( 'Facebook App Id :', 'pfw' ); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('pfw_app_id'); ?>" name="<?php echo $this->get_field_name('pfw_app_id'); ?>" type="text" value="<?php echo esc_attr($pfw_app_id); ?>" required/>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('pfw_frame_width'); ?>">
                    <?php esc_html_e( 'Width :', 'pfw' ); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id('pfw_frame_width'); ?>" name="<?php echo $this->get_field_name('pfw_frame_width'); ?>" min="1" type="number" value="<?php echo esc_attr($pfw_frame_width); ?>" />
            </p>  

            <p>
                <label for="<?php echo $this->get_field_id( 'pfw_frame_height' ); ?>">
                    <?php esc_html_e( 'Height :','pfw' ); ?>
                </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'pfw_frame_height' ); ?>" name="<?php echo $this->get_field_name( 'pfw_frame_height' ); ?>" min="1" type="number" value="<?php echo esc_attr( $pfw_frame_height ); ?>" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('pfw_small_header' ); ?>">
                    <?php esc_html_e( 'Small Header Option :','pfw' ); ?>
                </label> 
                <select class="widefat" name="<?php echo $this->get_field_name('pfw_small_header'); ?>">
                    <option <?php echo ($pfw_small_header =='true')?'selected="selected"' : '' ?> value="true"><?php esc_html_e('Yes','pfw');?></option>
                    <option <?php echo ($pfw_small_header =='false')?'selected="selected"' : '' ?> value="false"><?php esc_html_e('No','pfw');?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('pfw_hide_cover'); ?>">
                    <?php esc_html_e( 'Cover Image Option :', 'pfw' ); ?>
                </label>
                <select class="widefat" name="<?php echo $this->get_field_name('pfw_hide_cover'); ?>">
                    <option <?php echo ($pfw_hide_cover =='false')?'selected="selected"' : '' ?> value="false"><?php esc_html_e('Yes','pfw');?></option>
                    <option <?php echo ($pfw_hide_cover =='true')?'selected="selected"' : '' ?> value="true"><?php esc_html_e('No','pfw');?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('pfw_show_facepile'); ?>">
                    <?php esc_html_e( 'Liked Users :', 'pfw' ); ?>
                </label>
                <select class="widefat" name="<?php echo $this->get_field_name('pfw_show_facepile'); ?>">
                    <option <?php echo ($pfw_show_facepile =='true')?'selected="selected"' : '' ?> value="true"><?php esc_html_e('Yes','pfw');?></option>
                    <option <?php echo ($pfw_show_facepile =='false')?'selected="selected"' : '' ?> value="false"><?php esc_html_e('No','pfw');?></option>
                </select>
            </p>

            <h4><?php  echo esc_html__('Product Cateogy','ecommerce-lite'); ?></h4>
            <?php
                /**
                 * Facebook Widget
                 * @since 1.0.0
                 */
                $pfw_tabs = array(
                    'timeline'  => esc_html__('Timeline','pfw'),
                    'events'  => esc_html__('Events','pfw'),
                    'messages'  => esc_html__('Messages','pfw'),
                );
            ?>

            <?php foreach ($pfw_tabs as $pfw_tab_slug => $pfw_tab_name): 
                ?>
                <p>
                    <input class="checkbox" id="<?php echo esc_attr( $this->get_field_id("pfw_tabs_section") ) . esc_attr($pfw_tab_slug); ?>" name="<?php echo esc_attr( $this->get_field_name("pfw_tabs_section") ); ?>[]" type="checkbox" value="<?php echo esc_attr($pfw_tab_slug); ?>" <?php checked(in_array($pfw_tab_slug, $instance["pfw_tabs_section"])); ?> />
                    <label for="<?php echo esc_attr( $this->get_field_id('pfw_tabs_section') ); ?>"><?php echo esc_html($pfw_tab_name); ?></label>
                </p>
            <?php endforeach; ?>

            <?php }
            
            /**
            * Sanitize widget form values as they are saved.
            */
            public function update( $new_instance, $old_instance ) {

                $instance = $old_instance;      

                $instance[ 'pfw_main_icon' ]     =  esc_html( $new_instance[ 'pfw_main_icon' ] );

                $instance[ 'pfw_main_title' ]    =  esc_html( $new_instance[ 'pfw_main_title' ] );

                $instance[ 'pfw_page_url' ]      =  esc_url( $new_instance[ 'pfw_page_url' ] );

                $instance[ 'pfw_app_id' ]        =  esc_html( $new_instance[ 'pfw_app_id' ] );
                
                $instance[ 'pfw_frame_width' ]   =  absint( $new_instance[ 'pfw_frame_width' ] );

                $instance[ 'pfw_frame_height' ]  =  absint( $new_instance[ 'pfw_frame_height' ] );

                $instance[ 'pfw_small_header' ]  =  esc_attr( $new_instance[ 'pfw_small_header' ] );

                $instance[ 'pfw_hide_cover' ]    =  esc_attr( $new_instance[ 'pfw_hide_cover' ] );

                $instance[ 'pfw_show_facepile' ] =  esc_attr( $new_instance[ 'pfw_show_facepile' ] );

                $instance[ 'pfw_tabs_section' ]	= (array)$new_instance[ 'pfw_tabs_section'] ;
		


                return $instance;

            }


            /**
            * Front-end display of widget.
            */
            public function widget( $args, $instance ) {

                extract( $args );
                
                extract( $instance );

                global $post;
                
                $pfw_main_icon     = isset( $instance[ 'pfw_main_icon' ] ) ? $instance[ 'pfw_main_icon' ] : ''; 

                $pfw_main_title    = isset( $instance[ 'pfw_main_title' ] ) ? $instance[ 'pfw_main_title' ] : '';

                $pfw_page_url      = isset( $instance[ 'pfw_page_url' ] ) ? $instance[ 'pfw_page_url' ] : '';

                $pfw_app_id        = isset( $instance[ 'pfw_app_id' ] ) ? $instance[ 'pfw_app_id' ] : '';

                $pfw_frame_width   = isset( $instance[ 'pfw_frame_width' ] ) ? $instance[ 'pfw_frame_width' ] : '';
                
                $pfw_frame_height  = isset( $instance[ 'pfw_frame_height' ] ) ? $instance[ 'pfw_frame_height' ] : '';

                $pfw_small_header  = isset( $instance[ 'pfw_small_header' ] ) ? $instance[ 'pfw_small_header' ] : '';

                $pfw_hide_cover    = isset( $instance[ 'pfw_hide_cover' ] ) ? $instance[ 'pfw_hide_cover' ] : '';

                $pfw_show_facepile = isset( $instance[ 'pfw_show_facepile' ] ) ? $instance[ 'pfw_show_facepile' ] : '';

                $pfw_tabs_section = isset( $instance[ 'pfw_tabs_section' ] ) ? $instance[ 'pfw_tabs_section' ] : array('timeline');

                $pfw_tabs_section = implode( ", ", $pfw_tabs_section );
                if( empty($pfw_tabs_section) ){
                    $pfw_tabs_section = 'timeline';
                }
                
                echo $before_widget; 

                if($pfw_page_url || $pfw_app_id) { ?>

                <div class="pfw-widget-body">
                    <div class="pfw-block">
                        <div class="pfw-footer-icon">
                            <h4 class="pfw-main-title">
                                <i class="pfw-icon fa fa-<?php echo esc_attr($pfw_main_icon); ?>"></i><?php echo esc_html($pfw_main_title); ?>
                            </h4>
                        </div>

                        <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo esc_url($pfw_page_url); ?>&hide_cta=true&tabs=<?php echo esc_attr($pfw_tabs_section); ?>&width=<?php echo esc_attr($pfw_frame_width); ?>&height=<?php echo esc_attr($pfw_frame_height); ?>&small_header=<?php echo esc_attr($pfw_small_header); ?>&adapt_container_width=true&hide_cover=<?php echo esc_attr($pfw_hide_cover); ?>&show_facepile=<?php echo esc_attr($pfw_show_facepile); ?>&appId=<?php echo esc_attr($pfw_app_id); ?>" width="<?php echo esc_attr($pfw_frame_width); ?>" height="<?php echo esc_attr($pfw_frame_height); ?>" style="overflow:hidden" allowTransparency="true"></iframe> 

                    </div>
                </div>

                <?php }

                echo $after_widget;
                
            }

        } 
    /*--------------------------------------------------------------------------------------*/