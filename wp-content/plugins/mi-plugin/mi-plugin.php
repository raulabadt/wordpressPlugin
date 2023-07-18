<?php
/*
Plugin Name: Mi Plugin
Description: Plugin personalizado para el ejercicio de maquetacion
*/

// Crea una función para registrar el shortcode del plugin
function mi_plugin_shortcode($atts) {
    // Convierte los atributos en variables
    extract(shortcode_atts(array(), $atts));

    // Código HTML para mostrar las columnas, imágenes, descripciones y precios
    $output = '
        <div class="mi-plugin-container">
            <div class="mi-plugin-column">
                <div class="mi-plugin-item">
                    <img src="' . plugins_url('images/ruta-imagen-1.jpg', __FILE__) . '" alt="Imagen 1">
                    <p>Treasure Bronze Emperador</p>
                    <p>€32.00/m²</p>
                </div>
                <div class="mi-plugin-item">
                    <img src="' . plugins_url('images/ruta-imagen-2.jpg', __FILE__) . '" alt="Imagen 1">
                    <p>Treasure Bronze Emperador</p>
                    <p>€32.00/m²</p>
                </div>
                <div class="mi-plugin-item">
                    <img src="' . plugins_url('images/ruta-imagen-3.jpg', __FILE__) . '" alt="Imagen 1">
                    <p>Treasure Bronze Emperador</p>
                    <p>€32.00/m²</p>
                </div>
            </div>
            <div class="mi-plugin-column">
                <div class="mi-plugin-item">
                    <img src="' . plugins_url('images/ruta-imagen-4.jpg', __FILE__) . '" alt="Imagen 1">
                    <p>Treasure Bronze Emperador</p>
                    <p>€32.00/m²</p>
                </div>
                <div class="mi-plugin-item">
                    <img src="' . plugins_url('images/ruta-imagen-5.jpg', __FILE__) . '" alt="Imagen 1">
                    <p>Treasure Bronze Emperador</p>
                    <p>€32.00/m²</p>
                </div>
                <div class="mi-plugin-item">
                    <img src="' . plugins_url('images/ruta-imagen-6.jpg', __FILE__) . '" alt="Imagen 1">
                    <p>Treasure Bronze Emperador</p>
                    <p>€32.00/m²</p>
                </div>
            </div>
        </div>
    ';

    // Devuelve el código HTML
    return $output;
}
add_shortcode('mi_plugin', 'mi_plugin_shortcode');

// Crea una función para encolar los estilos CSS del plugin
function mi_plugin_enqueue_styles() {
    wp_enqueue_style('mi-plugin-style', plugins_url('/css/mi-plugin.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'mi_plugin_enqueue_styles');


