<?php
/**
 * Event Pop Up Plugin
 *
 * Plugin Name: Simple Event Pop Up
 * Plugin URI:  https://av-topo.de
 * Description: Adds a Pop-Up with the next Event to the Homepage.
 * Version:     1.0
 * Author:      PLO
 * Author URI:  https://av-topo.de
 * License:     Do whatever f*** you want to do License
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function popUpEvent() {
    $args = array(
        /* 'fields' => 'ids', */
        'numberposts' => 1,
        'post_type' => 'wpcalendars_event'
      );
       
    $next_event = get_posts( $args )[0];
   
    $next_event_link = get_permalink( $next_event->ID );

    if ( is_front_page() ) :
        wp_enqueue_style( 'popUp', plugin_dir_url( __FILE__ ) . '/popUp.css');
        $url = wp_get_attachment_image_src( get_post_thumbnail_id($next_event->ID), 'full' )['0'];       
        echo "
        <div id='popUpModal' class='popUpModal'>
            <div id='imagePopUp' class='imagePopUp'>
                <div class='closingXButton'>X</div>
                <h1>Unser nächster Event:</h1>
                <img src='$url'/>
                <a href='$next_event_link'>Hier gehts zum Event...</a>
            </div>
        </div>
        <script type='text/javascript'>popUp()</script> "; 
    else :
        return;
    endif;
}
wp_enqueue_script( 'popUp', plugin_dir_url( __FILE__ ) . 'popUp.js', true);
add_action('wp_head', 'popUpEvent');
?>