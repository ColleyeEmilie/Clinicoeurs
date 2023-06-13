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
        <h3 ></h3>
    </section>

    <section class="benevolat__">
        <h3></h3>
    </section>

    <section class="benevolat__contact contact">
        <h3></h3>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>