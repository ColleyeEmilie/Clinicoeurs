<footer>
    <h2 class="footer hidden">Footer</h2>
    <div class="flex">
        <nav class="nav__navigation navigation">
            <h3 class="services__title bold">Navigation</h3>
            <ul class="navigation__list">
                <div class="navigation__content">
                    <?php foreach(clinicoeurs_get_menu('navigation') as $link): ?>
                        <li>
                            <a href="<?= $link->href; ?>" class="nav__link">
                                <span class="nav__label"><?= $link->label; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </div>
            </ul>
        </nav>
        <nav class="nav__services services">
            <h3 class="services__title bold">Nos services</h3>
            <ul class="services__list ">
                <div class="services__content">
                    <?php foreach(clinicoeurs_get_menu('services') as $link): ?>
                        <li>
                            <a href="<?= $link->href; ?>" class="nav__link">
                                <span class="nav__label"><?= $link->label; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </div>
            </ul>
        </nav>
    </div>
</footer>