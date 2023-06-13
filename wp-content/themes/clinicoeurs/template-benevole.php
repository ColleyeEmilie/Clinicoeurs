<?php /* Template Name: Benevole page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="benevolat">
    <h2 class="hidden">Bénévolat</h2>
    <section class="benevolat__hero hero">
        <div class="hero__desc--1">
            <div class="hero__content">
                <h3 class="title hero__title"><?= get_field('benevolat_title')?></h3>
                <p class="hero__text--1"><?= get_field('benevolat_description_1')?></p>
            </div>

            <figure class="hero__fig">
                <img src="<?= get_field('benevolat_image_1')?>" alt="" class="hero__img">
            </figure>
        </div>

        <div class="hero__desc--1">
            <p class="hero__text--2"><?= get_field('benevolat_description_2')?></p>
            <figure class="hero__fig">
                <img src="<?= get_field('benevolat_image_2')?>" alt="" class="hero__img">
            </figure>
        </div>
    </section>

    <section class="benevolat__profil profil">
        <h3 class="hidden"> Profils que nous recherchons</h3>
        <?php $benevolat = new WP_Query([
            'post_type' => 'benevolat',
            'posts_per_page' => 10
        ]);
        if($benevolat->have_posts()): while($benevolat->have_posts()): $benevolat->the_post();?>
                <article class="profil__content content">
                    <h4 class="content__title title"><?= get_field('profil_fonction')?></h4>
                    <div class="content__desc desc">
                        <h5 class="desc__title">Description:</h5>
                        <p class="desc__texte"><?= get_field('profil_description')?></p>
                    </div>

                    <div class="content__desc desc">
                        <h5 class="desc__title">Compétence(s) requise(s):</h5>
                        <p class="desc__texte"><?= get_field('profil_competences')?></p>
                    </div>

                    <div class="content__desc desc">
                        <h5 class="desc__title">Fréquence de disponibilité par semaine:</h5>
                        <p class="desc__texte"><?= get_field('profil_frequence')?></p>
                    </div>

                    <div class="content__desc desc">
                        <h5 class="desc__title">Lieu:</h5>
                        <p class="desc__texte"><?= get_field('profil_lieu')?></p>
                    </div>
                </article>
        <?php endwhile; else: ?>
            <p class="actualite__empty">Il n'y a aucun profil recherché pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="benevolat__recherche recherche">
        <div class="recherche__content">
            <h3 class="recherche__title title"><?= get_field('benevolat_titre_3')?></h3>
            <p class="recherche_text"><?= get_field('benevolat_description_3')?></p>
        </div>
        <figure class="recherche_fig">
            <img src="<?= get_field('benevolat_image_3')?>" alt="" class="recherche_img">
        </figure>
    </section>

    <section class="benevolat__contact contact">
        <h3 class="hidden"> Contactez-nous</h3>
        <p class="contact__text"><?= get_field('benevolat_contact')?></p>
        <div class="contact__wrapper">
            <a href="<?= get_field('benevolat_link')?>" class="contact__link">Contactez-nous !</a>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>