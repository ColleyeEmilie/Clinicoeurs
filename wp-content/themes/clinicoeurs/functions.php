<?php

if(session_status() === PHP_SESSION_NONE) session_start();


// Disable Wordpress' default Gutenberg Editor:
require_once(__DIR__ . '/controllers/ContactForm.php');

add_filter('use_block_editor_for_post', '__return_false', 10);

// Activer les images "thumbnail" sur nos posts
add_theme_support('post-thumbnails');
add_image_size('products_thumbnail', 300, 300, true);
add_image_size('latest_thumbnail', 600, 400, true);
add_image_size('partenaire_thumbnail', 150, 150, true);
add_image_size('clinicoeurs_thumbnail', 500, 600, true);
add_image_size('equipe_thumbnail', 100, 100, true);

// Register existing navigation menus
register_nav_menu('main', 'Navigation principale du site web (en-tête)');
register_nav_menu('social-media', 'Liens vers les réseaux sociaux');

function clinicoeurs_register_custom_taxonomies()
{
    register_taxonomy('type', ['actualite'], [
        'labels' => [
            'name' => 'Type',
            'singular_name' => 'Type',
        ],
        'description' => 'Catégorisation des types d actualites.',
        'public' => true,
        'hierarchical' => true,
    ]);

    register_taxonomy('partenariat', ['partenaire'], [
        'labels' => [
            'name' => 'Type',
            'singular_name' => 'Type',
        ],
        'description' => 'Catégorisation des types de partenaires',
        'public' => true,
        'hierarchical' => true,
    ]);

    register_taxonomy('section', ['equipe'], [
        'labels' => [
            'name' => 'Section',
            'singular_name' => 'section',
        ],
        'description' => 'Catégorisation par section des membres de notre équipe',
        'public' => true,
        'hierarchical' => true,
    ]);
}

add_action('init', 'clinicoeurs_register_custom_taxonomies');

function remove_menu_items() {
    global $menu;
    $restricted = array(__('Posts'), __('Comments'),
        );
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);

        if (in_array($value[0] != NULL?$value[0]:"" , $restricted)){
            unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_menu_items');

/* Autoriser les fichiers SVG */
function wpln_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'wpln_mime_types');

function clinicoeurs_get_menu(string $location, ?array $attributes = []): array
{
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location];
    $items = wp_get_nav_menu_items($menuId);

    $links = [];

    foreach ($items as $item) {
        $link = new stdClass();
        $link->href = $item->url;
        $link->label = $item->title;

        foreach($attributes as $attribute) {
            $link->$attribute = get_field($attribute, $item->ID);
        }

        $links[] = $link;
    }
    return $links;
}

function clinicoeurs_register_custom_post_types()
{
    register_post_type('actualite', [
        'label' => 'Actualites',
        'description' => 'Nos actualités',
        'public' => true,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);
    register_post_type('service', [
        'label' => 'Services',
        'description' => 'Nos services',
        'public' => true,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);
    register_post_type('benevolat', [
        'label' => 'Profils recherchés ',
        'description' => 'Les profils recherchés dans le cadre du bénévolat',
        'public' => true,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);
    register_post_type('produit', [
        'label' => 'Nos catégories de produits',
        'description' => 'Les différentes catégories de produits que nous vendons',
        'public' => true,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);

    register_post_type('avis', [
        'label' => 'Avis',
        'description' => 'Avis',
        'public' => true,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);

    register_post_type('soutien', [
        'label' => 'Nous soutenir',
        'description' => 'Différentes façons de nous soutenir',
        'public' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);

    register_post_type('equipe', [
        'label' => 'Equipe',
        'description' => 'Notre équipe',
        'public' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);

    register_post_type('partenaire', [
        'label' => 'Partenaires',
        'description' => 'Nos partenaires',
        'public' => true,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-pets', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail'],
    ]);

}

add_action('init', 'clinicoeurs_register_custom_post_types');

function clinicoeurs_execute_contact_form()
{
    $config = [
        'nonce_field' => 'contact_nonce',
        'nonce_identifier' => 'clinicoeurs_contact_form',
    ];

    (new \Clinicoeurs\ContactForm($config, $_POST))
        ->sanitize([
            'firstname' => 'text_field',
            'lastname' => 'text_field',
            'email' => 'email',
            'message' => 'textarea_field',
        ])
        ->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required','email'],
            'message' => [],
        ])
        ->save(
            title: fn($data) => $data['firstname'] . ' ' . $data['lastname'] . ' <' . $data['email'] . '>',
            content: fn($data) => $data['message'],
        )
        ->send(
            title: fn($data) => 'Nouveau message de ' . $data['firstname'] . ' ' . $data['lastname'],
            content: fn($data) => 'Prénom: ' . $data['firstname'] . PHP_EOL . 'Nom: ' . $data['lastname'] . PHP_EOL . 'Email: ' . $data['email'] . PHP_EOL . 'Message:' . PHP_EOL . $data['message'],
        )
        ->feedback();
}
add_action('admin_post_nopriv_clinicoeurs_contact_form', 'clinicoeurs_execute_contact_form');
add_action('admin_post_clinicoeurs_contact_form', 'clinicoeurs_execute_contact_form');

// Travailler avec la session de PHP
function clinicoeurs_session_flash(string $key, mixed $value)
{
    if(! isset($_SESSION['clinicoeurs_flash'])) {
        $_SESSION['clinicoeurs_flash'] = [];
    }

    $_SESSION['clinicoeurs_flash'][$key] = $value;
}

function clinicoeurs_session_get(string $key)
{
    if(isset($_SESSION['clinicoeurs_flash']) && array_key_exists($key, $_SESSION['clinicoeurs_flash'])) {
        // 1. Récupérer la donnée qui a été flash.
        $value = $_SESSION['clinicoeurs_flash'][$key];
        // 2. Supprimer la donnée de la session.
        unset($_SESSION['clinicoeurs_flash'][$key]);
        // 3. Retourner la donnée récupérée.
        return $value;
    }

    // La donnée n'existait pas dans la session flash, on retourne null.
    return null;
}

function clinicoeurs_get_template_page(string $template): int|WP_Post|null
{
    $query = new WP_Query([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => $template . '.php',
            ],
        ]
    ]);
    return $query->posts[0] ?? null;
}