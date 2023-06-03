<?php

if(session_status() === PHP_SESSION_NONE) session_start();


// Disable Wordpress' default Gutenberg Editor:
require_once(__DIR__ . '/controllers/ContactForm.php');

add_filter('use_block_editor_for_post', '__return_false', 10);

// Activer les images "thumbnail" sur nos posts
add_theme_support('post-thumbnails');
add_image_size('index_projects_thumbnail', 293, 322, true);

// Register existing navigation menus
register_nav_menu('main', 'Navigation principale du site web (en-tête)');
register_nav_menu('social-media', 'Liens vers les réseaux sociaux');

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

register_post_type('project', [
        'label' => 'Projets',
        'description' => 'Mes projets',
        'public' => true,
        'menu_position' => 5,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-art', // https://developer.wordpress.org/resource/dashicons/#pets,
        'supports' => ['title','thumbnail', 'page-attributes'],
]);

function clinicoeurs_get_projets($count = 20){
    //1. on instancie l'objet WP_Query
    $projects = new WP_Query([
        //arguments
        'post_type' => 'project',
        'orderby' =>'date',
        'order'=>'ASC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $projects;
}

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

add_action('admin_post_nopriv_dwp_contact_form', 'clinicoeurs_execute_contact_form');
add_action('admin_post_dwp_contact_form', 'clinicoeurs_execute_contact_form');

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