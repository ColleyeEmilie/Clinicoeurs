<?php /* Template Name: Benevole page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="benevolat">
    <h2 class="hidden">Bénévolat</h2>
    <?php $types = get_terms(['taxonomy' => 'type']); ?>
    <section class="benevolat__hero hero">
        <div class="hero__all">
            <div class="hero__desc--1 flex">
                <div class="hero__content">
                    <h3 class="title hero__principaltitle"><?= get_field('benevolat_title')?></h3>
                    <p class="hero__text--1"><?= get_field('benevolat_description_1')?></p>
                </div>
                <figure class="hero__fig">
                    <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'hero__img']); ?>
                </figure>
            </div>

            <div class="hero__desc--2 flex" >
                <figure class="hero__fig hero__fig--2">
                    <img src="<?= get_field('benevolat_image_2')?>" alt="" class="hero__img">
                </figure>
                <p class="hero__text--2"><?= get_field('benevolat_description_2')?></p>
            </div>
        </div>
    </section>

    <section class="benevolat__benevoles benevoles">
        <h3 class="benevoles__principaltitle title">Nous recherchons des <span class="bold rect rect_violet">bénévoles !</span></h3>
        <div class="benevoles__all flex">
            <?php $profils = new WP_Query([
                'post_type' => 'benevolat',
                'posts_per_page' => 100
            ]);
            if($profils->have_posts()): while($profils->have_posts()): $profils->the_post();?>
                <div class="benevoles__wrapper flex column">
                    <div class="benevoles__content">
                        <h4 class="benevoles__fonction title bold"><?= get_field('profil_fonction') ?></h4>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Description</h4>
                        <p class="benevoles__text"><?= get_field('profil_description') ?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Competence(s) requise(s)</h4>
                        <p class="benevoles__text"><?= get_field('profil_competences')?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Fréquence de disponibilité</h4>
                        <p class="benevoles__text"><?= get_field('services_frequence') ?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Lieu</h4>
                        <p class="benevoles__text"><?= get_field('profil_lieu') ?></p>
                    </div>
                </div>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section>
    <section class="benevolat__benevolat benevolat">
        <h3 class="hidden">Bénévolat</h3>
        <div class="benevolat__wrapper flex">
            <div class="benevolat__content flex column">
                <h4 class="benevolat__title title"><?= get_field('benevolat_titre_3')?></h4>
                <p class="benevolat__texte"><?= get_field('benevolat_description_3')?></p>
            </div>
            <figure class="benevolat__fig">
                <img src="<?= get_field('benevolat_image_3')?>" alt="" class="benevolat__img">
            </figure>
        </div>
    </section>

    <section class="benevolat__contact background-blue contact flex column">
        <h3 class="hidden"> Contactez-nous</h3>
        <div class="contact__content flex column">
            <p class="contact__text"><?= get_field('benevolat_contact')?></p>
            <div class="contact__wrapper flex">
                <a href="<?= get_field('benevolat_link')?>" class="contact__link">Contactez-nous !</a>
            </div>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>