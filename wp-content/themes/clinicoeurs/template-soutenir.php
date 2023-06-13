<?php /* Template Name: Soutenir page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="soutiens">
    <h2 class="hidden">Nous soutenir</h2>
    <section class="soutiens__hero hero">
        <div class="hero__content">
            <h3 class="hero__title title"> <?= get_field('soutiens_title');?></h3>
            <p class="hero__content"><?= get_field('soutiens_desc');?></p>
        </div>
        <figure class="hero__fig">
            <img src="<?= get_field('soutiens_img');?>" alt="" class="hero__img">
        </figure>
    </section>

    <section class="soutiens__content singleSoutien">
        <h3 class="hidden"> Toutes les façons de nous soutenir</h3>
        <?php $soutien = new WP_Query([
            'post_type' => 'soutien',
            'posts_per_page' => 10
        ]);
        if($soutien->have_posts()): while($soutien->have_posts()): $soutien->the_post();?>
        <article class="singleSoutien__article">
            <?php if(get_field('soutien_image')):?>
            <figure class="singleSoutien__fig">
                <img src="<?= get_field('soutien_image');?>" alt="" class="singleSoutien__img">
            </figure>
            <?php endif;?>
            <h4 class="singleSoutien__title title"><?= get_the_title()?></h4>
            <p class="singleSoutien__desc"><?= get_field('soutien_description');?></p>
        </article>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="soutiens__contact contact">
        <h3 class="hidden">Contactez-nous</h3>
        <p class="contact__text"><?= get_field('soutiens_contact');?></p>
        <a href="<?= get_field('soutiens_link');?>" class="contact__link">Contacte-nous !</a>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>