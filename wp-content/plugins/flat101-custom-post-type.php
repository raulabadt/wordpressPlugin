<?php
/*
Plugin Name: Flat101 Custom Post Type
Description: Crea un custom post type llamado "Tienda".
*/

// Registrar el custom post type "Tienda"
function flat101_register_custom_post_type() {
    $labels = array(
        'name' => 'Tiendas',
        'singular_name' => 'Tienda',
        'menu_name' => 'Tiendas',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
    );

   

    register_post_type('tienda', $args);
    
}
add_action('init', 'flat101_register_custom_post_type');

// Agregar campos personalizados al custom post type "Tienda"
function flat101_custom_fields() {
    add_meta_box('flat101_tienda_fields', 'Información de la Tienda', 'flat101_tienda_fields_callback', 'tienda', 'normal', 'high');
}
add_action('add_meta_boxes', 'flat101_custom_fields');

function flat101_tienda_fields_callback($post) {
    wp_nonce_field(basename(__FILE__), 'flat101_tienda_nonce');
    $nombre = get_post_meta($post->ID, 'nombre', true);
    $direccion = get_post_meta($post->ID, 'direccion', true);
    $descripcion = get_post_meta($post->ID, 'descripcion', true);
    ?>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo esc_attr($nombre); ?>">
    <br>
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion" value="<?php echo esc_attr($direccion); ?>">
    <br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" rows="5"><?php echo esc_textarea($descripcion); ?></textarea>
    <?php
}

function flat101_save_tienda_fields($post_id) {
    if (!isset($_POST['flat101_tienda_nonce']) || !wp_verify_nonce($_POST['flat101_tienda_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $fields = array('nombre', 'direccion', 'descripcion');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_tienda', 'flat101_save_tienda_fields');

// Agregar endpoint de API para obtener datos de las tiendas en formato JSON
function flat101_api_get_tiendas($request) {
    $args = array(
        'post_type' => 'tienda',
        'posts_per_page' => -1,
    );

    $tiendas = get_posts($args);
    $data = array();

    foreach ($tiendas as $tienda) {
        $nombre = get_post_meta($tienda->ID, 'nombre', true);
        $direccion = get_post_meta($tienda->ID, 'direccion', true);
        $descripcion = get_post_meta($tienda->ID, 'descripcion', true);

        $data[] = array(
            'nombre' => $nombre,
            'direccion' => $direccion,
            'descripcion' => $descripcion,
        );
    }

    return rest_ensure_response($data);
}
add_action('rest_api_init', function () {
    register_rest_route('flat101/v1', '/tiendas', array(
        'methods' => 'GET',
        'callback' => 'flat101_api_get_tiendas',
    ));
});
?>
