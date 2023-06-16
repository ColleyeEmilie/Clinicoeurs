<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <title><?= get_the_title(); ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/ekf1new.css">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css'; ?>" /></head>
<body>
<header class="header flex">
    <h1 class="header__sitename hidden"><?= get_bloginfo('name'); ?></h1>
    <p class="header__tagline hidden"><?= get_bloginfo('description'); ?></p>

    <a href="<?= home_url(); ?>" class="nav__link logo">
        <span class="nav__label">logo clinicoeurs</span>
    </a>
    <div class="nav__wrapper flex">
        <nav class="nav flex">
            <h2 class="hidden">Navigation</h2>
            <ul class="menu flex">
                <div class="flex">
                    <?php foreach(clinicoeurs_get_menu('main') as $link): ?>
                    <li>
                        <a href="<?= $link->href; ?>" class="nav__link">
                            <span class="nav__label"><?= $link->label; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
                </div>
            </ul>
        </nav>
        <div class="languages">
        <ul class="languages__container">
            <?php foreach(pll_the_languages(['raw'=>true]) as $lang):?>
                <li class="languages__item <?= $lang['current_lang'] ? 'languages__link--current' : '' ?>">
                    <a href="<?= $lang['url'];?>" lang="<?= $lang['locale'];?>"  hreflang="<?= $lang['locale'];?>" class="languages__link"><?= strtoupper($lang['slug']);?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
    </div>

</header>
