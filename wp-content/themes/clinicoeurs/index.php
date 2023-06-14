<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="index">
    <h2 class="hidden">Bienvenue sur le site des clinicoeurs de Vielsalm</h2>
    <section class="index__hero hero">
        <div class="hero__content">
            <div class="hero__regroup">
                <h3 class="hero__title title">Apportez un peu de <span class="bold">légèreté</span> et de <span>joie</span> dans votre quotidien !</h3>
                <p class="hero__description"><?= get_field('accueil_description')?></p>
                <a href=""><span>Notre mission</span></a>
            </div>
            <figure class="hero__fig">
                <img class="hero__img"src="http://clinicoeurs.localhost/wp-content/uploads/600_clinicoeurs.png" srcset="http://clinicoeurs.localhost/wp-content/uploads/clinicoeurs.png 200w, http://clinicoeurs.localhost/wp-content/uploads/600_clinicoeurs.png 600w" sizes="(max-width:350px) 300px, (max-width:1200px) 600px" alt="Image d'un clown">
            </figure>
        </div>
    </section>

    <section class="index__services services">
        <h3 class="services__title title">Découvrez nos <span class="bold rect_green">différents services</span></h3>
        <?php $services = new WP_Query([
        'post_type' => 'services',
        'posts_per_page' => 4
        ]);
        if($services->have_posts()): while($services->have_posts()): $services->the_post();?>
        <div class="services__content content">
            <h4 class="content__title"><?= get_field('services_titre_1') ?></h4>
            <p class="content__text"><?= get_field('services_description') ?></p>
        </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__vendre vendre">
        <h3 class="vendre__title title">Découvrez ce que nous <span class="bold rect_yellow">vendons</span></h3>
        <?php $produit = new WP_Query([
            'post_type' => 'produit',
            'posts_per_page' => 4
        ]);
        if($produit->have_posts()): while($produit->have_posts()): $produit->the_post();?>
        <a href="<?= get_the_permalink();?>" class="latest__link">
        <article class="vendre__content ">
                <h4 class="vendre__title"><?= get_the_title()?></h4>
                <figure class="vendre__fig">
                    <?= get_the_post_thumbnail(null, 'products_thumbnail', ['class' => 'vendre__img']); ?>
                </figure>
            </article>
        </a>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__soutiens soutiens">
        <h3 class="services__title title">Envie de nous <span class="bold rect_blue">soutenir</span> ? </h3>
        <?php $soutien = new WP_Query([
            'post_type' => 'soutien',
            'posts_per_page' => 4
        ]);
        if($soutien->have_posts()): while($soutien->have_posts()): $soutien->the_post();?>
            <div class="soutiens__content">
                <h4 class="soutiens__title"><?= get_field('soutien_title') ?></h4>
            </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__actualites actualites">
        <h3 class="actualite__title title"> Nos dernières <span class="bold rect_violet">actualités</span></h3>
        <?php $actualite = new WP_Query([
            'post_type' => 'actualite',
            'posts_per_page' => 3
        ]);
        if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
            <a href="<?= get_the_permalink();?>" class="latest__link">
                <article class="latest__content ">
                    <h4 class="latest__title"><?= get_the_title()?></h4>
                    <figure class="latest__fig">
                        <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'latest__img']); ?>
                    </figure>
                </article>
            </a>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune actualité pour pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>


    <section class="index__avis avis">
        <h3 class="avis__title title"> Ce qu'ils <span class="bold rect_yellow">pensent</span> de nous</h3>
        <?php $avis = new WP_Query([
            'post_type' => 'avis',
            'posts_per_page' => 10
        ]);
        if($avis->have_posts()): while($avis->have_posts()): $avis->the_post();?>
            <div class="avis__content">
                <h4 class="bold"><?= get_field('avis_nom') ?></h4>
                <p class="avos__text"><?= get_field('avis') ?></p>
            </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucun avis pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__partenaires partenaires">
        <h3 class="hidden">Nos partenaires</h3>
        <?php $partenaire = new WP_Query([
            'post_type' => 'partenaire',
            'posts_per_page' => 100
        ]);
        if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>
        <div>
            <h4 class="hidden"><?= get_field('partenaire_name') ?></h4>
            <figure class="partenaires__fig">
                <?= get_the_post_thumbnail(null, 'partenaire_thumbnail', ['class' => 'partenaires__img']); ?>
            </figure>
        </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de partenaires pour le moment.</p>
        <?php endif; wp_reset_query(); ?>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>