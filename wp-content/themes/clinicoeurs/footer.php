<footer class="footer">
    <h2 class="footer hidden">Footer</h2>
    <div class=".footer__content">
        <div class="footer__help flex">
            <p class="footer__accroche title">Tout le monde peut aider</p>
            <a class="footer__contact" href="https://clinicoeurs.emilie-colleye.com/soutiens/" >Découvrez comment</a>
        </div>
        <div class="footer__links flex">
            <nav class="nav__navigation navigation">
                <h3 class="services__title bold">Navigation</h3>
                <ul class="navigation__list">
                    <li class="navigation__content">
                        <?php foreach(clinicoeurs_get_menu('navigation') as $link): ?>
                            <li>
                                <a href="<?= $link->href; ?>" class="nav__link">
                                    <span class="nav__label"><?= $link->label; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </nav>
            <nav class="nav__services services">
                <h3 class="services__title bold">Nos services</h3>
                <ul class="services__list ">
                    <li class="services__content">
                        <?php foreach(clinicoeurs_get_menu('services') as $link): ?>
                            <li>
                                <a href="<?= $link->href; ?>" class="nav__link">
                                    <span class="nav__label"><?= $link->label; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </li>
                </ul>
            </nav>
            <div class="nav__info">
                <h3 class="services__title bold">Informations de contact</h3>
                <a href="mailto:clinicoeurs@gmail.com" itemprop="email"><p>clinicoeurs@gmail.com</p></a>
                <p itemprop="telephone">0493 71 87 37</p>
                <p itemprop="streetAddress">Place de Salm 2 S22,</br>
                    6690 Vielsalm</br>
                    Belgique</p>
            </div>
        </div>
    </div>
</footer>

<script src="<?= get_stylesheet_directory_uri() . '/public/js/main.js'; ?>"></script>
</body>
</html>