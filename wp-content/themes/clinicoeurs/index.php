<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="index">
    <h2 class="hidden">Bienvenue sur le site des clinicoeurs de Vielsalm</h2>
    <section class="index__hero hero background-blue">
        <div class="hero__content flex">
            <div class="hero__regroup flex">
                <h3 class="hero__title title">Apportez un peu de <span class="bold">légèreté</span> et de <span class="bold">joie</span> dans votre quotidien !</h3>
                <p class="hero__description"><?= get_field('accueil_description')?></p>
                <a href="http://clinicoeurs.localhost/clinicoeurs/" class="hero__mission"><span class="bold hero__mission flex">Notre mission</span></a>
            </div>
            <figure class="hero__fig">
                <?= get_the_post_thumbnail(null, 'clinicoeurs_thumbnail', ['class' => 'hero__img']); ?>
            </figure>
        </div>
    </section>

    <section class="index__services services">
        <h3 class="services__principaltitle title">Découvrez nos <span class="bold rect_green">différents services</span></h3>
        <div class="services__all flex">
            <?php $services = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => 4
            ]);
            if($services->have_posts()): while($services->have_posts()): $services->the_post();?>
                <div class="services__content">
                    <h4 class="services__title bold"><?= get_the_title() ?></h4>
                    <p class="services__text"><?= get_field('services_description') ?></p>
                </div>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section>

    <section class="index__vendre vendre">
        <div class="vendre__regroup flex">
            <h3 class="vendre__principaltitle title">Découvrez ce que nous <span class="bold rect_yellow">vendons</span></h3>
            <div class="vendre__wrapper">
                <p class="vendre__more">En voir plus</p><span class="bubble"></span>
            </div>
        </div>
        <?php $produit = new WP_Query([
            'post_type' => 'produit',
            'posts_per_page' => 4
        ]);
        if($produit->have_posts()): while($produit->have_posts()): $produit->the_post();?>
        <div>
            <a href="<?= get_the_permalink();?>" class="vendre__link flex">
                <article class="vendre__content ">
                    <h4 class="vendre__title flex"><?= get_the_title()?></h4>
                    <figure class="vendre__fig">
                        <?= get_the_post_thumbnail(null, 'products_thumbnail', ['class' => 'vendre__img']); ?>
                    </figure>
                </article>
            </a>
        </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__soutiens soutiens">
        <div class="soutiens__regroup flex">
            <h3 class="soutiens__principaltitle title">Envie de nous <span class="bold rect_blue">soutenir </span>?</h3>
            <div class="soutiens__wrapper">
                <p class="soutiens__more">En voir plus</p><span class="bubble"></span>
            </div>
        </div>
        <div class="soutiens__all flex">
            <?php $soutien = new WP_Query([
                'post_type' => 'soutien',
                'posts_per_page' => 4
            ]);
            if($soutien->have_posts()): while($soutien->have_posts()): $soutien->the_post();?>
                <div class="soutiens__content flex">
                    <figure class="soutiens__fig">
                        <img src="<?= get_field('soutien_icon')?>" alt="" class="soutiens__icon">
                    </figure>
                    <h4 class="soutiens__title"><?= get_field('soutien_title') ?></h4>
                </div>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section>

    <section class="index__actualites background-blue actualites">
        <div class="actualites__regroup flex">
            <h3 class="actualites__principaltitle title">Nos dernières <span class="bold rect_violet">actualités </span></h3>
            <div class="actualites__wrapper">
                <p class="actualites__more">En voir plus</p><span class="bubble"></span>
            </div>
        </div>
        <div class="actualites__all">
            <?php $actualite = new WP_Query([
                'post_type' => 'actualite',
                'posts_per_page' => 3
            ]);
            if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                <a href="<?= get_the_permalink();?>" class="actualites__link">
                    <article class="actualites__content flex">
                        <h4 class="actualites__title"><?= get_the_title()?></h4>
                        <figure class="actualites__fig">
                            <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'actualites__img']); ?>
                        </figure>
                    </article>
                </a>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a aucune actualité pour pour le moment.  </p>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section>

    <section class="index__avis avis">
        <h3 class="avis__title title"> Ce qu'ils <span class="bold rect_yellow">pensent</span> de nous</h3>
        <div class="avis__all flex">
            <div class="fleche_gauche"></div>
            <?php $avis = new WP_Query([
                'post_type' => 'avis',
                'posts_per_page' => 10
            ]);
            if($avis->have_posts()): while($avis->have_posts()): $avis->the_post();?>
                <div class="avis__content flex">
                    <h4 class="avis__name bold"><?= get_field('avis_nom') ?></h4>
                    <p class="avis__text"><?= get_field('avis') ?></p>
                </div>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a aucun avis pour le moment.  </p>
            <?php endif; wp_reset_query(); ?>
            <div class="fleche_droite"></div>
        </div>
    </section>

    <section class="index__partenaires partenaires">
        <h3 class="hidden">Nos partenaires</h3>
        <div class="partenaires__slider--wrap flex">
            <div class="partenaires__slider flex">
                <?php $partenaire = new WP_Query([
                    'post_type' => 'partenaire',
                    'posts_per_page' => 100
                ]);
                if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>
                    <div class="partenaires__content">
                        <h4 class="hidden"><?= get_field('partenaire_name') ?></h4>
                        <figure class="partenaires__fig">
                            <?= get_the_post_thumbnail(null, 'partenaire_thumbnail', ['class' => 'partenaires__img']); ?>
                        </figure>
                    </div>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de partenaires pour le moment.</p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>