<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta name="description" content="Site pour les l'ASBL des clinicoeurs localisés à Vielsalm."/>

    <title><?= get_the_title(); ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/ekf1new.css">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" />
</head>
<body>
<header class="header flex">
    <h1 aria-level="1" class="header__sitename hidden"><?= get_bloginfo('name'); ?></h1>
    <p class="header__tagline hidden"><?= get_bloginfo('description'); ?></p>

    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

    <a href="<?= home_url(); ?>" class="logo"></a>
    <h2 aria-level="2" class="hidden">Navigation</h2>
    <ul class="menu flex">
        <div class="menu__content">
            <?php foreach(clinicoeurs_get_menu('main') as $link): ?>
                <li>
                    <a href="<?= $link->href; ?>" class="nav__link">
                        <span class="nav__label"><?= $link->label; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </div>
        <div class="languages">
            <ul class="languages__container">
                <?php foreach(pll_the_languages(['raw'=>true]) as $lang):?>
                    <li class="languages__item <?= $lang['current_lang'] ? 'languages__link--current' : '' ?>">
                        <a href="<?= $lang['url'];?>" lang="<?= $lang['locale'];?>"  hreflang="<?= $lang['locale'];?>" class="languages__link"><?= strtoupper($lang['slug']);?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>

    </ul>
</header>
