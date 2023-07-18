<?php
/*
Plugin Name: Flat101 Plugin
Description: Añade " - Flat101" al final del título de todas las páginas.
*/

function flat101_modify_page_title($title) {
   
    // Comprueba si estamos en una página de WordPress
    if (is_page()) {
        // Obtiene el título actual de la página
        $title  = get_the_title();
      

        // Añade el sufijo al título
        $title .= ' - Flat101';
     
        // Devuelve el título modificado
        return $title;
    }

    return $title;
}
add_filter('pre_get_document_title', 'flat101_modify_page_title');


function add_featured_image_to_head() {
    if (is_singular('page')) {
        global $post;
        
        // Verifica si la página tiene una imagen destacada
        if (has_post_thumbnail($post->ID)) {
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $thumbnail_url = wp_get_attachment_url($thumbnail_id);
            
            // Añade la URL de la imagen destacada al elemento <head>
            echo '<meta property="og:image" content="' . esc_url($thumbnail_url) . '" />' . PHP_EOL;
        }
    }
}
add_action('wp_head', 'add_featured_image_to_head');
